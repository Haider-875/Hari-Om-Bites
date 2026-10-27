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
            <a class="nav-link-custom"
               :class="scrolled ? 'text-ink-75' : 'text-white-80'"
               href="{{ route('home') }}">
                Home
            </a>
            <a class="nav-link-custom"
               :class="scrolled ? 'text-ink-75' : 'text-white-80'"
               href="/#story">
                Story
            </a>
            <a class="nav-link-custom"
               :class="scrolled ? 'text-ink-75' : 'text-white-80'"
               href="{{ route('menu') }}">
                Menu
            </a>
            <a class="nav-link-custom"
               :class="scrolled ? 'text-ink-75' : 'text-white-80'"
               href="{{ route('gallery') }}">
                Gallery
            </a>
            <a class="nav-link-custom"
               :class="scrolled ? 'text-ink-75' : 'text-white-80'"
               href="/#experience">
                Experience
            </a>
            <a class="nav-link-custom"
               :class="scrolled ? 'text-ink-75' : 'text-white-80'"
               href="{{ route('reservations') }}">
                Reservations
            </a>
            <a class="nav-link-custom"
               :class="scrolled ? 'text-ink-75' : 'text-white-80'"
               href="{{ route('contact') }}">
                Visit & Contact
            </a>
        </nav>

        <!-- Action Buttons -->
        <div class="d-flex align-items-center justify-content-end gap-2 gap-sm-3 flex-grow-1" style="flex-basis: 0;">
            <a href="tel:+19073283218" 
               class="d-none d-sm-inline-flex align-items-center gap-2 rounded-pill border px-3 py-2 text-uppercase transition-all text-decoration-none"
               style="font-size: 10px; letter-spacing: 0.2em; min-height: 44px;"
               :class="scrolled ? 'border-ink-20 text-ink' : 'border-white-30 text-white'">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                Call
            </a>
            <a href="{{ route('reservations') }}" 
               class="btn-primary d-none d-md-inline-flex text-decoration-none" style="padding: 0.65rem 1.25rem; font-size: 10px; min-height: 44px;">
                Book a Table
            </a>

            <!-- Mobile Menu Toggle Button (44×44px touch target) -->
            <button type="button" 
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    aria-label="Open navigation menu" 
                    class="d-flex d-lg-none align-items-center justify-content-center rounded-circle border bg-transparent p-0 transition-all"
                    style="width: 44px; height: 44px; min-width: 44px; min-height: 44px; cursor: pointer;"
                    :class="scrolled ? 'border-ink-20 text-ink' : 'border-white-30 text-white'">
                <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line></svg>
                <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="6" y1="6" y2="18"></line><line x1="6" x2="18" y1="6" y2="18"></line></svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         @click.away="mobileMenuOpen = false"
         x-cloak
         class="position-fixed start-0 end-0 border-bottom border-terracotta-20 bg-ink-98 px-4 py-4 text-paper shadow-lg backdrop-blur-2xl d-lg-none"
         style="top: 4.75rem; max-height: calc(100vh - 4.75rem); overflow-y: auto; -webkit-overflow-scrolling: touch; z-index: 1020;">
        <div class="d-flex flex-column gap-1 text-center">
            <a @click="mobileMenuOpen = false" class="text-uppercase py-2 text-decoration-none d-flex align-items-center justify-content-center" style="font-size: 11px; letter-spacing: 0.24em; color: rgba(253,251,247,0.85); min-height: 44px;" href="{{ route('home') }}">Home</a>
            <a @click="mobileMenuOpen = false" class="text-uppercase py-2 text-decoration-none d-flex align-items-center justify-content-center" style="font-size: 11px; letter-spacing: 0.24em; color: rgba(253,251,247,0.85); min-height: 44px;" href="/#story">Our Story</a>
            <a @click="mobileMenuOpen = false" class="text-uppercase py-2 text-decoration-none d-flex align-items-center justify-content-center" style="font-size: 11px; letter-spacing: 0.24em; color: rgba(253,251,247,0.85); min-height: 44px;" href="{{ route('menu') }}">Menu</a>
            <a @click="mobileMenuOpen = false" class="text-uppercase py-2 text-decoration-none d-flex align-items-center justify-content-center" style="font-size: 11px; letter-spacing: 0.24em; color: rgba(253,251,247,0.85); min-height: 44px;" href="{{ route('gallery') }}">Gallery</a>
            <a @click="mobileMenuOpen = false" class="text-uppercase py-2 text-decoration-none d-flex align-items-center justify-content-center" style="font-size: 11px; letter-spacing: 0.24em; color: rgba(253,251,247,0.85); min-height: 44px;" href="/#experience">Experience</a>
            <a @click="mobileMenuOpen = false" class="text-uppercase py-2 text-decoration-none d-flex align-items-center justify-content-center" style="font-size: 11px; letter-spacing: 0.24em; color: rgba(253,251,247,0.85); min-height: 44px;" href="{{ route('reservations') }}">Reservations</a>
            <a @click="mobileMenuOpen = false" class="text-uppercase py-2 text-decoration-none d-flex align-items-center justify-content-center" style="font-size: 11px; letter-spacing: 0.24em; color: rgba(253,251,247,0.85); min-height: 44px;" href="{{ route('contact') }}">Visit & Contact</a>
            
            <div class="mt-2 d-flex flex-column gap-2 pt-3 border-top border-white-10">
                <a @click="mobileMenuOpen = false" href="{{ route('reservations') }}" class="btn-primary w-100 py-3 d-flex align-items-center justify-content-center" style="font-size: 11px; min-height: 44px;">
                    Book a Table
                </a>
                <a href="tel:+19073283218" class="btn-secondary w-100 py-3 d-flex align-items-center justify-content-center" style="font-size: 11px; min-height: 44px;">
                    Call: +1 907-328-3218
                </a>
            </div>
        </div>
    </div>
</header>
