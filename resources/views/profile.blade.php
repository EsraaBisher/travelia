@extends('layouts.app')

@section('content')
<style>
    body { background-color: #f0e8f4 !important; }
    .text-purple-primary { color: #5f3475 !important; }
    .text-purple-secondary { color: #893172 !important; }

    .profile-card {
        background: #ffffff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 10px 30px rgba(95, 52, 117, 0.06);
    }

    .btn-purple-main {
        background-color: #5f3475;
        color: #ffffff;
        border-radius: 12px;
        padding: 10px 24px;
        font-weight: bold;
        border: none;
        transition: all 0.3s ease;
    }
    .btn-purple-main:hover {
        background-color: #893172;
        color: #ffffff;
    }

    .avatar-circle {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background-color: #f0e8f4;
        color: #5f3475;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 42px;
        font-weight: bold;
        margin: 0 auto;
        border: 3px solid #893172;
    }
</style>

<div class="py-5" dir="ltr">
    <div class="container">
        <div class="row g-4 justify-content-center">

            <!-- Left Column: User Avatar & Summary -->
            <div class="col-lg-4">
                <div class="card profile-card p-4 text-center">
                    <div class="avatar-circle mb-3">
                        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                    </div>
                    <h4 class="fw-bold text-purple-primary mb-1">{{ Auth::user()->name ?? 'User Name' }}</h4>
                    <p class="text-purple-secondary small mb-3">{{ Auth::user()->email ?? 'user@example.com' }}</p>
                    <span class="badge px-3 py-2 rounded-pill mx-auto mb-2" style="background-color: #f0e8f4; color: #5f3475;">
                        Traveler Member
                    </span>
                </div>
            </div>

            <!-- Right Column: Edit Profile Form -->
            <div class="col-lg-7">
                <div class="card profile-card p-4 p-md-5">
                    <h3 class="fw-bold text-purple-primary mb-4">Account Details</h3>

                    @if(session('success'))
                        <div class="alert alert-success rounded-3 mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold text-purple-primary">Full Name</label>
                            <input type="text" name="name" class="form-control rounded-3 py-2" value="{{ Auth::user()->name ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-purple-primary">Email Address</label>
                            <input type="email" name="email" class="form-control rounded-3 py-2" value="{{ Auth::user()->email ?? '' }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-purple-primary">New Password (optional)</label>
                            <input type="password" name="password" class="form-control rounded-3 py-2" placeholder="Leave blank to keep current password">
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-2">
                            <button type="submit" class="btn-purple-main shadow-sm">Save Changes</button>

                            <!-- Delete Account Button -->
                            <button type="button" class="btn btn-link text-danger text-decoration-none fw-bold btn-sm">
                                Delete Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
