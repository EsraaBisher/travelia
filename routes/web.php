<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDestinationController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminUserController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// User Routes (Authenticated)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // User Bookings
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('user.bookings');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
});

// Admin Routes Group
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Destinations CRUD
    Route::resource('destinations', AdminDestinationController::class);
    
    // Users Management CRUD
    Route::resource('users', AdminUserController::class)->except(['show']);
    
    // Bookings Management
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::patch('/bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('bookings.updateStatus');
    Route::delete('/bookings/{booking}', [AdminBookingController::class, 'destroy'])->name('bookings.destroy');
});