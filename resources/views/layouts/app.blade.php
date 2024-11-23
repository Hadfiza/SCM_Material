<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'SCM Material')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Helvetica', sans-serif;
    }

    .sidebar {
      background-color: #654321;
      height: 100vh;
    }

    .header {
      background-color: white;
      padding: 10px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 1020;
    }

    .content-header {
      margin-bottom: 15px;
    }

    .card {
      border: none;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-bottom: 15px;
    }

    .profile-picture {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }

    .nav-link,
    a,
    hr,
    .nav-link:hover,
    .nav-link::after,
    .nav-link:active {
      color: #FFFFFF;
    }

    .nav-item:hover {
      background-color: #8B4513;
    }
  </style>
</head>

<body>
  <div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light header shadow">
      <div class="container-fluid">
        <!-- Button Toggler -->
        <button class="navbar-toggler ms-3 border-1 border-white d-block d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
          <span><i class="bi bi-list text-dark fs-3"></i></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand ps-2 fs-3 fw-bold text-dark" href="#">MaterialFlow</a>
        <div class="mb-2 mb-md-0 me-4 d-flex align-items-center">
          <a href="#" class="text-dark text-decoration-none d-flex align-items-center">
            @if(auth()->user()->photo)
            <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Profile Picture" class="profile-picture me-2">
            @else
            <i class="bi bi-person-circle fs-4 me-2"></i>
            @endif
            <small class="pt-1">{{ auth()->user()->name }}</small>
          </a>
        </div>
      </div>
    </nav>

    <!-- Sidebar -->
    <div class="col-md-3 col-lg-3 col-xl-2 sidebar position-fixed">
      <div class="d-flex flex-column pt-lg-3 min-vh-100">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
              <i class="bi bi-house-fill"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="bi bi-file-earmark"></i> Pengiriman
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="bi bi-box-seam"></i> Material
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="bi bi-people"></i> Suplier
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="bi bi-graph-up"></i> Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="bi bi-puzzle"></i> Integrations
            </a>
          </li>
        </ul>
        <hr>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="bi bi-gear"></i> Settings
            </a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-link nav-link">
                  <i class="bi bi-door-closed"></i> Sign out
              </button>
          </form>
          </li>
        </ul>
      </div>
    </div>

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-9 col-xl-10 bg-body-tertiary min-vh-100">
      <div class="container-fluid">
        <!-- Header Content -->
        <div class="content-header">
          <div class="card shadow bg-white">
            <h5 class="fw-bold text-dark p-3">@yield('navbar', 'Dashboard')</h5>
          </div>
        </div>
        <!-- Bar Content -->
        <div class="card d-flex ps-3 py-2 flex-wrap flex-md-nowrap shadow bg-white">
          <h5 class="fw-semibold text-dark my-2 d-block">@yield('navbar-item', 'Bar')</h5>
        </div>
        <!-- Main Content -->
        <div>
          @yield('content')
        </div>
      </div>
    </main>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
