@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-paper" x-data="{ 
    activeCategory: 'All',
    modalOpen: false,
    activeItem: null,
    openModal(item) {
        this.activeItem = item;
        this.modalOpen = true;
    }
}">
    <!-- Gallery Hero Banner -->
    <section class="relative isolate overflow-hidden bg-ink pb-16 pt-32 sm:pb-24 sm:pt-40">
        <div class="absolute inset-0 opacity-25">
            <img src="/images/tandoor.png" class="h-full w-full object-cover" alt="Clay tandoor oven baking naan">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-ink/90 via-ink/75 to-ink"></div>

        <div class="relative mx-auto max-w-[92rem] px-5 sm:px-8 text-center sm:text-left">
            <p class="label-caps text-saffron">Visual Journey</p>
            <h1 class="mt-4 font-display text-5xl leading-[0.95] text-paper sm:text-7xl lg:text-8xl">
                Food & Atmosphere<span class="block italic text-terracotta">Gallery</span>
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-relaxed text-white/70">
                Explore the colorful vibrancy of our kitchen — from freshly blistered tandoori breads and slow-simmered rich curries to our cozy, warm Fairbanks dining room.
            </p>
        </div>
    </section>

    <!-- Interactive Category Filter Navigation -->
    <div class="sticky top-16 z-30 border-y border-terracotta/15 bg-paper/95 py-4 backdrop-blur-md lg:top-20">
        <div class="mx-auto flex max-w-[92rem] items-center justify-between px-5 sm:px-8">
            <div class="flex flex-wrap gap-2">
                <button type="button" 
                        @click="activeCategory = 'All'" 
                        class="rounded-full px-5 py-2.5 text-[10px] uppercase tracking-[0.2em] transition-all cursor-pointer font-medium"
                        :class="activeCategory === 'All' ? 'bg-terracotta text-paper shadow-md' : 'border border-terracotta/25 text-terracotta hover:bg-terracotta/10'">
                    All Imagery
                </button>
                <button type="button" 
                        @click="activeCategory = 'Dishes'" 
                        class="rounded-full px-5 py-2.5 text-[10px] uppercase tracking-[0.2em] transition-all cursor-pointer font-medium"
                        :class="activeCategory === 'Dishes' ? 'bg-terracotta text-paper shadow-md' : 'border border-terracotta/25 text-terracotta hover:bg-terracotta/10'">
                    Dishes & Curries
                </button>
                <button type="button" 
                        @click="activeCategory = 'Craft'" 
                        class="rounded-full px-5 py-2.5 text-[10px] uppercase tracking-[0.2em] transition-all cursor-pointer font-medium"
                        :class="activeCategory === 'Craft' ? 'bg-terracotta text-paper shadow-md' : 'border border-terracotta/25 text-terracotta hover:bg-terracotta/10'">
                    Tandoor & Spices
                </button>
                <button type="button" 
                        @click="activeCategory = 'Interior'" 
                        class="rounded-full px-5 py-2.5 text-[10px] uppercase tracking-[0.2em] transition-all cursor-pointer font-medium"
                        :class="activeCategory === 'Interior' ? 'bg-terracotta text-paper shadow-md' : 'border border-terracotta/25 text-terracotta hover:bg-terracotta/10'">
                    Atmosphere & Booths
                </button>
            </div>

            <div class="hidden sm:block">
                <a href="{{ route('menu') }}" class="btn-primary">
                    View Menu
                </a>
            </div>
        </div>
    </div>

    <!-- Gallery Grid with Lightbox Triggers -->
    <section class="py-16 sm:py-24">
        <div class="mx-auto max-w-[92rem] px-5 sm:px-8">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($galleryItems as $item)
                    <div x-show="activeCategory === 'All' || activeCategory === '{{ $item['category'] }}'"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         @click="openModal({{ json_encode($item) }})"
                         class="group relative cursor-pointer overflow-hidden rounded-sm border border-terracotta/15 bg-ink shadow-md transition-all duration-500 hover:-translate-y-1.5 hover:shadow-2xl">
                        
                        <div class="aspect-[4/3] w-full overflow-hidden">
                            <img src="{{ $item['img'] }}" 
                                 class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" 
                                 alt="{{ $item['title'] }}"
                                 loading="lazy">
                        </div>

                        <!-- Gradient Overlay & Info -->
                        <div class="absolute inset-0 bg-gradient-to-t from-ink via-ink/30 to-transparent opacity-80 transition-opacity duration-300 group-hover:opacity-95"></div>
                        <div class="absolute inset-0 flex flex-col justify-end p-6">
                            <span class="text-[9px] uppercase tracking-[0.25em] text-saffron">{{ $item['category'] }}</span>
                            <h3 class="mt-1 font-display text-2xl text-paper">{{ $item['title'] }}</h3>
                            <p class="mt-2 line-clamp-2 text-xs text-white/70">{{ $item['caption'] }}</p>
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
         class="fixed inset-0 z-50 flex items-center justify-center bg-ink/90 p-4 backdrop-blur-md">
        
        <div @click.away="modalOpen = false" class="relative max-w-3xl w-full overflow-hidden rounded-sm bg-paper shadow-2xl border border-terracotta/20 text-ink">
            <button @click="modalOpen = false" class="absolute right-4 top-4 z-10 flex h-10 w-10 items-center justify-center rounded-full bg-ink/80 text-paper hover:bg-ink">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>

            <template x-if="activeItem">
                <div>
                    <div class="aspect-[16/10] w-full overflow-hidden bg-ink">
                        <img :src="activeItem.img" :alt="activeItem.title" class="h-full w-full object-cover">
                    </div>
                    <div class="p-8">
                        <span class="text-[10px] uppercase tracking-[0.25em] text-saffron" x-text="activeItem.category"></span>
                        <h3 class="mt-2 font-display text-3xl text-ember" x-text="activeItem.title"></h3>
                        <p class="mt-3 text-sm leading-relaxed text-ink/75" x-text="activeItem.caption"></p>
                        <div class="mt-6 flex gap-4">
                            <a href="{{ route('menu') }}" class="btn-primary">
                                Order on Menu
                            </a>
                            <button type="button" @click="modalOpen = false" class="btn-secondary">
                                Close Preview
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!-- Bottom Reservation Banner -->
    <section class="bg-paper-dark border-t border-terracotta/15 py-16 text-center">
        <div class="mx-auto max-w-3xl px-5">
            <p class="label-caps text-saffron">Taste in Person</p>
            <h2 class="mt-4 font-display text-4xl text-ember sm:text-5xl">Join Us for Dinner Tonight</h2>
            <p class="mt-4 text-sm text-ink/65">Serving authentic Punjabi flavors on S Cushman Street in Fairbanks.</p>
            <div class="mt-8 flex justify-center gap-4">
                <a href="{{ route('reservations') }}" class="btn-primary">
                    Book a Table
                </a>
                <a href="tel:+19073283218" class="btn-secondary">
                    Call +1 907-328-3218
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
