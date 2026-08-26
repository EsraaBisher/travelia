@extends('layouts.app')

@section('title', 'Admin Dashboard - E-Travel')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <h3 class="fw-bold text-orange">Dashboard Overview</h3>
        <p class="text-muted">Welcome back, {{ Auth::user()->name }}!</p>
    </div>

    <div class="row g-4 mb-4">
        <!-- Destinations Card -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold d-block mb-1">Destinations</span>
                        <h2 class="fw-bold text-purple mb-0">{{ \App\Models\Destination::count() ?? 0 }}</h2>
                    </div>
                    <div class="rounded-circle p-3 bg-light text-purple fs-3">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bookings Card -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold d-block mb-1">Total Bookings</span>
                        <h2 class="fw-bold text-purple mb-0">{{ \App\Models\Booking::count() ?? 0 }}</h2>
                    </div>
                    <div class="rounded-circle p-3 bg-light text-purple fs-3">
                        <i class="fa-solid fa-passport"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users Card -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-semibold d-block mb-1">Registered Users</span>
                        <h2 class="fw-bold text-purple mb-0">{{ \App\Models\User::count() ?? 0 }}</h2>
                    </div>
                    <div class="rounded-circle p-3 bg-light text-purple fs-3">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection