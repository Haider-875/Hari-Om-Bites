@extends('admin.layout', ['title' => 'Table Reservations'])

@section('content')
    <!-- Top Action Bar -->
    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2">
                <h2 class="h5 fw-bold text-ink m-0">Table Reservations</h2>
                <span class="admin-badge admin-badge-neutral">{{ $reservations->total() }} Total</span>
            </div>
            <p class="text-ink-50 m-0 mt-1" style="font-size: 12px;">Manage dine-in seating requests, schedule dates, and guest confirmations.</p>
        </div>
    </div>

    <!-- Desktop Data Table View (Hidden on mobile) -->
    <div class="d-none d-md-block admin-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background-color: #faf6ee;">
                    <tr class="border-bottom border-ink-10 text-uppercase tracking-wider-custom text-ink-50" style="font-size: 10.5px;">
                        <th class="py-3.5 px-4" style="width: 25%;">Guest Details</th>
                        <th class="py-3.5 px-3">Party</th>
                        <th class="py-3.5 px-3" style="width: 22%;">Reserved Date & Time</th>
                        <th class="py-3.5 px-3">Notes</th>
                        <th class="py-3.5 px-3">Status</th>
                        <th class="py-3.5 px-4 text-end">Update Action</th>
                    </tr>
                </thead>
                <tbody style="font-size: 13px;">
                    @forelse($reservations as $res)
                        <tr class="transition-colors">
                            <td class="py-3 px-4">
                                <span class="fw-semibold text-ink d-block">{{ $res->name }}</span>
                                <div class="d-flex align-items-center gap-2 mt-0.5" style="font-size: 11.5px;">
                                    <a href="tel:{{ $res->phone }}" class="text-terracotta text-decoration-none">📞 {{ $res->phone }}</a>
                                    <span class="text-ink-30">·</span>
                                    <a href="mailto:{{ $res->email }}" class="text-ink-60 text-decoration-none">✉️ {{ $res->email }}</a>
                                </div>
                            </td>
                            <td class="py-3 px-3">
                                <span class="admin-badge admin-badge-warning fw-bold">
                                    {{ $res->guests }} {{ Str::plural('Guest', $res->guests) }}
                                </span>
                            </td>
                            <td class="py-3 px-3">
                                <span class="fw-semibold text-ink d-block">{{ $res->date->format('l, M d, Y') }}</span>
                                <span class="text-ink-50 d-block" style="font-size: 11.5px;">⏰ {{ $res->time }}</span>
                            </td>
                            <td class="py-3 px-3 text-ink-70 small max-w-xs">
                                @if($res->special_requests)
                                    <span class="fst-italic text-ink-80">“{{ $res->special_requests }}”</span>
                                @else
                                    <span class="text-ink-30">— None —</span>
                                @endif
                            </td>
                            <td class="py-3 px-3">
                                <span class="admin-badge {{ $res->status === 'confirmed' ? 'admin-badge-success' : ($res->status === 'cancelled' ? 'admin-badge-danger' : 'admin-badge-warning') }}">
                                    <span class="rounded-full" style="width: 5px; height: 5px; background-color: currentColor;"></span>
                                    {{ $res->status }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-end">
                                <form action="{{ route('admin.reservations.status', $res) }}" method="POST" class="d-inline-flex gap-1.5 m-0">
                                    @csrf
                                    @method('PATCH')
                                    @if($res->status !== 'confirmed')
                                        <button type="submit" name="status" value="confirmed" class="btn-admin-action btn-admin-confirm">
                                            <svg style="width: 0.85rem; height: 0.85rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span>Confirm</span>
                                        </button>
                                    @endif
                                    @if($res->status !== 'cancelled')
                                        <button type="submit" name="status" value="cancelled" class="btn-admin-action btn-admin-cancel" onclick="return confirm('Cancel this reservation?');">
                                            <svg style="width: 0.85rem; height: 0.85rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            <span>Cancel</span>
                                        </button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-5 text-center text-ink-40">
                                No reservation requests recorded yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-3 border-top border-ink-10 bg-white">
            {{ $reservations->links() }}
        </div>
    </div>

    <!-- Mobile Card View (Visible ONLY on mobile devices) -->
    <div class="d-block d-md-none">
        @forelse($reservations as $res)
            <div class="admin-mobile-item-card">
                <!-- Top Header: Name, Party, Status -->
                <div class="d-flex align-items-start justify-content-between gap-2 pb-2 border-bottom border-ink-10">
                    <div>
                        <h3 class="h6 fw-bold text-ink m-0">{{ $res->name }}</h3>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="admin-badge admin-badge-warning fw-bold" style="font-size: 9.5px;">
                                {{ $res->guests }} {{ Str::plural('Guest', $res->guests) }}
                            </span>
                            <span class="admin-badge {{ $res->status === 'confirmed' ? 'admin-badge-success' : ($res->status === 'cancelled' ? 'admin-badge-danger' : 'admin-badge-warning') }}" style="font-size: 9.5px;">
                                {{ $res->status }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Schedule & Contact Info -->
                <div class="mt-2.5 d-flex flex-column gap-1.5" style="font-size: 12.5px;">
                    <div class="d-flex align-items-center gap-2 text-ink">
                        <span class="text-terracotta fw-semibold">📅 {{ $res->date->format('l, M d, Y') }}</span>
                        <span class="text-ink-40">·</span>
                        <span class="fw-semibold">⏰ {{ $res->time }}</span>
                    </div>

                    <div class="d-flex flex-wrap gap-3 mt-1">
                        <a href="tel:{{ $res->phone }}" class="text-decoration-none text-terracotta fw-medium">
                            📞 {{ $res->phone }}
                        </a>
                        <a href="mailto:{{ $res->email }}" class="text-decoration-none text-ink-60">
                            ✉️ {{ $res->email }}
                        </a>
                    </div>

                    @if($res->special_requests)
                        <div class="p-2 rounded bg-paper-dark text-ink-70 fst-italic mt-1" style="font-size: 11.5px; border-left: 3px solid #d97706;">
                            “{{ $res->special_requests }}”
                        </div>
                    @endif
                </div>

                <!-- Action Button Row -->
                <div class="admin-mobile-btn-row">
                    <form action="{{ route('admin.reservations.status', $res) }}" method="POST" class="d-flex gap-2 w-100 m-0">
                        @csrf
                        @method('PATCH')
                        @if($res->status !== 'confirmed')
                            <button type="submit" name="status" value="confirmed" class="btn-admin-action btn-admin-confirm">
                                <svg style="width: 0.95rem; height: 0.95rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Confirm Booking</span>
                            </button>
                        @endif
                        @if($res->status !== 'cancelled')
                            <button type="submit" name="status" value="cancelled" class="btn-admin-action btn-admin-cancel" onclick="return confirm('Cancel this reservation?');">
                                <svg style="width: 0.95rem; height: 0.95rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span>Cancel</span>
                            </button>
                        @endif
                    </form>
                </div>
            </div>
        @empty
            <div class="admin-card p-5 text-center text-ink-40">
                No table reservations recorded yet.
            </div>
        @endforelse

        <div class="p-3">
            {{ $reservations->links() }}
        </div>
    </div>
@endsection
