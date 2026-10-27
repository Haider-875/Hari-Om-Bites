@extends('layouts.app')

@section('content')
<div class="min-vh-100 bg-paper" x-data="{ 
    activeCategory: 'All',
    modalOpen: false,
    activeItem: null,
    openModal(item) {
        this.activeItem = item;
        this.modalOpen = true;
    }
}">
    <!-- Gallery Hero Banner -->
    <section class="position-relative overflow-hidden bg-ink py-5" style="padding-top: 8rem !important; padding-bottom: 5rem !important;">
        <div class="position-absolute inset-0" style="opacity: 0.25;">
            <img src="/images/tandoor.png" class="w-100 h-100 object-cover" alt="Clay tandoor oven baking naan">
        </div>
        <div class="position-absolute inset-0 bg-gradient-b-hero"></div>

        <div class="position-relative max-w-92rem px-3 px-sm-4 text-center text-sm-start">
            <p class="label-caps text-saffron m-0" style="font-size: 10px; letter-spacing: 0.2em;">Visual Journey</p>
            <h1 class="mt-3 font-display text-paper m-0" style="font-size: 26px; line-height: 1.25;">
                Food & Atmosphere<span class="d-block fst-italic text-terracotta">Gallery</span>
            </h1>
            <p class="mt-3 max-w-2xl text-white-70 leading-relaxed m-0" style="font-size: 14px;">
                Explore the colorful vibrancy of our kitchen — from freshly blistered tandoori breads and slow-simmered rich curries to our cozy, warm Fairbanks dining room.
            </p>
        </div>
    </section>

    <!-- Interactive Category Filter Navigation -->
    <div class="sticky-top border-top border-bottom border-terracotta-15 bg-paper-95 py-3 backdrop-blur-md" style="top: 4.75rem; z-index: 1020;">
        <div class="max-w-92rem px-3 px-sm-4 d-flex align-items-center justify-content-between gap-3">
            <div class="d-flex align-items-center gap-2 overflow-x-auto pb-1 pb-sm-0" style="scrollbar-width: none; -ms-overflow-style: none; -webkit-overflow-scrolling: touch;">
                <button type="button" 
                        @click="activeCategory = 'All'" 
                        class="rounded-full px-3 px-sm-4 py-2 text-uppercase tracking-wider-custom transition-all cursor-pointer fw-medium border-0 flex-shrink-0"
                        style="font-size: 10px; min-height: 38px;"
                        :class="activeCategory === 'All' ? 'bg-terracotta text-paper shadow-sm' : 'border border-terracotta-25 text-terracotta bg-transparent'">
                    All Imagery
                </button>
                <button type="button" 
                        @click="activeCategory = 'Dishes'" 
                        class="rounded-full px-3 px-sm-4 py-2 text-uppercase tracking-wider-custom transition-all cursor-pointer fw-medium border-0 flex-shrink-0"
                        style="font-size: 10px; min-height: 38px;"
                        :class="activeCategory === 'Dishes' ? 'bg-terracotta text-paper shadow-sm' : 'border border-terracotta-25 text-terracotta bg-transparent'">
                    Dishes & Curries
                </button>
                <button type="button" 
                        @click="activeCategory = 'Craft'" 
                        class="rounded-full px-3 px-sm-4 py-2 text-uppercase tracking-wider-custom transition-all cursor-pointer fw-medium border-0 flex-shrink-0"
                        style="font-size: 10px; min-height: 38px;"
                        :class="activeCategory === 'Craft' ? 'bg-terracotta text-paper shadow-sm' : 'border border-terracotta-25 text-terracotta bg-transparent'">
                    Tandoor & Spices
                </button>
                <button type="button" 
                        @click="activeCategory = 'Interior'" 
                        class="rounded-full px-3 px-sm-4 py-2 text-uppercase tracking-wider-custom transition-all cursor-pointer fw-medium border-0 flex-shrink-0"
                        style="font-size: 10px; min-height: 38px;"
                        :class="activeCategory === 'Interior' ? 'bg-terracotta text-paper shadow-sm' : 'border border-terracotta-25 text-terracotta bg-transparent'">
                    Atmosphere & Booths
                </button>
            </div>

            <div class="d-none d-sm-block flex-shrink-0">
                <a href="{{ route('menu') }}" class="btn-primary" style="min-height: 38px;">
                    View Menu
                </a>
            </div>
        </div>
    </div>

    <!-- Gallery Grid with Lightbox Triggers -->
    <section class="py-5" style="padding-top: 4rem !important; padding-bottom: 5rem !important;">
        <div class="max-w-92rem px-3 px-sm-4">
            <div class="row g-4">
                @foreach ($galleryItems as $item)
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3"
                         x-show="activeCategory === 'All' || activeCategory === '{{ $item['category'] }}'"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100">
                        <div @click="openModal({{ json_encode($item) }})"
                             class="position-relative cursor-pointer overflow-hidden rounded-sm border border-terracotta-15 bg-ink shadow-sm transition-all hover-scale-103 h-100">
                            
                            <div class="aspect-4-3 w-100 overflow-hidden">
                                <img src="{{ $item['img'] }}" 
                                     class="w-100 h-100 object-cover" 
                                     alt="{{ $item['title'] }}"
                                     loading="lazy">
                            </div>

                            <!-- Gradient Overlay & Info -->
                            <div class="position-absolute inset-0 bg-gradient-t-ink opacity-75"></div>
                            <div class="position-absolute inset-0 d-flex flex-column justify-content-end p-4">
                                <span class="text-uppercase tracking-widest-custom text-saffron m-0" style="font-size: 10px;">{{ $item['category'] }}</span>
                                <h3 class="mt-1 font-display text-paper m-0" style="font-size: 20px; line-height: 1.25;">{{ $item['title'] }}</h3>
                                <p class="mt-2 line-clamp-2 text-white-70 m-0" style="font-size: 14px;">{{ $item['caption'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal Lightbox -->
    <div x-show="modalOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak
         class="modal-overlay bg-ink-90 p-3 backdrop-blur-md">
        
        <div @click.away="modalOpen = false" class="position-relative max-w-3xl w-100 overflow-hidden rounded-sm bg-paper shadow-lg border border-terracotta-20 text-ink" style="max-height: 90vh; overflow-y: auto; -webkit-overflow-scrolling: touch;">
            <button type="button" 
                    @click.stop="modalOpen = false" 
                    class="position-absolute d-flex align-items-center justify-content-center rounded-full bg-ink-80 text-paper border-0 cursor-pointer w-10 h-10" 
                    style="top: 1rem; right: 1rem; z-index: 20;"
                    aria-label="Close image modal">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="pointer-events: none;"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>

            <template x-if="activeItem">
                <div>
                    <div class="w-100 overflow-hidden bg-ink" style="aspect-ratio: 16/10;">
                        <img :src="activeItem.img" :alt="activeItem.title" class="w-100 h-100 object-cover">
                    </div>
                    <div class="p-4 p-sm-5">
                        <span class="text-uppercase tracking-widest-custom text-saffron m-0" style="font-size: 10px;" x-text="activeItem.category"></span>
                        <h3 class="mt-2 font-display text-ember m-0" style="font-size: 26px; line-height: 1.25;" x-text="activeItem.title"></h3>
                        <p class="mt-3 leading-relaxed text-ink-75 m-0" style="font-size: 14px;" x-text="activeItem.caption"></p>
                        <div class="mt-4 pt-2 d-flex flex-column flex-sm-row justify-content-center justify-content-sm-start align-items-center gap-3">
                            <a href="{{ route('menu') }}" class="btn-primary w-100 w-sm-auto text-center justify-content-center" style="min-height: 38px;">
                                Order on Menu
                            </a>
                            <button type="button" @click="modalOpen = false" class="btn-primary w-100 w-sm-auto text-center justify-content-center" style="min-height: 38px;">
                                Close Preview
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!-- Bottom Reservation Banner -->
    <section class="bg-paper-dark border-top border-terracotta-15 py-5 text-center">
        <div class="max-w-3xl px-3 mx-auto">
            <p class="label-caps text-saffron m-0" style="font-size: 10px; letter-spacing: 0.2em;">Taste in Person</p>
            <h2 class="mt-2 font-display text-ember m-0" style="font-size: 26px; line-height: 1.25;">Join Us for Dinner Tonight</h2>
            <p class="mt-2 text-ink-65 m-0" style="font-size: 14px;">Serving authentic Punjabi flavors on S Cushman Street in Fairbanks.</p>
            <div class="mt-4 pt-2 d-flex flex-row flex-nowrap justify-content-center align-items-center gap-2 gap-sm-3 gallery-button-row">
                <a href="{{ route('reservations') }}" class="btn-primary text-center justify-content-center text-nowrap px-3" style="min-height: 38px; width: auto; max-width: none; margin: 0 !important;">
                    Book a Table
                </a>
                <a href="tel:+19073283218" class="btn-primary text-center justify-content-center text-nowrap px-3" style="min-height: 38px; width: auto; max-width: none; margin: 0 !important;">
                    Call +1 907-328-3218
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
