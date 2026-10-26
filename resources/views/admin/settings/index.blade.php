@extends('admin.layout', ['title' => 'Restaurant Information & Settings'])

@section('content')
    <div class="max-w-2xl bg-paper p-8 rounded-sm border border-ink/10 shadow-sm">
        <h2 class="text-base font-semibold text-ink border-b border-ink/10 pb-4 mb-6">General Information</h2>

        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-5 text-xs">
            @csrf

            @foreach($settings as $setting)
                <div>
                    <label class="block uppercase tracking-wider text-ink/60 mb-1">{{ str_replace('_', ' ', $setting->key) }}</label>
                    <input type="text" name="{{ $setting->key }}" value="{{ old($setting->key, $setting->value) }}"
                           class="w-full rounded-sm border border-ink/20 p-2.5 bg-white text-xs" />
                </div>
            @endforeach

            <div class="pt-4 border-t border-ink/10">
                <button type="submit" class="rounded-sm bg-terracotta px-6 py-2.5 uppercase tracking-wider text-paper hover:bg-ink font-medium">
                    Save Restaurant Settings
                </button>
            </div>
        </form>
    </div>
@endsection
