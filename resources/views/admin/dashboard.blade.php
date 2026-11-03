<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Volt Overview - CV Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS Bawaan Volt Template -->
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <!-- SIDEBAR NAVIGASI VOLT -->
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item mb-3">
                    <a href="/dashboard" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon"><i class="fas fa-bolt text-warning me-2"></i></span>
                        <span class="sidebar-text fw-bold">Volt Overview</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}">
                    <a href="/dashboard" class="nav-link">
                        <span class="sidebar-icon"><i class="fas fa-chart-pie me-2"></i></span>
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('cv*') ? 'active' : '' }}">
                    <a href="{{ route('cv.index') }}" class="nav-link">
                        <span class="sidebar-icon"><i class="fas fa-file-alt me-2"></i></span>
                        <span class="sidebar-text">CV</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- AREA KONTEN UTAMA -->
    <main class="content">
        <!-- NAVBAR TOPBAR -->
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0 mb-4">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <form class="navbar-search form-inline" id="navbar-search-main">
                            <div class="input-group input-group-merge search-bar">
                                <span class="input-group-text" id="topbar-addon"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- KONTEN DINAMIS (KONTEN CV & FORM BARU AKAN MUNCUL DI SINI) -->
        <div class="pb-4">
            @yield('content')
        </div>

    </main>

    <!-- JS Bawaan Volt -->
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>
</body>

</html>
