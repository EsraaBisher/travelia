<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class TourController extends Controller
{
    // This is the function we made earlier for the cards
    public function index()
    {
        $destinations = Destination::all();
        return view('tours.index', compact('destinations'));
    }

    // Add this new function to show your create.blade.php file!
    public function create()
    {
        return view('tours.create');
    }

    public function store(Request $request)
    {
        // 1. Validate the incoming data
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|numeric',
            'image' => 'required|image',
        ]);

        // 2. Handle the Image Upload
        // This automatically saves the file inside storage/app/public/destinations
        $imagePath = $request->file('image')->store('destinations', 'public');

        // 3. Save to the Database
        $destination = new Destination();
        $destination->name = $request->name;
        $destination->description = $request->description;
        $destination->price = $request->price;
        $destination->duration = $request->duration;
        $destination->image = $imagePath;
        $destination->save();

        // 4. Redirect back to the Tour Package page
        return redirect()->route('tours.index');
    }
}
