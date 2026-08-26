@extends('admin.layouts.app')

@section('title', 'Dashboard Overview')
@section('page_title', 'Dashboard Overview')

@section('content')

<!-- Statistics Grid -->
<div class="row g-3 mb-4">
    <!-- Total Users -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat-card p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small text-uppercase fw-semibold">Total Users</span>
                    <h3 class="fw-bold mb-0 mt-1">{{ $totalUsers }}</h3>
                </div>
                <div class="icon-box bg-primary-subtle text-primary">
                    <i class="bi bi-people-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Destinations -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat-card p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small text-uppercase fw-semibold">Destinations</span>
                    <h3 class="fw-bold mb-0 mt-1">{{ $totalDestinations }}</h3>
                </div>
                <div class="icon-box bg-success-subtle text-success">
                    <i class="bi bi-map-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Bookings -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat-card p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small text-uppercase fw-semibold">Total Bookings</span>
                    <h3 class="fw-bold mb-0 mt-1">{{ $totalBookings }}</h3>
                </div>
                <div class="icon-box bg-info-subtle text-info">
                    <i class="bi bi-ticket-detailed-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Bookings -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat-card p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small text-uppercase fw-semibold">Pending Bookings</span>
                    <h3 class="fw-bold mb-0 mt-1 text-warning">{{ $pendingBookings }}</h3>
                </div>
                <div class="icon-box bg-warning-subtle text-warning">
                    <i class="bi bi-hourglass-split"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Bookings Table -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 border-0">
        <h5 class="fw-bold mb-0">Recent Bookings</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">ID</th>
                        <th>User</th>
                        <th>Destination</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentBookings as $booking)
                        <tr>
                            <td class="ps-3">#{{ $booking->id }}</td>
                            <td>{{ $booking->user->name ?? 'N/A' }}</td>
                            <td>{{ $booking->destination->title ?? $booking->destination->name ?? 'N/A' }}</td>
                            <td>{{ $booking->created_at ? $booking->created_at->format('M d, Y') : 'N/A' }}</td>
                            <td>
                                @if($booking->status === 'pending')
                                    <span class="badge bg-warning-subtle text-warning border border-warning px-2 py-1">Pending</span>
                                @elseif($booking->status === 'approved' || $booking->status === 'confirmed')
                                    <span class="badge bg-success-subtle text-success border border-success px-2 py-1">Approved</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger border border-danger px-2 py-1">{{ ucfirst($booking->status) }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">No recent bookings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection