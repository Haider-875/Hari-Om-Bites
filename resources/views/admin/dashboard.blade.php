@extends('admin.layout', ['title' => 'Dashboard Overview'])

@section('content')
    <!-- Metric Cards -->
    <div class="row g-4">
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="bg-paper p-4 rounded-sm border border-ink-10 shadow-sm h-100">
                <span class="text-uppercase tracking-widest-custom text-ink-40 m-0" style="font-size: 10px;">Total Menu Items</span>
                <p class="font-display fs-1 text-ember mt-2 mb-0">{{ $totalItems }}</p>
                <span class="small text-ink-50 mt-1 d-block">Across {{ $totalCategories }} categories</span>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="bg-paper p-4 rounded-sm border border-ink-10 shadow-sm h-100">
                <span class="text-uppercase tracking-widest-custom text-ink-40 m-0" style="font-size: 10px;">Categories</span>
                <p class="font-display fs-1 text-terracotta mt-2 mb-0">{{ $totalCategories }}</p>
                <span class="small text-ink-50 mt-1 d-block">Active on digital menu</span>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="bg-paper p-4 rounded-sm border border-ink-10 shadow-sm h-100">
                <span class="text-uppercase tracking-widest-custom text-ink-40 m-0" style="font-size: 10px;">Pending Bookings</span>
                <p class="font-display fs-1 text-saffron mt-2 mb-0">{{ $pendingReservations }}</p>
                <a href="{{ route('admin.reservations.index') }}" class="small text-terracotta text-decoration-none mt-1 d-block">Manage requests</a>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3">
            <div class="bg-paper p-4 rounded-sm border border-ink-10 shadow-sm h-100">
                <span class="text-uppercase tracking-widest-custom text-ink-40 m-0" style="font-size: 10px;">Kitchen Status</span>
                <p class="font-display fs-2 mt-2 mb-0" style="color: #047857;">Active</p>
                <span class="small text-ink-50 mt-1 d-block">Dine In · Take Out · Catering</span>
            </div>
        </div>
    </div>

    <!-- Recent Table Reservations & Quick Actions -->
    <div class="mt-4 row g-4">
        <!-- Reservations List -->
        <div class="col-12 col-lg-6">
            <div class="bg-paper p-4 rounded-sm border border-ink-10 shadow-sm h-100">
                <div class="d-flex align-items-center justify-content-between border-bottom border-ink-10 pb-3">
                    <h2 class="small text-uppercase tracking-wider-custom text-ink fw-semibold m-0">Recent Table Reservations</h2>
                    <a href="{{ route('admin.reservations.index') }}" class="small text-terracotta text-decoration-none">View All</a>
                </div>

                <div class="mt-3 d-flex flex-column">
                    @forelse($recentReservations as $res)
                        <div class="py-2.5 border-bottom border-ink-10 d-flex align-items-center justify-content-between">
                            <div>
                                <p class="small fw-semibold text-ink m-0">{{ $res->name }} ({{ $res->guests }} guests)</p>
                                <p class="text-ink-50 m-0" style="font-size: 11px;">{{ $res->date->format('M d, Y') }} at {{ $res->time }} · {{ $res->phone }}</p>
                            </div>
                            <span class="px-2 py-1 text-uppercase tracking-wider-custom rounded-full" 
                                  style="font-size: 9px; {{ $res->status === 'confirmed' ? 'background-color: #d1fae5; color: #065f46;' : 'background-color: #fef3c7; color: #92400e;' }}">
                                {{ $res->status }}
                            </span>
                        </div>
                    @empty
                        <p class="py-4 text-center small text-ink-40 m-0">No reservation requests yet.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Quick Links & System Information -->
        <div class="col-12 col-lg-6">
            <div class="bg-paper p-4 rounded-sm border border-ink-10 shadow-sm h-100">
                <h2 class="small text-uppercase tracking-wider-custom text-ink fw-semibold border-bottom border-ink-10 pb-3 m-0">Quick Management</h2>
                <div class="mt-3 d-flex flex-column gap-2">
                    <a href="{{ route('admin.menu.create') }}" class="d-flex align-items-center justify-content-between p-3 rounded-sm border border-ink-10 text-decoration-none transition-colors" style="background-color: #fff;">
                        <span class="small fw-medium text-ink">Add New Menu Dish</span>
                        <span class="small text-terracotta">+ Create</span>
                    </a>
                    <a href="{{ route('admin.menu.index') }}" class="d-flex align-items-center justify-content-between p-3 rounded-sm border border-ink-10 text-decoration-none transition-colors" style="background-color: #fff;">
                        <span class="small fw-medium text-ink">Update Dish Prices & Availability</span>
                        <span class="small text-terracotta">Manage</span>
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="d-flex align-items-center justify-content-between p-3 rounded-sm border border-ink-10 text-decoration-none transition-colors" style="background-color: #fff;">
                        <span class="small fw-medium text-ink">Update Hours & Contact Info</span>
                        <span class="small text-terracotta">Edit</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
