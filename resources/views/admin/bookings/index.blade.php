@extends('admin.layouts.app')

@section('title', 'Bookings')
@section('page_title', 'Bookings Management')

@section('content')

<!-- Header Description -->
<div class="mb-4">
    <p class="text-muted mb-0">Monitor, filter, and change user reservation statuses.</p>
</div>

<!-- Alert Success Message -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Bookings Table Card -->
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">#ID</th>
                        <th>User</th>
                        <th>Destination</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td class="ps-3 fw-bold">#{{ $booking->id }}</td>
                            <td>
                                <div class="fw-semibold">{{ $booking->user->name ?? 'N/A' }}</div>
                                <small class="text-muted">{{ $booking->user->email ?? '' }}</small>
                            </td>
                            <td class="fw-semibold text-theme">
                                {{ $booking->destination->title ?? 'Destination Removed' }}
                            </td>
                            <td>
                                <i class="bi bi-calendar3 text-muted me-1"></i>
                                {{ $booking->created_at ? $booking->created_at->format('Y-m-d') : 'N/A' }}
                            </td>
                            <td>
                                @if($booking->status == 'confirmed')
                                    <span class="badge bg-success-subtle text-success border border-success px-3 py-2 rounded-pill">Confirmed</span>
                                @elseif($booking->status == 'pending')
                                    <span class="badge bg-warning-subtle text-warning border border-warning px-3 py-2 rounded-pill">Pending</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger border border-danger px-3 py-2 rounded-pill">Cancelled</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end align-items-center gap-2">
                                    
                                    <!-- Change Status Dropdown/Form -->
                                    <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm border-secondary-subtle">
                                            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-calendar-x fs-1 d-block mb-2 text-secondary"></i>
                                No bookings found yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($bookings->hasPages())
        <div class="card-footer bg-white border-0 py-3">
            {{ $bookings->links() }}
        </div>
    @endif
</div>

@endsection