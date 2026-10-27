@extends('layouts.app')

@section('content')
<div class="min-vh-100 bg-paper">
    <!-- Story Hero Banner -->
    <section class="position-relative overflow-hidden bg-ink py-5" style="padding-top: 8rem !important; padding-bottom: 5rem !important;">
        <div class="position-absolute inset-0" style="opacity: 0.25;">
            <img src="/images/spices.png" class="w-100 h-100 object-cover" alt="Indian spices on dark background">
        </div>
        <div class="position-absolute inset-0 bg-gradient-b-hero"></div>

        <div class="position-relative max-w-92rem px-3 px-sm-4">
            <div class="max-w-3xl">
                <p class="label-caps text-saffron m-0">Our Heritage & Craft</p>
                <h1 class="mt-3 font-display text-paper display-title-hero m-0">
                    A Warm Hearth in<span class="d-block fst-italic text-terracotta">Sub-Zero Alaska</span>
                </h1>
                <p class="mt-4 max-w-2xl text-white-70 leading-relaxed fs-6 m-0">
                    Since opening our doors on South Cushman Street in Fairbanks, Hari Om Cuisine of India has stood as an authentic culinary sanctuary — bringing the deep aromas, clay-oven traditions, and golden spices of Punjab to the heart of Alaska.
                </p>
                <div class="mt-4 pt-2 d-flex flex-column flex-sm-row justify-content-center justify-content-sm-start align-items-center gap-3">
                    <a href="{{ route('menu') }}" class="btn-primary w-100 w-sm-auto text-center justify-content-center" style="min-height: 38px;">
                        Explore Full Menu
                    </a>
                    <a href="{{ route('reservations') }}" class="btn-secondary w-100 w-sm-auto text-center justify-content-center" style="min-height: 38px;">
                        Reserve a Table
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Heritage Stats Bar -->
    <section class="border-top border-bottom border-terracotta-15 py-4" style="background-color: rgba(255, 255, 255, 0.6);">
        <div class="max-w-92rem px-3 px-sm-4">
            <div class="row g-4 text-center text-sm-start">
                <div class="col-6 col-sm-3">
                    <p class="font-display fs-1 text-ember m-0">14+</p>
                    <p class="mt-1 text-uppercase tracking-wider-custom text-ink-50 m-0" style="font-size: 10px;">Years on Cushman St</p>
                </div>
                <div class="col-6 col-sm-3">
                    <p class="font-display fs-1 text-terracotta m-0">800°</p>
                    <p class="mt-1 text-uppercase tracking-wider-custom text-ink-50 m-0" style="font-size: 10px;">Clay Tandoor Oven</p>
                </div>
                <div class="col-6 col-sm-3">
                    <p class="font-display fs-1 text-saffron m-0">61</p>
                    <p class="mt-1 text-uppercase tracking-wider-custom text-ink-50 m-0" style="font-size: 10px;">Dishes & Pours</p>
                </div>
                <div class="col-6 col-sm-3">
                    <p class="font-display fs-1 text-ember m-0">100%</p>
                    <p class="mt-1 text-uppercase tracking-wider-custom text-ink-50 m-0" style="font-size: 10px;">Fresh Ground Spices</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Narrative Section: From Punjab to Fairbanks -->
    <section class="py-5" style="padding-top: 5rem !important; padding-bottom: 5rem !important;">
        <div class="max-w-92rem px-3 px-sm-4">
            <div class="row g-4 g-lg-5 align-items-center">
                <!-- Left Narrative -->
                <div class="col-12 col-lg-6">
                    <p class="label-caps text-saffron m-0">The Tradition</p>
                    <h2 class="mt-3 font-display text-ember display-title-section m-0">
                        Slow Food, Clay Ovens &<span class="d-block fst-italic text-terracotta">Generations of Flavor</span>
                    </h2>
                    <div class="mt-4 d-flex flex-column gap-3 text-ink-75 leading-relaxed">
                        <p class="m-0">
                            In our home region of Punjab, cooking is never rushed. From sun-dried coriander, green cardamom, and Kashmiri chilies ground each dawn to curries simmered for hours until the aromatics melt into velvety reductions, Indian cuisine is an act of heartfelt devotion.
                        </p>
                        <p class="m-0">
                            When we brought this tradition to Fairbanks, Alaska, we made a solemn promise: never cut corners, never use pre-packaged pastes, and bake every naan bread fresh inside an authentic clay tandoor oven fired to blistered perfection.
                        </p>
                        <p class="m-0">
                            Whether temperatures drop to forty below outside or midnight sun washes over the Chena River, walking into Hari Om wraps you in warmth, music, and the unmistakable scent of roasting cumin and clarified ghee.
                        </p>
                    </div>

                    <div class="mt-4 pt-2 d-flex flex-column flex-sm-row justify-content-center justify-content-sm-start align-items-center gap-3">
                        <a href="tel:+19073283218" class="btn-primary w-100 w-sm-auto text-center justify-content-center" style="min-height: 38px;">
                            Call the Kitchen
                        </a>
                        <a href="{{ route('gallery') }}" class="btn-primary w-100 w-sm-auto text-center justify-content-center" style="min-height: 38px;">
                            View Photo Gallery
                        </a>
                    </div>
                </div>

                <!-- Right Visual Mosaic -->
                <div class="col-12 col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 d-flex flex-column gap-3">
                            <div class="overflow-hidden rounded-sm bg-ink shadow">
                                <img src="/images/tandoor.png" class="w-100 object-cover transition-transform hover-scale-105" style="height: 16rem;" alt="Tandoor Oven Craft">
                            </div>
                            <div class="overflow-hidden rounded-sm bg-ink shadow">
                                <img src="/images/cultureShrine.jpg" class="w-100 object-cover transition-transform hover-scale-105" style="height: 12rem;" alt="Shrine of Ganesh">
                            </div>
                        </div>
                        <div class="col-6 d-flex flex-column gap-3 pt-4">
                            <div class="overflow-hidden rounded-sm bg-ink shadow">
                                <img src="/images/cultureBooths.jpg" class="w-100 object-cover transition-transform hover-scale-105" style="height: 12rem;" alt="Dining Room Booths">
                            </div>
                            <div class="overflow-hidden rounded-sm bg-ink shadow">
                                <img src="/images/lamb.png" class="w-100 object-cover transition-transform hover-scale-105" style="height: 16rem;" alt="Slow Braised Lamb Curry">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cultural Gallery Carousel -->
    <section class="bg-paper-dark py-5" style="padding-top: 5rem !important; padding-bottom: 5rem !important;">
        <div class="max-w-92rem px-3 px-sm-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3">
                <div>
                    <p class="label-caps text-saffron m-0">Inside Hari Om</p>
                    <h2 class="mt-3 font-display text-ember display-title-section m-0">Atmosphere & Spirit</h2>
                </div>
                <p class="max-w-md small leading-relaxed text-ink-65 m-0">
                    Swipe or browse through the visual details that make our Cushman Street dining room an authentic home away from home.
                </p>
            </div>

            <!-- Swiper Gallery Container -->
            <div class="mt-4">
                <div class="swiper gallery-swiper overflow-hidden pb-5">
                    <div class="swiper-wrapper">
                        @foreach ($cultureGallery as $item)
                            <div class="swiper-slide h-auto">
                                <div class="position-relative d-flex flex-column h-100 overflow-hidden rounded-sm border border-terracotta-15 bg-paper shadow-sm transition-all hover-scale-103">
                                    <div class="position-relative aspect-4-3 w-100 overflow-hidden bg-ink">
                                        <img src="{{ $item['src'] }}" 
                                             class="w-100 h-100 object-cover" 
                                             alt="{{ $item['title'] }}" 
                                             loading="lazy">
                                        <div class="position-absolute inset-0 bg-gradient-t-ink-subtle"></div>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between p-4 flex-grow-1">
                                        <div>
                                            <h3 class="font-display fs-4 text-ember m-0">{{ $item['title'] }}</h3>
                                            <p class="mt-2 small leading-relaxed text-ink-65 m-0">{{ $item['caption'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination Indicators -->
                    <div class="swiper-pagination mt-4"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dine With Us CTA -->
    <section class="bg-ink py-5 text-paper" style="padding-top: 5rem !important; padding-bottom: 5rem !important;">
        <div class="max-w-4xl px-3 px-sm-4 text-center mx-auto">
            <p class="label-caps text-saffron m-0">Join Us for Dinner</p>
            <h2 class="mt-3 font-display text-paper display-title-hero m-0">
                Experience Genuine Punjabi Hospitality
            </h2>
            <p class="mx-auto mt-4 max-w-2xl small leading-relaxed text-white-60 m-0">
                Whether celebrating a milestone or seeking the comforting embrace of hot tandoor bread and slow-simmered curry, a table is waiting for you.
            </p>
            <div class="mt-4 pt-2 d-flex flex-column flex-sm-row justify-content-center align-items-center gap-3">
                <a href="{{ route('reservations') }}" class="btn-primary w-100 w-sm-auto text-center justify-content-center" style="min-height: 38px;">
                    Book Your Table
                </a>
                <a href="{{ route('contact') }}" class="btn-secondary w-100 w-sm-auto text-center justify-content-center" style="min-height: 38px;">
                    Directions & Hours
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
