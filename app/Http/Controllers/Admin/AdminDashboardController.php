<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Destination;
use App\Models\Booking;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        $totalDestinations = Destination::count();

        $totalBookings = Booking::count();

        $pendingBookings = Booking::where('status', 'pending')->count();

        $recentBookings = Booking::with(['user', 'destination'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalDestinations',
            'totalBookings',
            'pendingBookings',
            'recentBookings'
        ));
    }
}