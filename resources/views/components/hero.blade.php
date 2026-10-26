<section class="relative isolate flex min-h-[100svh] items-center justify-center overflow-hidden bg-ink">
    <!-- Cinematic Swiper Hero Background Slider -->
    <div class="swiper hero-swiper absolute inset-0 h-full w-full">
        <div class="swiper-wrapper h-full w-full">
            <!-- Slide 1: Rich Curries & Rogan Josh -->
            <div class="swiper-slide relative h-full w-full overflow-hidden">
                <img src="/images/lamb.png" 
                     class="w-full h-full inset-0 absolute object-cover animate-ken-burns" 
                     alt="Lamb rogan josh slow simmered with traditional Indian spices in Fairbanks, Alaska">
                <div class="absolute inset-0 bg-ink/65"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-ink/90 via-ink/40 to-ink"></div>
            </div>

            <!-- Slide 2: Clay Tandoor Naan & Breads -->
            <div class="swiper-slide relative h-full w-full overflow-hidden">
                <img src="/images/tandoor.png" 
                     class="w-full h-full inset-0 absolute object-cover animate-ken-burns" 
                     alt="Traditional Indian clay tandoor baking fresh naan in Fairbanks">
                <div class="absolute inset-0 bg-ink/65"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-ink/90 via-ink/40 to-ink"></div>
            </div>

            <!-- Slide 3: Golden Vegetable Samosas -->
            <div class="swiper-slide relative h-full w-full overflow-hidden">
                <img src="/images/samosas.png" 
                     class="w-full h-full inset-0 absolute object-cover animate-ken-burns" 
                     alt="Golden fried vegetable samosas served with fresh tamarind and mint chutney">
                <div class="absolute inset-0 bg-ink/65"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-ink/90 via-ink/40 to-ink"></div>
            </div>

            <!-- Slide 4: Warm Interior Ambiance -->
            <div class="swiper-slide relative h-full w-full overflow-hidden">
                <img src="/images/interior.png" 
                     class="w-full h-full inset-0 absolute object-cover animate-ken-burns" 
                     alt="Hari Om Cuisine of India warm dining room on Cushman Street Fairbanks">
                <div class="absolute inset-0 bg-ink/70"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-ink/90 via-ink/40 to-ink"></div>
            </div>
        </div>
    </div>

    <!-- Center Hero Content (GSAP animated entrance) -->
    <div class="relative z-10 mx-auto flex max-w-4xl flex-col items-center px-6 pb-28 pt-32 text-center gsap-fade-up">
        <!-- Eyebrow Ribbon -->
        <p class="flex items-center gap-3 text-[9px] uppercase tracking-[0.36em] text-saffron sm:text-[10px]">
            <span class="h-px w-8 bg-saffron/60"></span>
            Good food · Good people · Good times
            <span class="h-px w-8 bg-saffron/60"></span>
        </p>

        <!-- Official Hari Om Logo -->
        <div class="mt-6 flex justify-center">
            <img src="/images/logo.png" 
                 alt="Hari Om Cuisine of India" 
                 width="612" 
                 height="311" 
                 class="block w-auto select-none h-[clamp(4.5rem,12vw,8rem)] drop-shadow-[0_22px_44px_rgba(0,0,0,0.7)]" 
                 style="aspect-ratio: 612 / 311;">
        </div>

        <!-- Taglines -->
        <p class="mt-3 max-w-md font-display text-2xl italic text-paper/85 sm:text-3xl">
            A taste of India, in the heart of Alaska
        </p>
        <p class="mt-2.5 text-[10px] uppercase tracking-[0.24em] text-white/50 sm:text-[11px]">
            Dine in · Take out · Catering · Fairbanks, Alaska
        </p>

        <!-- Redesigned CTA Button System (No arrows) -->
        <div class="mt-9 flex w-full flex-col items-center justify-center gap-3 sm:w-auto sm:flex-row">
            <a href="{{ route('menu') }}" class="btn-primary w-full sm:w-auto">
                Explore our menu
            </a>
            <a href="tel:+19073283218" class="btn-secondary w-full sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone mr-2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                Call to order
            </a>
            <a href="{{ route('reservations') }}" class="btn-secondary w-full sm:w-auto">
                Book a table
            </a>
        </div>

        <!-- Slider Pagination Indicators -->
        <div class="hero-pagination mt-8 flex justify-center gap-2"></div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-6 left-1/2 z-10 flex -translate-x-1/2 flex-col items-center gap-2">
        <span class="text-[8px] uppercase tracking-[0.4em] text-white/40">Scroll</span>
        <span class="relative h-12 w-px overflow-hidden bg-white/20">
            <span class="absolute inset-x-0 h-1/2 bg-saffron animate-pulse"></span>
        </span>
    </div>

    <!-- Left Vertical Rail -->
    <div class="pointer-events-none absolute bottom-12 left-8 z-10 hidden xl:block">
        <span class="block -rotate-90 origin-left text-[9px] uppercase tracking-[0.38em] text-white/30">
            Fairbanks · Alaska
        </span>
    </div>

    <!-- Right Vertical Rail -->
    <div class="pointer-events-none absolute bottom-12 right-8 z-10 hidden xl:block">
        <span class="block rotate-90 origin-right text-[9px] uppercase tracking-[0.38em] text-white/30">
            Tandoor · Spice · Thali
        </span>
    </div>
</section>
