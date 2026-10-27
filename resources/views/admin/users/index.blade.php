@extends('admin.layout', ['title' => 'Staff & Role Assignments'])

@section('content')
<div x-data="{
    showForm: false,
    isEdit: false,
    editUrl: '',
    formName: '',
    formEmail: '',
    formPassword: '',
    formRole: 'Store Manager',
    formPhone: '',
    formActive: true,
    openCreate() {
        this.isEdit = false;
        this.editUrl = '{{ route('admin.users.store') }}';
        this.formName = '';
        this.formEmail = '';
        this.formPassword = '';
        this.formRole = 'Store Manager';
        this.formPhone = '';
        this.formActive = true;
        this.showForm = true;
        this.$nextTick(() => { document.getElementById('userNameInput')?.focus(); });
    },
    openEdit(u) {
        this.isEdit = true;
        this.editUrl = '/admin/users/' + u.id;
        this.formName = u.name;
        this.formEmail = u.email;
        this.formPassword = '';
        this.formRole = u.role || 'Store Manager';
        this.formPhone = u.phone || '';
        this.formActive = Boolean(u.is_active);
        this.showForm = true;
        this.$nextTick(() => { document.getElementById('userNameInput')?.focus(); });
    }
}">
    <!-- Top Action Bar -->
    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-2">
                <h2 class="h5 fw-bold text-ink m-0">Staff & Role Assignments</h2>
                <span class="admin-badge admin-badge-neutral">{{ $users->count() }} Team Members</span>
            </div>
            <p class="text-ink-50 m-0 mt-1" style="font-size: 12px;">Assign roles, manage staff credentials, and configure store access permissions.</p>
        </div>
        <button type="button" class="btn-admin-primary" @click="openCreate()">
            <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
            <span>Add Team Member</span>
        </button>
    </div>

    <!-- Create / Edit Staff Member Drawer / Form -->
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
            <h3 class="h6 fw-bold text-ink m-0" x-text="isEdit ? 'Edit Staff Member & Role' : 'Add New Team Member & Assign Role'"></h3>
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
                <div class="col-12 col-md-6">
                    <label class="admin-label">Full Name *</label>
                    <input type="text" name="name" id="userNameInput" x-model="formName" required placeholder="e.g. Vikram Singh" class="admin-input" />
                </div>
                <div class="col-12 col-md-6">
                    <label class="admin-label">Email Address *</label>
                    <input type="email" name="email" x-model="formEmail" required placeholder="e.g. vikram@hariombites.com" class="admin-input" />
                </div>
            </div>

            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <label class="admin-label">Assign Store Role *</label>
                    <select name="role" x-model="formRole" required class="admin-select">
                        <option value="Owner / General Manager">Owner / General Manager</option>
                        <option value="Store Manager">Store Manager</option>
                        <option value="Kitchen Chef / Head Cook">Kitchen Chef / Head Cook</option>
                        <option value="Cashier / Front Counter">Cashier / Front Counter</option>
                        <option value="Waitstaff / Server">Waitstaff / Server</option>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label class="admin-label">Phone Number</label>
                    <input type="text" name="phone" x-model="formPhone" placeholder="e.g. (907) 450-9876" class="admin-input" />
                </div>
            </div>

            <div>
                <label class="admin-label" x-text="isEdit ? 'Password (Leave blank to keep unchanged)' : 'Account Password *'"></label>
                <input type="password" name="password" x-model="formPassword" :required="!isEdit" placeholder="Min. 6 characters" class="admin-input" />
            </div>

            <div class="p-3 rounded-3 border border-ink-10 bg-paper-dark d-flex align-items-center justify-content-between">
                <div>
                    <label class="d-block fw-semibold text-ink m-0" style="font-size: 13px;">Active Store Account</label>
                    <span class="text-ink-50" style="font-size: 11px;">Allow this user to sign in to the management portal</span>
                </div>
                <div class="form-check form-switch fs-5 m-0">
                    <input type="hidden" name="is_active" value="0" />
                    <input class="form-check-input cursor-pointer" type="checkbox" name="is_active" value="1" :checked="formActive" id="userActiveSwitch" />
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center gap-2.5 pt-2">
                <button type="submit" class="btn-admin-primary" style="min-height: 40px; font-size: 11.5px;">
                    <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span x-text="isEdit ? 'Save Changes' : 'Create & Assign Role'"></span>
                </button>
                <button type="button" @click="showForm = false" class="btn-admin-secondary text-center" style="min-height: 40px; font-size: 11.5px;">
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
                        <th class="py-3.5 px-4" style="width: 30%;">Team Member</th>
                        <th class="py-3.5 px-3">Assigned Role</th>
                        <th class="py-3.5 px-3">Contact</th>
                        <th class="py-3.5 px-3">Status</th>
                        <th class="py-3.5 px-3">Joined Date</th>
                        <th class="py-3.5 px-4 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody style="font-size: 13px;">
                    @forelse($users as $user)
                        @php
                            $roleName = $user->role ?? 'Store Manager';
                            $isOwner = str_contains(strtolower($roleName), 'owner');
                            $isChef = str_contains(strtolower($roleName), 'chef') || str_contains(strtolower($roleName), 'cook');
                        @endphp
                        <tr class="transition-colors">
                            <td class="py-3 px-4">
                                <span class="fw-semibold text-ink d-block">{{ $user->name }}</span>
                                <span class="text-ink-50 d-block" style="font-size: 11.5px;">{{ $user->email }}</span>
                            </td>
                            <td class="py-3 px-3">
                                <span class="admin-badge {{ $isOwner ? 'admin-badge-warning' : ($isChef ? 'admin-badge-success' : 'admin-badge-neutral') }} fw-semibold">
                                    {{ $roleName }}
                                </span>
                            </td>
                            <td class="py-3 px-3 text-ink-60" style="font-size: 12px;">
                                {{ $user->phone ?: '—' }}
                            </td>
                            <td class="py-3 px-3">
                                <span class="admin-badge {{ $user->is_active ? 'admin-badge-success' : 'admin-badge-danger' }}">
                                    <span class="rounded-full" style="width: 5px; height: 5px; background-color: currentColor;"></span>
                                    {{ $user->is_active ? 'Active' : 'Disabled' }}
                                </span>
                            </td>
                            <td class="py-3 px-3 text-ink-50" style="font-size: 11.5px;">
                                {{ $user->created_at ? $user->created_at->format('M d, Y') : '—' }}
                            </td>
                            <td class="py-3 px-4 text-end">
                                <div class="d-inline-flex align-items-center gap-2">
                                    <button type="button" 
                                            class="btn-admin-action btn-admin-edit"
                                            @click="openEdit({{ json_encode($user) }})">
                                        <svg style="width: 0.75rem; height: 0.75rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                        <span>Edit Role</span>
                                    </button>
                                    @if(Auth::id() !== $user->id)
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline m-0" onsubmit="return confirm('Delete this staff member?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-admin-action btn-admin-delete">
                                                <svg style="width: 0.75rem; height: 0.75rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-5 text-center text-ink-40">
                                No staff members configured.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Mobile Card View -->
    <div class="d-block d-md-none">
        @forelse($users as $user)
            @php
                $roleName = $user->role ?? 'Store Manager';
                $isOwner = str_contains(strtolower($roleName), 'owner');
                $isChef = str_contains(strtolower($roleName), 'chef') || str_contains(strtolower($roleName), 'cook');
            @endphp
            <div class="admin-mobile-item-card">
                <div class="d-flex align-items-start justify-content-between gap-2">
                    <div>
                        <h3 class="h6 fw-bold text-ink m-0">{{ $user->name }}</h3>
                        <span class="text-ink-50 d-block mt-0.5" style="font-size: 11.5px;">{{ $user->email }}</span>
                    </div>
                    <span class="admin-badge {{ $isOwner ? 'admin-badge-warning' : ($isChef ? 'admin-badge-success' : 'admin-badge-neutral') }}" style="font-size: 9.5px;">
                        {{ $roleName }}
                    </span>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-3 mt-2 pt-2 border-top border-ink-10" style="font-size: 11.5px;">
                    <span class="admin-badge {{ $user->is_active ? 'admin-badge-success' : 'admin-badge-danger' }}" style="font-size: 9px;">
                        {{ $user->is_active ? 'Active' : 'Disabled' }}
                    </span>
                    @if($user->phone)
                        <span class="text-ink-60">📞 {{ $user->phone }}</span>
                    @endif
                </div>

                <div class="admin-mobile-btn-row">
                    <button type="button" 
                            class="btn-admin-action btn-admin-edit"
                            @click="openEdit({{ json_encode($user) }})">
                        <svg style="width: 0.95rem; height: 0.95rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        <span>Edit Role</span>
                    </button>
                    @if(Auth::id() !== $user->id)
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="flex-grow-1 m-0 d-flex" onsubmit="return confirm('Delete this staff member?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-admin-action btn-admin-delete w-100">
                                <svg style="width: 0.95rem; height: 0.95rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                <span>Delete</span>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="admin-card p-5 text-center text-ink-40">
                No staff members found.
            </div>
        @endforelse
    </div>
</div>
@endsection
