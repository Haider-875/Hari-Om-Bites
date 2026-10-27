<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>{{ $title ?? 'Admin Panel' }} · Hari Om Cuisine of India</title>

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-wrapper" x-data="{ sidebarOpen: false, changePasswordOpen: false }" @keydown.escape.window="sidebarOpen = false; changePasswordOpen = false">
    <!-- Mobile Backdrop -->
    <div class="admin-backdrop" 
         :class="{ 'backdrop-open': sidebarOpen }" 
         @click="sidebarOpen = false" 
         x-cloak></div>

    <!-- Sidebar Navigation Drawer -->
    <aside class="admin-sidebar" :class="{ 'sidebar-open': sidebarOpen }">
        <div>
            <!-- Brand & Mobile Close Button -->
            <div class="p-3 p-lg-4 border-bottom border-white-10 d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-3 text-decoration-none">
                    <img src="{{ asset('images/logo.png') }}" alt="Hari Om Logo" class="object-contain" style="height: 2.25rem; width: auto;" />
                    <div>
                        <span class="d-block text-uppercase tracking-widest-custom text-saffron fw-bold" style="font-size: 11px; letter-spacing: 0.16em;">Hari Om</span>
                        <span class="d-block tracking-wider-custom text-white-50" style="font-size: 9.5px; letter-spacing: 0.08em;">Management Console</span>
                    </div>
                </a>
                <button type="button" 
                        class="d-lg-none btn text-white-70 p-1 border-0 bg-transparent cursor-pointer" 
                        @click="sidebarOpen = false"
                        aria-label="Close Navigation">
                    <svg style="width: 1.35rem; height: 1.35rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Nav Links -->
            <nav class="p-3 d-flex flex-column gap-1.5">
                <a href="{{ route('admin.dashboard') }}"
                   class="admin-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                   @click="if (window.innerWidth < 992) sidebarOpen = false">
                    <svg style="width: 1.15rem; height: 1.15rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.menu.index') }}"
                   class="admin-nav-item {{ request()->routeIs('admin.menu.*') ? 'active' : '' }}"
                   @click="if (window.innerWidth < 992) sidebarOpen = false">
                    <svg style="width: 1.15rem; height: 1.15rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="flex-grow-1">Menu Items</span>
                </a>

                <a href="{{ route('admin.categories.index') }}"
                   class="admin-nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"
                   @click="if (window.innerWidth < 992) sidebarOpen = false">
                    <svg style="width: 1.15rem; height: 1.15rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span>Categories</span>
                </a>

                <a href="{{ route('admin.reservations.index') }}"
                   class="admin-nav-item {{ request()->routeIs('admin.reservations.*') ? 'active' : '' }}"
                   @click="if (window.innerWidth < 992) sidebarOpen = false">
                    <svg style="width: 1.15rem; height: 1.15rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Table Bookings</span>
                </a>

                <a href="{{ route('admin.users.index') }}"
                   class="admin-nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
                   @click="if (window.innerWidth < 992) sidebarOpen = false">
                    <svg style="width: 1.15rem; height: 1.15rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span>Staff & Roles</span>
                </a>

                <a href="{{ route('admin.settings.index') }}"
                   class="admin-nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"
                   @click="if (window.innerWidth < 992) sidebarOpen = false">
                    <svg style="width: 1.15rem; height: 1.15rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Settings</span>
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer -->
        <div class="p-3 border-top border-white-10 d-flex flex-column gap-2 bg-black bg-opacity-25">
            <a href="{{ route('home') }}" target="_blank" class="d-flex align-items-center gap-2 text-decoration-none text-white-70 hover-text-saffron py-1 px-2 rounded tracking-wider-custom transition-colors" style="font-size: 11px;">
                <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
                <span>Live Public Site</span>
            </a>

            <button type="button" 
                    @click="changePasswordOpen = true; if (window.innerWidth < 992) sidebarOpen = false" 
                    class="w-100 text-start border-0 bg-transparent py-1.5 px-2 rounded d-flex align-items-center gap-2 text-white-70 hover-text-saffron tracking-wider-custom cursor-pointer transition-colors" 
                    style="font-size: 11px;">
                <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
                <span>Change Password</span>
            </button>

            <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="w-100 text-start border-0 bg-transparent py-1.5 px-2 rounded d-flex align-items-center gap-2 tracking-wider-custom cursor-pointer transition-colors" style="font-size: 11px; color: #f87171;">
                    <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Sign Out</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content View -->
    <div class="admin-main">
        <!-- Topbar -->
        <header class="admin-topbar">
            <!-- Left: Mobile Menu Toggle & Title -->
            <div class="d-flex align-items-center gap-3">
                <button type="button" 
                        class="d-lg-none btn p-1.5 rounded border border-ink-10 bg-white text-ink d-flex align-items-center justify-content-center cursor-pointer shadow-sm"
                        @click="sidebarOpen = true"
                        aria-label="Open Navigation">
                    <svg style="width: 1.35rem; height: 1.35rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div>
                    <h1 class="h6 fw-bold tracking-wider-custom text-ink text-uppercase m-0 d-flex align-items-center gap-2" style="font-size: 13.5px;">
                        <span>{{ $title ?? 'Dashboard' }}</span>
                    </h1>
                    <span class="d-none d-sm-block text-ink-50 m-0" style="font-size: 11px;">Hari Om Indian Cuisine · Management Portal</span>
                </div>
            </div>

            <!-- Right: Kitchen Status & User Profile -->
            <div class="d-flex align-items-center gap-2.5">
                <!-- Kitchen Live Badge (Balanced padding & glow dot) -->
                <div class="d-none d-md-flex align-items-center gap-2 px-3 py-1.5 rounded-full bg-white border border-ink-10 shadow-sm" style="font-size: 11.5px; letter-spacing: 0.03em;">
                    <span class="pulse-live-indicator"></span>
                    <span class="fw-semibold text-ink">Kitchen Live</span>
                </div>

                <!-- Admin User Profile (Circle H removed as requested, clean role display) -->
                <div class="d-flex align-items-center gap-2 ms-2 ms-sm-3 ps-2 ps-sm-3 border-start border-ink-10">
                    <div class="d-flex flex-column text-end" style="line-height: 1.25;">
                        <span class="fw-bold text-ink" style="font-size: 12.5px;">{{ Auth::user()->name ?? 'Hari Om Admin' }}</span>
                        <span class="text-terracotta fw-semibold text-uppercase tracking-wider-custom" style="font-size: 9.5px;">{{ Auth::user()->role ?? 'Store Manager' }}</span>
                    </div>
                    <button type="button" 
                            @click="changePasswordOpen = true" 
                            class="btn-admin-action btn-admin-edit d-none d-sm-inline-flex" 
                            title="Change Login Password">
                        <svg style="width: 0.72rem; height: 0.72rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                        <span>Password</span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Dynamic Main Content Area -->
        <main class="admin-content-area pb-5 mb-4">
            @if(session('success'))
                <div class="admin-card mb-4 border-0 p-3 d-flex align-items-center gap-3 shadow-sm" style="background-color: #ecfdf5; border-left: 4px solid #059669 !important; animation: adminFadeIn 0.3s ease;">
                    <svg style="width: 1.25rem; height: 1.25rem; color: #059669;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="small fw-semibold text-ink">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="admin-card mb-4 border-0 p-3 d-flex align-items-center gap-3 shadow-sm" style="background-color: #fef2f2; border-left: 4px solid #dc2626 !important; animation: adminFadeIn 0.3s ease;">
                    <svg style="width: 1.25rem; height: 1.25rem; color: #dc2626;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="small fw-semibold text-danger">{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Change Password Modal / Drawer -->
    <div x-show="changePasswordOpen" 
         x-cloak
         class="position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center p-3"
         style="z-index: 1060; background-color: rgba(23, 23, 23, 0.65); backdrop-filter: blur(6px);">
        <div class="admin-modal-box w-100" 
             style="max-width: 480px; animation: adminFadeIn 0.25s ease;"
             @click.away="changePasswordOpen = false"
             x-data="{ showCurrent: false, showNew: false, showConfirm: false }">
            
            <!-- Top Gradient Accent -->
            <div style="height: 4px; background: linear-gradient(90deg, #d97706 0%, #f59e0b 50%, #b45309 100%);"></div>

            <!-- Modal Header -->
            <div class="p-3.5 px-4 border-bottom border-ink-10 d-flex align-items-center justify-content-between" style="background: linear-gradient(180deg, #fdfbf7 0%, #ffffff 100%);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center shadow-2xs flex-shrink-0" 
                         style="width: 42px; height: 42px; background: linear-gradient(135deg, rgba(217, 119, 6, 0.16), rgba(180, 83, 9, 0.08)); border: 1.5px solid rgba(217, 119, 6, 0.25); color: #b45309;">
                        <svg style="width: 1.25rem; height: 1.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-display fw-bold text-ink m-0" style="font-size: 1.2rem; line-height: 1.2;">Change Password</h2>
                        <span class="text-ink-50 d-block mt-0.5" style="font-size: 11.5px;">Update credentials for {{ Auth::user()->name ?? 'Account' }}</span>
                    </div>
                </div>
                <button type="button" 
                        class="rounded-circle border border-ink-10 bg-white text-ink-50 hover-text-ink d-flex align-items-center justify-content-center cursor-pointer transition-all shadow-2xs"
                        style="width: 32px; height: 32px;"
                        @click="changePasswordOpen = false"
                        aria-label="Close modal">
                    <svg style="width: 0.95rem; height: 0.95rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Security Advisory Banner with bottom margin -->
            <div class="mx-4 mt-3.5 mb-2.5 p-2.5 px-3 rounded-3 d-flex align-items-center gap-2.5" style="background-color: #faf5ea; border: 1px solid rgba(217, 119, 6, 0.25);">
                <svg style="width: 1.05rem; height: 1.05rem; color: #b45309;" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <span class="text-ink-70" style="font-size: 11.5px; line-height: 1.35;">
                    Choose a strong password with at least 6 characters to keep your restaurant console safe.
                </span>
            </div>

            <!-- Modal Form with enhanced bottom and item spacing -->
            <form action="{{ route('admin.profile.password') }}" method="POST" class="m-0">
                @csrf
                @method('PUT')
                <div class="p-4 pt-2.5 pb-4.5 d-flex flex-column gap-3.5 mb-1">
                    <!-- Current Password Field -->
                    <div class="mb-1">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="text-uppercase tracking-wider-custom fw-bold text-ink-70 m-0" style="font-size: 10.5px;">
                                Current Password
                            </label>
                            <span class="badge rounded-pill bg-white text-ink-60 border border-ink-10 px-2 py-0.5 fw-normal" style="font-size: 9.5px;">
                                Required
                            </span>
                        </div>
                        <div class="position-relative admin-input-group">
                            <span class="admin-input-icon-left">
                                <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input :type="showCurrent ? 'text' : 'password'" 
                                   name="current_password" 
                                   required 
                                   placeholder="Enter your current password"
                                   class="admin-form-input" 
                                   style="padding-left: 2.6rem !important; padding-right: 2.75rem !important;" />
                            <button type="button" 
                                     @click="showCurrent = !showCurrent" 
                                     class="admin-input-eye-btn"
                                     title="Toggle visibility">
                                <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!showCurrent">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="showCurrent" x-cloak>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- New Password Field -->
                    <div class="mb-1">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="text-uppercase tracking-wider-custom fw-bold text-ink-70 m-0" style="font-size: 10.5px;">
                                New Password
                            </label>
                            <span class="badge rounded-pill border px-2 py-0.5 fw-medium" style="font-size: 9.5px; background: rgba(217, 119, 6, 0.1); color: #b45309; border-color: rgba(217, 119, 6, 0.25);">
                                Min 6 characters
                            </span>
                        </div>
                        <div class="position-relative admin-input-group">
                            <span class="admin-input-icon-left">
                                <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                </svg>
                            </span>
                            <input :type="showNew ? 'text' : 'password'" 
                                   name="password" 
                                   required 
                                   minlength="6"
                                   placeholder="Create a strong new password"
                                   class="admin-form-input" 
                                   style="padding-left: 2.6rem !important; padding-right: 2.75rem !important;" />
                            <button type="button" 
                                    @click="showNew = !showNew" 
                                    class="admin-input-eye-btn"
                                    title="Toggle visibility">
                                <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!showNew">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="showNew" x-cloak>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="mb-1">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="text-uppercase tracking-wider-custom fw-bold text-ink-70 m-0" style="font-size: 10.5px;">
                                Confirm Password
                            </label>
                            <span class="badge rounded-pill bg-white text-ink-60 border border-ink-10 px-2 py-0.5 fw-normal" style="font-size: 9.5px;">
                                Must match
                            </span>
                        </div>
                        <div class="position-relative admin-input-group">
                            <span class="admin-input-icon-left">
                                <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </span>
                            <input :type="showConfirm ? 'text' : 'password'" 
                                   name="password_confirmation" 
                                   required 
                                   minlength="6"
                                   placeholder="Re-enter your new password"
                                   class="admin-form-input" 
                                   style="padding-left: 2.6rem !important; padding-right: 2.75rem !important;" />
                            <button type="button" 
                                    @click="showConfirm = !showConfirm" 
                                    class="admin-input-eye-btn"
                                    title="Toggle visibility">
                                <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!showConfirm">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="showConfirm" x-cloak>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal Actions Footer -->
                <div class="p-3.5 px-4 border-top border-ink-10 admin-btn-group-equal w-100 justify-content-end" 
                     style="background: linear-gradient(180deg, #faf7f2 0%, #f4ede1 100%);">
                    <button type="button" class="btn-admin-secondary" @click="changePasswordOpen = false">
                        Cancel
                    </button>
                    <button type="submit" class="btn-admin-primary">
                        <svg style="width: 0.85rem; height: 0.85rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Update Password</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
