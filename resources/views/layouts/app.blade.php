<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Smart Trip Planner Aceh')</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary:     #1a7a4a;
            --primary-dark:#145e38;
            --primary-light:#e8f5ee;
            --accent:      #f0a500;
            --dark:        #1a1f2e;
            --dark-nav:    #111827;
        }

        * { font-family: 'Plus Jakarta Sans', sans-serif; }

        body {
            background-color: #f8faf9;
            color: #1a1f2e;
        }

        /* ── NAVBAR ── */
        .navbar {
            background-color: var(--dark-nav) !important;
            padding: 14px 0;
            box-shadow: 0 2px 12px rgba(0,0,0,0.25);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.2rem;
            color: #ffffff !important;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-brand .brand-icon {
            background: var(--primary);
            color: #fff;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .navbar-brand span.brand-aceh {
            color: var(--accent);
        }

        .navbar .nav-link {
            color: #cbd5e1 !important;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 6px 14px !important;
            border-radius: 6px;
            transition: all 0.2s;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #ffffff !important;
            background: rgba(255,255,255,0.08);
        }

        .navbar .nav-link.active {
            color: #4ade80 !important;
        }

        .btn-navbar-login {
            background: transparent;
            border: 1.5px solid #4ade80;
            color: #4ade80 !important;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 6px 18px !important;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .btn-navbar-login:hover {
            background: #4ade80;
            color: var(--dark-nav) !important;
        }

        .btn-navbar-register {
            background: var(--primary);
            border: 1.5px solid var(--primary);
            color: #ffffff !important;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 6px 18px !important;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .btn-navbar-register:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        /* ── MAIN CONTENT ── */
        main {
            min-height: calc(100vh - 140px);
        }

        /* ── FOOTER ── */
        footer {
            background-color: var(--dark-nav);
            color: #94a3b8;
            padding: 28px 0;
            font-size: 0.875rem;
        }

        footer a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.2s;
        }

        footer a:hover { color: #4ade80; }

        footer .footer-brand {
            font-weight: 700;
            color: #ffffff;
            font-size: 1rem;
        }

        /* ── BTN PRIMARY ── */
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
            font-weight: 600;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        /* ── BADGE CATEGORY ── */
        .badge-category {
            background-color: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
            font-size: 0.75rem;
            padding: 4px 10px;
            border-radius: 20px;
        }

        /* ── CARD DESTINASI ── */
        .card-destinasi {
            border: none;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card-destinasi:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        }

        .card-destinasi img {
            height: 200px;
            object-fit: cover;
        }

        /* ── ALERT ── */
        .alert-success { border-left: 4px solid var(--primary); }
    </style>

    @stack('styles')
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        {{-- Brand / Logo --}}
        <a class="navbar-brand" href="{{ url('/') }}">
            <div class="brand-icon">
                <i class="bi bi-map-fill"></i>
            </div>
            Smart Trip <span class="brand-aceh ms-1">Aceh</span>
        </a>

        {{-- Hamburger (mobile) --}}
        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <i class="bi bi-list text-white fs-4"></i>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto ms-4 gap-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                       href="{{ url('/') }}">
                        <i class="bi bi-house me-1"></i>Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('destinations*') ? 'active' : '' }}"
                       href="{{ url('/destinations') }}">
                        <i class="bi bi-geo-alt me-1"></i>Destinasi
                    </a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('itinerary*') ? 'active' : '' }}"
                       href="{{ url('/itinerary') }}">
                        <i class="bi bi-journal-bookmark me-1"></i>Itinerary
                    </a>
                </li>
                @endauth
            </ul>

            {{-- Auth Buttons --}}
            <div class="d-flex align-items-center gap-2">
                @guest
                    <a href="{{ url('/login') }}" class="nav-link btn-navbar-login">
                        Masuk
                    </a>
                    <a href="{{ url('/register') }}" class="nav-link btn-navbar-register">
                        Daftar
                    </a>
                @endguest

                @auth
                    <span class="text-secondary me-2" style="font-size:0.85rem">
                        <i class="bi bi-person-circle me-1 text-white"></i>
                        <span class="text-white">{{ Auth::user()->name }}</span>
                    </span>
                    <form action="{{ url('/logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn-navbar-login nav-link">
                            <i class="bi bi-box-arrow-right me-1"></i>Keluar
                        </button>
                    </form>
                @endauth
            </div>
        </div>

    </div>
</nav>

{{-- FLASH MESSAGE --}}
@if(session('success'))
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="container mt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    </div>
@endif

{{-- MAIN CONTENT --}}
<main>
    @yield('content')
</main>

{{-- FOOTER --}}
<footer class="mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-2 mb-md-0">
                <span class="footer-brand">
                    <i class="bi bi-map-fill text-success me-1"></i>
                    Smart Trip Aceh
                </span>
                <span class="ms-2">— Rencanakan perjalananmu ke Aceh</span>
            </div>
            <div class="col-md-6 text-md-end">
                <span>Kelompok 5 &copy; {{ date('Y') }} | Teknologi Informasi UIN Ar-Raniry</span>
            </div>
        </div>
    </div>
</footer>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>
