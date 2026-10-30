<section class="position-relative overflow-hidden bg-ink w-100" style="min-height: 100svh;">
    <!-- Cinematic Swiper Hero Background Slider (Strictly Isolated Absolute Background) -->
    <div class="pe-none position-absolute inset-0 z-0 h-100 w-100 overflow-hidden">
        <div class="swiper hero-swiper position-absolute inset-0 h-100 w-100">
            <div class="swiper-wrapper h-100 w-100">
                <!-- Slide 1: Lamb Rogan Josh -->
                <div class="swiper-slide position-relative h-100 w-100 overflow-hidden">
                    <img src="/images/lamb.png" 
                         class="position-absolute inset-0 h-100 w-100 object-cover animate-ken-burns" 
                         alt="Lamb rogan josh slow simmered with traditional Indian spices in Fairbanks, Alaska">
                    <div class="position-absolute inset-0 bg-ink-40"></div>
                    <div class="position-absolute inset-0 bg-gradient-b-hero"></div>
                </div>

                <!-- Slide 2: Authentic Dining Ambiance -->
                <div class="swiper-slide position-relative h-100 w-100 overflow-hidden">
                    <img src="/images/hariomimage.jpg" 
                         class="position-absolute inset-0 h-100 w-100 object-cover animate-ken-burns" 
                         style="object-position: center 60%;"
                         alt="Hari Om Cuisine of India dining booths with Alaska mural and warm glowing lanterns in Fairbanks">
                    <div class="position-absolute inset-0 bg-ink-40"></div>
                    <div class="position-absolute inset-0 bg-gradient-b-hero"></div>
                </div>

                <!-- Slide 3: Golden Vegetable Samosas -->
                <div class="swiper-slide position-relative h-100 w-100 overflow-hidden">
                    <img src="/images/samosas.png" 
                         class="position-absolute inset-0 h-100 w-100 object-cover animate-ken-burns" 
                         alt="Golden fried vegetable samosas served with fresh tamarind and mint chutney">
                    <div class="position-absolute inset-0 bg-ink-40"></div>
                    <div class="position-absolute inset-0 bg-gradient-b-hero"></div>
                </div>

                <!-- Slide 4: Warm Interior Ambiance -->
                <div class="swiper-slide position-relative h-100 w-100 overflow-hidden">
                    <img src="/images/hero-interior.jpg" 
                         class="position-absolute inset-0 h-100 w-100 object-cover animate-ken-burns" 
                         alt="Hari Om Cuisine of India warm dining room on Cushman Street Fairbanks">
                    <div class="position-absolute inset-0 bg-ink-45"></div>
                    <div class="position-absolute inset-0 bg-gradient-b-hero"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Center Hero Content (Full Width Flex Container - 100% Centered) -->
    <div class="position-relative d-flex w-100 align-items-center justify-content-center px-3 px-sm-4" style="min-height: 100svh; z-index: 10;">
        <div class="hero-content mx-auto d-flex w-100 max-w-4xl flex-column align-items-center text-center">
            <!-- Eyebrow Ribbon -->
            <p class="hero-eyebrow d-flex align-items-center justify-content-center gap-2 gap-sm-3 text-uppercase text-saffron" style="font-size: clamp(9px, 2.2vw, 10px); letter-spacing: clamp(0.18em, 2vw, 0.36em);">
                <span class="d-none d-sm-inline-block bg-saffron" style="height: 1px; width: 32px; opacity: 0.6;"></span>
                Good food · Good people · Good times
                <span class="d-none d-sm-inline-block bg-saffron" style="height: 1px; width: 32px; opacity: 0.6;"></span>
            </p>

            <!-- Official Hari Om Logo -->
            <div class="hero-logo mt-3 d-flex justify-content-center">
                <img src="/images/logo.png" 
                     alt="Hari Om Cuisine of India" 
                     width="612" 
                     height="311" 
                     class="d-block w-auto user-select-none" 
                     style="height: clamp(4.5rem, 11vw, 7.5rem); aspect-ratio: 612 / 311; filter: drop-shadow(0 20px 40px rgba(0,0,0,0.65));">
            </div>

            <!-- Taglines -->
            <p class="hero-tagline mt-3 max-w-lg font-display fst-italic text-paper" style="font-size: clamp(1.5rem, 3.5vw, 2.25rem);">
                A taste of India, in the heart of Alaska
            </p>
            <p class="hero-subtagline mt-2 text-uppercase text-white-70" style="font-size: 11px; letter-spacing: 0.24em;">
                Dine in · Take out · Catering · Fairbanks, Alaska
            </p>

            <!-- Redesigned CTA Button System -->
            <div class="hero-buttons mt-4 d-flex w-100 flex-column flex-sm-row align-items-center justify-content-center gap-3" style="max-width: 480px;">
                <a href="{{ route('menu') }}" class="btn-primary hero-cta-btn text-center justify-content-center">
                    Explore our menu
                </a>
                <a href="tel:+19073283218" class="btn-secondary hero-cta-btn text-center justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone me-2 flex-shrink-0 d-inline-block"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    Call to order
                </a>
            </div>
        </div>
    </div>

    <!-- Slider Pagination Indicators (Separated with generous breathing room) -->
    <div class="hero-pagination position-absolute start-50 translate-middle-x my-4 d-flex justify-content-center gap-2" style="bottom: 4.85rem; z-index: 20;"></div>

    <!-- Animated Center Scroll Indicator (Luxury Flowing Saffron Light Beam) -->
    <a href="#story" 
       aria-label="Scroll to our story"
       class="hero-scroll-indicator position-absolute start-50 translate-middle-x" 
       style="bottom: 1.25rem; z-index: 20;">
        <span class="hero-scroll-label">Scroll</span>
        <span class="hero-scroll-track">
            <span class="hero-scroll-beam"></span>
        </span>
    </a>

    <!-- Left Vertical Rail -->
    <div class="hero-rail-left pe-none position-absolute start-0 top-50 translate-middle-y d-none d-lg-block ms-4" style="z-index: 20; transform: translateY(-50%) rotate(-90deg); transform-origin: left center;">
        <span class="text-uppercase text-saffron fw-medium" style="font-size: 9px; letter-spacing: 0.45em; text-shadow: 0 1px 2px rgba(0,0,0,0.6);">
            Fairbanks · Alaska
        </span>
    </div>

    <!-- Right Vertical Rail -->
    <div class="hero-rail-right pe-none position-absolute end-0 top-50 translate-middle-y d-none d-lg-block me-4" style="z-index: 20; transform: translateY(-50%) rotate(90deg); transform-origin: right center;">
        <span class="text-uppercase text-saffron fw-medium" style="font-size: 9px; letter-spacing: 0.45em; text-shadow: 0 1px 2px rgba(0,0,0,0.6);">
            Tandoor · Spice · Thali
        </span>
    </div>
</section>
