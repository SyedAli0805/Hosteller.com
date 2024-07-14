<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HostelController;
use Illuminate\Support\Facades\Route;

// Route::post('login', [UserController::class, 'index'])->name('user.login');

// Route::middleware(['auth:sanctum'])->group(function() {
//     Route::post('/bookings', [UserController::class, 'addBooking']);
//     Route::get('/bookings', [UserController::class, 'viewBookings']);
//     Route::put('/bookings/{id}', [UserController::class, 'updateBooking']);
//     Route::delete('/bookings/{id}', [UserController::class, 'deleteBooking']);
// });

// Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
// Route::post('admin/logout', [AdminController::class, 'logout']);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('admin/hostels', [AdminController::class, 'getHostels']);
//     Route::post('admin/hostels', [AdminController::class, 'addHostel']);
//     Route::put('admin/hostels/{id}', [AdminController::class, 'editHostel']);
//     Route::delete('admin/hostels/{id}', [AdminController::class, 'deleteHostel']);
    
//     Route::get('admin/hostels/{hostelId}/users', [AdminController::class, 'viewUsers']);
//     Route::delete('admin/hostels/{hostelId}/users/{userId}', [AdminController::class, 'deleteUser']);
    
//     Route::get('admin/hostels/{hostelId}/bookings', [AdminController::class, 'viewBookings']);
//     Route::patch('admin/bookings/{bookingId}/status', [AdminController::class, 'changeBookingStatus']);
// });
// // Retrieve all hostels
// Route::get('test', [HostelController::class, 'index']);

// // Search hostels by location or name
// Route::get('/hostels/search', [HostelController::class, 'search']);