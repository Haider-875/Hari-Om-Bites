@extends('admin.layout', ['title' => 'Edit Menu Dish'])

@section('content')
    <div class="admin-form-card mx-auto">
        <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2.5 border-bottom border-ink-10 pb-3 mb-4">
            <div>
                <div class="d-flex align-items-center gap-2">
                    <h2 class="h5 fw-bold text-ink m-0">Edit Dish: {{ $item->name }}</h2>
                    <span class="admin-badge {{ $item->is_available ? 'admin-badge-success' : 'admin-badge-danger' }}">
                        {{ $item->is_available ? 'Active' : 'Sold Out' }}
                    </span>
                </div>
                <p class="text-ink-50 m-0 mt-1" style="font-size: 12px;">Modify pricing, availability, and presentation details</p>
            </div>
            <a href="{{ route('admin.menu.index') }}" class="btn-admin-secondary">
                ← Back
            </a>
        </div>

        <form action="{{ route('admin.menu.update', $item) }}" method="POST" class="d-flex flex-column gap-3.5">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="d-flex align-items-center justify-content-between mb-1.5">
                        <label class="admin-label m-0">Menu Category *</label>
                        <a href="{{ route('admin.categories.index') }}" class="text-terracotta text-decoration-none fw-semibold" style="font-size: 11px;">+ New Category</a>
                    </div>
                    <select name="category_id" required class="admin-select">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-6">
                    <label class="admin-label">Dish Name *</label>
                    <input type="text" name="name" value="{{ old('name', $item->name) }}" required class="admin-input" />
                </div>
            </div>

            <div class="row g-3">
                <div class="col-12 col-sm-6">
                    <label class="admin-label">Numeric Price ($) *</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $item->price) }}" required class="admin-input" />
                </div>
                <div class="col-12 col-sm-6">
                    <label class="admin-label">Price Label (Display Override)</label>
                    <input type="text" name="price_label" value="{{ old('price_label', $item->price_label) }}" placeholder="e.g. $14 or Market Price" class="admin-input" />
                </div>
            </div>

            <div>
                <label class="admin-label">Description & Ingredients</label>
                <textarea name="description" rows="3" class="admin-textarea">{{ old('description', $item->description) }}</textarea>
            </div>

            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <label class="admin-label">Image Key or Photo Name</label>
                    <input type="text" name="image" value="{{ old('image', $item->image) }}" class="admin-input" />
                    <span class="text-ink-40 mt-1 d-block" style="font-size: 10.5px;">E.g. samosas, lamb, chicken, paneer, naan, thali</span>
                </div>
                <div class="col-12 col-md-6">
                    <label class="admin-label">Dietary Tags</label>
                    <div class="d-flex flex-wrap gap-2 pt-1">
                        <label class="d-flex align-items-center gap-2 m-0 cursor-pointer p-2 px-3 rounded-3 border border-ink-10 bg-white" style="font-size: 12px;">
                            <input type="checkbox" name="tags[]" value="GF" {{ is_array($item->tags) && in_array('GF', $item->tags) ? 'checked' : '' }} class="form-check-input mt-0" />
                            <span class="fw-semibold text-ink">Gluten-Free (GF)</span>
                        </label>
                        <label class="d-flex align-items-center gap-2 m-0 cursor-pointer p-2 px-3 rounded-3 border border-ink-10 bg-white" style="font-size: 12px;">
                            <input type="checkbox" name="tags[]" value="V" {{ is_array($item->tags) && in_array('V', $item->tags) ? 'checked' : '' }} class="form-check-input mt-0" />
                            <span class="fw-semibold text-ink">Vegetarian (V)</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Availability Status Toggle -->
            <div class="p-3 px-3.5 rounded-3 border border-ink-10 bg-white d-flex align-items-center justify-content-between">
                <div>
                    <label for="availabilitySwitch" class="d-block fw-semibold text-ink m-0 cursor-pointer" style="font-size: 13.5px;">Available to Order</label>
                    <span class="text-ink-50" style="font-size: 11.5px;">Uncheck to mark dish as Sold Out on the live menu</span>
                </div>
                <div class="form-check form-switch fs-5 m-0">
                    <input type="hidden" name="is_available" value="0" />
                    <input class="form-check-input cursor-pointer" type="checkbox" name="is_available" value="1" {{ $item->is_available ? 'checked' : '' }} id="availabilitySwitch" />
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center justify-content-between gap-2.5 pt-4 border-top border-ink-10 mt-2">
                <button type="submit" class="btn-admin-primary order-1 order-sm-0">
                    <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Save Changes</span>
                </button>
                <a href="{{ route('admin.menu.index') }}" class="btn-admin-secondary text-center order-2 order-sm-1">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
