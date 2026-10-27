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
<body class="bg-ink d-flex min-vh-100 align-items-center justify-content-center p-3 p-sm-4 text-paper position-relative overflow-hidden" 
      style="background: radial-gradient(circle at 50% 20%, #261f18 0%, #141414 70%, #0d0d0d 100%);"
      x-data="{ showPassword: false }">
    
    <!-- Background Subtle Aura -->
    <div class="position-absolute rounded-full pointer-events-none" style="top: 10%; width: 450px; height: 450px; background: radial-gradient(circle, rgba(217, 119, 6, 0.12) 0%, transparent 70%); filter: blur(50px);"></div>

    <div class="w-100 rounded-4 p-4 p-sm-5 shadow-2xl border border-white-15 text-paper max-w-md position-relative z-1" style="background-color: rgba(26, 26, 26, 0.95); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); box-shadow: 0 20px 50px rgba(0,0,0,0.6), 0 0 0 1px rgba(255,255,255,0.06);">
        <!-- Header Branding & Text with Spacing -->
        <div class="text-center mb-4">
            <a href="{{ route('home') }}" class="d-inline-block mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="Hari Om Logo" class="mx-auto object-contain hover-scale-104 transition-transform" style="height: 3.5rem; width: auto;" />
            </a>
            <h1 class="font-display fs-2 text-paper m-0 fw-bold mb-1.5" style="letter-spacing: -0.01em;">Management Console</h1>
            <p class="small text-white-50 m-0" style="font-size: 11.5px; letter-spacing: 0.08em;">Hari Om Cuisine of India · Staff & Owner Portal</p>
        </div>

        @if($errors->any())
            <div class="mb-4 rounded-3 border p-3 small d-flex align-items-center gap-2" style="background-color: rgba(69, 10, 10, 0.7); border-color: rgba(239, 68, 68, 0.4); color: #fecaca; animation: adminFadeIn 0.3s ease;">
                <svg style="width: 1.15rem; height: 1.15rem; flex-shrink: 0;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="d-flex flex-column gap-3.5 mt-2">
            @csrf

            <!-- Email Address Field -->
            <div class="mb-1">
                <label class="d-block text-uppercase tracking-wider-custom text-white-70 mb-2 fw-semibold" style="font-size: 11px;">
                    Email Address
                </label>
                <div class="position-relative">
                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-white-40 pointer-events-none d-flex align-items-center">
                        <svg style="width: 1.05rem; height: 1.05rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </span>
                    <input type="email" 
                           name="email" 
                           value="{{ old('email', 'admin@hariombites.com') }}" 
                           required
                           placeholder="admin@hariombites.com"
                           class="form-control text-white border-white-15 rounded-3 py-2.5" 
                           style="background-color: rgba(0,0,0,0.5); font-size: 13.5px; padding-left: 2.75rem !important; padding-right: 1rem; min-height: 44px; transition: border-color 0.25s, box-shadow 0.25s;"
                           onfocus="this.style.borderColor='#d97706'; this.style.boxShadow='0 0 0 3px rgba(217, 119, 6, 0.25)';"
                           onblur="this.style.borderColor='rgba(255,255,255,0.15)'; this.style.boxShadow='none';" />
                </div>
            </div>

            <!-- Password Field with Show/Hide Eye Toggle -->
            <div class="mb-1">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <label class="d-block text-uppercase tracking-wider-custom text-white-70 m-0 fw-semibold" style="font-size: 11px;">
                        Password
                    </label>
                </div>
                <div class="position-relative">
                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-white-40 pointer-events-none d-flex align-items-center">
                        <svg style="width: 1.05rem; height: 1.05rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                    <input :type="showPassword ? 'text' : 'password'" 
                           name="password" 
                           value="password123" 
                           required
                           placeholder="••••••••"
                           class="form-control text-white border-white-15 rounded-3 py-2.5" 
                           style="background-color: rgba(0,0,0,0.5); font-size: 13.5px; padding-left: 2.75rem !important; padding-right: 2.85rem !important; min-height: 44px; transition: border-color 0.25s, box-shadow 0.25s;"
                           onfocus="this.style.borderColor='#d97706'; this.style.boxShadow='0 0 0 3px rgba(217, 119, 6, 0.25)';"
                           onblur="this.style.borderColor='rgba(255,255,255,0.15)'; this.style.boxShadow='none';" />
                    
                    <!-- Eye Toggle Button -->
                    <button type="button" 
                            @click="showPassword = !showPassword" 
                            class="btn position-absolute top-50 end-0 translate-middle-y border-0 bg-transparent text-white-50 hover-text-white d-flex align-items-center justify-content-center p-2 me-1.5 cursor-pointer transition-colors"
                            style="width: 34px; height: 34px;"
                            title="Toggle password visibility">
                        <svg style="width: 1.1rem; height: 1.1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!showPassword">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg style="width: 1.1rem; height: 1.1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="showPassword" x-cloak>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Keep Me Signed In -->
            <div class="d-flex align-items-center justify-content-between small text-white-70 my-1">
                <label class="d-flex align-items-center gap-2 cursor-pointer m-0">
                    <input type="checkbox" name="remember" class="form-check-input mt-0" />
                    <span style="font-size: 12px;">Keep me signed in</span>
                </label>
            </div>

            <!-- Sign In Submit Button -->
            <button type="submit" class="btn-admin-primary mt-2.5 py-2.5 w-100" style="min-height: 44px; font-size: 12.5px; letter-spacing: 0.08em;">
                <svg style="width: 1.05rem; height: 1.05rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013 3h7a3 3 0 013 3v1" />
                </svg>
                <span>Sign In</span>
            </button>
        </form>

        <div class="mt-4 pt-3.5 border-top border-white-10 text-center small text-white-50">
            <a href="{{ route('home') }}" class="text-decoration-none text-white-60 hover-text-saffron transition-colors d-inline-flex align-items-center gap-1.5" style="font-size: 12px;">
                <span>←</span>
                <span>Return to Hari Om Public Website</span>
            </a>
        </div>
    </div>
</body>
</html>
