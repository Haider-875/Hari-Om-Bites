@extends('admin.layout', ['title' => 'Menu Items Management'])

@section('content')
    <!-- Top Action Bar -->
    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2">
                <h2 class="h5 fw-bold text-ink m-0">Menu Items Directory</h2>
                <span class="admin-badge admin-badge-neutral">{{ $items->total() }} Dishes</span>
            </div>
            <p class="text-ink-50 m-0 mt-1" style="font-size: 12px;">Manage dishes, prices, dietary tags, and live menu availability.</p>
        </div>
        <a href="{{ route('admin.menu.create') }}" class="btn-admin-primary">
            <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Add New Dish</span>
        </a>
    </div>

    <!-- Desktop Data Table View (Hidden on mobile) -->
    <div class="d-none d-md-block admin-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background-color: #faf6ee;">
                    <tr class="border-bottom border-ink-10 text-uppercase tracking-wider-custom text-ink-50" style="font-size: 10.5px;">
                        <th class="py-3.5 px-4" style="width: 38%;">Dish Details</th>
                        <th class="py-3.5 px-3">Category</th>
                        <th class="py-3.5 px-3">Price</th>
                        <th class="py-3.5 px-3">Dietary</th>
                        <th class="py-3.5 px-3">Status</th>
                        <th class="py-3.5 px-4 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody style="font-size: 13px;">
                    @forelse($items as $item)
                        <tr class="transition-colors">
                            <td class="py-3 px-4">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->name }}" 
                                         class="rounded-3 object-cover flex-shrink-0 shadow-xs border border-ink-10" 
                                         style="width: 44px; height: 44px;"
                                         onerror="this.src='{{ asset('images/logo.png') }}'" />
                                    <div>
                                        <span class="fw-semibold text-ink d-block">{{ $item->name }}</span>
                                        <span class="text-ink-50 line-clamp-1 max-w-sm d-block mt-0.5" style="font-size: 11.5px;">
                                            {{ $item->description ?: 'No description provided.' }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-3">
                                <span class="admin-badge admin-badge-neutral">
                                    {{ $item->category->name ?? 'Unassigned' }}
                                </span>
                            </td>
                            <td class="py-3 px-3 fw-bold text-terracotta" style="font-size: 13.5px;">
                                {{ $item->price_label ?: ('$' . number_format($item->price, 2)) }}
                            </td>
                            <td class="py-3 px-3">
                                @if($item->tags && count($item->tags))
                                    <div class="d-flex flex-wrap gap-1">
                                        @foreach($item->tags as $tag)
                                            <span class="admin-badge admin-badge-warning" style="font-size: 9px; padding: 0.15rem 0.45rem;">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-ink-30">—</span>
                                @endif
                            </td>
                            <td class="py-3 px-3">
                                <span class="admin-badge {{ $item->is_available ? 'admin-badge-success' : 'admin-badge-danger' }}">
                                    <span class="rounded-full" style="width: 5px; height: 5px; background-color: currentColor;"></span>
                                    {{ $item->is_available ? 'Available' : 'Sold Out' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-end">
                                <div class="d-inline-flex align-items-center gap-1.5">
                                    <a href="{{ route('admin.menu.edit', $item) }}" class="btn-admin-action btn-admin-edit">
                                        <svg style="width: 0.85rem; height: 0.85rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('admin.menu.destroy', $item) }}" method="POST" class="d-inline m-0" onsubmit="return confirm('Are you sure you want to delete this menu dish?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-admin-action btn-admin-delete">
                                            <svg style="width: 0.85rem; height: 0.85rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-5 text-center text-ink-40">
                                No menu dishes found. Click "+ Add New Dish" above.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-3 border-top border-ink-10 bg-white">
            {{ $items->links() }}
        </div>
    </div>

    <!-- Mobile Card View (Visible ONLY on mobile devices) -->
    <div class="d-block d-md-none">
        @forelse($items as $item)
            <div class="admin-mobile-item-card">
                <!-- Top Row: Image, Name, Price, Category -->
                <div class="d-flex gap-3 align-items-start">
                    <img src="{{ $item->image_url }}" alt="{{ $item->name }}" 
                         class="rounded-3 object-cover flex-shrink-0 border border-ink-10 shadow-xs" 
                         style="width: 58px; height: 58px;"
                         onerror="this.src='{{ asset('images/logo.png') }}'" />
                    <div class="flex-grow-1 min-w-0">
                        <div class="d-flex align-items-start justify-content-between gap-2">
                            <h3 class="h6 fw-bold text-ink m-0 leading-snug">{{ $item->name }}</h3>
                            <span class="fw-bold text-terracotta fs-6 flex-shrink-0">
                                {{ $item->price_label ?: ('$' . number_format($item->price, 2)) }}
                            </span>
                        </div>
                        <div class="d-flex flex-wrap align-items-center gap-1.5 mt-1.5">
                            <span class="admin-badge admin-badge-neutral" style="font-size: 9.5px;">
                                {{ $item->category->name ?? 'General' }}
                            </span>
                            <span class="admin-badge {{ $item->is_available ? 'admin-badge-success' : 'admin-badge-danger' }}" style="font-size: 9.5px;">
                                {{ $item->is_available ? 'Available' : 'Sold Out' }}
                            </span>
                            @if($item->tags && count($item->tags))
                                @foreach($item->tags as $tag)
                                    <span class="admin-badge admin-badge-warning" style="font-size: 9px; padding: 0.15rem 0.4rem;">{{ $tag }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                @if($item->description)
                    <p class="text-ink-60 m-0 mt-2 line-clamp-2" style="font-size: 12px; line-height: 1.45;">
                        {{ $item->description }}
                    </p>
                @endif

                <!-- Mobile Action Buttons -->
                <div class="admin-mobile-btn-row">
                    <a href="{{ route('admin.menu.edit', $item) }}" class="btn-admin-action btn-admin-edit">
                        <svg style="width: 0.95rem; height: 0.95rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        <span>Edit Dish</span>
                    </a>
                    <form action="{{ route('admin.menu.destroy', $item) }}" method="POST" class="flex-grow-1 m-0 d-flex" onsubmit="return confirm('Delete this menu dish?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-admin-action btn-admin-delete w-100">
                            <svg style="width: 0.95rem; height: 0.95rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            <span>Delete</span>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="admin-card p-5 text-center text-ink-40">
                No menu dishes recorded yet.
            </div>
        @endforelse

        <div class="p-3">
            {{ $items->links() }}
        </div>
    </div>
@endsection
