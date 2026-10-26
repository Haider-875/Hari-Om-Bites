<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }} · Hari Om Cuisine of India</title>

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-paper-dark font-sans text-ink" style="background-color: #f4efe8;">
    <div class="d-flex min-vh-100">
        <!-- Sidebar -->
        <aside class="bg-ink text-paper d-flex flex-column justify-content-between flex-shrink-0 shadow-lg" style="width: 16rem;">
            <div>
                <!-- Brand -->
                <div class="p-4 border-bottom border-white-10 d-flex align-items-center gap-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="object-contain" style="height: 2rem; width: auto;" />
                    <div>
                        <span class="d-block text-uppercase tracking-widest-custom text-saffron fw-semibold" style="font-size: 11px;">Hari Om</span>
                        <span class="d-block tracking-wider-custom text-white-50" style="font-size: 10px;">Admin Console</span>
                    </div>
                </div>

                <!-- Nav links -->
                <nav class="p-3 d-flex flex-column gap-1">
                    <a href="{{ route('admin.dashboard') }}"
                       class="d-flex align-items-center gap-3 px-3 py-2 rounded-sm text-uppercase tracking-wider-custom transition-colors text-decoration-none {{ request()->routeIs('admin.dashboard') ? 'bg-terracotta text-paper' : 'text-white-70' }}"
                       style="font-size: 11px;">
                        <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.menu.index') }}"
                       class="d-flex align-items-center gap-3 px-3 py-2 rounded-sm text-uppercase tracking-wider-custom transition-colors text-decoration-none {{ request()->routeIs('admin.menu.*') ? 'bg-terracotta text-paper' : 'text-white-70' }}"
                       style="font-size: 11px;">
                        <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Menu Items (61)
                    </a>
                    <a href="{{ route('admin.reservations.index') }}"
                       class="d-flex align-items-center gap-3 px-3 py-2 rounded-sm text-uppercase tracking-wider-custom transition-colors text-decoration-none {{ request()->routeIs('admin.reservations.*') ? 'bg-terracotta text-paper' : 'text-white-70' }}"
                       style="font-size: 11px;">
                        <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Table Bookings
                    </a>
                    <a href="{{ route('admin.settings.index') }}"
                       class="d-flex align-items-center gap-3 px-3 py-2 rounded-sm text-uppercase tracking-wider-custom transition-colors text-decoration-none {{ request()->routeIs('admin.settings.*') ? 'bg-terracotta text-paper' : 'text-white-70' }}"
                       style="font-size: 11px;">
                        <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Settings
                    </a>
                </nav>
            </div>

            <!-- User Footer & Logout -->
            <div class="p-3 border-top border-white-10 d-flex flex-column gap-2">
                <a href="{{ route('home') }}" target="_blank" class="d-flex align-items-center gap-2 text-decoration-none text-white-60 hover-text-saffron tracking-wider-custom" style="font-size: 11px;">
                    <svg style="width: 0.9rem; height: 0.9rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    View Public Website
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="w-100 text-start border-0 bg-transparent p-0 d-flex align-items-center gap-2 tracking-wider-custom cursor-pointer" style="font-size: 11px; color: #f87171;">
                        <svg style="width: 0.9rem; height: 0.9rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Sign Out
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Panel -->
        <div class="flex-grow-1 d-flex flex-column min-w-0">
            <!-- Topbar -->
            <header class="bg-paper border-bottom border-ink-10 px-4 py-3 d-flex align-items-center justify-content-between">
                <h1 class="small fw-semibold tracking-wider-custom text-ink text-uppercase m-0">{{ $title ?? 'Dashboard' }}</h1>
                <div class="small text-ink-60">
                    Logged in as <span class="text-terracotta fw-medium">{{ Auth::user()->name }}</span>
                </div>
            </header>

            <main class="p-4 flex-grow-1 overflow-auto">
                @if(session('success'))
                    <div class="alert alert-success rounded-sm p-3 mb-4 small border-0" style="background-color: #ecfdf5; color: #065f46;">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
