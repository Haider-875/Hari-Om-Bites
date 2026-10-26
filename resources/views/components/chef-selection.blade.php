<section id="selection"
         x-data="{
            current: 0,
            hovered: false,
            timer: null,
            items: [
                {
                    name: 'Vegetable Samosas',
                    price: '$14',
                    desc: 'Two large pastries stuffed with spiced potato and green peas, fried to order and served with tamarind and green chutney.',
                    img: '{{ asset('images/samosas.png') }}'
                },
                {
                    name: 'Lamb Rogan Josh',
                    price: 'Lamb $32',
                    desc: 'Lamb slow-blended with tomatoes and seasoned with cardamom, cloves and fennel until the gravy turns deep and glossy.',
                    img: '{{ asset('images/lamb.png') }}'
                },
                {
                    name: 'Shahi Paneer',
                    price: '$26',
                    desc: 'Mashed paneer in a creamy tomato sauce with cream, puréed cashews and warm Indian spices.',
                    img: '{{ asset('images/paneer.png') }}'
                },
                {
                    name: 'Thali Platter',
                    price: '$24',
                    desc: 'Chef\'s choice of four dishes with one chicken dish, basmati rice, naan, papad, raitha and dessert all on one platter.',
                    img: '{{ asset('images/thali.png') }}'
                }
            ],
            init() {
                this.timer = setInterval(() => {
                    if (!this.hovered) {
                        this.current = (this.current + 1) % this.items.length;
                    }
                }, 6500);
            },
            prev() {
                this.current = (this.current - 1 + this.items.length) % this.items.length;
            },
            next() {
                this.current = (this.current + 1) % this.items.length;
            }
         }"
         @mouseenter="hovered = true"
         @mouseleave="hovered = false"
         class="relative overflow-hidden border-y border-terracotta/10 bg-[#faf6ee] py-20 sm:py-28">
    <div class="mx-auto max-w-[92rem] px-5 sm:px-8">
        <!-- Section Header with Arrows -->
        <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="label-caps text-saffron">The chef's selection</p>
                <h2 class="mt-4 font-display text-5xl leading-[0.95] text-ember sm:text-6xl">
                    Where flavor lives
                </h2>
            </div>
            <div class="flex items-center gap-3">
                <button type="button"
                        @click="prev()"
                        aria-label="Previous dish"
                        class="flex h-11 w-11 items-center justify-center rounded-full border border-terracotta/25 text-terracotta transition-colors hover:bg-terracotta hover:text-paper">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button type="button"
                        @click="next()"
                        aria-label="Next dish"
                        class="flex h-11 w-11 items-center justify-center rounded-full border border-terracotta/25 text-terracotta transition-colors hover:bg-terracotta hover:text-paper">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Carousel Presentation -->
        <div class="mt-12 grid gap-10 lg:grid-cols-2 lg:items-center lg:gap-16">
            <!-- Left: Dish Photo -->
            <div class="relative aspect-[5/4] w-full overflow-hidden rounded-sm bg-ink/5">
                <template x-for="(item, index) in items" :key="item.name">
                    <div x-show="current === index"
                         x-transition:enter="transition ease-out duration-700"
                         x-transition:enter-start="opacity-0 scale-105"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute inset-0">
                        <img :src="item.img" :alt="item.name" class="h-full w-full object-cover" />
                    </div>
                </template>
                <div class="absolute left-5 top-5 rounded-full bg-paper/90 px-4 py-2 text-[9px] uppercase tracking-[0.2em] text-terracotta backdrop-blur">
                    Chef's pick
                </div>
            </div>

            <!-- Right: Dish Information -->
            <div class="min-h-[300px]">
                <template x-for="(item, index) in items" :key="item.name">
                    <div x-show="current === index"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 translate-y-4"
                         x-transition:enter-end="opacity-100 translate-y-0">
                        <div class="flex items-center gap-4">
                            <span class="font-display text-5xl text-terracotta/25" x-text="'0' + (index + 1)"></span>
                            <span class="h-px flex-1 bg-terracotta/15"></span>
                            <span class="font-display text-2xl text-terracotta" x-text="item.price"></span>
                        </div>
                        <h3 class="mt-6 font-display text-4xl leading-tight text-ink sm:text-5xl" x-text="item.name"></h3>
                        <p class="mt-4 max-w-md text-sm leading-[1.85] text-ink/65 sm:text-[15px]" x-text="item.desc"></p>
                        <a href="tel:+19073283218"
                           class="mt-8 inline-flex items-center gap-2.5 rounded-full bg-ink px-7 py-3.5 text-[10px] uppercase tracking-[0.2em] text-paper transition-colors hover:bg-saffron hover:text-ink">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            Order this
                        </a>
                    </div>
                </template>

                <!-- Indicator Dash Bar Navigation -->
                <div class="mt-10 flex items-center gap-2">
                    <template x-for="(item, index) in items" :key="item.name">
                        <button type="button"
                                @click="current = index"
                                :aria-label="'Show ' + item.name"
                                class="group py-2">
                            <span class="block h-[2px] transition-all duration-500"
                                  :class="current === index ? 'w-10 bg-terracotta' : 'w-5 bg-terracotta/20 group-hover:bg-terracotta/40'"></span>
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>
