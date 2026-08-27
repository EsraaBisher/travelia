<footer class="footer-section">
    <div class="container">
        <div class="row">

            <!-- Logo & Description -->
            <div class="col-lg-3 mb-4">
                <h5 class="fw-bold text-orange mb-3">
                    <i class="fa-solid fa-paper-plane"></i>
                    E-Travel
                </h5>
                <p class="text-muted small">
                    We love to travel the world in a journey.
                    Best hospitality you can ever find.
                </p>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="text-dark"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="text-dark"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="text-dark"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>

            {{-- <!-- About Us -->
            <div class="col-6 col-lg-2 mb-4 footer-links">
                <h6 class="fw-bold mb-3">About Us</h6>
                <a href="{{ route('about') }}">About Us</a>
                <a href="#">Contact Us</a>
                <a href="#">FAQs</a>
            </div> --}}

            <!-- Travelia -->
            <div class="col-6 col-lg-2 mb-4 footer-links">
                <h6 class="fw-bold mb-3">Travelia</h6>
                <a href="{{ route('tours.index') }}">Tours</a>
                <a   href="{{ route('admin.destinations.index') }}">Destinations</a>
                <a href="{{ route('admin.bookings.index') }}">My Bookings</a>
            </div>

            <!-- Support -->
            <div class="col-6 col-lg-2 mb-4 footer-links">
                <h6 class="fw-bold mb-3">Support</h6>
                <a href="#">Account</a>
                <a href="#">Support Center</a>
                <a href="#">Feedback</a>
            </div>

            <!-- Subscribe (تم الدمج هنا) -->
            <div class="col-lg-3 mb-4">
                <h6 class="fw-bold mb-3">Get In Touch</h6>

                @if(session('subscribe_success'))
                    <div class="alert alert-success border-0 shadow-sm py-2 px-3 mb-3 small">
                        <i class="fa-solid fa-circle-check me-1"></i> {{ session('subscribe_success') }}
                    </div>
                @endif

                @error('email')
                    <div class="alert alert-danger border-0 shadow-sm py-2 px-3 mb-3 small">
                        {{ $message }}
                    </div>
                @enderror

                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <input type="email" name="email" class="form-control form-control-sm" placeholder="Enter your email" required value="{{ old('email') }}">
                    </div>
                    <button type="submit" class="btn btn-purple btn-sm w-100">
                        Subscribe
                    </button>
                </form>
            </div>

        </div>

        <hr class="text-muted mt-4">

        <!-- Copyright -->
        <div class="row text-muted small">
            <div class="col-md-6">
                All rights reserved © 2026 E-Travel
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-muted text-decoration-none me-3">Terms & Conditions</a>
                <a href="#" class="text-muted text-decoration-none">Privacy Policy</a>
            </div>
        </div>

    </div>
</footer>

<style>
    .footer-section {
        background-color: #ffffff;
        padding: 60px 0 20px 0;
    }

    .footer-links a {
        color: #666;
        text-decoration: none;
        display: block;
        margin-bottom: 10px;
        transition: 0.3s;
    }

    .footer-links a:hover {
        color: #5f3475 !important;
    }

    .footer-section .fa-brands {
        transition: 0.3s;
    }

    .footer-section .fa-brands:hover {
        color: #893172 !important;
    }
</style>