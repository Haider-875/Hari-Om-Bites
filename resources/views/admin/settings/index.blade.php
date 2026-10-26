@extends('admin.layout', ['title' => 'Restaurant Information & Settings'])

@section('content')
    <div class="max-w-2xl bg-paper p-4 p-sm-5 rounded-sm border border-ink-10 shadow-sm">
        <h2 class="fs-6 fw-semibold text-ink border-bottom border-ink-10 pb-3 mb-4">General Information</h2>

        <form action="{{ route('admin.settings.update') }}" method="POST" class="d-flex flex-column gap-3 small">
            @csrf

            @foreach($settings as $setting)
                <div>
                    <label class="d-block text-uppercase tracking-wider-custom text-ink-60 mb-1" style="font-size: 10px;">{{ str_replace('_', ' ', $setting->key) }}</label>
                    <input type="text" name="{{ $setting->key }}" value="{{ old($setting->key, $setting->value) }}"
                           class="form-control form-control-sm border-ink-20 bg-white" />
                </div>
            @endforeach

            <div class="pt-3 border-top border-ink-10">
                <button type="submit" class="rounded-sm bg-terracotta px-4 py-2 text-uppercase tracking-wider-custom text-paper border-0 fw-medium" style="font-size: 11px;">
                    Save Restaurant Settings
                </button>
            </div>
        </form>
    </div>
@endsection
