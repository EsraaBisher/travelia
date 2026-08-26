<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Travelia Admin - @yield('title', 'Dashboard')</title>

    <!-- Icons & Bootstrap local assets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <style>
        :root {
            --primary-color: #5f3475;
            --primary-hover: #893172;
            --bg-body: #f0e8f4;
        }

        body {
            background-color: var(--bg-body);
            color: #2b2b2b;
        }

        /* Admin Sidebar Styling */
        .admin-sidebar {
            min-height: 100vh;
            background-color: var(--primary-color);
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.05);
        }

        .admin-sidebar .nav-link {
            color: #e2d7e7;
            padding: 0.8rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 0.3rem;
            transition: all 0.25s ease-in-out;
            font-weight: 500;
        }

        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            color: #ffffff;
            background-color: var(--primary-hover);
        }

        .admin-sidebar .nav-link i {
            margin-right: 0.6rem;
        }

        /* Stat Cards & Components Styling */
        .stat-card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 4px 12px rgba(95, 52, 117, 0.08);
        }

        .icon-box {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            font-size: 1.25rem;
            background-color: #f0e8f4;
            color: var(--primary-color);
        }

        /* Custom Buttons & Badges */
        .btn-theme {
            background-color: var(--primary-color);
            color: #ffffff;
            border: none;
        }

        .btn-theme:hover {
            background-color: var(--primary-hover);
            color: #ffffff;
        }

        .text-theme {
            color: var(--primary-color) !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <aside class="col-md-3 col-lg-2 admin-sidebar p-3 text-white d-flex flex-column">
                <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none px-2 py-2">
                    <i class="bi bi-compass fs-3 me-2" style="color: #e2d7e7;"></i>
                    <span class="fs-4 fw-bold">Travelia <small class="fs-6 opacity-75">Admin</small></span>
                </a>
                
                <hr style="border-color: rgba(255, 255, 255, 0.2);">

                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                <li>
                <a href="{{ route('admin.destinations.index') }}" class="nav-link {{ request()->routeIs('admin.destinations.*') ? 'active' : '' }}">
                <i class="bi bi-geo-alt"></i> Destinations
                </a>
                </li>
              <li>
             <a href="{{ route('admin.bookings.index') }}" class="nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
             <i class="bi bi-calendar-check"></i> Bookings
            </a>
            </li>
            <li>
            <a href="{{ route('admin.users.index') }}" class="nav-link">
            <i class="bi bi-people"></i> Users
           </a>
            </li>
            </ul>

                <hr style="border-color: rgba(255, 255, 255, 0.2);">

                <div class="d-grid gap-2">
                    <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm rounded-3">
                        <i class="bi bi-box-arrow-left me-1"></i> Back to Main Site
                    </a>
                </div>
            </aside>

            <!-- Main Content Area -->
            <main class="col-md-9 col-lg-10 ms-sm-auto px-md-4 py-4">
                
                <!-- Admin Header Bar -->
                <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: #e2d7e7 !important;">
                    <h1 class="h3 fw-bold mb-0 text-theme">@yield('page_title', 'Dashboard')</h1>
                    
                    <div class="dropdown">
                        <button class="btn btn-white border shadow-sm dropdown-toggle rounded-pill px-3" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle text-theme me-1"></i> {{ Auth::user()->name ?? 'Admin' }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                   <i class="bi bi-sign-out me-1"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Dynamic Page Content -->
                @yield('content')

            </main>
        </div>
    </div>

    <!-- Bootstrap Bundle JS (Local Asset) -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>