@extends('admin.layout', ['title' => 'Dashboard Overview'])

@section('content')
    <!-- Metric Cards Grid -->
    <div class="row g-3 g-lg-4">
        <!-- Metric: Menu Items -->
        <div class="col-6 col-lg-3">
            <div class="admin-stat-card d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-uppercase tracking-wider-custom text-ink-50 fw-semibold" style="font-size: 10px;">Menu Dishes</span>
                    <div class="admin-stat-icon" style="background-color: rgba(217, 119, 6, 0.12); color: #d97706;">
                        <svg style="width: 1.25rem; height: 1.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="font-display fw-bold text-ember m-0" style="font-size: 2.2rem; line-height: 1;">{{ $totalItems }}</p>
                    <span class="text-ink-50 mt-1 d-block" style="font-size: 11px;">Across {{ $totalCategories }} categories</span>
                </div>
            </div>
        </div>

        <!-- Metric: Categories -->
        <div class="col-6 col-lg-3">
            <div class="admin-stat-card d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-uppercase tracking-wider-custom text-ink-50 fw-semibold" style="font-size: 10px;">Categories</span>
                    <div class="admin-stat-icon" style="background-color: rgba(124, 45, 18, 0.12); color: #7c2d12;">
                        <svg style="width: 1.25rem; height: 1.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="font-display fw-bold text-terracotta m-0" style="font-size: 2.2rem; line-height: 1;">{{ $totalCategories }}</p>
                    <a href="{{ route('admin.categories.index') }}" class="text-terracotta text-decoration-none fw-semibold mt-1 d-inline-flex align-items-center gap-1" style="font-size: 11px;">
                        <span>Manage Categories</span>
                        <span style="font-size: 13px;">→</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Metric: Pending Reservations -->
        <div class="col-6 col-lg-3">
            <div class="admin-stat-card d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-uppercase tracking-wider-custom text-ink-50 fw-semibold" style="font-size: 10px;">Pending Bookings</span>
                    <div class="admin-stat-icon" style="background-color: rgba(217, 119, 6, 0.15); color: #b45309;">
                        <svg style="width: 1.25rem; height: 1.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="font-display fw-bold text-saffron m-0" style="font-size: 2.2rem; line-height: 1;">{{ $pendingReservations }}</p>
                    <a href="{{ route('admin.reservations.index') }}" class="text-terracotta text-decoration-none fw-semibold mt-1 d-inline-flex align-items-center gap-1" style="font-size: 11px;">
                        <span>Review Bookings</span>
                        <span style="font-size: 13px;">→</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Metric: Kitchen Status -->
        <div class="col-6 col-lg-3">
            <div class="admin-stat-card d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-uppercase tracking-wider-custom text-ink-50 fw-semibold" style="font-size: 10px;">Kitchen Operations</span>
                    <div class="admin-stat-icon" style="background-color: rgba(16, 185, 129, 0.12); color: #059669;">
                        <span class="pulse-live-indicator" style="width: 10px; height: 10px;"></span>
                    </div>
                </div>
                <div>
                    <p class="font-display fw-bold m-0" style="font-size: 2.2rem; line-height: 1; color: #047857;">Active</p>
                    <span class="text-ink-50 mt-1 d-block" style="font-size: 11px;">Dine-In · Take-Out · Events</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Section: Recent Bookings & Quick Actions -->
    <div class="mt-4 row g-3 g-lg-4">
        <!-- Recent Table Reservations -->
        <div class="col-12 col-lg-7">
            <div class="admin-card h-100">
                <div class="admin-card-header">
                    <div>
                        <h2 class="h6 text-uppercase tracking-wider-custom text-ink fw-bold m-0" style="font-size: 12px;">Recent Table Bookings</h2>
                        <span class="text-ink-50" style="font-size: 11px;">Latest reservation requests from customers</span>
                    </div>
                    <a href="{{ route('admin.reservations.index') }}" class="btn-admin-secondary py-1 px-3" style="min-height: 30px; font-size: 10.5px;">
                        View All
                    </a>
                </div>

                <div class="p-3 p-sm-4">
                    <div class="d-flex flex-column gap-2.5">
                        @forelse($recentReservations as $res)
                            <div class="p-3 rounded-3 border border-ink-10 bg-white d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2 shadow-2xs hover-scale-101 transition-all">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-full bg-saffron bg-opacity-10 text-saffron fw-bold d-flex align-items-center justify-content-center flex-shrink-0" style="width: 38px; height: 38px; font-size: 12px;">
                                        {{ $res->guests }}p
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fw-semibold text-ink" style="font-size: 13.5px;">{{ $res->name }}</span>
                                            <span class="admin-badge {{ $res->status === 'confirmed' ? 'admin-badge-success' : ($res->status === 'cancelled' ? 'admin-badge-danger' : 'admin-badge-warning') }}">
                                                {{ $res->status }}
                                            </span>
                                        </div>
                                        <div class="d-flex flex-wrap align-items-center gap-2 mt-1 text-ink-50" style="font-size: 11.5px;">
                                            <span class="d-inline-flex align-items-center gap-1">
                                                <svg style="width: 0.85rem; height: 0.85rem; color: #b45309;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <span>{{ $res->date->format('M d, Y') }} at {{ $res->time }}</span>
                                            </span>
                                            <span class="text-ink-30">·</span>
                                            <span class="d-inline-flex align-items-center gap-1">
                                                <svg style="width: 0.85rem; height: 0.85rem; color: #7c2d12;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                </svg>
                                                <span>{{ $res->phone }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-1.5 align-self-end align-self-sm-center">
                                    <a href="{{ route('admin.reservations.index') }}" class="btn-admin-action btn-admin-edit" title="View details">
                                        Details
                                    </a>
                                    <form action="{{ route('admin.reservations.destroy', $res) }}" method="POST" class="m-0 d-inline-block" onsubmit="return confirm('Delete this table reservation inquiry permanently?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-admin-action btn-admin-delete" title="Delete Inquiry">
                                            <svg style="width: 0.75rem; height: 0.75rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="py-5 text-center text-ink-40">
                                <svg style="width: 2.5rem; height: 2.5rem; opacity: 0.4;" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="mx-auto mb-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="small m-0">No reservation requests registered yet.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Management Actions -->
        <div class="col-12 col-lg-5">
            <div class="admin-card h-100">
                <div class="admin-card-header">
                    <div>
                        <h2 class="h6 text-uppercase tracking-wider-custom text-ink fw-bold m-0" style="font-size: 12px;">Quick Management</h2>
                        <span class="text-ink-50" style="font-size: 11px;">Direct controls & quick links</span>
                    </div>
                </div>

                <div class="p-3 p-sm-4 d-flex flex-column gap-2.5">
                    <a href="{{ route('admin.menu.create') }}" class="admin-action-tile">
                        <div class="d-flex align-items-center gap-3">
                            <div class="admin-stat-icon" style="background-color: rgba(217, 119, 6, 0.12); color: #d97706;">
                                <svg style="width: 1.25rem; height: 1.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <div>
                                <span class="d-block fw-semibold text-ink" style="font-size: 13.5px;">Add New Menu Dish</span>
                                <span class="d-block text-ink-50" style="font-size: 11.5px;">Create a new specialty or appetizer</span>
                            </div>
                        </div>
                        <span class="admin-tile-arrow text-ink-40 transition-all font-sans fw-bold">→</span>
                    </a>

                    <a href="{{ route('admin.categories.index') }}" class="admin-action-tile">
                        <div class="d-flex align-items-center gap-3">
                            <div class="admin-stat-icon" style="background-color: rgba(217, 119, 6, 0.15); color: #b45309;">
                                <svg style="width: 1.25rem; height: 1.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div>
                                <span class="d-block fw-semibold text-ink" style="font-size: 13.5px;">Manage Categories</span>
                                <span class="d-block text-ink-50" style="font-size: 11.5px;">Create, organize & reorder categories</span>
                            </div>
                        </div>
                        <span class="admin-tile-arrow text-ink-40 transition-all font-sans fw-bold">→</span>
                    </a>

                    <a href="{{ route('admin.menu.index') }}" class="admin-action-tile">
                        <div class="d-flex align-items-center gap-3">
                            <div class="admin-stat-icon" style="background-color: rgba(124, 45, 18, 0.12); color: #7c2d12;">
                                <svg style="width: 1.25rem; height: 1.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                            </div>
                            <div>
                                <span class="d-block fw-semibold text-ink" style="font-size: 13.5px;">Manage Dishes & Prices</span>
                                <span class="d-block text-ink-50" style="font-size: 11.5px;">Update pricing, tags & availability</span>
                            </div>
                        </div>
                        <span class="admin-tile-arrow text-ink-40 transition-all font-sans fw-bold">→</span>
                    </a>

                    <a href="{{ route('admin.users.index') }}" class="admin-action-tile">
                        <div class="d-flex align-items-center gap-3">
                            <div class="admin-stat-icon" style="background-color: rgba(217, 119, 6, 0.12); color: #d97706;">
                                <svg style="width: 1.25rem; height: 1.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div>
                                <span class="d-block fw-semibold text-ink" style="font-size: 13.5px;">Staff & Role Assignments</span>
                                <span class="d-block text-ink-50" style="font-size: 11.5px;">Assign roles, add members & manage access</span>
                            </div>
                        </div>
                        <span class="admin-tile-arrow text-ink-40 transition-all font-sans fw-bold">→</span>
                    </a>

                    <a href="{{ route('admin.settings.index') }}" class="admin-action-tile">
                        <div class="d-flex align-items-center gap-3">
                            <div class="admin-stat-icon" style="background-color: rgba(23, 23, 23, 0.08); color: #171717;">
                                <svg style="width: 1.25rem; height: 1.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <span class="d-block fw-semibold text-ink" style="font-size: 13.5px;">Hours & Restaurant Info</span>
                                <span class="d-block text-ink-50" style="font-size: 11.5px;">Modify address, phone & schedule</span>
                            </div>
                        </div>
                        <span class="admin-tile-arrow text-ink-40 transition-all font-sans fw-bold">→</span>
                    </a>

                    <div class="p-3 rounded-3 border border-ink-10" style="background-color: #faf6ee;">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="text-uppercase tracking-wider-custom fw-bold text-saffron" style="font-size: 10px;">Public Restaurant Link</span>
                            <span class="badge bg-saffron text-ink fw-semibold" style="font-size: 9px;">Hari Om Live</span>
                        </div>
                        <p class="text-ink-60 m-0 mb-2" style="font-size: 11.5px;">Review customer experience on the public live site.</p>
                        <a href="{{ route('home') }}" target="_blank" class="btn-admin-secondary w-100" style="min-height: 34px; font-size: 11px;">
                            <span>Visit Public Website</span>
                            <span>↗</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
