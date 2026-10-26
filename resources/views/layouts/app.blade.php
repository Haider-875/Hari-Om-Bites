<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Hari Om Cuisine of India · Fairbanks, Alaska' }}</title>
    <meta name="description" content="Hari Om Cuisine of India - traditional Indian cooking in Fairbanks, Alaska. Dine in, take out and catering on S Cushman St. Call +1 907-328-3218.">
    <meta name="theme-color" content="#171717">

    <!-- Open Graph / Meta -->
    <meta property="og:title" content="Hari Om Cuisine of India · Fairbanks, Alaska">
    <meta property="og:description" content="From the tandoor to the thali - a complete menu of Indian appetizers, curries, biryanis, breads, wine and beer in Fairbanks, Alaska.">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">

    <!-- Google Fonts Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-paper font-sans text-ink antialiased selection:bg-saffron selection:text-ink">

    <!-- Global Header / Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main>
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <!-- Global Footer -->
    @include('components.footer')

    <!-- Notification Toast if any -->
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-2"
             class="fixed bottom-6 left-6 z-50 flex items-center gap-3 rounded-sm bg-ink px-5 py-4 text-xs tracking-wider text-paper shadow-2xl border border-saffron/40">
            <svg class="h-4 w-4 text-saffron shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="ml-2 text-white/50 hover:text-white">&times;</button>
        </div>
    @endif

</body>
</html>
