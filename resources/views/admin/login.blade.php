<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login · Hari Om Cuisine of India</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-ink d-flex min-vh-100 align-items-center justify-content-center p-3 text-paper">
    <div class="w-100 rounded-sm p-4 p-sm-5 shadow-lg border border-white-10 text-paper max-w-md" style="background-color: #1e1e1e;">
        <div class="text-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto object-contain" style="height: 3rem; width: auto;" />
            <h1 class="mt-3 font-display fs-3 text-paper m-0">Staff & Owner Portal</h1>
            <p class="mt-1 small text-white-40 m-0">Hari Om Cuisine of India · Fairbanks</p>
        </div>

        @if($errors->any())
            <div class="mt-4 rounded-sm border p-3 small" style="background-color: rgba(69, 10, 10, 0.6); border-color: rgba(153, 27, 27, 0.4); color: #fecaca;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="mt-4 d-flex flex-column gap-3">
            @csrf
            <div>
                <label class="d-block text-uppercase tracking-widest-custom text-white-60 mb-1" style="font-size: 10px;">Email Address</label>
                <input type="email" name="email" value="{{ old('email', 'admin@hariombites.com') }}" required
                       class="form-control form-control-sm border-white-15 text-white" style="background-color: rgba(0,0,0,0.4);" />
            </div>

            <div>
                <label class="d-block text-uppercase tracking-widest-custom text-white-60 mb-1" style="font-size: 10px;">Password</label>
                <input type="password" name="password" value="password123" required
                       class="form-control form-control-sm border-white-15 text-white" style="background-color: rgba(0,0,0,0.4);" />
            </div>

            <div class="d-flex align-items-center justify-content-between small text-white-60 pt-1">
                <label class="d-flex align-items-center gap-2 cursor-pointer m-0">
                    <input type="checkbox" name="remember" class="form-check-input mt-0" />
                    <span>Remember me</span>
                </label>
            </div>

            <button type="submit"
                    class="mt-3 w-100 rounded-full bg-saffron py-2.5 text-uppercase tracking-widest-custom text-ink fw-semibold transition-colors border-0"
                    style="font-size: 11px;">
                Sign In to Dashboard
            </button>
        </form>

        <div class="mt-4 pt-3 border-top border-white-10 text-center small text-white-40">
            <a href="{{ route('home') }}" class="text-decoration-none text-white-40 hover-text-white transition-colors">← Back to Public Website</a>
        </div>
    </div>
</body>
</html>
