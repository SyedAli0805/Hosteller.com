<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hostel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['message' => 'These credentials do not match our records.']);
        }

        Auth::login($user);
        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
    public function addBooking(Request $request)
    {
        $validated = $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'no_of_rooms' => 'required|integer|min:1',
            'hostel_id' => 'required|exists:hostels,id',
            'user_id' => 'required|exists:users,id'
        ]);

        $hostel = Hostel::findOrFail($validated['hostel_id']);
        if ($hostel->no_of_rooms < $validated['no_of_rooms']) {
            return redirect()->back()->withErrors(['no_of_rooms' => 'Not enough rooms available in the hostel.']);
        }

        $booking = new Booking($validated);
        $request->user()->bookings()->save($booking);

        return redirect()->route('bookings')->with('success', 'Booking created successfully');
    }


    public function viewBookings(Request $request)
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)->with('hostel')->get();
    
        if ($bookings->isEmpty()) {
            $message = 'No Bookings Yet';
            return view('bookings', compact('message', 'user'));
        }
    
        return view('bookings', compact('bookings', 'user'));
    }    
    public function updateBooking(Request $request, $id)
    {
        $booking = $request->user()->bookings()->findOrFail($id);
    
        // Validate the request
        $validated = $request->validate([
            'check_in' => 'nullable|date|after_or_equal:today',
            'check_out' => 'nullable|date|after:check_in',
            'no_of_rooms' => 'nullable|integer|min:1',
            'status' => 'nullable|in:pending,confirmed,canceled',
            'hostel_id' => 'nullable|exists:hostels,id'
        ]);
    
        // Check room availability if hostel_id or no_of_rooms is being updated
        if (isset($validated['hostel_id']) && $validated['hostel_id'] != $booking->hostel_id) {
            $hostel = Hostel::findOrFail($validated['hostel_id']);
            if ($hostel->available_rooms < $validated['no_of_rooms']) {
                return redirect()->back()->withErrors(['no_of_rooms' => 'Not enough rooms available in the hostel.']);
            }
        } elseif (isset($validated['no_of_rooms']) && $validated['no_of_rooms'] > $booking->hostel->no_of_rooms) {
            return redirect()->back()->withErrors(['no_of_rooms' => 'Not enough rooms available in the hostel.']);
        }
    
        // Update the booking
        $booking->update($validated);
    
        return redirect()->route('bookings')->with('success', 'Booking updated successfully');
    }
    

    public function deleteBooking(Request $request, $id)
    {
        $booking = $request->user()->bookings()->findOrFail($id);

        $booking->delete();

        return redirect()->route('bookings')->with('success', 'Booking deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $hostels = Hostel::where('hostel_location', 'like', "%$query%")
            ->orWhere('hostel_name', 'like', "%$query%")->orWhere('id', $query)
            ->get();

        return view('hostel', compact('hostels', 'query'));
    }
    public function showHostel($id)
    {
        $hostel = Hostel::findOrFail($id);
        return view('createBookings', ['hostel' => $hostel]);
    }
    public function showBooking($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        return view('editBookings', compact('booking'));
    }
}
