<section class="relative isolate flex min-h-[100svh] items-center justify-center overflow-hidden bg-ink">
    <!-- Hero Background Image -->
    <div class="absolute -bottom-32 -top-32 inset-x-0">
        <img src="{{ asset('images/hero.png') }}"
             alt="Lamb rogan josh in a hammered copper bowl, garnished with fresh cilantro"
             class="h-full w-full object-cover object-center" />
    </div>

    <!-- Gradient & Color Overlays -->
    <div class="absolute inset-0 bg-ink/65"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-ink/85 via-ink/30 to-ink"></div>

    <!-- Center Content -->
    <div class="relative z-10 mx-auto flex max-w-4xl flex-col items-center px-6 pb-24 pt-28 text-center">
        <!-- Eyebrow -->
        <p class="flex items-center gap-3 text-[9px] uppercase tracking-[0.34em] text-saffron sm:text-[10px]">
            <span class="h-px w-8 bg-saffron/60"></span>
            Good food · Good people · Good times
            <span class="h-px w-8 bg-saffron/60"></span>
        </p>

        <!-- Main Logo -->
        <div class="mt-6 flex justify-center">
            <img src="{{ asset('images/logo.png') }}"
                 alt="Hari Om Cuisine of India"
                 class="h-[clamp(4.5rem,12vw,8rem)] w-auto select-none drop-shadow-[0_18px_38px_rgba(0,0,0,0.55)] object-contain" />
        </div>

        <!-- Subtitle & Location Tag -->
        <p class="mt-3 max-w-md font-display text-xl italic text-paper/75 sm:text-2xl">
            A taste of India, in the heart of Alaska
        </p>
        <p class="mt-2.5 text-[9px] uppercase tracking-[0.24em] text-white/45 sm:text-[10px]">
            Dine in · Take out · Catering · Fairbanks, Alaska
        </p>

        <!-- Buttons -->
        <div class="mt-8 flex w-full flex-col items-center gap-3 sm:w-auto sm:flex-row">
            <a href="{{ route('menu') }}"
               class="w-full rounded-full border border-white/35 px-8 py-4 text-[10px] uppercase tracking-[0.24em] text-white transition-all duration-300 hover:border-white hover:bg-white hover:text-ink sm:w-auto text-center">
                Explore our menu
            </a>
            <a href="tel:+19073283218"
               class="flex w-full items-center justify-center gap-2 rounded-full bg-saffron px-8 py-4 text-[10px] font-semibold uppercase tracking-[0.2em] text-ink transition-all duration-300 hover:bg-paper sm:w-auto">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                Order · +1 907-328-3218
            </a>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-7 left-1/2 z-10 flex -translate-x-1/2 flex-col items-center gap-3 pointer-events-none">
        <span class="text-[8px] uppercase tracking-[0.4em] text-white/40">Scroll</span>
        <span class="relative h-14 w-px overflow-hidden bg-white/20">
            <span class="absolute inset-x-0 h-1/2 bg-saffron animate-[pulse_2s_ease-in-out_infinite]"></span>
        </span>
    </div>

    <!-- Side Rotated Labels -->
    <div class="absolute left-6 top-1/2 hidden -translate-y-1/2 -rotate-90 lg:block pointer-events-none">
        <span class="text-[8px] uppercase tracking-[0.45em] text-white/30">Fairbanks · Alaska</span>
    </div>
    <div class="absolute right-6 top-1/2 hidden -translate-y-1/2 rotate-90 lg:block pointer-events-none">
        <span class="text-[8px] uppercase tracking-[0.45em] text-white/30">Tandoor · Spice · Thali</span>
    </div>
</section>
