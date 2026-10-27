<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Admin Login · Hari Om Cuisine of India</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-ink d-flex min-vh-100 align-items-center justify-content-center p-3 p-sm-4 text-paper position-relative overflow-hidden" style="background: radial-gradient(circle at 50% 20%, #261f18 0%, #141414 70%, #0d0d0d 100%);">
    
    <!-- Background Subtle Aura -->
    <div class="position-absolute rounded-full pointer-events-none" style="top: 10%; width: 450px; height: 450px; background: radial-gradient(circle, rgba(217, 119, 6, 0.12) 0%, transparent 70%); filter: blur(50px);"></div>

    <div class="w-100 rounded-4 p-4 p-sm-5 shadow-2xl border border-white-15 text-paper max-w-md position-relative z-1" style="background-color: rgba(26, 26, 26, 0.95); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); box-shadow: 0 20px 50px rgba(0,0,0,0.6), 0 0 0 1px rgba(255,255,255,0.06);">
        <div class="text-center">
            <a href="{{ route('home') }}" class="d-inline-block">
                <img src="{{ asset('images/logo.png') }}" alt="Hari Om Logo" class="mx-auto object-contain hover-scale-104 transition-transform" style="height: 3.5rem; width: auto;" />
            </a>
            <h1 class="mt-3 font-display fs-2 text-paper m-0 fw-bold">Management Console</h1>
            <p class="mt-1 small text-white-50 m-0" style="font-size: 11.5px; letter-spacing: 0.08em;">Hari Om Cuisine of India · Staff & Owner Portal</p>
        </div>

        @if($errors->any())
            <div class="mt-4 rounded-3 border p-3 small d-flex align-items-center gap-2" style="background-color: rgba(69, 10, 10, 0.7); border-color: rgba(239, 68, 68, 0.4); color: #fecaca; animation: adminFadeIn 0.3s ease;">
                <svg style="width: 1.15rem; height: 1.15rem; flex-shrink: 0;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="mt-4 d-flex flex-column gap-3.5">
            @csrf
            <div>
                <label class="d-block text-uppercase tracking-wider-custom text-white-70 mb-1.5 fw-semibold" style="font-size: 10.5px;">Email Address</label>
                <div class="position-relative">
                    <input type="email" name="email" value="{{ old('email', 'admin@hariombites.com') }}" required
                           class="form-control text-white border-white-15 rounded-3 py-2.5 px-3" 
                           style="background-color: rgba(0,0,0,0.45); font-size: 14px; transition: border-color 0.25s, box-shadow 0.25s;"
                           onfocus="this.style.borderColor='#d97706'; this.style.boxShadow='0 0 0 3px rgba(217, 119, 6, 0.2)';"
                           onblur="this.style.borderColor='rgba(255,255,255,0.15)'; this.style.boxShadow='none';" />
                </div>
            </div>

            <div>
                <label class="d-block text-uppercase tracking-wider-custom text-white-70 mb-1.5 fw-semibold" style="font-size: 10.5px;">Password</label>
                <div class="position-relative">
                    <input type="password" name="password" value="password123" required
                           class="form-control text-white border-white-15 rounded-3 py-2.5 px-3" 
                           style="background-color: rgba(0,0,0,0.45); font-size: 14px; transition: border-color 0.25s, box-shadow 0.25s;"
                           onfocus="this.style.borderColor='#d97706'; this.style.boxShadow='0 0 0 3px rgba(217, 119, 6, 0.2)';"
                           onblur="this.style.borderColor='rgba(255,255,255,0.15)'; this.style.boxShadow='none';" />
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between small text-white-70 pt-1">
                <label class="d-flex align-items-center gap-2 cursor-pointer m-0">
                    <input type="checkbox" name="remember" class="form-check-input mt-0" />
                    <span style="font-size: 12px;">Keep me signed in</span>
                </label>
            </div>

            <button type="submit" class="btn-admin-primary mt-2 py-2.5 w-100" style="min-height: 44px; font-size: 12px; letter-spacing: 0.12em;">
                <svg style="width: 1.1rem; height: 1.1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                <span>Sign In to Dashboard</span>
            </button>
        </form>

        <div class="mt-4 pt-3 border-top border-white-10 text-center small text-white-50">
            <a href="{{ route('home') }}" class="text-decoration-none text-white-60 hover-text-saffron transition-colors d-inline-flex align-items-center gap-1.5" style="font-size: 12px;">
                <span>←</span>
                <span>Return to Hari Om Public Website</span>
            </a>
        </div>
    </div>
</body>
</html>
