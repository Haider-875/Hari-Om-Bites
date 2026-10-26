<section id="selection" 
         x-data="{
            active: 0,
            dishes: [
                {
                    num: '01',
                    name: 'Vegetable Samosas',
                    price: '$14',
                    desc: 'Two large pastries stuffed with spiced potato and green peas, fried to order and served with tamarind and green chutney.',
                    image: '/images/samosas.png',
                    tag: 'Chef\'s pick'
                },
                {
                    num: '02',
                    name: 'Lamb Rogan Josh',
                    price: '$32',
                    desc: 'Slow-cooked lamb in a rich sauce scented with fennel, black cardamom, and Kashmiri red chili.',
                    image: '/images/lamb.png',
                    tag: 'House specialty'
                },
                {
                    num: '03',
                    name: 'Shahi Paneer',
                    price: '$26',
                    desc: 'Mashed paneer cheese in a velvety tomato-cream gravy enriched with cashews and royal spices.',
                    image: '/images/paneer.png',
                    tag: 'Chef\'s pick'
                },
                {
                    num: '04',
                    name: 'Thali Platter',
                    price: '$26',
                    desc: 'Chef\'s complete spread: four curries, basmati rice, hot tandoori naan, papad, raita, and dessert.',
                    image: '/images/thali.png',
                    tag: 'The banquet'
                }
            ],
            prev() {
                this.active = (this.active - 1 + this.dishes.length) % this.dishes.length;
            },
            next() {
                this.active = (this.active + 1) % this.dishes.length;
            }
         }"
         class="relative overflow-hidden border-y border-terracotta/10 bg-cream/60 py-20 sm:py-28">
    <div class="mx-auto max-w-[92rem] px-5 sm:px-8">
        <!-- Section Header with Accessible Named Controls (No arrows) -->
        <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
            <div class="gsap-fade-up">
                <p class="label-caps text-saffron">The chef's selection</p>
                <h2 class="mt-4 font-display text-5xl leading-[0.95] text-ember sm:text-6xl">
                    Where flavor lives
                </h2>
            </div>
            <div class="flex items-center gap-3">
                <button type="button" 
                        @click="prev()" 
                        aria-label="Previous chef dish" 
                        class="btn-secondary-dark !py-2.5 !px-5 text-[10px] cursor-pointer">
                    Previous
                </button>
                <button type="button" 
                        @click="next()" 
                        aria-label="Next chef dish" 
                        class="btn-secondary-dark !py-2.5 !px-5 text-[10px] cursor-pointer">
                    Next
                </button>
            </div>
        </div>

        <!-- Carousel Slide Area -->
        <div class="mt-12 grid gap-10 lg:grid-cols-2 lg:items-center lg:gap-16">
            <!-- Left: Aspect [5/4] Image Container with Smooth Scaling -->
            <div class="relative aspect-[5/4] w-full overflow-hidden rounded-sm bg-ink/5 shadow-[0_20px_45px_-18px_rgba(23,23,23,0.35)]">
                <template x-for="(d, i) in dishes" :key="i">
                    <div x-show="active === i" 
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute inset-0">
                        <img :src="d.image" :alt="d.name" class="w-full h-full inset-0 absolute object-cover">
                        <div class="absolute left-5 top-5 rounded-full bg-paper/90 px-4 py-2 text-[9px] uppercase tracking-[0.2em] text-terracotta backdrop-blur shadow-sm" x-text="d.tag"></div>
                    </div>
                </template>
            </div>

            <!-- Right: Dish Details -->
            <div class="min-h-[300px] flex flex-col justify-between gsap-fade-up">
                <div>
                    <div class="flex items-center gap-4">
                        <span class="font-display text-5xl text-terracotta/25" x-text="dishes[active].num">01</span>
                        <span class="h-px flex-1 bg-terracotta/15"></span>
                        <span class="font-display text-2xl text-terracotta" x-text="dishes[active].price">$14</span>
                    </div>

                    <h3 class="mt-6 font-display text-4xl leading-tight text-ink sm:text-5xl" x-text="dishes[active].name">
                        Vegetable Samosas
                    </h3>

                    <p class="mt-4 max-w-md text-sm leading-[1.85] text-ink/65 sm:text-[15px]" x-text="dishes[active].desc">
                        Two large pastries stuffed with spiced potato and green peas, fried to order and served with tamarind and green chutney.
                    </p>

                    <!-- Redesigned Button (No arrows) -->
                    <div class="mt-8 flex flex-wrap items-center gap-4">
                        <a href="tel:+19073283218" class="btn-terracotta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone mr-2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            Order this dish
                        </a>
                        <a href="{{ route('menu') }}" class="btn-secondary-dark">
                            View in menu
                        </a>
                    </div>
                </div>

                <!-- Slide Indicators (Interactive Tabs) -->
                <div class="mt-10 flex flex-wrap items-center gap-2">
                    <template x-for="(d, i) in dishes" :key="i">
                        <button type="button" 
                                @click="active = i" 
                                :aria-label="'Show ' + d.name" 
                                class="rounded-full px-3.5 py-1.5 text-[10px] uppercase tracking-[0.16em] transition-all duration-300 cursor-pointer"
                                :class="active === i ? 'bg-terracotta text-paper font-semibold shadow-sm' : 'bg-transparent text-ink/60 hover:text-ink hover:bg-terracotta/10'">
                            <span x-text="d.num + ' · ' + d.name"></span>
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>
