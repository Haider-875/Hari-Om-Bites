@props([
    'totalDishes' => 61,
    'vegCount' => 26,
    'gfCount' => 17,
])

<section id="story" class="relative overflow-hidden bg-paper py-20 sm:py-28 lg:py-32">
    <div class="mx-auto grid max-w-[92rem] gap-14 px-5 sm:px-8 lg:grid-cols-12 lg:items-center lg:gap-20">
        <!-- Left Column: Visual Collage -->
        <div class="lg:col-span-6">
            <div class="relative aspect-[4/5] w-full overflow-hidden rounded-sm bg-[#f2ede4]">
                <img src="{{ asset('images/tandoor.png') }}"
                     alt="Fresh naan being pressed onto the wall of a glowing clay tandoor"
                     class="h-full w-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-ink/40 via-transparent to-transparent"></div>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-4">
                <div class="aspect-square overflow-hidden rounded-sm bg-[#f2ede4]">
                    <img src="{{ asset('images/spices.png') }}"
                         alt="Whole Indian spices in dark ceramic bowls"
                         class="h-full w-full object-cover transition-transform duration-700 hover:scale-105" />
                </div>
                <div class="aspect-square overflow-hidden rounded-sm bg-[#f2ede4]">
                    <img src="{{ asset('images/samosas.png') }}"
                         alt="Golden samosas with chutney on a terracotta plate"
                         class="h-full w-full object-cover transition-transform duration-700 hover:scale-105" />
                </div>
            </div>
        </div>

        <!-- Right Column: Narrative Copy -->
        <div class="lg:col-span-6 lg:pl-4">
            <p class="label-caps text-saffron">Our story</p>
            <h2 class="mt-5 font-display text-5xl leading-[0.95] text-ember sm:text-6xl">
                Slow-cooked,
                <span class="block italic text-terracotta">never rushed</span>
            </h2>

            <div class="mt-7 space-y-5 text-sm leading-[1.85] text-ink/70 sm:text-[15px]">
                <p>
                    At Hari Om Cuisine of India we cook the way it is done back home: onions cooked down slowly until they sweeten, whole spices toasted and ground the same day, and naan pressed onto the hot wall of the tandoor until it blisters and puffs.
                </p>
                <p>
                    Our kitchen on South Cushman Street serves Fairbanks the length of the Indian table — crisp pakoras and papad to start, creamy dhaba dal, palak paneer and Kashmiri dum aloo, slow-braised lamb rogan josh, saffron biryani and the full thali platter.
                </p>
                <p>
                    Whether it is a weeknight take-out box or a table full of friends on a cold Alaskan evening, the food leaves the kitchen the same way: hot, generous and made to order.
                </p>
            </div>

            <!-- Stats Ribbon -->
            <div class="mt-10 grid grid-cols-3 gap-4 border-t border-terracotta/15 pt-7">
                <div>
                    <p class="font-display text-4xl leading-none text-terracotta">{{ $totalDishes }}</p>
                    <p class="mt-2 text-[9px] uppercase tracking-[0.18em] text-ink/45">Dishes & pours</p>
                </div>
                <div>
                    <p class="font-display text-4xl leading-none text-terracotta">{{ $vegCount }}</p>
                    <p class="mt-2 text-[9px] uppercase tracking-[0.18em] text-ink/45">Vegetarian</p>
                </div>
                <div>
                    <p class="font-display text-4xl leading-none text-terracotta">{{ $gfCount }}</p>
                    <p class="mt-2 text-[9px] uppercase tracking-[0.18em] text-ink/45">Gluten free</p>
                </div>
            </div>

            <!-- CTA link -->
            <div class="mt-9">
                <a href="{{ route('menu') }}"
                   class="group inline-flex items-center gap-3 text-[10px] uppercase tracking-[0.24em] text-terracotta hover:text-ink transition-colors">
                    <span>See the full menu</span>
                    <span class="flex h-9 w-9 items-center justify-center rounded-full border border-terracotta/30 transition-all duration-300 group-hover:bg-terracotta group-hover:text-paper">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </span>
                </a>
            </div>

            <p class="mt-6 text-[11px] uppercase tracking-[0.18em] text-ink/40">
                1528 S Cushman St · Fairbanks, Alaska
            </p>
        </div>
    </div>

    <!-- Inside Hari Om Culture Gallery (Component UD) -->
    @include('components.culture-gallery')
</section>
