@extends('layouts.app')

@section('title', 'Manage Bookings - E-Travel')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-orange mb-0">Manage Bookings</h3>
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
                            <th>User Name</th>
                            <th>Destination / Package</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td class="ps-4">{{ $booking->id }}</td>
                                <td class="fw-bold text-purple">{{ $booking->user->name ?? 'N/A' }}</td>
                                <td>{{ $booking->package_name ?? $booking->destination }}</td>
                                <td>{{ $booking->created_at ? $booking->created_at->format('Y-m-d') : 'N/A' }}</td>
                                
                              
                                <td>
                                    <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm fw-semibold border-0 rounded-pill px-3 py-1 
                                            {{ $booking->status == 'confirmed' ? 'bg-success bg-opacity-10 text-success' : '' }}
                                            {{ $booking->status == 'pending' ? 'bg-warning bg-opacity-10 text-warning' : '' }}
                                            {{ $booking->status == 'cancelled' ? 'bg-danger bg-opacity-10 text-danger' : '' }}">
                                            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                </td>

                                <td class="text-end pe-4">
                                    <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                        @csrf
                                        @method('DELETE')
                                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                </table>
            </div>
        </div>
        @if(method_exists($bookings, 'hasPages') && $bookings->hasPages())
            <div class="card-footer bg-white border-0 py-3">
                {{ $bookings->links() }}
            </div>
        @endif
    </div>
</div>
@endsection