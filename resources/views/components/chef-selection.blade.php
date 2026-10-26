@php
$dishes = [
    [
        'num' => '01',
        'name' => 'Vegetable Samosas',
        'price' => '$14',
        'desc' => 'Two large pastries stuffed with spiced potato and green peas, fried to order and served with tamarind and green chutney.',
        'image' => '/images/samosas.png',
        'tag' => "Chef's pick"
    ],
    [
        'num' => '02',
        'name' => 'Lamb Rogan Josh',
        'price' => '$32',
        'desc' => 'Slow-cooked lamb in a rich sauce scented with fennel, black cardamom, and Kashmiri red chili.',
        'image' => '/images/lamb.png',
        'tag' => 'House specialty'
    ],
    [
        'num' => '03',
        'name' => 'Shahi Paneer',
        'price' => '$26',
        'desc' => 'Mashed paneer cheese in a velvety tomato-cream gravy enriched with cashews and royal spices.',
        'image' => '/images/paneer.png',
        'tag' => "Chef's pick"
    ],
    [
        'num' => '04',
        'name' => 'Thali Platter',
        'price' => '$26',
        'desc' => "Chef's complete spread: four curries, basmati rice, hot tandoori naan, papad, raita, and dessert.",
        'image' => '/images/thali.png',
        'tag' => 'The banquet'
    ],
];
@endphp

<section id="selection" 
         class="position-relative overflow-hidden border-top border-bottom border-terracotta-10 py-5" 
         style="background-color: rgba(247, 243, 236, 0.6); padding-top: 5rem !important; padding-bottom: 5rem !important;">
    <div class="max-w-92rem mx-auto px-3 px-sm-4 px-lg-5">
        <!-- Section Header -->
        <div class="gsap-fade-up">
            <p class="label-caps text-saffron m-0">The chef's selection</p>
            <h2 class="mt-3 font-display text-ember display-title-section m-0">
                Where flavor lives
            </h2>
        </div>

        <!-- Touch-Enabled Swiper Carousel Slider -->
        <div class="swiper chef-swiper mt-4">
            <div class="swiper-wrapper">
                @foreach ($dishes as $d)
                    <div class="swiper-slide">
                        <div class="row align-items-center g-4 g-lg-5">
                            <!-- Left: Aspect [5/4] Image Container with Smooth Styling -->
                            <div class="col-12 col-lg-6">
                                <div class="position-relative aspect-5-4 w-100 overflow-hidden rounded-sm" 
                                     style="background-color: rgba(23,23,23,0.05); box-shadow: 0 20px 45px -18px rgba(23,23,23,0.35);">
                                    <img src="{{ $d['image'] }}" alt="{{ $d['name'] }}" class="w-100 h-100 inset-0 position-absolute object-cover">
                                    <div class="position-absolute" style="top: 1.25rem; left: 1.25rem; z-index: 2;">
                                        <div class="rounded-full bg-paper-90 px-3 py-1 text-uppercase tracking-wider-custom text-terracotta backdrop-blur-sm shadow-sm" 
                                             style="font-size: 9px;">
                                            {{ $d['tag'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right: Dish Details -->
                            <div class="col-12 col-lg-6">
                                <div class="d-flex flex-column justify-content-between h-100" style="min-height: 300px;">
                                    <div>
                                        <div class="d-flex align-items-center gap-3">
                                            <span class="font-display text-terracotta" style="font-size: 3rem; opacity: 0.25;">{{ $d['num'] }}</span>
                                            <span class="flex-grow-1" style="height: 1px; background-color: rgba(124, 45, 18, 0.15);"></span>
                                            <span class="font-display fs-3 text-terracotta">{{ $d['price'] }}</span>
                                        </div>

                                        <h3 class="mt-4 font-display text-ink" style="font-size: clamp(2rem, 3.5vw, 3rem); line-height: 1.2;">
                                            {{ $d['name'] }}
                                        </h3>

                                        <p class="mt-3 max-w-md text-ink-65" style="font-size: 15px; line-height: 1.85;">
                                            {{ $d['desc'] }}
                                        </p>

                                        <!-- Order & Menu Buttons -->
                                        <div class="mt-4 d-flex flex-wrap align-items-center gap-3">
                                            <a href="tel:+19073283218" class="btn-terracotta">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone me-2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                                Order this dish
                                            </a>
                                            <a href="{{ route('menu') }}" class="btn-secondary-dark">
                                                View in menu
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Bottom Pagination Indicator Bar (Clean Numbers Only, No Text Clutter) -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-4 pt-3 border-top border-terracotta-10">
            <div class="d-flex align-items-center gap-3">
                <span class="label-caps text-ink-45" style="font-size: 9px;">Signature Dishes</span>
                <div class="chef-pagination"></div>
            </div>
            <div class="d-none d-sm-flex align-items-center gap-2 text-ink-40" style="font-size: 11px; letter-spacing: 0.05em;">
                <span>Handcrafted with fresh spices · Made to order</span>
            </div>
        </div>
    </div>
</section>
