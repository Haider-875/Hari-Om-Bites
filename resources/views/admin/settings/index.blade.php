@extends('admin.layout', ['title' => 'Restaurant Information & Settings'])

@section('content')
    <div class="admin-form-card mx-auto">
        <div class="d-flex align-items-center justify-content-between border-bottom border-ink-10 pb-3 mb-4">
            <div>
                <h2 class="h5 fw-bold text-ink m-0">Restaurant Settings & Details</h2>
                <p class="text-ink-50 m-0 mt-0.5" style="font-size: 12px;">Update public contact info, schedule hours, and location data</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn-admin-secondary" style="min-height: 32px; font-size: 11px;">
                Dashboard
            </a>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST" class="d-flex flex-column gap-3.5">
            @csrf

            <div class="row g-3">
                @foreach($settings as $setting)
                    @php
                        $key = $setting->key;
                        $label = ucwords(str_replace('_', ' ', $key));
                        $isTextarea = in_array($key, ['address', 'hours', 'notice', 'announcement']);
                    @endphp

                    <div class="{{ $isTextarea ? 'col-12' : 'col-12 col-md-6' }}">
                        <label class="admin-label d-flex align-items-center justify-content-between">
                            <span>{{ $label }}</span>
                            <span class="text-ink-40 fw-normal" style="font-size: 9.5px;">{{ $key }}</span>
                        </label>
                        
                        @if($isTextarea)
                            <textarea name="{{ $key }}" rows="2" class="admin-textarea">{{ old($key, $setting->value) }}</textarea>
                        @else
                            <input type="text" name="{{ $key }}" value="{{ old($key, $setting->value) }}" class="admin-input" />
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="pt-4 border-top border-ink-10 mt-2 d-flex flex-column flex-sm-row align-items-center justify-content-between gap-3">
                <button type="submit" class="btn-admin-primary w-100 w-sm-auto">
                    <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>
                    <span>Save Restaurant Settings</span>
                </button>
                <a href="{{ route('admin.dashboard') }}" class="btn-admin-secondary w-100 w-sm-auto text-center">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
