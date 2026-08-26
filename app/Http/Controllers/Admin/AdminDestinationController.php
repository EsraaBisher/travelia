<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;

class AdminDestinationController extends Controller
{
    // 1. عرض كل الوجهات
    public function index()
    {
        $destinations = Destination::latest()->paginate(10);
        return view('admin.destinations.index', compact('destinations'));
    }

    // 2. صفحة إضافة وجهة جديدة
    public function create()
    {
        return view('admin.destinations.create');
    }
public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }
 // 3. حفظ الوجهة الجديدة في الداتابيز
public function store(Request $request)
{
    $request->validate([
        'title'       => 'required|string|max:255',
        'duration'    => 'required|string|max:255', // إضافة الفاليشن
        'description' => 'required|string',
        'price'       => 'required|numeric',
        'location'    => 'required|string|max:255',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $data = [
        'name'        => $request->title,
        'duration'    => $request->duration, // إضافة الحقل
        'description' => $request->description,
        'price'       => $request->price,
        'location'    => $request->location,
    ];

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('destinations', 'public');
    }

    Destination::create($data);

    return redirect()->route('admin.destinations.index')
                     ->with('success', 'Destination created successfully!');
}

// 5. تحديث الوجهة في الداتابيز
public function update(Request $request, Destination $destination)
{
    $request->validate([
        'title'       => 'required|string|max:255',
        'duration'    => 'required|string|max:255',
        'description' => 'required|string',
        'price'       => 'required|numeric',
        'location'    => 'required|string|max:255',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $data = [
        'name'        => $request->title,
        'duration'    => $request->duration,
        'description' => $request->description,
        'price'       => $request->price,
        'location'    => $request->location,
    ];

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('destinations', 'public');
    }

    $destination->update($data);

    return redirect()->route('admin.destinations.index')
                     ->with('success', 'Destination updated successfully!');
}
    // 6. حذف وجهة
    public function destroy(Destination $destination)
    {
        $destination->delete();

        return redirect()->route('admin.destinations.index')
                         ->with('success', 'Destination deleted successfully!');
    }
}