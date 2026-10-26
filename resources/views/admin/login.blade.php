<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login · Hari Om Cuisine of India</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-ink flex min-h-screen items-center justify-center p-6 text-paper">
    <div class="w-full max-w-md rounded-sm bg-[#1e1e1e] p-8 shadow-2xl border border-white/10">
        <div class="text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto h-12 w-auto object-contain" />
            <h1 class="mt-4 font-display text-2xl text-paper">Staff & Owner Portal</h1>
            <p class="mt-1 text-xs text-white/40">Hari Om Cuisine of India · Fairbanks</p>
        </div>

        @if($errors->any())
            <div class="mt-6 rounded-sm bg-red-950/60 border border-red-800/40 p-3 text-xs text-red-200">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="mt-8 space-y-4">
            @csrf
            <div>
                <label class="block text-[10px] uppercase tracking-widest text-white/60 mb-1.5">Email Address</label>
                <input type="email" name="email" value="{{ old('email', 'admin@hariombites.com') }}" required
                       class="w-full rounded-sm border border-white/15 bg-black/40 px-3.5 py-2.5 text-xs text-white focus:border-saffron focus:outline-none" />
            </div>

            <div>
                <label class="block text-[10px] uppercase tracking-widest text-white/60 mb-1.5">Password</label>
                <input type="password" name="password" value="password123" required
                       class="w-full rounded-sm border border-white/15 bg-black/40 px-3.5 py-2.5 text-xs text-white focus:border-saffron focus:outline-none" />
            </div>

            <div class="flex items-center justify-between text-xs text-white/60 pt-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded border-white/20 bg-black/40 text-saffron focus:ring-0" />
                    <span>Remember me</span>
                </label>
            </div>

            <button type="submit"
                    class="mt-4 w-full rounded-full bg-saffron py-3 text-xs font-semibold uppercase tracking-widest text-ink hover:bg-white transition-colors">
                Sign In to Dashboard
            </button>
        </form>

        <div class="mt-8 pt-4 border-t border-white/10 text-center text-xs text-white/30">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">← Back to Public Website</a>
        </div>
    </div>
</body>
</html>
