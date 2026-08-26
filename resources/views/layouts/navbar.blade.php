<nav class="navbar navbar-expand-lg shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-orange fs-4" href="{{ route('admin.dashboard') }}">
      <i class="fa-solid fa-paper-plane me-2"></i>E-Travel Admin
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="adminNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
        <li class="nav-item">
          <a class="nav-link fw-semibold text-dark" href="{{ route('admin.dashboard') }}">
            <i class="fa-solid fa-chart-line me-1 text-purple"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold text-dark" href="{{ route('admin.destinations.index') }}">
            <i class="fa-solid fa-location-dot me-1 text-purple"></i> Destinations
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold text-dark" href="{{ route('admin.bookings.index') }}">
            <i class="fa-solid fa-ticket me-1 text-purple"></i> Bookings
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold text-dark" href="{{ route('admin.users.index') }}">
            <i class="fa-solid fa-users me-1 text-purple"></i> Users
          </a>
        </li>
      </ul>

      <div class="d-flex align-items-center gap-3">
        @auth
          <span class="fw-semibold text-purple">
            <i class="fa-solid fa-circle-user me-1"></i> {{ Auth::user()->name }}
          </span>
          <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-purple btn-sm">
              <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
            </button>
          </form>
        @endauth
      </div>
    </div>
  </div>
</nav>