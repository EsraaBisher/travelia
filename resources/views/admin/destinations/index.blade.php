@extends('admin.layouts.app')

@section('title', 'Destinations')
@section('page_title', 'Destinations Management')

@section('content')

<!-- Top Action Bar -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <p class="text-muted mb-0">Manage all tour destinations and travel packages.</p>
    <a href="{{ route('admin.destinations.create') }}" class="btn btn-theme rounded-pill px-4">
        <i class="bi bi-plus-circle me-1"></i> Add New Destination
    </a>
</div>

<!-- Alert Success Message -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Destinations Table Card -->
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Price</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($destinations as $destination)
                        <tr>
                            <td class="ps-3">#{{ $destination->id }}</td>
                            <td>
                                @if($destination->image)
                                    <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->title }}" class="rounded-2" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-light text-muted d-flex align-items-center justify-content-center rounded-2" style="width: 50px; height: 50px;">
                                        <i class="bi bi-image fs-4"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="fw-semibold text-theme">{{ $destination->title }}</td>
                            <td><i class="bi bi-geo-alt-fill text-danger me-1"></i>{{ $destination->location }}</td>
                            <td class="fw-bold">${{ number_format($destination->price, 2) }}</td>
                            
                            {{-- الأزرار الأنيقة الجديدة --}}
                            <td class="text-end pe-4 align-middle">
                                <div class="d-flex justify-content-end gap-1">
                                    {{-- Edit Button --}}
                                    <a href="{{ route('admin.destinations.edit', $destination->id) }}" 
                                       class="btn btn-sm btn-light-primary text-primary px-2 py-1 rounded-2" 
                                       title="Edit">
                                        <i class="bi bi-pencil-square fs-6"></i>
                                    </a>

                                    {{-- Delete Button --}}
                                    <form action="{{ route('admin.destinations.destroy', $destination->id) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this destination?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-light-danger text-danger px-2 py-1 rounded-2" 
                                                title="Delete">
                                            <i class="bi bi-trash fs-6"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-geo-alt fs-1 d-block mb-2 text-secondary"></i>
                                No destinations found yet. Click "Add New Destination" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($destinations->hasPages())
        <div class="card-footer bg-white border-0 py-3">
            {{ $destinations->links() }}
        </div>
    @endif
</div>

@endsection