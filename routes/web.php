<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\TourController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDestinationController;
use App\Http\Controllers\Admin\AdminBookingController;

use App\Models\User;
use App\Models\Booking;

Auth::routes();

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Customer Booking
Route::post('/bookings', [BookingController::class, 'store'])
    ->middleware('auth')
    ->name('bookings.store');

// About
Route::get('/about-us', function () {
    return view('about');
})->name('about');

// Profile
Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

Route::post('/profile', function () {
    return redirect()
        ->back()
        ->with('success', 'Profile updated successfully!');
})->middleware('auth')->name('profile.update');

// Newsletter Subscribe
Route::post('/subscribe', function (Request $request) {

    $request->validate([
        'email' => 'required|email'
    ]);

    return redirect()
        ->back()
        ->with(
            'subscribe_success',
            'Thank you for subscribing! We will keep you updated.'
        );

})->name('subscribe');

// ==========================================
// ADMIN ROUTES
// ==========================================
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // Destinations
        Route::resource(
            '/destinations',
            AdminDestinationController::class
        );

        // Users
        Route::get('/users', function () {

            $users = User::paginate(10);

            return view(
                'admin.users.index',
                compact('users')
            );

        })->name('users.index');

        Route::get('/users/create', function () {

            return view('admin.users.create');

        })->name('users.create');

        Route::post('/users', function () {

            return redirect()
                ->route('admin.users.index')
                ->with(
                    'success',
                    'User added successfully!'
                );

        })->name('users.store');

        Route::delete('/users/{id}', function ($id) {

            return redirect()
                ->route('admin.users.index')
                ->with(
                    'success',
                    'User deleted successfully!'
                );

        })->name('users.destroy');

        // Bookings
        Route::get('/bookings', [AdminBookingController::class, 'index'])
            ->name('bookings.index');

        Route::delete('/bookings/{id}', function ($id) {

            Booking::findOrFail($id)->delete();

            return redirect()
                ->route('admin.bookings.index')
                ->with(
                    'success',
                    'Booking cancelled successfully!'
                );

        })->name('bookings.destroy');

        Route::patch(
            '/bookings/{id}/status',
            function (Request $request, $id) {

                $booking = Booking::findOrFail($id);

                $booking->update([
                    'status' => $request->input('status')
                ]);

                return redirect()
                    ->back()
                    ->with(
                        'success',
                        'Booking status updated successfully!'
                    );
            }
        )->name('bookings.updateStatus');
    });

// ==========================================
// TOURS
// ==========================================

// Tours list
Route::get('/tours', [TourController::class, 'index'])
    ->name('tours.index');

// Add Tour page
Route::get('/tours/create', [TourController::class, 'create'])
    ->name('tours.create');

// Save Tour
Route::post('/tours', [TourController::class, 'store'])
    ->name('tours.store');