<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {

        // Check if the logged-in user is an admin
        if (auth()->user()->role === 'admin') {
            // Admins see EVERYONE'S bookings
            $bookings = Booking::with(['user', 'destination'])->latest()->paginate(10);
        } else {
            // Regular users ONLY see their own bookings
            $bookings = Booking::with(['user', 'destination'])
                ->where('user_id', auth()->id())
                ->latest()
                ->paginate(10);
        }


        $bookings = Booking::with(['user', 'destination'])->latest()->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $booking->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Booking status updated successfully!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->back()->with('success', 'Booking deleted successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'          => 'required|exists:users,id',
            'destination_id'   => 'required|exists:destinations,id',
            'booking_date'     => 'required|date|after_or_equal:today',
            'number_of_people' => 'required|integer|min:1',
        ]);

        Booking::create([
            'user_id'          => $request->user_id,
            'destination_id'   => $request->destination_id,
            'booking_date'     => $request->booking_date,
            'number_of_people' => $request->number_of_people,
            'status'           => 'pending',
        ]);

        return redirect()->back()->with('success', 'Booking request submitted successfully!');
    }

}