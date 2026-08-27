@extends('layouts.app')

@section('title', 'Manage Destinations - E-Travel')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-orange mb-0">Manage Destinations</h3>
        <a href="{{ route('admin.destinations.create') }}" class="btn btn-purple">
            <i class="fa-solid fa-plus me-1"></i> Add New Destination
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($destinations as $destination)
                            <tr>
                                <td class="ps-4">{{ $destination->id }}</td>
                                <td>
                                    @if($destination->image)
                                        <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->title }}" class="rounded" width="50" height="50" style="object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 50px; height: 50px;">
                                            <i class="fa-solid fa-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="fw-bold text-purple">{{ $destination->name }}</td>
                                <td>${{ number_format($destination->price, 2) }}</td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('admin.destinations.edit', $destination->id) }}" class="btn btn-sm btn-outline-purple me-1">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.destinations.destroy', $destination->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this destination?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No destinations found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if(method_exists($destinations, 'hasPages') && $destinations->hasPages())
            <div class="card-footer bg-white border-0 py-3">
                {{ $destinations->links() }}
            </div>
        @endif
    </div>
</div>
@endsection