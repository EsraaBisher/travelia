<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDestinationController;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Destinations Resource
    Route::resource('/destinations', AdminDestinationController::class);

    // Users Routes (Fix for missing routes)
    Route::get('/users', function () { 
        return view('admin.users.index', ['users' => collect()]); 
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

    // Bookings Routes
    Route::get('/bookings', function () { 
        return view('admin.bookings.index', ['bookings' => collect()]); 
    })->name('bookings.index');

    Route::delete('/bookings/{id}', function ($id) { 
        return redirect()->route('admin.bookings.index')->with('success', 'Booking cancelled successfully!'); 
    })->name('bookings.destroy');
    Route::get('/users', function () { 
    $users = User::paginate(10); 
    return view('admin.users.index', compact('users')); 
})->name('users.index');
///
Route::get('/bookings', function () { 
        $bookings = Booking::with(['user', 'destination'])->paginate(10); 
        return view('admin.bookings.index', compact('bookings')); 
    })->name('bookings.index');

    // Route تحديث حالة الحجز
    Route::patch('/bookings/{id}/status', function (Request $request, $id) {
        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => $request->input('status')
        ]);

        return redirect()->back()->with('success', 'Booking status updated successfully!');
    })->name('bookings.updateStatus');
});
Route::post('/subscribe', function (Request $request) {
    $request->validate([
        'email' => 'required|email'
    ]);

    return redirect()->back()->with('subscribe_success', 'Thank you for subscribing! We will keep you updated.');
})->name('subscribe');