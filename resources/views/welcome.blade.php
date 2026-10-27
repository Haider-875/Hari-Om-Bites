@extends('layouts.app')

@section('content')
<div class="min-vh-100 bg-paper d-flex align-items-center justify-content-center p-4">
    <div class="text-center max-w-lg">
        <h1 class="font-display text-ember display-title-hero">Hari Om Cuisine of India</h1>
        <p class="mt-3 text-ink-60">Authentic Punjabi flavors in Fairbanks, Alaska.</p>
        <div class="mt-4 d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3">
            <a href="{{ route('home') }}" class="btn-primary">Go to Home</a>
            <a href="{{ route('menu') }}" class="btn-primary">View Menu</a>
        </div>
    </div>
</div>
@endsection
