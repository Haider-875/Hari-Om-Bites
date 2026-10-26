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
class="min-vh-100 bg-paper">

    <!-- Hero Spice Header Banner -->
    <section class="position-relative overflow-hidden bg-ink py-5" style="padding-top: 7rem !important; padding-bottom: 4rem !important;">
        <div class="position-absolute inset-0" style="opacity: 0.25;">
            <span class="d-inline-block position-relative w-100 h-100">
                <img src="/images/spices.png" 
                     class="w-100 h-100 inset-0 position-absolute object-cover" 
                     alt="Whole Indian spices in dark bowls">
            </span>
        </div>
        <div class="position-absolute inset-0 bg-gradient-b-ink-fade"></div>

        <div class="position-relative max-w-92rem px-3 px-sm-4">
            <a class="d-inline-flex align-items-center gap-2 text-uppercase tracking-wider-custom text-white-70 hover-text-saffron transition-colors text-decoration-none" 
               style="font-size: 10px;"
               href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                Back to Home
            </a>

            <div class="mt-4 d-flex flex-column gap-4 flex-lg-row align-items-lg-end justify-content-lg-between">
                <div>
                    <p class="label-caps text-saffron m-0">Dine in · Take out · Catering</p>
                    <h1 class="mt-3 font-display text-paper display-title-hero m-0">
                        Our Menu
                    </h1>
                    <p class="mt-3 max-w-xl text-white-55 leading-relaxed m-0" style="font-size: 14px;">
                        61 dishes and pours, from crisp pakoras and tandoor breads to slow-cooked curries, thali platters, wine and Alaskan beer.
                    </p>
                </div>

                <a href="tel:+19073283218" 
                   class="btn-primary d-inline-flex align-items-center gap-2 w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-4 h-4"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    Call to order · +1 907-328-3218
                </a>
            </div>
        </div>
    </section>

    <!-- Sticky Search & Category Navigation Bar -->
    <div class="sticky-top border-top border-bottom border-terracotta-10 bg-paper-95 backdrop-blur-md" style="top: 4rem; z-index: 1020;">
        <div class="max-w-6xl px-3 px-sm-4">
            <div class="d-flex align-items-center gap-3 pt-2">
                <!-- Search Input -->
                <div class="position-relative flex-grow-1 flex-sm-grow-0" style="max-width: 20rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search position-absolute text-ink-35 pointer-events-none" style="left: 0.75rem; top: 50%; transform: translateY(-50%); width: 0.9rem; height: 0.9rem;"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                    <input type="search" 
                           x-model="searchQuery" 
                           placeholder="Search the menu" 
                           aria-label="Search the menu" 
                           class="form-control form-control-sm rounded-full bg-white-70 border-terracotta-15 text-ink text-xs ps-4 pe-3" 
                           style="height: 2.25rem;">
                </div>

                <!-- Dietary Filter Pills -->
                <div class="d-flex flex-shrink-0 align-items-center gap-1">
                    <button type="button" 
                            @click="toggleTag('GF')"
                            title="Gluten free" 
                            class="rounded-full border px-3 py-1 text-uppercase tracking-wider-custom transition-colors cursor-pointer"
                            style="font-size: 9px;"
                            :class="selectedTags.includes('GF') ? 'bg-terracotta text-paper border-terracotta' : 'border-terracotta-20 text-terracotta-70'">
                        <span class="d-none d-sm-inline">Gluten free</span><span class="d-sm-none">GF</span>
                    </button>
                    <button type="button" 
                            @click="toggleTag('V')"
                            title="Vegetarian" 
                            class="rounded-full border px-3 py-1 text-uppercase tracking-wider-custom transition-colors cursor-pointer"
                            style="font-size: 9px;"
                            :class="selectedTags.includes('V') ? 'bg-terracotta text-paper border-terracotta' : 'border-terracotta-20 text-terracotta-70'">
                        <span class="d-none d-sm-inline">Vegetarian</span><span class="d-sm-none">V</span>
                    </button>
                </div>
            </div>

            <!-- Category Horizontal Scroller -->
            <div class="py-2">
                <div class="no-scrollbar d-flex gap-2 overflow-x-auto">
                    @foreach ($categories as $cat)
                        <button type="button" 
                                @click="scrollToCategory('{{ $cat->slug }}')"
                                class="position-relative flex-shrink-0 rounded-full px-3 py-1 text-uppercase tracking-wider-custom transition-colors cursor-pointer border-0"
                                style="font-size: 10px;"
                                :class="activeCategory === '{{ $cat->slug }}' ? 'bg-terracotta text-paper shadow-sm' : 'bg-transparent text-terracotta-70'">
                            <span class="position-relative" style="z-index: 10;">{{ $cat->name }}</span>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Main Dishes Container -->
    <main class="position-relative max-w-6xl px-3 px-sm-4 pb-5">
        <p class="pt-4 text-uppercase tracking-wider-custom text-ink-40 m-0" style="font-size: 10px;">
            Showing 61 of 61 · (GF) gluten free · (V) vegetarian · (N) contains nuts
        </p>

        @foreach ($categories as $cat)
            <section id="{{ $cat->slug }}" class="pt-5" style="scroll-margin-top: 10rem;">
                <!-- Category Heading -->
                <div class="text-center">
                    <p class="label-caps text-saffron m-0">
                        {{ str_pad($cat->sort_order, 2, '0', STR_PAD_LEFT) }} · {{ $cat->description }}
                    </p>
                    <h2 class="mt-3 font-display text-ember fs-1 text-uppercase tracking-wide m-0">
                        {{ $cat->name }}
                    </h2>
                    <div class="mx-auto mt-3 bg-terracotta-25" style="width: 4rem; height: 1px;"></div>
                </div>

                <!-- Special Protein Banner for Non-Veg Entrees -->
                @if ($cat->slug === 'non-veg-entrees')
                    <div class="max-w-3xl mx-auto mt-4 rounded-sm border border-saffron-30 bg-saffron-5 p-3 text-center text-uppercase tracking-wider-custom text-terracotta" style="font-size: 10px; line-height: 1.6;">
                        Choose your protein — Chicken $26 · Lamb $32 · Shrimp $34 · Fish $32. Alaskan goat when available $34.
                    </div>
                @endif

                <!-- Special Description for Thali Platter -->
                @if ($cat->slug === 'thali-platter')
                    <div class="max-w-2xl mx-auto mt-4 text-center small leading-relaxed text-ink-65">
                        Thali is the cornerstone of our menu. It is a generous platter consisting of a wide variety of dishes that provide texture and vivid colors, showcasing the diverse flavors of India. Includes chef's choice of four dishes, one chicken dish (non-veg), basmati rice, naan, papad, raitha and dessert.
                    </div>
                @endif

                <!-- Wine Specialty Cards -->
                @if ($cat->slug === 'wine')
                    <div class="mt-4 border-top border-ink-10" style="border-top-style: dashed !important;">
                        <div class="row g-4 pt-4">
                            <!-- Red Wine Card -->
                            <div class="col-12 col-md-6">
                                <div class="rounded-sm border border-terracotta-10 bg-white-60 p-4 p-sm-5 h-100">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="position-relative flex-shrink-0 overflow-hidden rounded-full ring-1 ring-ink-5 shadow" style="width: 4.5rem; height: 4.5rem;">
                                            <img src="/images/redWine.png" class="w-100 h-100 inset-0 position-absolute object-cover" alt="Red Wine">
                                        </div>
                                        <div>
                                            <h4 class="font-display fs-2 leading-none text-ember m-0">Red Wine</h4>
                                            <p class="mt-2 text-uppercase tracking-wider-custom text-terracotta-60 m-0" style="font-size: 11px;">$12 Glass</p>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled mt-4 d-flex flex-column gap-2 mb-0">
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Catenary Cabernet Sauvignon, Argentina</li>
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Broadside Margarita Cabernet Sauvignon, California</li>
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Argyle Pinot Noir, Oregon</li>
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Cloudline Pinot Noir, Oregon</li>
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Hahn Pinot Noir, California</li>
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Guigal Côtes du Rhône Rouge, France</li>
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Coltibuono Chianti Cetamura, Italy</li>
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Marques de Cáceres Rioja Red, Spain</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- White Wine Card -->
                            <div class="col-12 col-md-6">
                                <div class="rounded-sm border border-terracotta-10 bg-white-60 p-4 p-sm-5 h-100">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="position-relative flex-shrink-0 overflow-hidden rounded-full ring-1 ring-ink-5 shadow" style="width: 4.5rem; height: 4.5rem;">
                                            <img src="/images/whiteWine.png" class="w-100 h-100 inset-0 position-absolute object-cover" alt="White Wine">
                                        </div>
                                        <div>
                                            <h4 class="font-display fs-2 leading-none text-ember m-0">White Wine</h4>
                                            <p class="mt-2 text-uppercase tracking-wider-custom text-terracotta-60 m-0" style="font-size: 11px;">$12 Glass</p>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled mt-4 d-flex flex-column gap-2 mb-0">
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Guigal Côtes du Rhône Blanc, France</li>
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Chehalem INOX Unoaked Chardonnay, Oregon</li>
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Hahn Chardonnay, California</li>
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Villa Wolf Gewürztraminer, Germany</li>
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Lageder Riff Pinot Grigio, Italy</li>
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Ponzi Pinot Gris, Oregon</li>
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Clean Slate Riesling, Germany</li>
                                        <li class="d-flex align-items-start gap-2 small leading-relaxed text-ink-70"><span class="mt-2 flex-shrink-0 rounded-full bg-saffron" style="width: 5px; height: 5px;"></span>Saracco Moscato d'Asti, Italy</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- 2-Column Dish List Grid -->
                    <div class="mt-4 border-top border-ink-10" style="border-top-style: dashed !important;">
                        <div class="row g-3">
                            @foreach ($cat->menuItems as $item)
                                <div class="col-12 col-md-6 dashed-row"
                                     data-menu-item
                                     x-show="matchesItem('{{ addslashes($item->name) }}', '{{ addslashes($item->description ?? '') }}', {{ json_encode($item->dietary_tags ?? []) }})">
                                    <div class="d-flex align-items-start gap-3 py-4">
                                        <!-- Dish Thumbnail with circular frame and ring shadow -->
                                        <div class="position-relative flex-shrink-0">
                                            <div class="position-relative overflow-hidden rounded-full ring-1 ring-ink-5 shadow transition-transform" style="width: 4.5rem; height: 4.5rem;">
                                                <img src="{{ $item->image_url }}" 
                                                     class="w-100 h-100 inset-0 position-absolute object-cover" 
                                                     alt="{{ $item->name }}"
                                                     loading="eager">
                                            </div>
                                        </div>

                                        <!-- Dish Details -->
                                        <div class="min-w-0 flex-grow-1">
                                            <div class="d-flex align-items-baseline justify-content-between gap-2">
                                                <h4 class="fw-semibold leading-snug text-ember m-0" style="font-size: 15px;">
                                                    {{ $item->name }}
                                                    @if (in_array('GF', $item->dietary_tags ?? []))
                                                        <span title="Gluten free" class="ms-1 align-middle text-uppercase tracking-wider-custom text-terracotta-55" style="font-size: 9px;">(GF)</span>
                                                    @endif
                                                    @if (in_array('V', $item->dietary_tags ?? []))
                                                        <span title="Vegetarian" class="ms-1 align-middle text-uppercase tracking-wider-custom text-terracotta-55" style="font-size: 9px;">(V)</span>
                                                    @endif
                                                    @if (in_array('N', $item->dietary_tags ?? []))
                                                        <span title="Contains nuts" class="ms-1 align-middle text-uppercase tracking-wider-custom text-terracotta-55" style="font-size: 9px;">(N)</span>
                                                    @endif
                                                </h4>
                                                <span class="flex-shrink-0 fw-semibold text-ember" style="font-size: 15px;">
                                                    {{ $item->formatted_price }}
                                                </span>
                                            </div>
                                            @if ($item->description)
                                                <p class="mt-1 small leading-relaxed text-ink-65 m-0">
                                                    {{ $item->description }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </section>
        @endforeach

        <!-- Hungry yet? Call the kitchen banner -->
        <div class="mt-5 d-flex flex-column flex-sm-row align-items-center justify-content-between gap-3 border-top border-terracotta-15 pt-4 text-center text-sm-start">
            <div>
                <p class="font-display fs-2 text-ember m-0">Hungry yet? Call the kitchen.</p>
                <p class="mt-1 small text-ink-60 m-0">1528 S Cushman St · Fairbanks, Alaska</p>
            </div>
            <a href="tel:+19073283218" 
               class="btn-primary">
                Call +1 907-328-3218
            </a>
        </div>
    </main>
</div>
@endsection
