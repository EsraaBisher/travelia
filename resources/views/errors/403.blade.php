@extends('layouts.app')

@section('title', 'Access Restricted - E-Travel')

@section('content')
<section class="access-page">
    <div class="access-glow access-glow-one"></div>
    <div class="access-glow access-glow-two"></div>

    <div class="container position-relative">
        <div class="access-content text-center mx-auto">
            <div class="access-icon mx-auto mb-4">
                <i class="fa-solid fa-lock"></i>
            </div>

            <p class="access-code mb-2">403</p>
            <h1 class="fw-bold mb-3">This area is for our travel team</h1>
            <p class="text-muted mb-4">
                You do not have permission to access this page. Let us take you back to your journey.
            </p>

            <div class="d-flex justify-content-center flex-wrap gap-2">
                <a href="{{ route('home') }}" class="btn btn-purple px-4">
                    <i class="fa-solid fa-house me-2"></i> Back to Home
                </a>

                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-purple px-4">
                            <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .access-page {
        min-height: 62vh;
        display: flex;
        align-items: center;
        overflow: hidden;
        position: relative;
        background: linear-gradient(135deg, #f0e8f4 0%, #ffffff 52%, #f8edf4 100%);
    }

    .access-content {
        max-width: 620px;
        position: relative;
        z-index: 1;
        padding: 72px 20px;
    }

    .access-icon {
        width: 76px;
        height: 76px;
        display: grid;
        place-items: center;
        border-radius: 50%;
        color: #ffffff;
        font-size: 28px;
        background: #5f3475;
        box-shadow: 0 14px 28px rgba(95, 52, 117, 0.24);
    }

    .access-code {
        color: #893172;
        font-size: 74px;
        line-height: 1;
        font-weight: 700;
        letter-spacing: 0;
    }

    .access-content h1 {
        color: #3e2450;
        font-size: clamp(1.6rem, 3vw, 2.4rem);
    }

    .access-glow {
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        filter: blur(2px);
        opacity: 0.35;
    }

    .access-glow-one {
        top: -90px;
        left: 8%;
        background: #decce7;
    }

    .access-glow-two {
        right: 8%;
        bottom: -100px;
        background: #f0cbdc;
    }

    @media (max-width: 576px) {
        .access-content {
            padding: 54px 20px;
        }

        .access-code {
            font-size: 62px;
        }
    }
</style>
@endpush
