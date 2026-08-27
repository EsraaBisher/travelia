<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDestinationController;
// NEW: Added the AdminBookingController here so the route can find it
use App\Http\Controllers\Admin\AdminBookingController;

use App\Models\User;
use App\Models\Booking;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

// Customer Booking Route (Moved out of the admin block so customers can use it!)
Route::post('/bookings', [BookingController::class, 'store'])
    ->middleware('auth')
    ->name('bookings.store');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

Route::post('/profile', function () {
    return redirect()->back()->with('success', 'Profile updated successfully!');
})->middleware('auth')->name('profile.update');

Route::post('/subscribe', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    return redirect()->back()->with('subscribe_success', 'Thank you for subscribing! We will keep you updated.');
})->name('subscribe');


// ==========================================
// SHARED ROUTES (Auth only - Users & Admins)
// ==========================================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // STEP 3 FIX: Moved the bookings list here so normal users can see it! 
    // It now points to the AdminBookingController we updated in Step 1.
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
});


// ==========================================
// ADMIN ONLY ROUTES (Strictly locked down)
// ==========================================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('/destinations', AdminDestinationController::class);

    Route::get('/users', function () {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    })->name('users.index');

    Route::get('/users/create', function () {
        return view('admin.users.create');
    })->name('users.create');

    Route::post('/users', function () {
        return redirect()->route('admin.users.index')->with('success', 'User added successfully!');
    })->name('users.store');

    Route::delete('/users/{id}', function ($id) {
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    })->name('users.destroy');

    // Admin booking controls (Delete & Status Update) safely remain in the admin zone
    Route::delete('/bookings/{id}', function ($id) {
        Booking::findOrFail($id)->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking cancelled successfully!');
    })->name('bookings.destroy');

    Route::patch('/bookings/{id}/status', function (Request $request, $id) {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => $request->input('status')]);
        return redirect()->back()->with('success', 'Booking status updated successfully!');
    })->name('bookings.updateStatus');
});

// The route for your main cards page
Route::get('/tours', [TourController::class, 'index'])->name('tours.index');

// The route for your new Add Tour page
Route::get('/tours/create', [TourController::class, 'create'])->name('tours.create');

// Route to handle saving the form data
Route::post('/tours', [TourController::class, 'store'])->name('tours.store');
