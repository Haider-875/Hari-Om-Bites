@props(['isScrolled' => false])

<header x-data="{
    scrolled: false,
    mobileOpen: false,
    init() {
        this.scrolled = window.scrollY > 40;
        window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 40;
        }, { passive: true });
    }
}"
:class="(scrolled || mobileOpen) ? 'border-b border-terracotta/10 bg-paper/95 backdrop-blur-md' : 'border-b border-white/10 bg-transparent'"
class="fixed inset-x-0 top-0 z-50 transition-all duration-500">
    <div class="mx-auto flex h-16 max-w-[92rem] items-center justify-between px-5 sm:px-8 lg:h-20">
        <!-- Logo -->
        <a href="{{ route('home') }}" aria-label="Hari Om Cuisine of India — home" class="group flex items-center">
            <img src="{{ asset('images/logo.png') }}"
                 alt="Hari Om Cuisine of India"
                 :class="(scrolled || mobileOpen) ? '' : 'drop-shadow-[0_4px_16px_rgba(0,0,0,0.6)]'"
                 class="h-9 w-auto select-none transition-all duration-500 lg:h-11 object-contain" />
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden items-center gap-8 lg:flex">
            <a href="{{ url('/#story') }}"
               :class="(scrolled || mobileOpen) ? 'text-ink/70 hover:text-terracotta' : 'text-white/75 hover:text-white'"
               class="group relative text-[10px] uppercase tracking-[0.24em] transition-colors duration-300">
                Story
                <span :class="(scrolled || mobileOpen) ? 'bg-terracotta' : 'bg-saffron'"
                      class="absolute -bottom-1.5 left-0 h-px w-0 transition-all duration-500 group-hover:w-full"></span>
            </a>
            <a href="{{ url('/#selection') }}"
               :class="(scrolled || mobileOpen) ? 'text-ink/70 hover:text-terracotta' : 'text-white/75 hover:text-white'"
               class="group relative text-[10px] uppercase tracking-[0.24em] transition-colors duration-300">
                Chef
                <span :class="(scrolled || mobileOpen) ? 'bg-terracotta' : 'bg-saffron'"
                      class="absolute -bottom-1.5 left-0 h-px w-0 transition-all duration-500 group-hover:w-full"></span>
            </a>
            <a href="{{ route('menu') }}"
               :class="(scrolled || mobileOpen) ? 'text-ink/70 hover:text-terracotta' : 'text-white/75 hover:text-white'"
               class="group relative text-[10px] uppercase tracking-[0.24em] transition-colors duration-300">
                Menu
                <span :class="(scrolled || mobileOpen) ? 'bg-terracotta' : 'bg-saffron'"
                      class="absolute -bottom-1.5 left-0 h-px w-0 transition-all duration-500 group-hover:w-full"></span>
            </a>
            <a href="{{ url('/#experience') }}"
               :class="(scrolled || mobileOpen) ? 'text-ink/70 hover:text-terracotta' : 'text-white/75 hover:text-white'"
               class="group relative text-[10px] uppercase tracking-[0.24em] transition-colors duration-300">
                Experience
                <span :class="(scrolled || mobileOpen) ? 'bg-terracotta' : 'bg-saffron'"
                      class="absolute -bottom-1.5 left-0 h-px w-0 transition-all duration-500 group-hover:w-full"></span>
            </a>
            <a href="{{ url('/#visit') }}"
               :class="(scrolled || mobileOpen) ? 'text-ink/70 hover:text-terracotta' : 'text-white/75 hover:text-white'"
               class="group relative text-[10px] uppercase tracking-[0.24em] transition-colors duration-300">
                Visit
                <span :class="(scrolled || mobileOpen) ? 'bg-terracotta' : 'bg-saffron'"
                      class="absolute -bottom-1.5 left-0 h-px w-0 transition-all duration-500 group-hover:w-full"></span>
            </a>
        </nav>

        <!-- Right Actions -->
        <div class="flex items-center gap-2.5">
            <a href="tel:+19073283218"
               :class="(scrolled || mobileOpen) ? 'border-terracotta/25 text-terracotta hover:bg-terracotta hover:text-paper' : 'border-white/30 text-white hover:bg-white hover:text-ink'"
               class="hidden items-center gap-2 rounded-full border px-4 py-2.5 text-[10px] uppercase tracking-[0.2em] transition-all duration-300 sm:flex">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                Call
            </a>
            <a href="tel:+19073283218"
               class="hidden rounded-full bg-saffron px-5 py-2.5 text-[10px] font-semibold uppercase tracking-[0.2em] text-ink transition-all duration-300 hover:bg-ink hover:text-saffron md:block">
                Order now
            </a>
            <button type="button"
                    @click="mobileOpen = !mobileOpen"
                    aria-label="Open navigation"
                    :class="(scrolled || mobileOpen) ? 'border-terracotta/25 text-terracotta' : 'border-white/30 text-white'"
                    class="flex h-10 w-10 items-center justify-center rounded-full border transition-colors duration-300 lg:hidden">
                <template x-if="!mobileOpen">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </template>
                <template x-if="mobileOpen">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </template>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div x-show="mobileOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none;"
         class="fixed inset-0 z-40 flex flex-col justify-between bg-ink px-6 pb-10 pt-24 lg:hidden">
        <nav class="flex flex-col">
            <div class="border-b border-white/10">
                <a href="{{ url('/#story') }}" @click="mobileOpen = false" class="flex items-baseline justify-between py-5 font-display text-4xl text-paper">
                    <span>Story</span>
                    <span class="text-[10px] uppercase tracking-[0.2em] text-saffron">01</span>
                </a>
            </div>
            <div class="border-b border-white/10">
                <a href="{{ url('/#selection') }}" @click="mobileOpen = false" class="flex items-baseline justify-between py-5 font-display text-4xl text-paper">
                    <span>Chef</span>
                    <span class="text-[10px] uppercase tracking-[0.2em] text-saffron">02</span>
                </a>
            </div>
            <div class="border-b border-white/10">
                <a href="{{ route('menu') }}" @click="mobileOpen = false" class="flex items-baseline justify-between py-5 font-display text-4xl text-paper">
                    <span>Menu</span>
                    <span class="text-[10px] uppercase tracking-[0.2em] text-saffron">03</span>
                </a>
            </div>
            <div class="border-b border-white/10">
                <a href="{{ url('/#experience') }}" @click="mobileOpen = false" class="flex items-baseline justify-between py-5 font-display text-4xl text-paper">
                    <span>Experience</span>
                    <span class="text-[10px] uppercase tracking-[0.2em] text-saffron">04</span>
                </a>
            </div>
            <div class="border-b border-white/10">
                <a href="{{ url('/#visit') }}" @click="mobileOpen = false" class="flex items-baseline justify-between py-5 font-display text-4xl text-paper">
                    <span>Visit</span>
                    <span class="text-[10px] uppercase tracking-[0.2em] text-saffron">05</span>
                </a>
            </div>
        </nav>

        <div class="space-y-4">
            <p class="text-[11px] uppercase leading-relaxed tracking-[0.18em] text-white/50">
                1528 S Cushman St · Fairbanks, Alaska
            </p>
            <a href="tel:+19073283218" class="flex items-center justify-center gap-2 rounded-full bg-saffron py-4 text-[11px] font-semibold uppercase tracking-[0.2em] text-ink">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                Order · +1 907-328-3218
            </a>
        </div>
    </div>
</header>
