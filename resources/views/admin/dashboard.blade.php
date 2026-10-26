@extends('admin.layout', ['title' => 'Dashboard Overview'])

@section('content')
    <!-- Metric Cards -->
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="bg-paper p-6 rounded-sm border border-ink/10 shadow-sm">
            <span class="text-[10px] uppercase tracking-widest text-ink/40">Total Menu Items</span>
            <p class="font-display text-4xl text-ember mt-2">{{ $totalItems }}</p>
            <span class="text-xs text-ink/50 mt-1 block">Across {{ $totalCategories }} categories</span>
        </div>

        <div class="bg-paper p-6 rounded-sm border border-ink/10 shadow-sm">
            <span class="text-[10px] uppercase tracking-widest text-ink/40">Categories</span>
            <p class="font-display text-4xl text-terracotta mt-2">{{ $totalCategories }}</p>
            <span class="text-xs text-ink/50 mt-1 block">Active on digital menu</span>
        </div>

        <div class="bg-paper p-6 rounded-sm border border-ink/10 shadow-sm">
            <span class="text-[10px] uppercase tracking-widest text-ink/40">Pending Bookings</span>
            <p class="font-display text-4xl text-saffron mt-2">{{ $pendingReservations }}</p>
            <a href="{{ route('admin.reservations.index') }}" class="text-xs text-terracotta hover:underline mt-1 block">Manage requests →</a>
        </div>

        <div class="bg-paper p-6 rounded-sm border border-ink/10 shadow-sm">
            <span class="text-[10px] uppercase tracking-widest text-ink/40">Kitchen Status</span>
            <p class="font-display text-3xl text-emerald-700 mt-2">Active</p>
            <span class="text-xs text-ink/50 mt-1 block">Dine In · Take Out · Catering</span>
        </div>
    </div>

    <!-- Recent Table Reservations & Quick Actions -->
    <div class="mt-8 grid gap-8 lg:grid-cols-2">
        <!-- Reservations List -->
        <div class="bg-paper p-6 rounded-sm border border-ink/10 shadow-sm">
            <div class="flex items-center justify-between border-b border-ink/10 pb-4">
                <h2 class="text-xs uppercase tracking-wider text-ink font-semibold">Recent Table Reservations</h2>
                <a href="{{ route('admin.reservations.index') }}" class="text-xs text-terracotta hover:underline">View All</a>
            </div>

            <div class="mt-4 divide-y divide-ink/10">
                @forelse($recentReservations as $res)
                    <div class="py-3 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-ink">{{ $res->name }} ({{ $res->guests }} guests)</p>
                            <p class="text-[11px] text-ink/50">{{ $res->date->format('M d, Y') }} at {{ $res->time }} · {{ $res->phone }}</p>
                        </div>
                        <span class="px-2.5 py-1 text-[9px] uppercase tracking-wider rounded-full {{ $res->status === 'confirmed' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                            {{ $res->status }}
                        </span>
                    </div>
                @empty
                    <p class="py-6 text-center text-xs text-ink/40">No reservation requests yet.</p>
                @endforelse
            </div>
        </div>

        <!-- Quick Links & System Information -->
        <div class="bg-paper p-6 rounded-sm border border-ink/10 shadow-sm">
            <h2 class="text-xs uppercase tracking-wider text-ink font-semibold border-b border-ink/10 pb-4">Quick Management</h2>
            <div class="mt-4 space-y-3">
                <a href="{{ route('admin.menu.create') }}" class="flex items-center justify-between p-3 rounded-sm border border-ink/10 hover:border-terracotta/40 hover:bg-[#faf6ee] transition-colors">
                    <span class="text-xs font-medium text-ink">Add New Menu Dish</span>
                    <span class="text-xs text-terracotta">+ Create</span>
                </a>
                <a href="{{ route('admin.menu.index') }}" class="flex items-center justify-between p-3 rounded-sm border border-ink/10 hover:border-terracotta/40 hover:bg-[#faf6ee] transition-colors">
                    <span class="text-xs font-medium text-ink">Update Dish Prices & Availability</span>
                    <span class="text-xs text-terracotta">Manage →</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center justify-between p-3 rounded-sm border border-ink/10 hover:border-terracotta/40 hover:bg-[#faf6ee] transition-colors">
                    <span class="text-xs font-medium text-ink">Update Hours & Contact Info</span>
                    <span class="text-xs text-terracotta">Edit →</span>
                </a>
            </div>
        </div>
    </div>
@endsection
