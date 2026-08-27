<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id'   => 'required|exists:destinations,id',
            'booking_date'     => 'required|date|after_or_equal:today',
            'number_of_people' => 'required|integer|min:1',
        ]);

        Booking::create([
            ...$validated,
            'user_id' => $request->user()->id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Booking request submitted successfully!');
    }
}
