@extends('admin.layout', ['title' => 'Menu Categories'])

@section('content')
<div x-data="{ 
    showForm: false, 
    isEdit: false, 
    editUrl: '', 
    formName: '', 
    formSlug: '', 
    formTagline: '', 
    formSort: 0, 
    formActive: true,
    openCreate() {
        this.isEdit = false;
        this.editUrl = '{{ route('admin.categories.store') }}';
        this.formName = '';
        this.formSlug = '';
        this.formTagline = '';
        this.formSort = {{ $categories->count() + 1 }};
        this.formActive = true;
        this.showForm = true;
        this.$nextTick(() => { document.getElementById('categoryNameInput')?.focus(); });
    },
    openEdit(cat) {
        this.isEdit = true;
        this.editUrl = '/admin/categories/' + cat.id;
        this.formName = cat.name;
        this.formSlug = cat.slug;
        this.formTagline = cat.tagline || '';
        this.formSort = cat.sort_order;
        this.formActive = Boolean(cat.is_active);
        this.showForm = true;
        this.$nextTick(() => { document.getElementById('categoryNameInput')?.focus(); });
    }
}">
    <!-- Top Action Bar -->
    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2">
                <h2 class="h5 fw-bold text-ink m-0">Menu Categories</h2>
                <span class="admin-badge admin-badge-neutral">{{ $categories->count() }} Categories</span>
            </div>
            <p class="text-ink-50 m-0 mt-1" style="font-size: 12px;">Create and manage sections displayed on Hari Om digital menu.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.menu.index') }}" class="btn-admin-secondary">
                <svg style="width: 0.95rem; height: 0.95rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span>View Menu Dishes</span>
            </a>
            <button type="button" class="btn-admin-primary" @click="openCreate()">
                <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Add Category</span>
            </button>
        </div>
    </div>

    <!-- Create / Edit Category Modal / Drawer -->
    <div x-show="showForm" 
         x-transition:enter="transition ease-out duration-250"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         class="admin-card p-4 mb-4 border border-saffron-30 shadow-md"
         style="background: #ffffff; border-left: 4px solid #d97706 !important;"
         x-cloak>
        <div class="d-flex align-items-center justify-content-between pb-3 border-bottom border-ink-10 mb-3">
            <h3 class="h6 fw-bold text-ink m-0" x-text="isEdit ? 'Edit Category' : 'Create New Menu Category'"></h3>
            <button type="button" @click="showForm = false" class="btn p-1 text-ink-50 hover-text-ink border-0 bg-transparent">
                <svg style="width: 1.2rem; height: 1.2rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form :action="editUrl" method="POST" class="d-flex flex-column gap-3">
            @csrf
            <template x-if="isEdit">
                <input type="hidden" name="_method" value="PUT">
            </template>

            <div class="row g-3">
                <div class="col-12 col-md-5">
                    <label class="admin-label">Category Name *</label>
                    <input type="text" name="name" id="categoryNameInput" x-model="formName" required placeholder="e.g. Vegetarian Specialties" class="admin-input" />
                </div>
                <div class="col-12 col-md-4">
                    <label class="admin-label">Slug (Optional)</label>
                    <input type="text" name="slug" x-model="formSlug" placeholder="e.g. vegetarian-specialties" class="admin-input" />
                    <span class="text-ink-40 mt-1 d-block" style="font-size: 10.5px;">Auto-generated from name if left blank</span>
                </div>
                <div class="col-12 col-md-3">
                    <label class="admin-label">Sort Order</label>
                    <input type="number" name="sort_order" x-model="formSort" class="admin-input" />
                </div>
            </div>

            <div>
                <label class="admin-label">Tagline or Subtitle</label>
                <input type="text" name="tagline" x-model="formTagline" placeholder="e.g. Cooked in traditional clay tandoor oven" class="admin-input" />
            </div>

            <div class="p-3 rounded-3 border border-ink-10 bg-paper-dark d-flex align-items-center justify-content-between">
                <div>
                    <label class="d-block fw-semibold text-ink m-0" style="font-size: 13px;">Active on Digital Menu</label>
                    <span class="text-ink-50" style="font-size: 11px;">Show this category and its dishes to website guests</span>
                </div>
                <div class="form-check form-switch fs-5 m-0">
                    <input type="hidden" name="is_active" value="0" />
                    <input class="form-check-input cursor-pointer" type="checkbox" name="is_active" value="1" :checked="formActive" id="categoryActiveSwitch" />
                </div>
            </div>

            <div class="d-flex align-items-center gap-2.5 pt-2">
                <button type="submit" class="btn-admin-primary">
                    <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span x-text="isEdit ? 'Save Changes' : 'Create Category'"></span>
                </button>
                <button type="button" @click="showForm = false" class="btn-admin-secondary">
                    Cancel
                </button>
            </div>
        </form>
    </div>

    <!-- Desktop Data Table View -->
    <div class="d-none d-md-block admin-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background-color: #faf6ee;">
                    <tr class="border-bottom border-ink-10 text-uppercase tracking-wider-custom text-ink-50" style="font-size: 10.5px;">
                        <th class="py-3.5 px-4" style="width: 32%;">Category Name</th>
                        <th class="py-3.5 px-3">Tagline</th>
                        <th class="py-3.5 px-3 text-center">Dishes Count</th>
                        <th class="py-3.5 px-3 text-center">Sort Order</th>
                        <th class="py-3.5 px-3">Status</th>
                        <th class="py-3.5 px-4 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody style="font-size: 13px;">
                    @forelse($categories as $category)
                        <tr class="transition-colors">
                            <td class="py-3 px-4">
                                <div class="d-flex align-items-center gap-2.5">
                                    <div class="rounded-3 bg-saffron bg-opacity-10 text-saffron fw-bold d-flex align-items-center justify-content-center flex-shrink-0" style="width: 36px; height: 36px; font-size: 12px;">
                                        #{{ $category->sort_order }}
                                    </div>
                                    <div>
                                        <span class="fw-semibold text-ink d-block">{{ $category->name }}</span>
                                        <span class="text-ink-40 d-block" style="font-size: 11px;">slug: {{ $category->slug }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-3 text-ink-60" style="font-size: 12px;">
                                {{ $category->tagline ?: '—' }}
                            </td>
                            <td class="py-3 px-3 text-center">
                                <span class="admin-badge admin-badge-neutral fw-bold">
                                    {{ $category->menu_items_count }} {{ Str::plural('Dish', $category->menu_items_count) }}
                                </span>
                            </td>
                            <td class="py-3 px-3 text-center text-ink-60 font-monospace" style="font-size: 12px;">
                                {{ $category->sort_order }}
                            </td>
                            <td class="py-3 px-3">
                                <span class="admin-badge {{ $category->is_active ? 'admin-badge-success' : 'admin-badge-danger' }}">
                                    <span class="rounded-full" style="width: 5px; height: 5px; background-color: currentColor;"></span>
                                    {{ $category->is_active ? 'Active' : 'Hidden' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-end">
                                <div class="d-inline-flex align-items-center gap-1.5">
                                    <button type="button" 
                                            class="btn-admin-action btn-admin-edit"
                                            @click="openEdit({{ json_encode($category) }})">
                                        <svg style="width: 0.85rem; height: 0.85rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                        <span>Edit</span>
                                    </button>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline m-0" onsubmit="return confirm('Delete this category? (Only empty categories can be deleted)');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-admin-action btn-admin-delete" {{ $category->menu_items_count > 0 ? 'title="Category has assigned items"' : '' }}>
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
                                No categories created yet. Click "+ Add Category" to start.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Mobile Card View -->
    <div class="d-block d-md-none">
        @forelse($categories as $category)
            <div class="admin-mobile-item-card">
                <div class="d-flex align-items-start justify-content-between gap-2">
                    <div>
                        <h3 class="h6 fw-bold text-ink m-0">{{ $category->name }}</h3>
                        <span class="text-ink-40 d-block mt-0.5" style="font-size: 11px;">slug: {{ $category->slug }}</span>
                    </div>
                    <span class="admin-badge {{ $category->is_active ? 'admin-badge-success' : 'admin-badge-danger' }}" style="font-size: 9.5px;">
                        {{ $category->is_active ? 'Active' : 'Hidden' }}
                    </span>
                </div>

                @if($category->tagline)
                    <p class="text-ink-60 m-0 mt-2" style="font-size: 12px;">{{ $category->tagline }}</p>
                @endif

                <div class="d-flex align-items-center gap-2 mt-2 pt-2 border-top border-ink-10">
                    <span class="admin-badge admin-badge-warning fw-bold" style="font-size: 9.5px;">
                        {{ $category->menu_items_count }} {{ Str::plural('Dish', $category->menu_items_count) }}
                    </span>
                    <span class="admin-badge admin-badge-neutral" style="font-size: 9.5px;">
                        Sort: #{{ $category->sort_order }}
                    </span>
                </div>

                <div class="admin-mobile-btn-row">
                    <button type="button" 
                            class="btn-admin-action btn-admin-edit"
                            @click="openEdit({{ json_encode($category) }})">
                        <svg style="width: 0.95rem; height: 0.95rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        <span>Edit Category</span>
                    </button>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="flex-grow-1 m-0 d-flex" onsubmit="return confirm('Delete this category? (Must have 0 items)');">
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
                No categories found.
            </div>
        @endforelse
    </div>
</div>
@endsection
