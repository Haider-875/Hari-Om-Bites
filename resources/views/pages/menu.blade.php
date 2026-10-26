@extends('layouts.app')

@section('content')
<div x-data="{
    searchQuery: '',
    selectedTags: [],
    activeCategory: '{{ $categories->first()?->slug }}',
    menuDrawerOpen: false,

    toggleTag(tag) {
        if (this.selectedTags.includes(tag)) {
            this.selectedTags = this.selectedTags.filter(t => t !== tag);
        } else {
            this.selectedTags.push(tag);
        }
    },

    clearFilters() {
        this.searchQuery = '';
        this.selectedTags = [];
    },

    matchesItem(name, desc, tags) {
        const query = this.searchQuery.trim().toLowerCase();
        const matchesQuery = !query || name.toLowerCase().includes(query) || desc.toLowerCase().includes(query);
        const matchesTags = !this.selectedTags.length || this.selectedTags.every(t => tags.includes(t));
        return matchesQuery && matchesTags;
    },

    scrollToCategory(id) {
        this.activeCategory = id;
        this.menuDrawerOpen = false;
        const target = document.getElementById(id);
        if (target) {
            const top = target.getBoundingClientRect().top + window.scrollY - 150;
            window.scrollTo({ top: top, behavior: 'smooth' });
        }
    },

    init() {
        if (window.location.hash) {
            const hash = window.location.hash.substring(1);
            setTimeout(() => this.scrollToCategory(hash), 300);
        }

        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('section[id]');
            const scrollPos = window.scrollY + 200;
            sections.forEach(section => {
                if (section.offsetTop <= scrollPos && (section.offsetTop + section.offsetHeight) > scrollPos) {
                    this.activeCategory = section.id;
                }
            });
        }, { passive: true });
    }
}"
class="min-h-screen bg-paper">

    <!-- Hero Spice Banner -->
    <section class="relative isolate overflow-hidden bg-ink pb-14 pt-28 sm:pb-16 sm:pt-36">
        <div class="absolute inset-0 opacity-25">
            <img src="{{ asset('images/spices.png') }}"
                 alt="Whole Indian spices in dark bowls"
                 class="h-full w-full object-cover" />
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-ink/90 via-ink/70 to-ink"></div>

        <div class="relative mx-auto max-w-[92rem] px-5 sm:px-8">
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 text-[10px] uppercase tracking-[0.22em] text-white/50 transition-colors hover:text-saffron">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Hari Om · Fairbanks
            </a>

            <div class="mt-8 flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="label-caps text-saffron">The digital menu</p>
                    <h1 class="mt-4 font-display text-5xl leading-[0.95] text-paper sm:text-6xl lg:text-7xl">
                        From the tandoor,
                        <span class="block italic text-saffron">to your table</span>
                    </h1>
                    <p class="mt-5 max-w-md text-sm leading-[1.85] text-white/60">
                        Every curry, biryani, bread and pour — cooked fresh to order in Fairbanks.
                    </p>
                </div>

                <div class="flex items-center gap-6 border-t border-white/10 pt-6 lg:border-t-0 lg:pt-0">
                    <div>
                        <p class="font-display text-4xl text-saffron">{{ $categories->sum(fn($c) => $c->menuItems->count()) }}</p>
                        <p class="mt-1 text-[9px] uppercase tracking-[0.2em] text-white/40">Dishes available</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search & Dietary Filter Sticky Bar -->
    <div class="sticky top-16 z-30 border-y border-terracotta/15 bg-paper/95 py-4 backdrop-blur-md lg:top-20">
        <div class="mx-auto flex max-w-[92rem] flex-col gap-4 px-5 sm:flex-row sm:items-center sm:justify-between sm:px-8">
            <!-- Search Input -->
            <div class="relative flex-1 max-w-md">
                <svg class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-ink/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text"
                       x-model="searchQuery"
                       placeholder="Search dishes, ingredients, curries..."
                       class="w-full rounded-full border border-ink/15 bg-white/70 py-2.5 pl-10 pr-9 text-xs tracking-wide text-ink placeholder-ink/40 transition-colors focus:border-terracotta focus:bg-white focus:outline-none" />
                <button type="button"
                        x-show="searchQuery.length > 0"
                        @click="searchQuery = ''"
                        style="display: none;"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-ink/40 hover:text-ink text-sm">&times;</button>
            </div>

            <!-- Dietary Filter Pills & Clear Action -->
            <div class="flex flex-wrap items-center gap-2">
                <button type="button"
                        @click="toggleTag('GF')"
                        :class="selectedTags.includes('GF') ? 'bg-terracotta text-paper border-terracotta' : 'bg-white/60 text-ink/70 border-ink/15 hover:border-terracotta/40'"
                        class="rounded-full border px-4 py-2 text-[10px] uppercase tracking-[0.16em] transition-colors">
                    Gluten Free (GF)
                </button>
                <button type="button"
                        @click="toggleTag('V')"
                        :class="selectedTags.includes('V') ? 'bg-terracotta text-paper border-terracotta' : 'bg-white/60 text-ink/70 border-ink/15 hover:border-terracotta/40'"
                        class="rounded-full border px-4 py-2 text-[10px] uppercase tracking-[0.16em] transition-colors">
                    Vegetarian (V)
                </button>
                <button type="button"
                        x-show="searchQuery || selectedTags.length > 0"
                        @click="clearFilters()"
                        style="display: none;"
                        class="text-[10px] uppercase tracking-[0.16em] text-terracotta underline ml-2 hover:text-ink">
                    Clear all
                </button>
            </div>
        </div>

        <!-- Category Horizontal Quick Scroll Bar -->
        <div class="mx-auto max-w-[92rem] px-5 sm:px-8 mt-3">
            <div class="flex gap-2 overflow-x-auto pb-1 [scrollbar-width:none]">
                @foreach($categories as $cat)
                    <button type="button"
                            @click="scrollToCategory('{{ $cat->slug }}')"
                            :class="activeCategory === '{{ $cat->slug }}' ? 'border-terracotta text-terracotta bg-terracotta/5 font-semibold' : 'border-transparent text-ink/50 hover:text-ink'"
                            class="shrink-0 rounded-sm border-b-2 px-3 py-1.5 text-[10px] uppercase tracking-[0.18em] transition-colors">
                        {{ $cat->name }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Main Menu Content Container -->
    <div class="mx-auto max-w-[92rem] px-5 py-12 sm:px-8 sm:py-16">
        @foreach($categories as $cat)
            <section id="{{ $cat->slug }}" class="mb-20 scroll-mt-36 last:mb-0">
                <!-- Category Heading -->
                <div class="border-b border-terracotta/20 pb-4">
                    <div class="flex items-baseline justify-between">
                        <h2 class="font-display text-4xl text-ember sm:text-5xl">{{ $cat->name }}</h2>
                        <span class="text-[10px] uppercase tracking-[0.2em] text-ink/40">{{ $cat->menuItems->count() }} items</span>
                    </div>
                    @if($cat->tagline)
                        <p class="mt-1 text-xs text-terracotta/75 italic">{{ $cat->tagline }}</p>
                    @endif
                </div>

                @if($cat->layout !== 'lists')
                    <!-- Standard Row Layout Items -->
                    <div class="divide-y divide-dashed divide-ink/10">
                        @foreach($cat->menuItems as $item)
                            <div x-show="matchesItem('{{ addslashes($item->name) }}', '{{ addslashes($item->description) }}', {{ json_encode($item->tags ?: []) }})"
                                 class="group dashed-row py-5 sm:py-6">
                                <div class="flex items-start gap-4 sm:gap-5">
                                    <!-- Image Thumbnail -->
                                    <div class="relative shrink-0">
                                        <span class="absolute -inset-1.5 rounded-full bg-saffron/0 transition-colors duration-500 group-hover:bg-saffron/10"></span>
                                        <div class="relative h-[68px] w-[68px] overflow-hidden rounded-full ring-1 ring-ink/5 shadow-[0_14px_30px_-18px_rgba(23,23,23,0.55)] transition-transform duration-700 group-hover:scale-[1.07] sm:h-[86px] sm:w-[86px] lg:h-[96px] lg:w-[96px]">
                                            <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="h-full w-full object-cover" />
                                        </div>
                                    </div>

                                    <!-- Item Details -->
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-baseline justify-between gap-3">
                                            <h4 class="text-[15px] font-semibold leading-snug text-ember sm:text-base">
                                                <span>{{ $item->name }}</span>
                                                @if($item->tags)
                                                    @foreach($item->tags as $tag)
                                                        <span class="ml-1.5 align-middle text-[9px] font-medium uppercase tracking-[0.12em] text-terracotta/55">
                                                            ({{ $tag }})
                                                        </span>
                                                    @endforeach
                                                @endif
                                            </h4>
                                            <span class="shrink-0 text-[15px] font-semibold text-ember sm:text-base">
                                                {{ $item->price_label ?: ('$' . number_format($item->price, 0)) }}
                                            </span>
                                        </div>
                                        @if($item->description)
                                            <p class="mt-1.5 max-w-prose text-[13px] leading-relaxed text-ink/65 sm:text-sm">
                                                {{ $item->description }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Multi-dish / List Cards Layout (e.g. Thali Platter) -->
                    <div class="mt-6 grid gap-6 sm:grid-cols-2">
                        @foreach($cat->menuItems as $item)
                            <div x-show="matchesItem('{{ addslashes($item->name) }}', '{{ addslashes($item->description) }}', {{ json_encode($item->tags ?: []) }})"
                                 class="rounded-sm border border-terracotta/10 bg-white/60 p-6 sm:p-8">
                                <div class="flex items-center gap-5">
                                    <div class="h-20 w-20 shrink-0 overflow-hidden rounded-full ring-1 ring-ink/5 shadow-[0_16px_34px_-20px_rgba(23,23,23,0.6)] sm:h-24 sm:w-24">
                                        <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="h-full w-full object-cover" />
                                    </div>
                                    <div>
                                        <h4 class="font-display text-3xl leading-none text-ember">{{ $item->name }}</h4>
                                        <p class="mt-2 text-[11px] uppercase tracking-[0.22em] text-terracotta/60">
                                            {{ $item->price_label ?: ('$' . number_format($item->price, 0)) }}
                                        </p>
                                    </div>
                                </div>
                                @if($item->details)
                                    <ul class="mt-6 space-y-2.5">
                                        @foreach($item->details as $line)
                                            <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70">
                                                <span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>
                                                <span>{{ $line }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        @endforeach
    </div>

    <!-- Floating "Our Menu" Quick Navigation Button (Component aO) -->
    <div class="fixed bottom-5 right-5 z-40 sm:bottom-7 sm:right-7">
        <button type="button"
                @click="menuDrawerOpen = true"
                class="flex items-center gap-2 rounded-sm bg-ink px-5 py-3 text-[10px] uppercase tracking-[0.2em] text-paper shadow-[0_18px_40px_-18px_rgba(23,23,23,0.8)] transition-colors duration-300 hover:bg-terracotta">
            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
            Our Menu
        </button>
    </div>

    <!-- Quick Jump Modal Dialog -->
    <div x-show="menuDrawerOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none;"
         class="fixed inset-0 z-50 flex items-end justify-center bg-ink/60 p-4 backdrop-blur-sm sm:items-center">
        <div @click.away="menuDrawerOpen = false"
             class="w-full max-w-lg rounded-sm bg-paper p-6 shadow-2xl sm:p-8">
            <div class="flex items-center justify-between">
                <p class="label-caps text-saffron">Jump to a section</p>
                <button type="button"
                        aria-label="Close menu navigation"
                        @click="menuDrawerOpen = false"
                        class="flex h-8 w-8 items-center justify-center rounded-full border border-ink/10 text-ink/50 transition-colors hover:text-ink">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Categories 2-Column List -->
            <div class="mt-5 grid grid-cols-2 gap-x-4">
                @foreach($categories as $idx => $cat)
                    <button type="button"
                            @click="scrollToCategory('{{ $cat->slug }}')"
                            class="group flex items-baseline justify-between border-b border-dashed border-ink/10 py-3 text-left transition-colors hover:border-terracotta/40">
                        <span class="text-sm text-ink/80 transition-colors group-hover:text-terracotta">{{ $cat->name }}</span>
                        <span class="text-[9px] uppercase tracking-[0.16em] text-ink/30">0{{ $idx + 1 }}</span>
                    </button>
                @endforeach
            </div>

            <!-- Back to top button -->
            <button type="button"
                    @click="window.scrollTo({ top: 0, behavior: 'smooth' }); menuDrawerOpen = false"
                    class="mt-6 flex w-full items-center justify-center gap-2 rounded-sm bg-terracotta py-3 text-[10px] uppercase tracking-[0.2em] text-paper transition-colors hover:bg-ink">
                <span>Back to top</span>
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                </svg>
            </button>
        </div>
    </div>
</div>
@endsection
