<section id="menu" 
         x-data="{
            activeCat: 'appetizers',
            categories: [
                { id: 'appetizers', name: 'Appetizers', more: 5 },
                { id: 'soups', name: 'Soups', more: 0 },
                { id: 'veg-entrees', name: 'Veg Entrees', more: 17 },
                { id: 'non-veg-entrees', name: 'Non Veg Entrees', more: 3 },
                { id: 'thali-platter', name: 'Thali Platter', more: 0 },
                { id: 'accompaniments', name: 'Accompaniments', more: 0 },
                { id: 'beer', name: 'Beer', more: 2 }
            ],
            items: [
                { cat: 'appetizers', name: 'Papad', price: '$10', desc: 'Indian-style tostada chips made from chickpea flour. Served with...', image: '/images/papad.png' },
                { cat: 'appetizers', name: 'Masala Papad', price: '$14', desc: 'Indian-style tostada chips topped with diced tomatoes, onions, green...', image: '/images/papad.png' },
                { cat: 'appetizers', name: 'Masala Fries', price: '$14', desc: 'Crispy potato fries sprinkled with chaat masala. Served with tamarind &...', image: '/images/fries.png' },
                { cat: 'appetizers', name: 'Vegetable Samosas', price: '$14', desc: 'Two large deep-fried pastries stuffed with spiced mashed potatoes and...', image: '/images/samosas.png' },
                { cat: 'appetizers', name: 'Vegetable Pakoras', price: '$14', desc: 'Mixed vegetable fritters battered in chickpea flour and Indian spices....', image: '/images/pakoras.png' },
                { cat: 'appetizers', name: 'Onion Pakoras', price: '$14', desc: 'Crispy fritters made with onion slices, chickpea flour and Indian spices....', image: '/images/pakoras.png' }
            ]
         }"
         class="relative overflow-hidden bg-paper py-20 sm:py-28">
    <div class="mx-auto max-w-[92rem] px-5 sm:px-8">
        <!-- Section Header -->
        <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between gsap-fade-up">
            <div>
                <p class="label-caps text-saffron">Fairbanks · Alaska</p>
                <h2 class="mt-4 font-display text-5xl leading-[0.95] text-ember sm:text-6xl">
                    Our menu
                </h2>
            </div>
            <p class="max-w-xs text-right text-[10px] uppercase leading-relaxed tracking-[0.2em] text-ink/40 sm:block hidden">
                61 dishes and pours<br>
                appetizers · curries · thali · wine · beer
            </p>
        </div>

        <!-- Category Pills Bar -->
        <div class="mt-12 no-scrollbar -mx-5 flex gap-2 overflow-x-auto px-5 sm:mx-0 sm:flex-wrap sm:px-0">
            <template x-for="cat in categories" :key="cat.id">
                <a :href="'/menu#' + cat.id"
                   class="rounded-full px-5 py-2.5 text-[10px] uppercase tracking-[0.2em] transition-all cursor-pointer text-decoration-none"
                   :class="activeCat === cat.id ? 'bg-terracotta text-paper shadow-sm' : 'text-terracotta/70 hover:bg-terracotta/5 hover:text-terracotta'"
                   x-text="cat.name">
                </a>
            </template>
        </div>

        <!-- 6 Teaser Items (2 Columns) -->
        <div class="mt-10 border-t border-dashed border-ink/10 pt-4">
            <div class="grid gap-x-12 sm:grid-cols-2">
                <template x-for="(item, idx) in items" :key="idx">
                    <div class="group flex items-center gap-4 border-b border-dashed border-ink/10 py-4 transition-all duration-300 hover:bg-cream/40 px-2 rounded-sm">
                        <div class="relative h-14 w-14 shrink-0 overflow-hidden rounded-full ring-1 ring-ink/5 shadow-sm transition-transform duration-500 group-hover:scale-105 sm:h-16 sm:w-16">
                            <img :src="item.image" :alt="item.name" class="w-full h-full inset-0 absolute object-cover">
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex items-baseline justify-between gap-3">
                                <h3 class="truncate text-[14px] font-semibold text-ember" x-text="item.name"></h3>
                                <span class="shrink-0 text-[13px] font-semibold text-terracotta" x-text="item.price"></span>
                            </div>
                            <p class="mt-1 line-clamp-1 text-xs text-ink/55" x-text="item.desc"></p>
                        </div>
                    </div>
                </template>
            </div>
            <p class="mt-4 text-[10px] uppercase tracking-[0.18em] text-ink/35">+ 5 more in appetizers</p>
        </div>

        <!-- Full Menu CTA Button (No arrows) -->
        <div class="mt-10 flex flex-wrap items-center gap-4">
            <a href="{{ route('menu') }}" class="btn-terracotta">
                View the complete 61-item menu
            </a>
            <a href="{{ route('reservations') }}" class="btn-secondary-dark">
                Reserve a dining table
            </a>
        </div>
    </div>
</section>
