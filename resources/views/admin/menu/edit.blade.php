@extends('admin.layout', ['title' => 'Edit Menu Dish'])

@section('content')
    <div class="max-w-2xl bg-paper p-4 p-sm-5 rounded-sm border border-ink-10 shadow-sm">
        <h2 class="fs-6 fw-semibold text-ink border-bottom border-ink-10 pb-3 mb-4">Edit Dish: {{ $item->name }}</h2>

        <form action="{{ route('admin.menu.update', $item) }}" method="POST" class="d-flex flex-column gap-3 small">
            @csrf
            @method('PUT')

            <div>
                <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-1" style="font-size: 10px;">Category *</label>
                <select name="category_id" required class="form-select form-select-sm border-ink-20 bg-white">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-1" style="font-size: 10px;">Dish Name *</label>
                <input type="text" name="name" value="{{ old('name', $item->name) }}" required class="form-control form-control-sm border-ink-20 bg-white" />
            </div>

            <div class="row g-3">
                <div class="col-6">
                    <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-1" style="font-size: 10px;">Numeric Price ($) *</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $item->price) }}" required class="form-control form-control-sm border-ink-20 bg-white" />
                </div>
                <div class="col-6">
                    <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-1" style="font-size: 10px;">Price Label</label>
                    <input type="text" name="price_label" value="{{ old('price_label', $item->price_label) }}" class="form-control form-control-sm border-ink-20 bg-white" />
                </div>
            </div>

            <div>
                <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-1" style="font-size: 10px;">Description</label>
                <textarea name="description" rows="3" class="form-control form-control-sm border-ink-20 bg-white">{{ old('description', $item->description) }}</textarea>
            </div>

            <div>
                <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-1" style="font-size: 10px;">Image Key</label>
                <input type="text" name="image" value="{{ old('image', $item->image) }}" class="form-control form-control-sm border-ink-20 bg-white" />
            </div>

            <div>
                <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-2" style="font-size: 10px;">Dietary Tags</label>
                <div class="d-flex gap-4">
                    <label class="d-flex align-items-center gap-2 m-0 cursor-pointer">
                        <input type="checkbox" name="tags[]" value="GF" {{ is_array($item->tags) && in_array('GF', $item->tags) ? 'checked' : '' }} class="form-check-input mt-0" />
                        <span>Gluten Free (GF)</span>
                    </label>
                    <label class="d-flex align-items-center gap-2 m-0 cursor-pointer">
                        <input type="checkbox" name="tags[]" value="V" {{ is_array($item->tags) && in_array('V', $item->tags) ? 'checked' : '' }} class="form-check-input mt-0" />
                        <span>Vegetarian (V)</span>
                    </label>
                </div>
            </div>

            <div class="d-flex gap-4">
                <label class="d-flex align-items-center gap-2 cursor-pointer m-0">
                    <input type="checkbox" name="is_available" value="1" {{ $item->is_available ? 'checked' : '' }} class="form-check-input mt-0" />
                    <span>Available to Order</span>
                </label>
            </div>

            <div class="d-flex align-items-center gap-4 pt-3 border-top border-ink-10">
                <button type="submit" class="rounded-sm bg-terracotta px-4 py-2 text-uppercase tracking-wider-custom text-paper border-0" style="font-size: 11px;">
                    Save Changes
                </button>
                <a href="{{ route('admin.menu.index') }}" class="text-ink-50 text-decoration-none small">Cancel</a>
            </div>
        </form>
    </div>
@endsection
