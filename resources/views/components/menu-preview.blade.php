@props(['categories' => null])

@php
    $categoriesList = ($categories && $categories->count()) 
        ? $categories->filter(fn($c) => $c->is_active && $c->menuItems->count() > 0)->values()
        : collect();

    $totalDishes = $categoriesList->sum(fn($c) => $c->menuItems->count()) ?: 61;

    if ($categoriesList->count()) {
        $categoriesData = $categoriesList->map(fn($c) => [
            'id' => $c->slug,
            'name' => $c->name,
            'more' => max(0, $c->menuItems->count() - 6),
            'items' => $c->menuItems->map(fn($i) => [
                'name' => $i->name,
                'price' => $i->formatted_price ?: ('$' . number_format($i->price, 0)),
                'desc' => $i->description ?: (is_array($i->tags) && count($i->tags) ? implode(' · ', $i->tags) : 'Traditional Indian specialty'),
                'image' => $i->image_url ?: '/images/samosas.png',
            ])->values()->all(),
        ])->values()->all();
    } else {
        $categoriesData = [
            [
                'id' => 'appetizers',
                'name' => 'Appetizers',
                'more' => 5,
                'items' => [
                    ['name' => 'Papad', 'price' => '$10', 'desc' => 'Indian-style tostada chips made from chickpea flour. Served with tamarind & green chutneys.', 'image' => '/images/papad.png'],
                    ['name' => 'Masala Papad', 'price' => '$14', 'desc' => 'Indian-style tostada chips topped with diced tomatoes, onions, green chilies and spices.', 'image' => '/images/papad.png'],
                    ['name' => 'Masala Fries', 'price' => '$14', 'desc' => 'Crispy potato fries sprinkled with chaat masala. Served with tamarind & green chutney.', 'image' => '/images/fries.png'],
                    ['name' => 'Vegetable Samosas', 'price' => '$14', 'desc' => 'Two large deep-fried pastries stuffed with spiced mashed potatoes and green peas.', 'image' => '/images/samosas.png'],
                    ['name' => 'Vegetable Pakoras', 'price' => '$14', 'desc' => 'Mixed vegetable fritters battered in chickpea flour and Indian spices, fried crisp.', 'image' => '/images/pakoras.png'],
                    ['name' => 'Onion Pakoras', 'price' => '$14', 'desc' => 'Crispy fritters made with onion slices, chickpea flour and Indian spices.', 'image' => '/images/pakoras.png'],
                ]
            ],
            [
                'id' => 'soups',
                'name' => 'Soups',
                'more' => 0,
                'items' => [
                    ['name' => 'Dal Soup', 'price' => '$10', 'desc' => 'Traditional yellow lentil soup tempered with cumin, garlic and fresh herbs.', 'image' => '/images/samosas.png'],
                    ['name' => 'Mulligatawny Soup', 'price' => '$12', 'desc' => 'Rich, spiced lentil and chicken broth with fragrant Indian spices and herbs.', 'image' => '/images/samosas.png'],
                    ['name' => 'Tomato Shorba', 'price' => '$10', 'desc' => 'Light, spiced Indian-style tomato soup garnished with fresh coriander.', 'image' => '/images/samosas.png'],
                ]
            ],
            [
                'id' => 'veg-entrees',
                'name' => 'Veg Entrees',
                'more' => 17,
                'items' => [
                    ['name' => 'Daal Makhani', 'price' => '$22', 'desc' => 'Black lentils slow cooked overnight with butter and cream in a rich tomato gravy.', 'image' => '/images/paneer.png'],
                    ['name' => 'Shahi Paneer', 'price' => '$26', 'desc' => 'Mashed paneer cheese in a velvety tomato-cream gravy with cashews and royal spices.', 'image' => '/images/paneer.png'],
                    ['name' => 'Chana Masala', 'price' => '$20', 'desc' => 'Tender chickpeas simmered in a spiced onion-tomato gravy with pomegranate seeds.', 'image' => '/images/paneer.png'],
                    ['name' => 'Palak Paneer', 'price' => '$24', 'desc' => 'Cottage cheese cubes in a thick pureed spinach gravy scented with garlic and cumin.', 'image' => '/images/paneer.png'],
                    ['name' => 'Aloo Gobi', 'price' => '$20', 'desc' => 'Potatoes and cauliflower florets sautéed with turmeric, fresh ginger and cumin seeds.', 'image' => '/images/paneer.png'],
                    ['name' => 'Baingan Bharta', 'price' => '$22', 'desc' => 'Fire-roasted mashed eggplant cooked with tender green peas, tomatoes and spices.', 'image' => '/images/paneer.png'],
                ]
            ],
            [
                'id' => 'non-veg-entrees',
                'name' => 'Non Veg Entrees',
                'more' => 3,
                'items' => [
                    ['name' => 'Lamb Rogan Josh', 'price' => '$32', 'desc' => 'Slow-cooked lamb in a rich sauce scented with fennel, black cardamom, and Kashmiri chili.', 'image' => '/images/lamb.png'],
                    ['name' => 'Chicken Tikka Masala', 'price' => '$28', 'desc' => 'Tandoor-roasted chicken chunks in a creamy spiced tomato and fenugreek sauce.', 'image' => '/images/lamb.png'],
                    ['name' => 'Butter Chicken', 'price' => '$28', 'desc' => 'Tender tandoori chicken simmered in rich velvety tomato, cream and butter gravy.', 'image' => '/images/lamb.png'],
                    ['name' => 'Goat Curry', 'price' => '$32', 'desc' => 'Tender bone-in goat meat slow-cooked in a traditional fragrant onion and ginger gravy.', 'image' => '/images/lamb.png'],
                    ['name' => 'Chicken Korma', 'price' => '$28', 'desc' => 'Chicken cooked in a mild, silky sauce of yogurt, cream and puréed cashew nuts.', 'image' => '/images/lamb.png'],
                    ['name' => 'Fish Curry', 'price' => '$30', 'desc' => 'Wild fish fillets simmered in coconut milk and traditional coastal spices.', 'image' => '/images/lamb.png'],
                ]
            ],
            [
                'id' => 'thali-platter',
                'name' => 'Thali Platter',
                'more' => 0,
                'items' => [
                    ['name' => 'Vegetarian Thali', 'price' => '$24', 'desc' => 'Complete spread: four veg curries, basmati rice, naan, papad, raita, dessert.', 'image' => '/images/thali.png'],
                    ['name' => 'Non-Vegetarian Thali', 'price' => '$26', 'desc' => 'Chef complete spread: four curries including chicken, naan, rice, raita and dessert.', 'image' => '/images/thali.png'],
                ]
            ],
            [
                'id' => 'accompaniments',
                'name' => 'Accompaniments',
                'more' => 0,
                'items' => [
                    ['name' => 'Garlic Naan', 'price' => '$6', 'desc' => 'Tandoori flatbread topped with minced garlic and melted ghee, baked to order.', 'image' => '/images/samosas.png'],
                    ['name' => 'Plain Naan', 'price' => '$5', 'desc' => 'Traditional leavened flatbread freshly baked on the glowing clay oven wall.', 'image' => '/images/samosas.png'],
                    ['name' => 'Basmati Rice', 'price' => '$6', 'desc' => 'Steamed long-grain aromatic Indian basmati rice.', 'image' => '/images/samosas.png'],
                    ['name' => 'Cucumber Raita', 'price' => '$5', 'desc' => 'Cool whisked yogurt with grated cucumber, roasted cumin and fresh mint.', 'image' => '/images/samosas.png'],
                ]
            ],
            [
                'id' => 'beer',
                'name' => 'Beer',
                'more' => 2,
                'items' => [
                    ['name' => 'Taj Mahal Premium Lager', 'price' => '$10', 'desc' => 'Classic Indian pale lager with a crisp, clean malt finish.', 'image' => '/images/papad.png'],
                    ['name' => 'Kingfisher Lager', 'price' => '$8', 'desc' => 'Iconic Indian beer, light, refreshing and perfect pairing for spicy curries.', 'image' => '/images/papad.png'],
                    ['name' => 'Alaskan Amber', 'price' => '$7', 'desc' => 'Local Fairbanks favorite, alt-style rich malt beer brewed in Alaska.', 'image' => '/images/papad.png'],
                ]
            ],
        ];
    }

    $firstCatId = $categoriesData[0]['id'] ?? 'appetizers';
