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
                                    @if($booking->status == 'confirmed')
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success">Confirmed</span>
                                    @elseif($booking->status == 'pending')
                                        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning">Pending</span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger">Cancelled</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa-solid fa-trash me-1"></i> Cancel
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
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