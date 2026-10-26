@extends('layouts.app')

@section('content')
<div x-data="{
    searchQuery: '',
    selectedTags: [],
    activeCategory: '{{ $categories->first()?->slug }}',
    totalItems: {{ $categories->sum(fn($c) => $c->menuItems->count()) }},

    toggleTag(tag) {
        if (this.selectedTags.includes(tag)) {
            this.selectedTags = this.selectedTags.filter(t => t !== tag);
        } else {
            this.selectedTags.push(tag);
        }
    },

    matchesItem(name, desc, tags) {
        const query = this.searchQuery.trim().toLowerCase();
        const matchesQuery = !query || name.toLowerCase().includes(query) || (desc && desc.toLowerCase().includes(query));
        const matchesTags = !this.selectedTags.length || this.selectedTags.every(t => tags.includes(t));
        return matchesQuery && matchesTags;
    },

    get filteredCount() {
        let count = 0;
        document.querySelectorAll('[data-menu-item]').forEach(el => {
            if (el.offsetParent !== null) count++;
        });
        return count;
    },

    scrollToCategory(id) {
        this.activeCategory = id;
        const target = document.getElementById(id);
        if (target) {
            const top = target.getBoundingClientRect().top + window.scrollY - 160;
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

    <!-- Hero Spice Header Banner -->
    <section class="relative isolate overflow-hidden bg-ink pb-14 pt-28 sm:pb-16 sm:pt-36">
        <div class="absolute inset-0 opacity-25">
            <span class="inline-block relative h-full w-full">
                <img src="/images/spices.png" 
                     class="w-full h-full inset-0 absolute object-cover" 
                     alt="Whole Indian spices in dark bowls">
            </span>
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-ink/90 via-ink/70 to-ink"></div>

        <div class="relative mx-auto max-w-[92rem] px-5 sm:px-8">
            <a class="inline-flex items-center gap-2 text-[10px] uppercase tracking-[0.22em] text-white/50 transition-colors hover:text-saffron" 
               href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left h-3.5 w-3.5"><path d="m12 19-7-7 7-7"></path><path d="M19 12H5"></path></svg>
                Hari Om · Fairbanks
            </a>

            <div class="mt-8 flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="label-caps text-saffron">Dine in · Take out · Catering</p>
                    <h1 class="mt-4 font-display text-6xl leading-[0.9] text-paper sm:text-7xl lg:text-8xl">
                        Our Menu
                    </h1>
                    <p class="mt-5 max-w-xl text-sm leading-relaxed text-white/55">
                        61 dishes and pours, from crisp pakoras and tandoor breads to slow-cooked curries, thali platters, wine and Alaskan beer.
                    </p>
                </div>

                <a href="tel:+19073283218" 
                   class="inline-flex w-fit items-center gap-3 rounded-full bg-saffron px-6 py-4 text-[10px] font-semibold uppercase tracking-[0.2em] text-ink transition-colors hover:bg-paper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    Call to order · +1 907-328-3218
                </a>
            </div>
        </div>
    </section>

    <!-- Sticky Search & Category Navigation Bar -->
    <div class="sticky top-16 z-30 border-y border-terracotta/10 bg-paper/95 backdrop-blur-md lg:top-20">
        <div class="mx-auto max-w-6xl px-5 sm:px-8">
            <div class="flex items-center gap-3 pt-2.5">
                <!-- Search Input -->
                <div class="relative flex-1 sm:max-w-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search pointer-events-none absolute left-3 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-ink/35"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                    <input type="search" 
                           x-model="searchQuery" 
                           placeholder="Search the menu" 
                           aria-label="Search the menu" 
                           class="h-9 w-full rounded-full border border-terracotta/15 bg-white/70 pl-9 pr-3 text-xs text-ink placeholder:text-ink/35 focus:border-saffron focus:outline-none">
                </div>

                <!-- Dietary Filter Pills -->
                <div class="flex shrink-0 items-center gap-1.5">
                    <button type="button" 
                            @click="toggleTag('GF')"
                            title="Gluten free" 
                            class="rounded-full border px-3 py-2 text-[9px] uppercase tracking-[0.14em] transition-colors duration-300 cursor-pointer"
                            :class="selectedTags.includes('GF') ? 'bg-terracotta text-paper border-terracotta' : 'border-terracotta/20 text-terracotta/70 hover:border-terracotta/50'">
                        <span class="hidden sm:inline">Gluten free</span><span class="sm:hidden">GF</span>
                    </button>
                    <button type="button" 
                            @click="toggleTag('V')"
                            title="Vegetarian" 
                            class="rounded-full border px-3 py-2 text-[9px] uppercase tracking-[0.14em] transition-colors duration-300 cursor-pointer"
                            :class="selectedTags.includes('V') ? 'bg-terracotta text-paper border-terracotta' : 'border-terracotta/20 text-terracotta/70 hover:border-terracotta/50'">
                        <span class="hidden sm:inline">Vegetarian</span><span class="sm:hidden">V</span>
                    </button>
                </div>
            </div>

            <!-- Category Horizontal Scroller -->
            <div class="py-2.5">
                <div class="no-scrollbar -mx-5 flex gap-2 overflow-x-auto px-5 sm:mx-0 sm:px-0">
                    @foreach ($categories as $cat)
                        <button type="button" 
                                @click="scrollToCategory('{{ $cat->slug }}')"
                                class="relative shrink-0 rounded-full px-4 py-2 text-[10px] uppercase tracking-[0.18em] transition-colors duration-300 cursor-pointer"
                                :class="activeCategory === '{{ $cat->slug }}' ? 'text-paper' : 'text-terracotta/70 hover:text-terracotta'">
                            <span x-show="activeCategory === '{{ $cat->slug }}'" class="absolute inset-0 rounded-full bg-terracotta"></span>
                            <span class="relative z-10">{{ $cat->name }}</span>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Main Dishes Container -->
    <main class="relative mx-auto max-w-6xl px-5 pb-24 sm:px-8">
        <p class="pt-8 text-[10px] uppercase tracking-[0.2em] text-ink/40">
            Showing 61 of 61 · (GF) gluten free · (V) vegetarian · (N) contains nuts
        </p>

        @foreach ($categories as $cat)
            <section id="{{ $cat->slug }}" class="scroll-mt-44 pt-14 sm:pt-20">
                <!-- Category Heading -->
                <div class="text-center">
                    <p class="label-caps text-saffron">
                        {{ str_pad($cat->sort_order, 2, '0', STR_PAD_LEFT) }} · {{ $cat->description }}
                    </p>
                    <h2 class="mt-3 font-display text-4xl uppercase tracking-[0.04em] text-ember sm:text-5xl">
                        {{ $cat->name }}
                    </h2>
                    <div class="mx-auto mt-5 h-px w-16 bg-terracotta/25"></div>
                </div>

                <!-- Special Protein Banner for Non-Veg Entrees -->
                @if ($cat->slug === 'non-veg-entrees')
                    <div class="mx-auto mt-7 max-w-3xl rounded-sm border border-saffron/30 bg-saffron/5 px-5 py-4 text-center text-[10px] uppercase leading-relaxed tracking-[0.14em] text-terracotta">
                        Choose your protein — Chicken $26 · Lamb $32 · Shrimp $34 · Fish $32. Alaskan goat when available $34.
                    </div>
                @endif

                <!-- Special Description for Thali Platter -->
                @if ($cat->slug === 'thali-platter')
                    <div class="mx-auto mt-7 max-w-2xl text-center text-xs leading-relaxed text-ink/65">
                        Thali is the cornerstone of our menu. It is a generous platter consisting of a wide variety of dishes that provide texture and vivid colors, showcasing the diverse flavors of India. Includes chef's choice of four dishes, one chicken dish (non-veg), basmati rice, naan, papad, raitha and dessert.
                    </div>
                @endif

                <!-- Wine Specialty Cards -->
                @if ($cat->slug === 'wine')
                    <div class="mt-8 border-t border-dashed border-ink/10">
                        <div class="grid gap-6 pt-8 md:grid-cols-2">
                            <!-- Red Wine Card -->
                            <div class="rounded-sm border border-terracotta/10 bg-white/60 p-6 sm:p-8">
                                <div class="flex items-center gap-5">
                                    <div class="relative h-20 w-20 shrink-0 overflow-hidden rounded-full ring-1 ring-ink/5 shadow-[0_16px_34px_-20px_rgba(23,23,23,0.6)] sm:h-24 sm:w-24">
                                        <img src="/images/redWine.png" class="w-full h-full inset-0 absolute object-cover" alt="Red Wine">
                                    </div>
                                    <div>
                                        <h4 class="font-display text-3xl leading-none text-ember">Red Wine</h4>
                                        <p class="mt-2 text-[11px] uppercase tracking-[0.22em] text-terracotta/60">$12 Glass</p>
                                    </div>
                                </div>
                                <ul class="mt-6 space-y-2.5">
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Catenary Cabernet Sauvignon, Argentina</li>
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Broadside Margarita Cabernet Sauvignon, California</li>
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Argyle Pinot Noir, Oregon</li>
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Cloudline Pinot Noir, Oregon</li>
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Hahn Pinot Noir, California</li>
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Guigal Côtes du Rhône Rouge, France</li>
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Coltibuono Chianti Cetamura, Italy</li>
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Marques de Cáceres Rioja Red, Spain</li>
                                </ul>
                            </div>

                            <!-- White Wine Card -->
                            <div class="rounded-sm border border-terracotta/10 bg-white/60 p-6 sm:p-8">
                                <div class="flex items-center gap-5">
                                    <div class="relative h-20 w-20 shrink-0 overflow-hidden rounded-full ring-1 ring-ink/5 shadow-[0_16px_34px_-20px_rgba(23,23,23,0.6)] sm:h-24 sm:w-24">
                                        <img src="/images/whiteWine.png" class="w-full h-full inset-0 absolute object-cover" alt="White Wine">
                                    </div>
                                    <div>
                                        <h4 class="font-display text-3xl leading-none text-ember">White Wine</h4>
                                        <p class="mt-2 text-[11px] uppercase tracking-[0.22em] text-terracotta/60">$12 Glass</p>
                                    </div>
                                </div>
                                <ul class="mt-6 space-y-2.5">
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Guigal Côtes du Rhône Blanc, France</li>
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Chehalem INOX Unoaked Chardonnay, Oregon</li>
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Hahn Chardonnay, California</li>
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Villa Wolf Gewürztraminer, Germany</li>
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Lageder Riff Pinot Grigio, Italy</li>
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Ponzi Pinot Gris, Oregon</li>
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Clean Slate Riesling, Germany</li>
                                    <li class="flex items-start gap-3 text-[13px] leading-relaxed text-ink/70"><span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-saffron"></span>Saracco Moscato d'Asti, Italy</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- 2-Column Dish List Grid -->
                    <div class="mt-8 border-t border-dashed border-ink/10">
                        <ul class="grid gap-x-12 md:grid-cols-2">
                            @foreach ($cat->menuItems as $item)
                                <li data-menu-item
                                    x-show="matchesItem('{{ addslashes($item->name) }}', '{{ addslashes($item->description ?? '') }}', {{ json_encode($item->dietary_tags ?? []) }})"
                                    class="group dashed-row">
                                    <div class="flex items-start gap-4 py-5 sm:gap-5 sm:py-6">
                                        <!-- Dish Thumbnail with circular frame and ring shadow -->
                                        <div class="relative shrink-0">
                                            <span class="absolute -inset-1.5 rounded-full bg-saffron/0 transition-colors duration-500 group-hover:bg-saffron/10"></span>
                                            <div class="relative h-[68px] w-[68px] overflow-hidden rounded-full ring-1 ring-ink/5 shadow-[0_14px_30px_-18px_rgba(23,23,23,0.55)] transition-transform duration-700 group-hover:scale-[1.07] sm:h-[86px] sm:w-[86px] lg:h-[96px] lg:w-[96px]">
                                                <img src="{{ $item->image_url }}" 
                                                     class="w-full h-full inset-0 absolute object-cover" 
                                                     alt="{{ $item->name }}"
                                                     loading="eager">
                                            </div>
                                        </div>

                                        <!-- Dish Details -->
                                        <div class="min-w-0 flex-1">
                                            <div class="flex items-baseline justify-between gap-3">
                                                <h4 class="text-[15px] font-semibold leading-snug text-ember sm:text-base">
                                                    {{ $item->name }}
                                                    @if (in_array('GF', $item->dietary_tags ?? []))
                                                        <span title="Gluten free" class="ml-1.5 align-middle text-[9px] font-medium uppercase tracking-[0.12em] text-terracotta/55">(GF)</span>
                                                    @endif
                                                    @if (in_array('V', $item->dietary_tags ?? []))
                                                        <span title="Vegetarian" class="ml-1.5 align-middle text-[9px] font-medium uppercase tracking-[0.12em] text-terracotta/55">(V)</span>
                                                    @endif
                                                    @if (in_array('N', $item->dietary_tags ?? []))
                                                        <span title="Contains nuts" class="ml-1.5 align-middle text-[9px] font-medium uppercase tracking-[0.12em] text-terracotta/55">(N)</span>
                                                    @endif
                                                </h4>
                                                <span class="shrink-0 text-[15px] font-semibold text-ember sm:text-base">
                                                    {{ $item->formatted_price }}
                                                </span>
                                            </div>
                                            @if ($item->description)
                                                <p class="mt-1.5 max-w-prose text-[13px] leading-relaxed text-ink/65 sm:text-sm">
                                                    {{ $item->description }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </section>
        @endforeach

        <!-- Hungry yet? Call the kitchen banner -->
        <div class="mt-20 flex flex-col items-center justify-between gap-6 border-t border-terracotta/15 pt-10 text-center sm:flex-row sm:text-left">
            <div>
                <p class="font-display text-3xl text-ember">Hungry yet? Call the kitchen.</p>
                <p class="mt-2 text-sm text-ink/60">1528 S Cushman St · Fairbanks, Alaska</p>
            </div>
            <a href="tel:+19073283218" 
               class="rounded-full bg-terracotta px-7 py-4 text-[10px] uppercase tracking-[0.2em] text-paper transition-colors hover:bg-saffron hover:text-ink">
                +1 907-328-3218
            </a>
        </div>
    </main>
</div>
@endsection
