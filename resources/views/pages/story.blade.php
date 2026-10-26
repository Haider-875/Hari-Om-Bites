@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-paper">
    <!-- Story Hero Banner -->
    <section class="relative isolate overflow-hidden bg-ink pb-20 pt-32 sm:pb-28 sm:pt-40">
        <div class="absolute inset-0 opacity-25">
            <img src="/images/spices.png" class="h-full w-full object-cover" alt="Indian spices on dark background">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-ink/90 via-ink/75 to-ink"></div>

        <div class="relative mx-auto max-w-[92rem] px-5 sm:px-8">
            <div class="max-w-3xl">
                <p class="label-caps text-saffron">Our Heritage & Craft</p>
                <h1 class="mt-4 font-display text-5xl leading-[0.95] text-paper sm:text-7xl lg:text-8xl">
                    A Warm Hearth in<span class="block italic text-terracotta">Sub-Zero Alaska</span>
                </h1>
                <p class="mt-7 max-w-2xl text-base leading-relaxed text-white/70 sm:text-lg">
                    Since opening our doors on South Cushman Street in Fairbanks, Hari Om Cuisine of India has stood as an authentic culinary sanctuary — bringing the deep aromas, clay-oven traditions, and golden spices of Punjab to the heart of Alaska.
                </p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="{{ route('menu') }}" class="btn-primary">
                        Explore Full Menu
                    </a>
                    <a href="{{ route('reservations') }}" class="btn-secondary-dark">
                        Reserve a Table
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Heritage Stats Bar -->
    <section class="border-y border-terracotta/15 bg-white/60 py-10">
        <div class="mx-auto grid max-w-[92rem] grid-cols-2 gap-8 px-5 sm:grid-cols-4 sm:px-8">
            <div class="text-center sm:text-left">
                <p class="font-display text-4xl text-ember sm:text-5xl">14+</p>
                <p class="mt-1 text-[10px] uppercase tracking-[0.2em] text-ink/50">Years on Cushman St</p>
            </div>
            <div class="text-center sm:text-left">
                <p class="font-display text-4xl text-terracotta sm:text-5xl">800°</p>
                <p class="mt-1 text-[10px] uppercase tracking-[0.2em] text-ink/50">Clay Tandoor Oven</p>
            </div>
            <div class="text-center sm:text-left">
                <p class="font-display text-4xl text-saffron sm:text-5xl">61</p>
                <p class="mt-1 text-[10px] uppercase tracking-[0.2em] text-ink/50">Dishes & Pours</p>
            </div>
            <div class="text-center sm:text-left">
                <p class="font-display text-4xl text-ember sm:text-5xl">100%</p>
                <p class="mt-1 text-[10px] uppercase tracking-[0.2em] text-ink/50">Fresh Ground Spices</p>
            </div>
        </div>
    </section>

    <!-- Narrative Section: From Punjab to Fairbanks -->
    <section class="py-20 sm:py-28">
        <div class="mx-auto max-w-[92rem] px-5 sm:px-8">
            <div class="grid gap-12 lg:grid-cols-12 lg:gap-16 items-center">
                <!-- Left Narrative -->
                <div class="lg:col-span-6">
                    <p class="label-caps text-saffron">The Tradition</p>
                    <h2 class="mt-4 font-display text-4xl leading-tight text-ember sm:text-5xl">
                        Slow Food, Clay Ovens &<span class="block italic text-terracotta">Generations of Flavor</span>
                    </h2>
                    <div class="mt-6 space-y-4 text-sm leading-relaxed text-ink/75 sm:text-base">
                        <p>
                            In our home region of Punjab, cooking is never rushed. From sun-dried coriander, green cardamom, and Kashmiri chilies ground each dawn to curries simmered for hours until the aromatics melt into velvety reductions, Indian cuisine is an act of heartfelt devotion.
                        </p>
                        <p>
                            When we brought this tradition to Fairbanks, Alaska, we made a solemn promise: never cut corners, never use pre-packaged pastes, and bake every naan bread fresh inside an authentic clay tandoor oven fired to blistered perfection.
                        </p>
                        <p>
                            Whether temperatures drop to forty below outside or midnight sun washes over the Chena River, walking into Hari Om wraps you in warmth, music, and the unmistakable scent of roasting cumin and clarified ghee.
                        </p>
                    </div>

                    <div class="mt-8 flex gap-4">
                        <a href="tel:+19073283218" class="btn-primary">
                            Call the Kitchen
                        </a>
                        <a href="{{ route('gallery') }}" class="btn-secondary">
                            View Photo Gallery
                        </a>
                    </div>
                </div>

                <!-- Right Visual Mosaic -->
                <div class="lg:col-span-6 grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="overflow-hidden rounded-sm bg-ink shadow-lg">
                            <img src="/images/tandoor.png" class="h-64 w-full object-cover transition-transform duration-700 hover:scale-105" alt="Tandoor Oven Craft">
                        </div>
                        <div class="overflow-hidden rounded-sm bg-ink shadow-lg">
                            <img src="/images/cultureShrine.jpg" class="h-48 w-full object-cover transition-transform duration-700 hover:scale-105" alt="Shrine of Ganesh">
                        </div>
                    </div>
                    <div class="space-y-4 pt-8">
                        <div class="overflow-hidden rounded-sm bg-ink shadow-lg">
                            <img src="/images/cultureBooths.jpg" class="h-48 w-full object-cover transition-transform duration-700 hover:scale-105" alt="Dining Room Booths">
                        </div>
                        <div class="overflow-hidden rounded-sm bg-ink shadow-lg">
                            <img src="/images/lamb.png" class="h-64 w-full object-cover transition-transform duration-700 hover:scale-105" alt="Slow Braised Lamb Curry">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cultural Gallery Carousel -->
    <section class="bg-paper-dark py-20 sm:py-28">
        <div class="mx-auto max-w-[92rem] px-5 sm:px-8">
            <div class="flex flex-col justify-between gap-4 md:flex-row md:items-end">
                <div>
                    <p class="label-caps text-saffron">Inside Hari Om</p>
                    <h2 class="mt-4 font-display text-4xl text-ember sm:text-5xl">Atmosphere & Spirit</h2>
                </div>
                <p class="max-w-md text-xs leading-relaxed text-ink/65 sm:text-sm">
                    Swipe or browse through the visual details that make our Cushman Street dining room an authentic home away from home.
                </p>
            </div>

            <!-- Swiper Gallery Container -->
            <div class="mt-12">
                <div class="swiper gallery-swiper overflow-hidden pb-12">
                    <div class="swiper-wrapper">
                        @foreach ($cultureGallery as $item)
                            <div class="swiper-slide h-auto">
                                <div class="group relative flex h-full flex-col overflow-hidden rounded-sm border border-terracotta/15 bg-paper shadow-md transition-all duration-500 hover:-translate-y-1.5 hover:shadow-xl">
                                    <div class="relative aspect-[4/3] w-full overflow-hidden bg-ink">
                                        <img src="{{ $item['src'] }}" 
                                             class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" 
                                             alt="{{ $item['title'] }}"
                                             loading="lazy">
                                        <div class="absolute inset-0 bg-gradient-to-t from-ink/60 via-transparent to-transparent"></div>
                                    </div>
                                    <div class="flex flex-1 flex-col justify-between p-6">
                                        <div>
                                            <h3 class="font-display text-2xl text-ember">{{ $item['title'] }}</h3>
                                            <p class="mt-2 text-xs leading-relaxed text-ink/65">{{ $item['caption'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination Indicators -->
                    <div class="swiper-pagination mt-6"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dine With Us CTA -->
    <section class="bg-ink py-20 text-paper sm:py-24">
        <div class="mx-auto max-w-4xl px-5 text-center sm:px-8">
            <p class="label-caps text-saffron">Join Us for Dinner</p>
            <h2 class="mt-4 font-display text-4xl leading-tight text-paper sm:text-5xl lg:text-6xl">
                Experience Genuine Punjabi Hospitality
            </h2>
            <p class="mx-auto mt-6 max-w-2xl text-sm leading-relaxed text-white/60 sm:text-base">
                Whether celebrating a milestone or seeking the comforting embrace of hot tandoor bread and slow-simmered curry, a table is waiting for you.
            </p>
            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="{{ route('reservations') }}" class="btn-primary">
                    Book Your Table
                </a>
                <a href="{{ route('contact') }}" class="btn-secondary-dark">
                    Directions & Hours
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
