@extends('admin.layout', ['title' => 'Add New Menu Dish'])

@section('content')
    <div class="admin-form-card mx-auto">
        <div class="d-flex align-items-center justify-content-between border-bottom border-ink-10 pb-3 mb-4">
            <div>
                <h2 class="h5 fw-bold text-ink m-0">Add New Dish</h2>
                <p class="text-ink-50 m-0 mt-0.5" style="font-size: 12px;">Create and publish a new item to Hari Om Bites digital menu</p>
            </div>
            <a href="{{ route('admin.menu.index') }}" class="btn-admin-secondary" style="min-height: 32px; font-size: 11px;">
                ← Back
            </a>
        </div>

        <form action="{{ route('admin.menu.store') }}" method="POST" class="d-flex flex-column gap-3.5">
            @csrf

            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <label class="admin-label m-0">Menu Category *</label>
                        <a href="{{ route('admin.categories.index') }}" class="text-terracotta text-decoration-none fw-semibold" style="font-size: 11px;">+ New Category</a>
                    </div>
                    <select name="category_id" required class="admin-select">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-6">
                    <label class="admin-label">Dish Name *</label>
                    <input type="text" name="name" required placeholder="e.g. Chicken Tikka Masala" class="admin-input" />
                </div>
            </div>

            <div class="row g-3">
                <div class="col-12 col-sm-6">
                    <label class="admin-label">Numeric Price ($) *</label>
                    <input type="number" step="0.01" name="price" required placeholder="14.00" class="admin-input" />
                </div>
                <div class="col-12 col-sm-6">
                    <label class="admin-label">Price Label (e.g. "$14" or "Lamb $32")</label>
                    <input type="text" name="price_label" placeholder="$14" class="admin-input" />
                </div>
            </div>

            <div>
                <label class="admin-label">Description & Ingredients</label>
                <textarea name="description" rows="3" placeholder="Briefly describe the spices, tender cuts, and authentic herbs..." class="admin-textarea"></textarea>
            </div>

            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <label class="admin-label">Image Key or Photo Name</label>
                    <input type="text" name="image" placeholder="samosas, lamb, paneer, thali, naan" class="admin-input" />
                    <span class="text-ink-50 mt-1 d-block" style="font-size: 11px;">Keywords map automatically to authentic Hari Om photography.</span>
                </div>
                <div class="col-12 col-md-6">
                    <label class="admin-label">Dietary Tags</label>
                    <div class="d-flex gap-3 pt-2">
                        <label class="d-flex align-items-center gap-2 m-0 cursor-pointer p-2 rounded border border-ink-10 bg-white" style="font-size: 12.5px;">
                            <input type="checkbox" name="tags[]" value="GF" class="form-check-input mt-0" />
                            <span class="fw-medium text-ink">Gluten-Free (GF)</span>
                        </label>
                        <label class="d-flex align-items-center gap-2 m-0 cursor-pointer p-2 rounded border border-ink-10 bg-white" style="font-size: 12.5px;">
                            <input type="checkbox" name="tags[]" value="V" class="form-check-input mt-0" />
                            <span class="fw-medium text-ink">Vegetarian (V)</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between gap-3 pt-4 border-top border-ink-10 mt-2">
                <button type="submit" class="btn-admin-primary w-100 w-sm-auto order-1 order-sm-0">
                    <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Save Menu Dish</span>
                </button>
                <a href="{{ route('admin.menu.index') }}" class="btn-admin-secondary w-100 w-sm-auto text-center order-2 order-sm-1">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
