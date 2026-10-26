<section class="relative isolate flex min-h-[100svh] items-center justify-center overflow-hidden bg-ink">
    <!-- Cinematic Swiper Hero Background Slider -->
    <div class="swiper hero-swiper absolute inset-0 h-full w-full">
        <div class="swiper-wrapper h-full w-full">
            <!-- Slide 1: Rich Curries & Rogan Josh -->
            <div class="swiper-slide relative h-full w-full overflow-hidden">
                <img src="/images/lamb.png" 
                     class="w-full h-full inset-0 absolute object-cover animate-ken-burns" 
                     alt="Lamb rogan josh slow simmered with traditional Indian spices in Fairbanks, Alaska">
                <div class="absolute inset-0 bg-ink/60"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-ink/90 via-ink/35 to-ink"></div>
            </div>

            <!-- Slide 2: Clay Tandoor Naan & Breads -->
            <div class="swiper-slide relative h-full w-full overflow-hidden">
                <img src="/images/tandoor.png" 
                     class="w-full h-full inset-0 absolute object-cover animate-ken-burns" 
                     alt="Traditional Indian clay tandoor baking fresh naan in Fairbanks">
                <div class="absolute inset-0 bg-ink/60"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-ink/90 via-ink/35 to-ink"></div>
            </div>

            <!-- Slide 3: Golden Vegetable Samosas -->
            <div class="swiper-slide relative h-full w-full overflow-hidden">
                <img src="/images/samosas.png" 
                     class="w-full h-full inset-0 absolute object-cover animate-ken-burns" 
                     alt="Golden fried vegetable samosas served with fresh tamarind and mint chutney">
                <div class="absolute inset-0 bg-ink/60"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-ink/90 via-ink/35 to-ink"></div>
            </div>

            <!-- Slide 4: Warm Interior Ambiance -->
            <div class="swiper-slide relative h-full w-full overflow-hidden">
                <img src="/images/interior.png" 
                     class="w-full h-full inset-0 absolute object-cover animate-ken-burns" 
                     alt="Hari Om Cuisine of India warm dining room on Cushman Street Fairbanks">
                <div class="absolute inset-0 bg-ink/65"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-ink/90 via-ink/35 to-ink"></div>
            </div>
        </div>
    </div>

    <!-- Center Hero Content (Mathematically centered) -->
    <div class="hero-content relative z-10 mx-auto flex max-w-4xl flex-col items-center px-6 text-center">
        <!-- Eyebrow Ribbon -->
        <p class="hero-eyebrow flex items-center gap-3 text-[9px] uppercase tracking-[0.36em] text-saffron sm:text-[10px]">
            <span class="h-px w-8 bg-saffron/60"></span>
            Good food · Good people · Good times
            <span class="h-px w-8 bg-saffron/60"></span>
        </p>

        <!-- Official Hari Om Logo -->
        <div class="hero-logo mt-5 flex justify-center">
            <img src="/images/logo.png" 
                 alt="Hari Om Cuisine of India" 
                 width="612" 
                 height="311" 
                 class="block w-auto select-none h-[clamp(4.5rem,11vw,7.5rem)] drop-shadow-[0_20px_40px_rgba(0,0,0,0.65)]" 
                 style="aspect-ratio: 612 / 311;">
        </div>

        <!-- Taglines -->
        <p class="hero-tagline mt-4 max-w-lg font-display text-2xl italic text-paper/90 sm:text-3xl">
            A taste of India, in the heart of Alaska
        </p>
        <p class="hero-subtagline mt-2 text-[10px] uppercase tracking-[0.24em] text-white/55 sm:text-[11px]">
            Dine in · Take out · Catering · Fairbanks, Alaska
        </p>

        <!-- Redesigned CTA Button System (No arrows, perfectly aligned) -->
        <div class="hero-buttons mt-8 flex w-full flex-col items-center justify-center gap-3 sm:w-auto sm:flex-row">
            <a href="{{ route('menu') }}" class="btn-primary w-full sm:w-auto text-center min-w-[190px]">
                Explore our menu
            </a>
            <a href="tel:+19073283218" class="btn-secondary w-full sm:w-auto text-center min-w-[190px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone mr-2 shrink-0 inline-block"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                Call to order
            </a>
            <a href="{{ route('reservations') }}" class="btn-secondary w-full sm:w-auto text-center min-w-[170px]">
                Book a table
            </a>
        </div>
    </div>

    <!-- Slider Pagination Indicators (Separated from content box) -->
    <div class="hero-pagination absolute bottom-16 left-1/2 z-20 flex -translate-x-1/2 justify-center gap-2"></div>

    <!-- Scroll Indicator -->
    <div class="hero-scroll-indicator absolute bottom-5 left-1/2 z-10 flex -translate-x-1/2 flex-col items-center gap-1.5 pointer-events-none">
        <span class="text-[8px] uppercase tracking-[0.4em] text-white/40">Scroll</span>
        <span class="relative h-8 w-px overflow-hidden bg-white/20">
            <span class="absolute inset-x-0 h-1/2 bg-saffron animate-pulse"></span>
        </span>
    </div>

    <!-- Left Vertical Rail (Perfect vertical center) -->
    <div class="hero-rail-left pointer-events-none absolute left-6 top-1/2 z-10 hidden -translate-y-1/2 -rotate-90 lg:block">
        <span class="text-[8px] uppercase tracking-[0.45em] text-white/30">
            Fairbanks · Alaska
        </span>
    </div>

    <!-- Right Vertical Rail (Perfect vertical center) -->
    <div class="hero-rail-right pointer-events-none absolute right-6 top-1/2 z-10 hidden -translate-y-1/2 rotate-90 lg:block">
        <span class="text-[8px] uppercase tracking-[0.45em] text-white/30">
            Tandoor · Spice · Thali
        </span>
    </div>
</section>
