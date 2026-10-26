@extends('admin.layout', ['title' => 'Menu Items Management'])

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-semibold text-ink">All Menu Items ({{ $items->total() }})</h2>
            <p class="text-xs text-ink/50">Manage dishes, prices, descriptions, and dietary tags.</p>
        </div>
        <a href="{{ route('admin.menu.create') }}"
           class="rounded-sm bg-terracotta px-5 py-2.5 text-xs uppercase tracking-wider text-paper hover:bg-ink transition-colors font-medium">
            + Add New Dish
        </a>
    </div>

    <div class="bg-paper rounded-sm border border-ink/10 shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-ink/10 bg-[#faf6ee] text-[10px] uppercase tracking-wider text-ink/50">
                    <th class="p-4">Item</th>
                    <th class="p-4">Category</th>
                    <th class="p-4">Price</th>
                    <th class="p-4">Tags</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-ink/10 text-xs">
                @foreach($items as $item)
                    <tr class="hover:bg-white/50 transition-colors">
                        <td class="p-4 flex items-center gap-3">
                            <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="h-10 w-10 rounded-full object-cover shrink-0 ring-1 ring-ink/10" />
                            <div>
                                <span class="font-semibold text-ink block">{{ $item->name }}</span>
                                <span class="text-[11px] text-ink/50 line-clamp-1 max-w-xs">{{ $item->description }}</span>
                            </div>
                        </td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 rounded-full bg-ink/5 text-[10px] uppercase tracking-wider text-ink/70">
                                {{ $item->category->name }}
                            </span>
                        </td>
                        <td class="p-4 font-semibold text-terracotta">
                            {{ $item->price_label ?: ('$' . number_format($item->price, 2)) }}
                        </td>
                        <td class="p-4">
                            @if($item->tags && count($item->tags))
                                <div class="flex gap-1">
                                    @foreach($item->tags as $tag)
                                        <span class="px-1.5 py-0.5 rounded text-[9px] bg-amber-100 text-amber-800">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-ink/30">—</span>
                            @endif
                        </td>
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[10px] {{ $item->is_available ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800' }}">
                                <span class="h-1.5 w-1.5 rounded-full {{ $item->is_available ? 'bg-emerald-600' : 'bg-red-600' }}"></span>
                                {{ $item->is_available ? 'Available' : 'Sold Out' }}
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('admin.menu.edit', $item) }}" class="text-terracotta hover:underline font-medium">Edit</a>
                            <form action="{{ route('admin.menu.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Delete this menu item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4 border-t border-ink/10">
            {{ $items->links() }}
        </div>
    </div>
@endsection
