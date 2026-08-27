<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm">

    <div class="container">

        <!-- Logo -->
        <a
            class="navbar-brand fw-bold text-orange"
            href="{{ route('home') }}"
        >
            <i class="fa-solid fa-paper-plane me-1"></i>
            E-Travel
        </a>


        <!-- Mobile Toggle -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>


        <!-- Navbar Content -->
        <div
            class="collapse navbar-collapse"
            id="navbarSupportedContent"
        >

            <!-- Navigation -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 align-items-lg-center">

                <!-- Home -->
                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}"
                    >
                        Home
                    </a>

                </li>

<<<<<<< HEAD
                <!-- Destinations -->
=======
>>>>>>> 022cc3e516cd4b399a5ceab5590ea43c7f7c9173
                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('admin.destinations.*') ? 'active' : '' }}"
                        href="{{ route('admin.destinations.index') }}"
                    >
                        Destinations
                    </a>

                </li>

<<<<<<< HEAD
                <!-- Tour Package -->
                <li class="nav-item">
=======
                <li class="nav-item">
                    <!-- Fixed routeIs to 'tours.*' so the highlight works -->
>>>>>>> 022cc3e516cd4b399a5ceab5590ea43c7f7c9173
                    <a class="nav-link {{ request()->routeIs('tours.*') ? 'active' : '' }}" href="{{ route('tours.index') }}">
                        Tour Package
                    </a>
                </li>
<<<<<<< HEAD
                
                <!-- NEW: Bookings -->
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}"
                        href="{{ route('admin.bookings.index') }}"
                    >
                        Bookings
                    </a>
                </li>
=======

>>>>>>> 022cc3e516cd4b399a5ceab5590ea43c7f7c9173

                <!-- About Us -->
                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                        href="{{ route('about') }}"
                    >
                        About Us
                    </a>

                </li>

            </ul>


            <!-- Right Side -->
            <div class="d-flex align-items-center gap-2">

                @guest

                    <!-- Login -->
                    <a
                        href="{{ route('login') }}"
                        class="btn btn-outline-purple btn-sm px-3"
                    >
                        Login
                    </a>


                    <!-- Register -->
                    <a
                        href="{{ route('register') }}"
                        class="btn btn-purple btn-sm px-3"
                    >
                        Register
                    </a>

                @endguest


                @auth

                    <!-- User Dropdown -->
                    <div class="dropdown">

                        <button
                            class="btn btn-purple btn-sm dropdown-toggle px-3"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >

                            <i class="fa-solid fa-user me-1"></i>

                            {{ Auth::user()->name }}

                        </button>


                        <ul class="dropdown-menu dropdown-menu-end">

                            <!-- Profile -->
                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('profile') }}"
                                >

                                    <i class="fa-solid fa-user me-2 text-purple"></i>

                                    My Profile

                                </a>

                            </li>


                            <li>
                                <hr class="dropdown-divider">
                            </li>


                            <!-- Logout -->
                            <li>

                                <a
                                    class="dropdown-item"
                                    href="{{ route('logout') }}"
                                    onclick="
                                        event.preventDefault();
                                        document.getElementById('logout-form').submit();
                                    "
                                >

                                    <i class="fa-solid fa-right-from-bracket me-2 text-purple"></i>

                                    Logout

                                </a>


                                <form
                                    id="logout-form"
                                    action="{{ route('logout') }}"
                                    method="POST"
                                    class="d-none"
                                >

                                    @csrf

                                </form>

                            </li>

                        </ul>

                    </div>

                @endauth


                <!-- Phone -->
                <div class="d-none d-xl-block ms-2">

                    <a
                        href="tel:+123456789"
                        class="text-decoration-none text-dark fw-bold"
                    >

                        <i class="fa-solid fa-phone text-orange me-1"></i>

                        +123 456 789

                    </a>

                </div>

            </div>

        </div>

    </div>

</nav>


<style>

    .navbar-nav .nav-link {
        font-weight: 500;
        margin: 0 5px;
        color: #333;
        transition: 0.3s;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: #5f3475 !important;
    }


    .btn-purple {
        background-color: #5f3475;
        color: #fff;
        border: 1px solid #5f3475;
        border-radius: 8px;
        transition: 0.3s;
    }

    .btn-purple:hover {
        background-color: #893172;
        border-color: #893172;
        color: #fff;
    }


    .btn-outline-purple {
        background-color: transparent;
        color: #5f3475;
        border: 1px solid #5f3475;
        border-radius: 8px;
        transition: 0.3s;
    }

    .btn-outline-purple:hover {
        background-color: #5f3475;
        border-color: #5f3475;
        color: #fff;
    }


    .dropdown-item {
        padding: 9px 15px;
    }

    .dropdown-item:hover {
        background-color: #f0e8f4;
        color: #5f3475 !important;
    }


    @media (max-width: 991.98px) {

        .navbar-nav {
            padding-top: 15px;
        }

        .navbar-nav .nav-link {
            margin: 3px 0;
        }

        .d-flex.align-items-center.gap-2 {
            margin-top: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

    }

<<<<<<< HEAD
</style>
=======
</style>
>>>>>>> 022cc3e516cd4b399a5ceab5590ea43c7f7c9173
