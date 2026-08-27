@extends('layouts.app')

@section('title', 'E-Travel - Home')

@section('content')


<!-- HERO -->
<section class="container py-5">

    <!-- HERO TEXT -->
    <div class="row align-items-center mb-5">

        <!-- H1 -->
        <div class="col-lg-6">

            <h1 class="display-4 fw-bold mb-3">
                It's a Big World <br>
                Out There,
                <span class="text-orange">Go Explore</span>
            </h1>

        </div>

        <!-- P + BUTTON -->
        <div class="col-lg-6">

            <p class="text-muted mb-4">
                Convenient tracking software used by millions.
                A simple, fast solution for tracking your tasks
                and managing projects seamlessly.
            </p>


        </div>

    </div>


    <!-- IMAGE + SEARCH -->
    <div class="position-relative mb-5">

        <!-- IMAGE -->
        <div class="rounded-4 overflow-hidden shadow">

            <img
                src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e"
                class="img-fluid w-100"
                alt="Travel"
            >

        </div>


        <!-- SEARCH -->
        <div class="card border-0 shadow p-4 rounded-4 position-absolute start-50 translate-middle-x"
             style="bottom: -60px; width: 90%;">

            <form class="row g-3 align-items-end">

                <div class="col-md-3">
                    <label class="small text-muted mb-1">
                        From
                    </label>

                    <input
                        type="text"
                        class="form-control bg-light border-0"
                        placeholder="City or Airport"
                    >
                </div>


                <div class="col-md-3">
                    <label class="small text-muted mb-1">
                        To
                    </label>

                    <input
                        type="text"
                        class="form-control bg-light border-0"
                        placeholder="Destination"
                    >
                </div>


                <div class="col-md-2">
                    <label class="small text-muted mb-1">
                        Date
                    </label>

                    <input
                        type="date"
                        class="form-control bg-light border-0"
                    >
                </div>


                <div class="col-md-2">
                    <label class="small text-muted mb-1">
                        Guest
                    </label>

                    <input
                        type="number"
                        min="1"
                        class="form-control bg-light border-0"
                        placeholder="1 Guest"
                    >
                </div>


                <div class="col-md-2">

                    <button
                        type="submit"
                        class="btn btn-purple w-100"
                    >
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Search
                    </button>

                </div>

            </form>

        </div>

    </div>

</section>



<!--  ABOUT PREVIEW  -->
<section class="container py-5">

    <div class="row align-items-center">

        <div class="col-lg-6 mb-4 mb-lg-0">

            <img
                src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800"
                class="img-fluid rounded-4 shadow"
                alt="About Travel"
            >

        </div>


        <div class="col-lg-6 ps-lg-5">

            <span class="text-orange fw-bold text-uppercase small">
                About Us
            </span>

            <h2 class="fw-bold mb-3">
                The Best And Most Trusted Service
            </h2>

            <p class="text-muted mb-4">
                We are the largest holiday service provider in the world
                with partners and clients spread all over the world.
            </p>


            <div class="row text-center text-lg-start">

                <div class="col-4">
                    <h3 class="fw-bold text-orange">200+</h3>
                    <p class="text-muted small">Partners</p>
                </div>

                <div class="col-4">
                    <h3 class="fw-bold text-orange">500+</h3>
                    <p class="text-muted small">Places</p>
                </div>

                <div class="col-4">
                    <h3 class="fw-bold text-orange">1k+</h3>
                    <p class="text-muted small">Journey</p>
                </div>

            </div>

        </div>

    </div>

</section>

{{--  --}}

