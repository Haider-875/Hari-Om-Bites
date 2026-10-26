@extends('admin.layout', ['title' => 'Menu Items Management'])

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h2 class="fs-5 fw-semibold text-ink m-0">All Menu Items ({{ $items->total() }})</h2>
            <p class="small text-ink-50 m-0">Manage dishes, prices, descriptions, and dietary tags.</p>
        </div>
        <a href="{{ route('admin.menu.create') }}"
           class="rounded-sm bg-terracotta px-4 py-2 text-uppercase tracking-wider-custom text-paper text-decoration-none fw-medium"
           style="font-size: 11px;">
            + Add New Dish
        </a>
    </div>

    <div class="bg-paper rounded-sm border border-ink-10 shadow-sm overflow-hidden table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color: #faf6ee;">
                <tr class="border-bottom border-ink-10 text-uppercase tracking-wider-custom text-ink-50" style="font-size: 10px;">
                    <th class="p-3">Item</th>
                    <th class="p-3">Category</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Tags</th>
                    <th class="p-3">Status</th>
                    <th class="p-3 text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="small">
                @foreach($items as $item)
                    <tr>
                        <td class="p-3">
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="rounded-full object-cover flex-shrink-0 ring-1 ring-ink-10 w-10 h-10" />
                                <div>
                                    <span class="fw-semibold text-ink d-block small">{{ $item->name }}</span>
                                    <span class="text-ink-50 line-clamp-1 max-w-xs d-block" style="font-size: 11px;">{{ $item->description }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded-full text-uppercase tracking-wider-custom text-ink-70" style="font-size: 10px; background-color: rgba(23,23,23,0.05);">
                                {{ $item->category->name }}
                            </span>
                        </td>
                        <td class="p-3 fw-semibold text-terracotta small">
                            {{ $item->price_label ?: ('$' . number_format($item->price, 2)) }}
                        </td>
                        <td class="p-3">
                            @if($item->tags && count($item->tags))
                                <div class="d-flex gap-1">
                                    @foreach($item->tags as $tag)
                                        <span class="px-1.5 py-0.5 rounded" style="font-size: 9px; background-color: #fef3c7; color: #92400e;">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-ink-30">—</span>
                            @endif
                        </td>
                        <td class="p-3">
                            <span class="d-inline-flex align-items-center gap-1.5 px-2 py-0.5 rounded-full" 
                                  style="font-size: 10px; {{ $item->is_available ? 'background-color: #d1fae5; color: #065f46;' : 'background-color: #fee2e2; color: #991b1b;' }}">
                                <span class="rounded-full" style="width: 5px; height: 5px; {{ $item->is_available ? 'background-color: #059669;' : 'background-color: #dc2626;' }}"></span>
                                {{ $item->is_available ? 'Available' : 'Sold Out' }}
                            </span>
                        </td>
                        <td class="p-3 text-end">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('admin.menu.edit', $item) }}" class="text-terracotta text-decoration-none fw-medium small">Edit</a>
                                <form action="{{ route('admin.menu.destroy', $item) }}" method="POST" class="d-inline m-0" onsubmit="return confirm('Delete this menu item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent p-0 text-danger text-decoration-none small cursor-pointer">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-3 border-top border-ink-10">
            {{ $items->links() }}
        </div>
    </div>
@endsection