@endphp

<section id="menu" 
         x-data="{
            activeTab: '{{ $firstCatId }}',
            isTransitioning: false,
            _timer: null,
            categories: {{ Js::from($categoriesData) }},
            selectTab(id) {
                if (this.activeTab === id) return;
                this.isTransitioning = true;
                clearTimeout(this._timer);
                this._timer = setTimeout(() => {
                    this.activeTab = id;
                    this.$nextTick(() => {
                        this.isTransitioning = false;
                    });
                }, 160);
            },
            get currentCategory() {
                return this.categories.find(c => c.id === this.activeTab) || this.categories[0];
            }
         }"
         class="position-relative overflow-hidden bg-paper py-5 py-sm-6" 
         style="padding-top: clamp(4rem, 8vw, 7rem) !important; padding-bottom: clamp(4rem, 8vw, 7rem) !important;">
    <div class="max-w-92rem mx-auto px-4 px-sm-5">
        <!-- Section Header -->
        <div class="d-flex flex-column gap-3 flex-sm-row align-items-sm-end justify-content-sm-between gsap-fade-up">
            <div>
                <p class="label-caps text-saffron m-0">Fairbanks · Alaska</p>
                <h2 class="mt-3 font-display text-ember display-title-section m-0">
                    Our menu
                </h2>
            </div>
            <p class="max-w-xs text-start text-sm-end text-uppercase leading-relaxed tracking-wider-custom text-ink-40 d-none d-sm-block m-0" style="font-size: 10px;">
                {{ $totalDishes }} dishes and pours<br>
                appetizers · curries · thali · wine · beer
            </p>
        </div>

        <!-- Scrollable Category Tabs Bar with Animated Saffron Underline -->
        <div class="mt-4 mt-sm-5 d-flex gap-2 gap-sm-3 overflow-x-auto no-scrollbar border-bottom border-terracotta-15 mx-n4 px-4 mx-sm-0 px-sm-0" 
             style="-webkit-overflow-scrolling: touch;">
            <template x-for="cat in categories" :key="cat.id">
                <button type="button" 
                        @click="selectTab(cat.id)"
                        class="position-relative px-3 px-sm-4 pt-2 pb-3 text-uppercase tracking-wider-custom cursor-pointer text-nowrap flex-shrink-0 border-0 bg-transparent"
                        style="font-size: 10px; letter-spacing: 0.18em; transition: color 0.25s ease;"
                        :class="activeTab === cat.id ? 'text-terracotta fw-semibold' : 'text-ink-40 hover-text-terracotta'">
                    <span x-text="cat.name"></span>
                    <!-- Smooth Animated Underline -->
                    <span class="position-absolute start-0 end-0 bottom-0 bg-saffron" 
                          style="height: 2px; margin-bottom: -1px; transition: transform 0.28s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.28s ease;"
                          :style="activeTab === cat.id ? 'opacity: 1; transform: scaleX(1);' : 'opacity: 0; transform: scaleX(0.4);'"></span>
                </button>
            </template>
        </div>

        <!-- Category Items Preview with Buttery Smooth Crossfade & Glide Transition -->
        <div class="mt-4 pt-2"
             style="will-change: opacity, transform;"
             :style="isTransitioning 
                 ? 'opacity: 0; transform: translateY(6px); transition: opacity 160ms cubic-bezier(0.4, 0, 1, 1), transform 160ms cubic-bezier(0.4, 0, 1, 1);' 
                 : 'opacity: 1; transform: translateY(0px); transition: opacity 320ms cubic-bezier(0.16, 1, 0.3, 1), transform 320ms cubic-bezier(0.16, 1, 0.3, 1);'">
            <div class="row g-4 gx-lg-5">
                <template x-for="(item, idx) in currentCategory.items.slice(0, 6)" :key="item.name">
                    <div class="col-12 col-md-6">
                        <div class="d-flex align-items-center gap-3 gap-sm-4 py-2 hover-dish-item">
                            <!-- Circular Dish Image -->
                            <div class="position-relative flex-shrink-0 overflow-hidden rounded-full ring-1 ring-ink-5 shadow-sm" 
                                 style="width: 3.75rem; height: 3.75rem; min-width: 3.75rem; background-color: rgba(247, 243, 236, 0.8);">
                                <img :src="item.image" :alt="item.name" class="w-100 h-100 position-absolute inset-0 object-cover dish-thumb-img">
                            </div>

                            <!-- Item Name, Price & Description -->
                            <div class="min-w-0 flex-grow-1">
                                <div class="d-flex align-items-baseline justify-content-between gap-3">
                                    <h3 class="font-sans fw-semibold text-ember text-truncate m-0" style="font-size: 14px; letter-spacing: 0.01em;" x-text="item.name"></h3>
                                    <span class="flex-shrink-0 font-sans fw-semibold text-terracotta ps-2" style="font-size: 13px;" x-text="item.price"></span>
                                </div>
                                <p class="mt-1 line-clamp-1 text-ink-55 m-0" style="font-size: 12px; line-height: 1.5;" x-text="item.desc"></p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- More Items Indicator if > 6 -->
            <div class="mt-4 pt-2">
                <p class="text-uppercase tracking-wider-custom text-ink-35 m-0" style="font-size: 10px; letter-spacing: 0.18em;">
                    <span x-show="currentCategory.more > 0" x-text="'+ ' + currentCategory.more + ' more in ' + currentCategory.name.toLowerCase()"></span>
                    <span x-show="currentCategory.more === 0" x-text="'All ' + currentCategory.items.length + ' dishes shown in ' + currentCategory.name.toLowerCase()"></span>
                </p>
            </div>
        </div>

        <!-- Full Menu CTA Button (Only THIS navigates to the full menu page) -->
        <div class="mt-5 d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center gap-3">
            <a href="{{ route('menu') }}" class="btn-terracotta text-center shadow-sm">
                View the complete menu
            </a>
            <a href="{{ route('reservations') }}" class="btn-secondary-dark text-center">
                Reserve a dining table
            </a>
        </div>
    </div>
</section>
