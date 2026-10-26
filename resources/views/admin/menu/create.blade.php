@extends('admin.layout', ['title' => 'Add New Menu Dish'])

@section('content')
    <div class="max-w-2xl bg-paper p-4 p-sm-5 rounded-sm border border-ink-10 shadow-sm">
        <h2 class="fs-6 fw-semibold text-ink border-bottom border-ink-10 pb-3 mb-4">Create New Dish</h2>

        <form action="{{ route('admin.menu.store') }}" method="POST" class="d-flex flex-column gap-3 small">
            @csrf
            <div>
                <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-1" style="font-size: 10px;">Category *</label>
                <select name="category_id" required class="form-select form-select-sm border-ink-20 bg-white">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-1" style="font-size: 10px;">Dish Name *</label>
                <input type="text" name="name" required class="form-control form-control-sm border-ink-20 bg-white" />
            </div>

            <div class="row g-3">
                <div class="col-6">
                    <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-1" style="font-size: 10px;">Numeric Price ($) *</label>
                    <input type="number" step="0.01" name="price" required placeholder="14.00" class="form-control form-control-sm border-ink-20 bg-white" />
                </div>
                <div class="col-6">
                    <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-1" style="font-size: 10px;">Price Label (e.g. "Lamb $32" or "$14")</label>
                    <input type="text" name="price_label" placeholder="$14" class="form-control form-control-sm border-ink-20 bg-white" />
                </div>
            </div>

            <div>
                <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-1" style="font-size: 10px;">Description</label>
                <textarea name="description" rows="3" class="form-control form-control-sm border-ink-20 bg-white"></textarea>
            </div>

            <div>
                <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-1" style="font-size: 10px;">Image Key (e.g. samosas, lamb, paneer, thali, naan)</label>
                <input type="text" name="image" placeholder="samosas" class="form-control form-control-sm border-ink-20 bg-white" />
            </div>

            <div>
                <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-2" style="font-size: 10px;">Dietary Tags</label>
                <div class="d-flex gap-4">
                    <label class="d-flex align-items-center gap-2 m-0 cursor-pointer">
                        <input type="checkbox" name="tags[]" value="GF" class="form-check-input mt-0" />
                        <span>Gluten Free (GF)</span>
                    </label>
                    <label class="d-flex align-items-center gap-2 m-0 cursor-pointer">
                        <input type="checkbox" name="tags[]" value="V" class="form-check-input mt-0" />
                        <span>Vegetarian (V)</span>
                    </label>
                </div>
            </div>

            <div class="d-flex align-items-center gap-4 pt-3 border-top border-ink-10">
                <button type="submit" class="rounded-sm bg-terracotta px-4 py-2 text-uppercase tracking-wider-custom text-paper border-0" style="font-size: 11px;">
                    Save Dish
                </button>
                <a href="{{ route('admin.menu.index') }}" class="text-ink-50 text-decoration-none small">Cancel</a>
            </div>
        </form>
    </div>
@endsection
