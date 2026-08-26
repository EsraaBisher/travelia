@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f0e8f4 !important;
    }
    .text-purple-primary {
        color: #5f3475 !important;
    }
    .text-purple-secondary {
        color: #893172 !important;
    }

    /* Dynamic Hover & Card Effects */
    .about-card {
        background: #ffffff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 10px 30px rgba(95, 52, 117, 0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .about-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(95, 52, 117, 0.15);
    }

    /* Primary Interactive Buttons */
    .btn-purple-main {
        background-color: #5f3475;
        color: #ffffff;
        border-radius: 12px;
        padding: 12px 30px;
        font-weight: bold;
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    .btn-purple-main:hover {
        background-color: #893172;
        color: #ffffff;
        transform: scale(1.03);
    }

    .btn-purple-outline {
        border: 2px solid #5f3475;
        color: #5f3475;
        border-radius: 12px;
        padding: 10px 28px;
        font-weight: bold;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }
    .btn-purple-outline:hover {
        background-color: #5f3475;
        color: #ffffff;
    }

    /* Icon Styling */
    .icon-square {
        width: 70px;
        height: 70px;
        border-radius: 18px;
        background-color: #f0e8f4;
        color: #5f3475;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        margin: 0 auto 20px auto;
    }
</style>

<div class="py-5" dir="ltr">
    <div class="container">

        <!-- 1. Hero Header Section -->
        <div class="text-center mb-5 pb-2">
            <span class="badge px-3 py-2 fs-6 rounded-pill mb-3" style="background-color: #f0e8f4; color: #893172;">
                Welcome to Travelia
            </span>
            <h1 class="fw-bold text-purple-primary display-4 mb-3">Crafting Extraordinary Journeys</h1>
            <p class="text-purple-secondary fs-5 mx-auto" style="max-width: 720px; line-height: 1.8;">
                We connect passionate travelers with seamless experiences, world-class destinations, and unforgettable memories across the globe.
            </p>
            <div class="mt-4">
                <a href="{{ route('admin.destinations.index') }}" class="btn-purple-main me-2 shadow-sm">Explore Destinations</a>
                <a href="{{ route('register') }}" class="btn-purple-outline">Join Us Now</a>
            </div>
        </div>

        <!-- 2. Story Section -->
        <div class="card about-card p-4 p-md-5 mb-5">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <span class="text-purple-secondary fw-bold text-uppercase">Who We Are</span>
                    <h2 class="fw-bold text-purple-primary mt-2 mb-3">Your Gateway to the World</h2>
                    <p class="text-muted leading-relaxed mb-3">
                        Travelia was built on a simple promise: making travel planning effortless, interactive, and inspiring. Whether you're booking a quick weekend getaway or a full vacation, we bring you curated packages designed for every adventure seeker.
                    </p>
                    <p class="text-muted leading-relaxed mb-4">
                        Our platform empowers you to discover local secrets, manage your bookings easily, and enjoy 24/7 dedicated travel guidance.
                    </p>
                    <a href="{{ route('register') }}" class="fw-bold text-purple-primary text-decoration-underline fs-6">
                        Start your journey with us →
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?auto=format&fit=crop&w=800&q=80"
                         alt="Travel World"
                         class="img-fluid rounded-4 shadow-sm w-100"
                         style="max-height: 360px; object-fit: cover;">
                </div>
            </div>
        </div>

        <!-- 3. Key Benefits Section -->
        <div class="text-center mb-4">
            <h3 class="fw-bold text-purple-primary">Why Travelia Stands Out</h3>
            <p class="text-purple-secondary">Everything you need for a stress-free trip in one place.</p>
        </div>

        <div class="row g-4 justify-content-center text-center mb-5">
            <div class="col-md-4">
                <div class="card about-card p-4 h-100">
                    <div class="icon-square">✈️</div>
                    <h4 class="fw-bold text-purple-primary mb-3">Curated Destinations</h4>
                    <p class="text-muted mb-4">Handpicked locations with exclusive deals tailored to your personal preferences.</p>
                    <a href="{{ route('admin.destinations.index') }}" class="btn-purple-outline mt-auto btn-sm">View Destinations</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card about-card p-4 h-100">
                    <div class="icon-square">⚡</div>
                    <h4 class="fw-bold text-purple-primary mb-3">Instant Booking</h4>
                    <p class="text-muted mb-4">Quick, secure, and hassle-free reservation process with instant confirmation.</p>
                    <a href="{{ route('admin.bookings.index') }}" class="btn-purple-outline mt-auto btn-sm">My Bookings</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card about-card p-4 h-100">
                    <div class="icon-square">💬</div>
                    <h4 class="fw-bold text-purple-primary mb-3">24/7 Assistance</h4>
                    <p class="text-muted mb-4">Round-the-clock support team ready to assist you anywhere along your travel journey.</p>
                    <a href="{{ route('register') }}" class="btn-purple-outline mt-auto btn-sm">Create Account</a>
                </div>
            </div>
        </div>

        <!-- 4. Dynamic Interactive Call To Action (CTA) -->
        <div class="card about-card p-5 text-center text-white mb-5" style="background: linear-gradient(135deg, #5f3475 0%, #893172 100%);">
            <h2 class="fw-bold mb-3">Ready to Plan Your Next Adventure?</h2>
            <p class="fs-5 mb-4 opacity-90 mx-auto" style="max-width: 600px;">
                Create your free Travelia account today to unlock personalized travel recommendations and special member rates.
            </p>
            <div>
                <a href="{{ route('register') }}" class="btn btn-light btn-lg fw-bold px-4 py-2 me-2 shadow-sm" style="color: #5f3475; border-radius: 12px;">
                    Sign Up Free
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg fw-bold px-4 py-2" style="border-radius: 12px;">
                    Log In
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
