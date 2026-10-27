<header 
    x-data="{ 
        scrolled: false, 
        mobileMenuOpen: false,
        init() {
            window.addEventListener('scroll', () => {
                this.scrolled = window.scrollY > 30;
            });
            this.scrolled = window.scrollY > 30;
            this.$watch('mobileMenuOpen', value => {
                document.body.style.overflow = value ? 'hidden' : '';
            });
        }
    }" 
    @keydown.escape.window="mobileMenuOpen = false"
    :class="scrolled ? 'border-bottom border-terracotta-15 bg-paper-95 backdrop-blur-md text-ink shadow-sm' : 'border-bottom border-white-10 bg-transparent text-white'"
    class="position-fixed top-0 start-0 end-0 w-100 transition-all"
    style="z-index: 1030;">
    <div class="max-w-92rem mx-auto d-flex align-items-center justify-content-between px-3 px-sm-4 px-lg-5" style="height: 4.75rem;">
        <!-- Logo -->
        <div class="d-flex align-items-center flex-grow-1" style="flex-basis: 0;">
            <a aria-label="Hari Om Cuisine of India — home" class="d-inline-flex align-items-center text-decoration-none" href="/">
                <img src="/images/logo.png" alt="Hari Om Cuisine of India" width="612" height="311" class="d-block w-auto user-select-none transition-all" style="height: 40px; aspect-ratio: 612 / 311; filter: drop-shadow(0 4px 16px rgba(0,0,0,0.6));">
            </a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="d-none d-lg-flex align-items-center justify-content-center gap-4 flex-shrink-0">
            <a class="nav-link-custom {{ request()->routeIs('home') ? 'active-nav text-saffron' : '' }}"
               :class="scrolled ? 'text-ink-75' : 'text-white-80'"
               href="{{ route('home') }}">
                Home
            </a>
            <a class="nav-link-custom {{ request()->routeIs('story') ? 'active-nav text-saffron' : '' }}"
               :class="scrolled ? 'text-ink-75' : 'text-white-80'"
               href="{{ route('story') }}">
                Our Story
            </a>
            <a class="nav-link-custom {{ request()->routeIs('menu') ? 'active-nav text-saffron' : '' }}"
               :class="scrolled ? 'text-ink-75' : 'text-white-80'"
               href="{{ route('menu') }}">
                Menu
            </a>
            <a class="nav-link-custom {{ request()->routeIs('gallery') ? 'active-nav text-saffron' : '' }}"
               :class="scrolled ? 'text-ink-75' : 'text-white-80'"
               href="{{ route('gallery') }}">
                Gallery
            </a>
            <a class="nav-link-custom"
               :class="scrolled ? 'text-ink-75' : 'text-white-80'"
               href="{{ route('home') }}#experience">
                Experience
            </a>
            <a class="nav-link-custom {{ request()->routeIs('reservations') ? 'active-nav text-saffron' : '' }}"
               :class="scrolled ? 'text-ink-75' : 'text-white-80'"
               href="{{ route('reservations') }}">
                Reservations
            </a>
            <a class="nav-link-custom {{ request()->routeIs('contact') ? 'active-nav text-saffron' : '' }}"
               :class="scrolled ? 'text-ink-75' : 'text-white-80'"
               href="{{ route('contact') }}">
                Visit & Contact
            </a>
        </nav>

        <!-- Action Buttons & Animated Mobile Toggle -->
        <div class="d-flex align-items-center justify-content-end gap-2 gap-sm-3 flex-grow-1" style="flex-basis: 0;">
            <a href="tel:+19073283218" 
               class="d-none d-sm-inline-flex align-items-center gap-2 rounded-pill border px-3 text-uppercase transition-all text-decoration-none"
               style="font-size: 9.5px; letter-spacing: 0.18em; min-height: 36px; padding-top: 0.42rem; padding-bottom: 0.42rem;"
               :class="scrolled ? 'border-ink-20 text-ink' : 'border-white-30 text-white'">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                Call
            </a>
            <a href="{{ route('reservations') }}" 
               class="btn-primary d-none d-md-inline-flex text-decoration-none" style="padding: 0.45rem 1.05rem; font-size: 9.5px; min-height: 36px; letter-spacing: 0.16em;">
                Reservation
            </a>

            <!-- Unique Animated Luxury Hamburger Button (44×44px touch target) -->
            <button type="button" 
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    :aria-expanded="mobileMenuOpen.toString()"
                    aria-label="Toggle navigation menu" 
                    class="luxury-hamburger-btn d-flex d-lg-none"
                    :class="{ 'is-active': mobileMenuOpen, 'on-scrolled': scrolled }">
                <span class="hamburger-box">
                    <span class="hamburger-line line-1"></span>
                    <span class="hamburger-line line-2"></span>
                    <span class="hamburger-line line-3"></span>
                </span>
            </button>
        </div>
    </div>

    <!-- Redesigned Luxury Restaurant Full-Screen Mobile Menu Overlay -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-400"
         x-transition:enter-start="opacity-0 translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-2"
         x-cloak
         class="luxury-mobile-overlay d-lg-none"
         id="luxury-mobile-menu">
        
        <!-- Top Sticky Header of the Overlay (Logo + Close Button) -->
        <div class="luxury-mobile-header d-flex align-items-center justify-content-between px-3 px-sm-4 border-bottom border-white-10">
            <a @click="mobileMenuOpen = false" aria-label="Hari Om Cuisine of India — home" class="d-inline-flex align-items-center text-decoration-none" href="/">
                <img src="/images/logo.png" alt="Hari Om Cuisine of India" width="612" height="311" class="d-block w-auto" style="height: 38px; aspect-ratio: 612 / 311;">
            </a>
            <button type="button" 
                    @click="mobileMenuOpen = false"
                    aria-label="Close navigation menu" 
                    class="luxury-hamburger-btn is-active">
                <span class="hamburger-box">
                    <span class="hamburger-line line-1"></span>
                    <span class="hamburger-line line-2"></span>
                    <span class="hamburger-line line-3"></span>
                </span>
            </button>
        </div>

        <!-- Scrollable Body Container -->
        <div class="luxury-mobile-body px-4 py-4 d-flex flex-column justify-content-between flex-grow-1">
            <!-- Brand Eyebrow -->
            <div class="text-center pt-2 pb-3">
                <p class="text-uppercase text-saffron m-0" style="font-size: 10px; letter-spacing: 0.28em;">
                    Cuisine of India · Fairbanks, Alaska
                </p>
                <div class="luxury-gold-line mx-auto mt-2"></div>
            </div>

            <!-- Spacious Editorial Navigation Links -->
            <nav class="luxury-mobile-nav d-flex flex-column my-auto py-2">
                <!-- 1. Home -->
                <a @click="mobileMenuOpen = false" 
                   href="{{ route('home') }}" 
                   class="luxury-nav-item {{ request()->routeIs('home') ? 'active' : '' }}"
                   style="--i: 0;">
                    <span class="luxury-nav-text">Home</span>
                    @if(request()->routeIs('home'))
                        <span class="luxury-active-badge">✦</span>
                    @endif
                </a>

                <!-- 2. Our Story -->
                <a @click="mobileMenuOpen = false" 
                   href="{{ route('story') }}" 
                   class="luxury-nav-item {{ request()->routeIs('story') ? 'active' : '' }}"
                   style="--i: 1;">
                    <span class="luxury-nav-text">Our Story</span>
                    @if(request()->routeIs('story'))
                        <span class="luxury-active-badge">✦</span>
                    @endif
                </a>

                <!-- 3. Menu -->
                <a @click="mobileMenuOpen = false" 
                   href="{{ route('menu') }}" 
                   class="luxury-nav-item {{ request()->routeIs('menu') ? 'active' : '' }}"
                   style="--i: 2;">
                    <span class="luxury-nav-text">Menu</span>
                    @if(request()->routeIs('menu'))
                        <span class="luxury-active-badge">✦</span>
                    @endif
                </a>

                <!-- 4. Gallery -->
                <a @click="mobileMenuOpen = false" 
                   href="{{ route('gallery') }}" 
                   class="luxury-nav-item {{ request()->routeIs('gallery') ? 'active' : '' }}"
                   style="--i: 3;">
                    <span class="luxury-nav-text">Gallery</span>
                    @if(request()->routeIs('gallery'))
                        <span class="luxury-active-badge">✦</span>
                    @endif
                </a>

                <!-- 5. Experience -->
                <a @click="mobileMenuOpen = false" 
                   href="{{ route('home') }}#experience" 
                   class="luxury-nav-item"
                   style="--i: 4;">
                    <span class="luxury-nav-text">Experience</span>
                </a>

                <!-- 6. Reservations -->
                <a @click="mobileMenuOpen = false" 
                   href="{{ route('reservations') }}" 
                   class="luxury-nav-item {{ request()->routeIs('reservations') ? 'active' : '' }}"
                   style="--i: 5;">
                    <span class="luxury-nav-text">Reservations</span>
                    @if(request()->routeIs('reservations'))
                        <span class="luxury-active-badge">✦</span>
                    @endif
                </a>

                <!-- 7. Visit & Contact -->
                <a @click="mobileMenuOpen = false" 
                   href="{{ route('contact') }}" 
                   class="luxury-nav-item {{ request()->routeIs('contact') ? 'active' : '' }}"
                   style="--i: 6;">
                    <span class="luxury-nav-text">Visit &amp; Contact</span>
                    @if(request()->routeIs('contact'))
                        <span class="luxury-active-badge">✦</span>
                    @endif
                </a>
            </nav>

            <!-- Bottom CTA & Contact Details -->
            <div class="luxury-mobile-footer pt-4 pb-2 border-top border-white-10 text-center">
                <!-- Golden-Yellow CTA Button -->
                <div class="d-flex justify-content-center mb-3">
                    <a @click="mobileMenuOpen = false" 
                       href="{{ route('reservations') }}" 
                       class="btn-primary text-decoration-none"
                       style="min-height: 38px; font-size: 11px; padding: 10px 22px; width: auto; max-width: 210px; letter-spacing: 0.15em;">
                        Book a Table
                    </a>
                </div>

                <!-- Contact & Location Information -->
                <div class="luxury-contact-card d-flex flex-column gap-1">
                    <a href="tel:+19073283218" class="text-saffron fw-medium text-decoration-none hover-text-white transition-colors" style="font-size: 13px; letter-spacing: 0.08em;">
                        +1 907-328-3218
                    </a>
                    <p class="text-white-60 m-0" style="font-size: 11px; letter-spacing: 0.05em;">
                        1528 S Cushman St · Fairbanks, AK 99701
                    </p>
                    <p class="text-white-40 m-0 pt-1" style="font-size: 10px; letter-spacing: 0.08em;">
                        Tue–Sun: 11:30 AM – 2:30 PM &amp; 4:30 PM – 9:00 PM · Mon: Closed
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>
