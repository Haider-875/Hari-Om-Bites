<header 
    x-data="{ 
        scrolled: false, 
        mobileMenuOpen: false,
        init() {
            window.addEventListener('scroll', () => {
                this.scrolled = window.scrollY > 30;
            });
            this.scrolled = window.scrollY > 30;
        }
    }" 
    :class="scrolled ? 'border-b border-terracotta/15 bg-paper/95 backdrop-blur-md text-ink shadow-sm' : 'border-b border-white/10 bg-transparent text-white'"
    class="fixed inset-x-0 top-0 z-50 transition-all duration-500">
    <div class="mx-auto flex h-16 max-w-[92rem] items-center justify-between px-5 sm:px-8 lg:h-20">
        <!-- Logo -->
        <a aria-label="Hari Om Cuisine of India — home" class="group flex items-center" href="/">
            <img src="/images/logo.png" alt="Hari Om Cuisine of India" width="612" height="311" class="block w-auto select-none h-9 transition-all duration-500 lg:h-11 drop-shadow-[0_4px_16px_rgba(0,0,0,0.6)]" style="aspect-ratio: 612 / 311;">
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden items-center gap-7 lg:flex">
            <a class="group relative text-[11px] uppercase tracking-[0.22em] transition-colors duration-300"
               :class="scrolled ? 'text-ink/75 hover:text-ink' : 'text-white/80 hover:text-white'"
               href="{{ route('home') }}">
                Home
                <span class="absolute -bottom-1.5 left-0 h-px w-0 transition-all duration-500 group-hover:w-full bg-saffron"></span>
            </a>
            <a class="group relative text-[11px] uppercase tracking-[0.22em] transition-colors duration-300"
               :class="scrolled ? 'text-ink/75 hover:text-ink' : 'text-white/80 hover:text-white'"
               href="{{ route('story') }}">
                Story
                <span class="absolute -bottom-1.5 left-0 h-px w-0 transition-all duration-500 group-hover:w-full bg-saffron"></span>
            </a>
            <a class="group relative text-[11px] uppercase tracking-[0.22em] transition-colors duration-300"
               :class="scrolled ? 'text-ink/75 hover:text-ink' : 'text-white/80 hover:text-white'"
               href="{{ route('menu') }}">
                Menu
                <span class="absolute -bottom-1.5 left-0 h-px w-0 transition-all duration-500 group-hover:w-full bg-saffron"></span>
            </a>
            <a class="group relative text-[11px] uppercase tracking-[0.22em] transition-colors duration-300"
               :class="scrolled ? 'text-ink/75 hover:text-ink' : 'text-white/80 hover:text-white'"
               href="{{ route('gallery') }}">
                Gallery
                <span class="absolute -bottom-1.5 left-0 h-px w-0 transition-all duration-500 group-hover:w-full bg-saffron"></span>
            </a>
            <a class="group relative text-[11px] uppercase tracking-[0.22em] transition-colors duration-300"
               :class="scrolled ? 'text-ink/75 hover:text-ink' : 'text-white/80 hover:text-white'"
               href="/#experience">
                Experience
                <span class="absolute -bottom-1.5 left-0 h-px w-0 transition-all duration-500 group-hover:w-full bg-saffron"></span>
            </a>
            <a class="group relative text-[11px] uppercase tracking-[0.22em] transition-colors duration-300"
               :class="scrolled ? 'text-ink/75 hover:text-ink' : 'text-white/80 hover:text-white'"
               href="{{ route('reservations') }}">
                Reservations
                <span class="absolute -bottom-1.5 left-0 h-px w-0 transition-all duration-500 group-hover:w-full bg-saffron"></span>
            </a>
            <a class="group relative text-[11px] uppercase tracking-[0.22em] transition-colors duration-300"
               :class="scrolled ? 'text-ink/75 hover:text-ink' : 'text-white/80 hover:text-white'"
               href="{{ route('contact') }}">
                Visit & Contact
                <span class="absolute -bottom-1.5 left-0 h-px w-0 transition-all duration-500 group-hover:w-full bg-saffron"></span>
            </a>
        </nav>

        <!-- Action Buttons (No arrow icons) -->
        <div class="flex items-center gap-3">
            <a href="tel:+19073283218" 
               class="hidden items-center gap-2 rounded-full border px-4 py-2.5 text-[10px] uppercase tracking-[0.2em] transition-all duration-300 sm:flex"
               :class="scrolled ? 'border-ink/20 text-ink hover:bg-ink hover:text-paper' : 'border-white/30 text-white hover:bg-white hover:text-ink'">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                Call
            </a>
            <a href="{{ route('reservations') }}" 
               class="btn-primary !px-5 !py-2.5 text-[10px] hidden md:inline-flex">
                Book a Table
            </a>

            <!-- Mobile Menu Toggle Button -->
            <button type="button" 
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    aria-label="Open navigation" 
                    class="flex h-10 w-10 items-center justify-center rounded-full border transition-colors duration-300 lg:hidden cursor-pointer"
                    :class="scrolled ? 'border-ink/20 text-ink' : 'border-white/30 text-white'">
                <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"></line><line x1="4" x2="20" y1="6" y2="6"></line><line x1="4" x2="20" y1="18" y2="18"></line></svg>
                <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="6" y1="6" y2="18"></line><line x1="6" x2="18" y1="6" y2="18"></line></svg>
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
         x-cloak
         class="fixed inset-x-0 top-16 z-40 border-b border-terracotta/20 bg-ink/98 px-6 py-8 text-paper shadow-2xl backdrop-blur-2xl lg:hidden">
        <div class="flex flex-col gap-5 text-center">
            <a @click="mobileMenuOpen = false" class="text-xs uppercase tracking-[0.24em] text-paper/85 hover:text-saffron py-1" href="{{ route('home') }}">Home</a>
            <a @click="mobileMenuOpen = false" class="text-xs uppercase tracking-[0.24em] text-paper/85 hover:text-saffron py-1" href="{{ route('story') }}">Our Story</a>
            <a @click="mobileMenuOpen = false" class="text-xs uppercase tracking-[0.24em] text-paper/85 hover:text-saffron py-1" href="{{ route('menu') }}">Menu</a>
            <a @click="mobileMenuOpen = false" class="text-xs uppercase tracking-[0.24em] text-paper/85 hover:text-saffron py-1" href="{{ route('gallery') }}">Gallery</a>
            <a @click="mobileMenuOpen = false" class="text-xs uppercase tracking-[0.24em] text-paper/85 hover:text-saffron py-1" href="/#experience">Experience</a>
            <a @click="mobileMenuOpen = false" class="text-xs uppercase tracking-[0.24em] text-paper/85 hover:text-saffron py-1" href="{{ route('reservations') }}">Reservations</a>
            <a @click="mobileMenuOpen = false" class="text-xs uppercase tracking-[0.24em] text-paper/85 hover:text-saffron py-1" href="{{ route('contact') }}">Visit & Contact</a>
            
            <div class="mt-2 flex flex-col gap-3 pt-6 border-t border-white/10">
                <a href="{{ route('reservations') }}" class="btn-primary w-full py-3.5 text-xs">
                    Book a Table
                </a>
                <a href="tel:+19073283218" class="btn-secondary w-full py-3.5 text-xs">
                    Call: +1 907-328-3218
                </a>
            </div>
        </div>
    </div>
</header>