<!-- TOUR PACKAGES PREVIEW -->
<section id="packages" class="container py-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold">
            The Best Place For Vacation
        </h2>

        <div class="mt-3">

            <button
                type="button"
                class="btn btn-sm btn-purple text-white me-2 package-filter active"
                data-filter="special">
                Special Deals
            </button>

            <button
                type="button"
                class="btn btn-sm btn-light text-muted me-2 package-filter"
                data-filter="popular">
                Popular
            </button>

            <button
                type="button"
                class="btn btn-sm btn-light text-muted package-filter"
                data-filter="recommendations">
                Recommendations
            </button>

        </div>

    </div>


    <div class="row g-4" id="packages-container">

        @foreach([
            [
                'place' => 'Maldives',
                'price' => '620$',
                'rating' => '4.9',
                'category' => 'special',
                'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e'
            ],
            [
                'place' => 'Indonesia',
                'price' => '750$',
                'rating' => '4.8',
                'category' => 'special',
                'image' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4'
            ],
            [
                'place' => 'Spain',
                'price' => '550$',
                'rating' => '4.7',
                'category' => 'popular',
                'image' => 'https://images.unsplash.com/photo-1539037116277-4db20889f2d4'
            ],
            [
                'place' => 'Maldives',
                'price' => '620$',
                'rating' => '4.7',
                'category' => 'popular',
                'image' => 'https://images.unsplash.com/photo-1530122037265-a5f1f91d3b99'
            ],
            [
                'place' => 'Canada',
                'price' => '620$',
                'rating' => '4.7',
                'category' => 'recommendations',
                'image' => 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34'
            ],
            [
                'place' => 'Maldives',
                'price' => '820$',
                'rating' => '4.7',
                'category' => 'recommendations',
                'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c'
            ],
            [
                'place' => 'French',
                'price' => '550$',
                'rating' => '4.7',
                'category' => 'popular',
                'image' => 'https://images.unsplash.com/photo-1601581875309-fafbf2d3ed3a'
            ],
            [
                'place' => 'Australia',
                'price' => '310$',
                'rating' => '4.7',
                'category' => 'recommendations',
                'image' => 'https://images.unsplash.com/photo-1539367628448-4bc5c9d171c8'
            ]
        ] as $package)

        <div
            class="col-lg-3 col-md-4 col-sm-6 package-card"
            data-category="{{ $package['category'] }}"
        >

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                <img
                    src="{{ $package['image'] }}"
                    class="card-img-top"
                    height="200"
                    style="object-fit: cover;"
                    alt="{{ $package['place'] }}"
                >

                <div class="card-body">

                    <div class="d-flex justify-content-between text-muted small mb-2">

                        <span>
                            <i class="fa-solid fa-location-dot text-orange"></i>
                            {{ $package['place'] }}
                        </span>

                        <span>
                            <i class="fa-solid fa-star text-warning"></i>
                            {{ $package['rating'] }}
                        </span>

                    </div>

                    <h6 class="fw-bold mb-3">
                        Amazing {{ $package['place'] }} Tour
                    </h6>

                    <div class="d-flex justify-content-between align-items-center">

                        <span class="text-orange fw-bold">
                            {{ $package['price'] }}
                        </span>

                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-purple">
                            Book Now
                        </a>

                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>


    <!-- VIEW ALL BUTTON -->
    <div class="text-center mt-5">

        <a href="#packages" class="btn btn-purple px-4">
            View All
        </a>

    </div>

</section>


<!-- FILTER SCRIPT -->
<script>

document.addEventListener("DOMContentLoaded", function () {

    const filterButtons = document.querySelectorAll(".package-filter");
    const packages = document.querySelectorAll(".package-card");

    filterButtons.forEach(button => {

        button.addEventListener("click", function () {

            const filter = this.getAttribute("data-filter");

            filterButtons.forEach(btn => {
                btn.classList.remove("btn-purple", "text-white");
                btn.classList.add("btn-light", "text-muted");
            });

            this.classList.remove("btn-light", "text-muted");
            this.classList.add("btn-purple", "text-white");

            packages.forEach(packageCard => {

                if (packageCard.getAttribute("data-category") === filter) {
                    packageCard.style.display = "block";
                } else {
                    packageCard.style.display = "none";
                }

            });

        });

    });

});

</script>

{{--  --}}


<!--  WHY CHOOSE US  -->
<section class="container py-5">

    <div class="bg-white rounded-4 p-4 p-md-5 shadow-sm">

        <h3 class="fw-bold mb-4">
            Why Choose Us
        </h3>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="p-4 bg-light rounded-3 shadow-sm h-100">

                    <h5 class="fw-bold text-orange">
                        Best Travel Agency
                    </h5>

                    <p class="text-muted small mb-0">
                        We provide the best travel deals
                        and custom packages for you.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="p-4 bg-light rounded-3 shadow-sm h-100">

                    <h5 class="fw-bold text-orange">
                        Competitive Price
                    </h5>

                    <p class="text-muted small mb-0">
                        We give you the best affordable
                        pricing in the market.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="p-4 bg-light rounded-3 shadow-sm h-100">

                    <h5 class="fw-bold text-orange">
                        Global Coverage
                    </h5>

                    <p class="text-muted small mb-0">
                        Thousands of destinations
                        available worldwide.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

{{--  --}}




{{--  --}}


<!-- PARTNERS -->
<section class="container py-5">

    <div class="text-center py-4 bg-white rounded-4 shadow-sm">

        <p class="text-muted fw-bold mb-3">
            Trusted by global partners
        </p>

        <div class="d-flex justify-content-center gap-4 flex-wrap text-muted fw-bold">

            <span>Airbnb</span>
            <span>Amazon</span>
            <span>FedEx</span>
            <span>Google</span>
            <span>Microsoft</span>

        </div>

    </div>

</section>

@endsection