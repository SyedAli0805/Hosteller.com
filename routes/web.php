<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::post('login', [UserController::class, 'index'])->name('user.login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('search', [UserController::class, 'search'])->name('search');
Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[GoogleAuthController::class,'callbackGoogle']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/bookings', [UserController::class, 'viewBookings'])->name('bookings');
    Route::get('createBookings/{hostelId}', [UserController::class, 'showHostel']);
    Route::post('/add', [UserController::class, 'addBooking']);
    Route::get('editBookings/{bookingId}', [UserController::class, 'showBooking']);
    Route::put('updateBooking/{bookingId}', [UserController::class, 'updateBooking']);
    Route::delete('/bookings/{id}', [UserController::class, 'deleteBooking']);
    Route::post('/contact',[MessageController::class,'saveMessage']);
    Route::view('feedback','feedback');
});









Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'getDashboardData'])->name('admin.dashboard');
        Route::get('/hostels', [AdminController::class, 'getHostels'])->name('admin.hostels');
        Route::get('/hostels/{hostelId}/users', [AdminController::class, 'viewUsers'])->name('admin.users');
        Route::delete('/hostels/{hostelId}/users/{userId}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
        Route::get('/hostels/{hostelId}/bookings', [AdminController::class, 'viewBookings'])->name('admin.bookings');
        Route::put('/bookings/{bookingId}/status', [AdminController::class, 'changeBookingStatus'])->name('admin.bookings.status');
        Route::get('/addHostel', [AdminController::class, 'showAddHostel'])->name('admin.addHostel');
        Route::post('/hostels', [AdminController::class, 'addHostel'])->name('admin.hostels.add');
        Route::get('/hostels/{id}/update', [AdminController::class, 'showHostel'])->name('admin.hostels.update');
        Route::put('/hostels/{id}/edit', [AdminController::class, 'editHostel'])->name('admin.hostels.edit');
        Route::delete('/hostels/{id}', [AdminController::class, 'deleteHostel'])->name('admin.hostels.delete');
    });
});
