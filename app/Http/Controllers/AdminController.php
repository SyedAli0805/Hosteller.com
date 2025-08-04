<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Hostel;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{

    //TO SHOW LOGIN FORM 

    public function showLoginForm()
    {
        return view('admin/login');
    }

    //TO LOGIN THE ADMIN 

    public function login(Request $request)
    {
        $credentials = $request->only('admin_email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors(['message' => 'These credentials do not match our records.']);
    }

    //TO LOGOUT THE ADMIN

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('message', 'Logged out successfully');
    }

    //TO GET ADMIN'S HOSTELS

    public function getHostels(Request $request)
    {
        $hostels = $request->user()->hostels;
        return view('admin.hostels', ['hostels' => $hostels]);
    }

    //TO SHOW ADD HOSTEL FORM

    public function showAddHostel()
    {
        return view('admin/addHostel');
    }

    //TO ADD HOSTEL IN DB TABLE HOSTELS

    public function addHostel(Request $request)
    {
        $request->validate([
            'hostel_name' => 'required|string|max:255',
            'hostel_image_path' => 'required|image|mimes:jpeg,png,jpg,gif',
            'hostel_location' => 'required|string|max:255',
            'hostel_description' => 'required|string',
            'no_of_rooms' => 'required|integer',
            'room_price' => 'required|numeric',
        ]);
          // Handle the file upload
    if ($request->hasFile('hostel_image_path')) {
        try {
            $filePath = $request->file('hostel_image_path')->store('img', 'public');
        } catch (\Exception $e) {
            Log::error('File upload failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['message' => 'Failed to upload image: ' . $e->getMessage()]);
        }
    } else {
        return redirect()->back()->withErrors(['message' => 'No file uploaded.']);
    }
        $hostel = new Hostel($request->all());
        $hostel->hostel_image_path = $filePath;
        $request->user()->hostels()->save($hostel);
        return redirect()->route('admin.hostels')->with('message', 'Hostel added successfully');
    }

    //TO EDIT HOSTEL IN DB  TABLE HOSTELS

    public function editHostel(Request $request, $id)
    {
        $hostel = Hostel::findOrFail($id);
        $hostel->update($request->all());
        if ($request->hasFile('hostel_image_path')) {
            $filePath = $request->file('hostel_image_path')->store('img', 'public');
            $hostel->hostel_image_path = $filePath;
        }
        $hostel->update($request->except('hostel_image_path'));
        return redirect()->route('admin.hostels')->with('message', 'Hostel updated successfully');
    }

    //TO SHOW CURRENT HOSTEL IN EDIT FORM

    public function showHostel($hostelId)
    {
        $hostel = Hostel::findOrFail($hostelId);
        return view('admin/editHostel', compact('hostel'));
    }

    //TO DELETE HOSTEL FROM DB TABLE

    public function deleteHostel($id)
    {
        try {
            $hostel = Hostel::findOrFail($id);

            // Check for associated bookings
            if ($hostel->bookings()->exists()) {
                return redirect()->route('admin.hostels')
                    ->with('error', 'Cannot delete hostel with existing bookings.');
            }

            $hostel->delete();

            return redirect()->route('admin.hostels')->with('message', 'Hostel deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.hostels')->with('error', $e->getMessage());
        }
    }

    //TO VIEW USERS OF HOSTEL THROUGH HOSTEL ID

    public function viewUsers($hostelId)
    {
        // Fetch users who have confirmed bookings in the specified hostel
        $users = DB::table('users')
            ->join('bookings', 'users.id', '=', 'bookings.user_id')
            ->join('hostels', 'bookings.hostel_id', '=', 'hostels.id')
            ->where('hostels.id', $hostelId)
            ->where('bookings.status', 'confirmed')
            ->select('users.*')
            ->get();

        return view('admin.users', ['users' => $users, 'hostelId' => $hostelId]);
    }

    //TO DELETE USE THROUGH HOSTEL AND USER ID
    public function deleteUser($hostelId, $userId)
    {
        try {
            $hostel = Hostel::findOrFail($hostelId);
            $user = $hostel->users()->findOrFail($userId);

            // Check for associated bookings
            if ($user->bookings()->exists()) {
                return redirect()->route('admin.users', ['hostelId' => $hostelId])
                    ->with('error', 'Cannot delete user with existing bookings.');
            }

            $user->delete();

            return redirect()->route('admin.users', ['hostelId' => $hostelId])
                ->with('message', 'User deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.users', ['hostelId' => $hostelId])
                ->with('error', 'An error occurred while trying to delete the user.');
        }
    }


    //TO VIEW BOOKINGS OF HOSTEL THROUGH HOSTEL ID

    public function viewBookings($hostelId)
    {
        $hostel = Hostel::findOrFail($hostelId);
        $bookings = $hostel->bookings;
        return view('admin/booking', ['bookings' => $bookings]);
    }

    //TO CHANGE BOOKINGS STATUS THROUGH BOOKING ID

    public function changeBookingStatus($bookingId, Request $request)
    {
        $booking = Booking::findOrFail($bookingId);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->route('admin.bookings', ['hostelId' => $booking->hostel_id])->with('message', 'Booking status updated successfully');
    }

    // Method to get combined data for the dashboard
    public function getDashboardData(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        // Fetch hostel names and number of users with confirmed bookings for pie chart
        $hostelUserStats = Booking::where('status', 'confirmed')
            ->join('hostels', 'bookings.hostel_id', '=', 'hostels.id')
            ->where('hostels.owner_id', $admin->id)
            ->select('hostels.hostel_name', DB::raw('count(bookings.user_id) as user_count'))
            ->groupBy('hostels.hostel_name')
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->hostel_name,
                    'user_count' => $item->user_count
                ];
            })->toArray();

        // Fetch hostel names and booking details for the stacked bar chart
        $hostelBookingDetails = Hostel::where('hostels.owner_id', $admin->id)
            ->withCount([
                'bookings as confirmed_count' => function ($query) {
                    $query->where('status', 'confirmed');
                },
                'bookings as pending_count' => function ($query) {
                    $query->where('status', 'pending');
                },
                'bookings as cancelled_count' => function ($query) {
                    $query->where('status', 'cancelled');
                }
            ])->get(['hostel_name'])->map(function ($item) {
                return [
                    'name' => $item->hostel_name,
                    'confirmed_count' => $item->confirmed_count ?? 0,
                    'pending_count' => $item->pending_count ?? 0,
                    'cancelled_count' => $item->cancelled_count ?? 0,
                ];
            })->toArray();

        // Pass both datasets to the view
        return view('admin.dashboard', compact('hostelUserStats', 'hostelBookingDetails'));
    }
}
