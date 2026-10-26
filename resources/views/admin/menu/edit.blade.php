@extends('admin.layout', ['title' => 'Edit Menu Dish'])

@section('content')
    <div class="max-w-2xl bg-paper p-8 rounded-sm border border-ink/10 shadow-sm">
        <h2 class="text-base font-semibold text-ink border-b border-ink/10 pb-4 mb-6">Edit Dish: {{ $item->name }}</h2>

        <form action="{{ route('admin.menu.update', $item) }}" method="POST" class="space-y-5 text-xs">
            @csrf
            @method('PUT')

            <div>
                <label class="block uppercase tracking-wider text-ink/60 mb-1">Category *</label>
                <select name="category_id" required class="w-full rounded-sm border border-ink/20 p-2.5 bg-white text-xs">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block uppercase tracking-wider text-ink/60 mb-1">Dish Name *</label>
                <input type="text" name="name" value="{{ old('name', $item->name) }}" required class="w-full rounded-sm border border-ink/20 p-2.5 bg-white text-xs" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block uppercase tracking-wider text-ink/60 mb-1">Numeric Price ($) *</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $item->price) }}" required class="w-full rounded-sm border border-ink/20 p-2.5 bg-white text-xs" />
                </div>
                <div>
                    <label class="block uppercase tracking-wider text-ink/60 mb-1">Price Label</label>
                    <input type="text" name="price_label" value="{{ old('price_label', $item->price_label) }}" class="w-full rounded-sm border border-ink/20 p-2.5 bg-white text-xs" />
                </div>
            </div>

            <div>
                <label class="block uppercase tracking-wider text-ink/60 mb-1">Description</label>
                <textarea name="description" rows="3" class="w-full rounded-sm border border-ink/20 p-2.5 bg-white text-xs">{{ old('description', $item->description) }}</textarea>
            </div>

            <div>
                <label class="block uppercase tracking-wider text-ink/60 mb-1">Image Key</label>
                <input type="text" name="image" value="{{ old('image', $item->image) }}" class="w-full rounded-sm border border-ink/20 p-2.5 bg-white text-xs" />
            </div>

            <div>
                <label class="block uppercase tracking-wider text-ink/60 mb-2">Dietary Tags</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="tags[]" value="GF" {{ is_array($item->tags) && in_array('GF', $item->tags) ? 'checked' : '' }} />
                        <span>Gluten Free (GF)</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="tags[]" value="V" {{ is_array($item->tags) && in_array('V', $item->tags) ? 'checked' : '' }} />
                        <span>Vegetarian (V)</span>
                    </label>
                </div>
            </div>

            <div class="flex gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_available" value="1" {{ $item->is_available ? 'checked' : '' }} />
                    <span>Available to Order</span>
                </label>
            </div>

            <div class="flex items-center gap-6 pt-4 border-t border-ink/10">
                <button type="submit" class="rounded-sm bg-terracotta px-6 py-2.5 uppercase tracking-wider text-paper hover:bg-ink">
                    Save Changes
                </button>
                <a href="{{ route('admin.menu.index') }}" class="text-ink/50 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
@endsection
