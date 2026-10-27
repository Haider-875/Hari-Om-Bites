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
         x-data="refMenuPreviewComponent({{ Js::from($categoriesData) }}, '{{ $firstCatId }}')"
         class="ref-menu-section">
    <div class="ref-menu-container">
        <!-- Section Header -->
        <div class="d-flex flex-column gap-3 flex-sm-row align-items-sm-end justify-content-sm-between gsap-fade-up">
            <div>
                <p class="label-caps text-saffron m-0">Fairbanks · Alaska</p>
                <h2 class="ref-menu-title">
                    Our menu
                </h2>
            </div>
            <p class="ref-menu-subtitle">
                {{ $totalDishes }} dishes and pours
                <span>Appetizers · Curries · Thali · Wine · Beer</span>
            </p>
        </div>

        <!-- Scrollable Category Tabs Bar with Spring Gliding Saffron Underline -->
        <div class="ref-tabs-track">
            <template x-for="cat in categories" :key="cat.id">
                <button type="button" 
                        x-bind:data-cat-id="cat.id"
                        @click="selectTab(cat.id, $event.currentTarget)"
                        class="ref-tab-btn"
                        x-bind:class="activeTab === cat.id ? 'is-active' : ''">
                    <span x-text="cat.name"></span>
                </button>
            </template>
            <!-- Spring Gliding Saffron Underline (stiffness: 360, damping: 32) -->
            <div class="ref-tab-indicator"
                 x-bind:style="'left: ' + indicatorLeft + 'px; width: ' + indicatorWidth + 'px; opacity: ' + (indicatorReady ? 1 : 0) + ';'">
            </div>
        </div>

        <!-- Dishes List Area with Framer Motion-style Exit/Enter Animations -->
        <div class="mt-4">
            <div class="ref-dish-grid">
                <template x-for="(item, idx) in currentCategory.items.slice(0, 6)" :key="item.name">
                    <div class="ref-dish-item group">
                        <!-- Circular Image with Ring and Hover Zoom -->
                        <div class="ref-dish-img-wrap">
                            <img x-bind:src="item.image" x-bind:alt="item.name">
                        </div>

                        <!-- Name, Price & Description -->
                        <div class="ref-dish-info">
                            <div class="ref-dish-header">
                                <h3 class="ref-dish-title" x-text="item.name"></h3>
                                <span class="ref-dish-price" x-text="item.price"></span>
                            </div>
                            <p class="ref-dish-desc" x-text="item.desc"></p>
                        </div>
                    </div>
                </template>
            </div>

            <!-- More Items Text -->
            <p x-show="currentCategory.more > 0" class="ref-more-text">
                <span x-text="'+ ' + currentCategory.more + ' more in ' + currentCategory.name.toLowerCase()"></span>
            </p>
        </div>

        <!-- Signature View the Full Menu Button (Golden-Yellow, Centered) -->
        <div class="text-center d-flex justify-content-center mt-4">
            <a href="{{ route('menu') }}" class="btn-primary ref-menu-cta group">
                <span>View the full menu</span>
            </a>
        </div>
    </div>
</section>

<script>
    function refMenuPreviewComponent(categoriesData, firstCatId) {
        return {
            activeTab: firstCatId,
            categories: categoriesData,
            indicatorLeft: 0,
            indicatorWidth: 0,
            indicatorReady: false,
            isSwitching: false,
            init() {
                this.$nextTick(() => {
                    const activeBtn = this.$el.querySelector(`.ref-tab-btn[data-cat-id='${this.activeTab}']`);
                    if (activeBtn) {
                        this.updateIndicator(activeBtn);
                    }
                    this.initScrollReveal();
                });
                window.addEventListener('resize', () => {
                    const activeBtn = this.$el.querySelector(`.ref-tab-btn[data-cat-id='${this.activeTab}']`);
                    if (activeBtn) {
                        this.updateIndicator(activeBtn);
                    }
                });
            },
            updateIndicator(el) {
                if (!el) return;
                const insetX = 8; // matches inset-x-2 from base44 reference
                this.indicatorLeft = el.offsetLeft + insetX;
                this.indicatorWidth = Math.max(16, el.offsetWidth - (insetX * 2));
                this.indicatorReady = true;
            },
            selectTab(id, el) {
                if (this.activeTab === id || this.isSwitching) return;
                this.isSwitching = true;
                this.updateIndicator(el);
                if (el) {
                    el.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }

                if (window.gsap) {
                    // 1. Ultra smooth exit transition (matching reference exit animation)
                    window.gsap.to('.ref-dish-grid', {
                        opacity: 0,
                        y: -8,
                        duration: 0.16,
                        ease: 'power2.in',
                        onComplete: () => {
                            this.activeTab = id;
                            this.$nextTick(() => {
                                // 2. Ultra smooth container entrance (matching reference animate)
                                window.gsap.fromTo('.ref-dish-grid',
                                    { opacity: 0, y: 12 },
                                    { opacity: 1, y: 0, duration: 0.32, ease: 'power2.out' }
                                );

                                // 3. Staggered dish items entrance (matching reference stagger)
                                window.gsap.fromTo('.ref-dish-item',
                                    { opacity: 0, y: 14 },
                                    {
                                        opacity: 1,
                                        y: 0,
                                        duration: 0.4,
                                        stagger: 0.05,
                                        ease: 'power3.out',
                                        clearProps: 'transform',
                                        onComplete: () => {
                                            this.isSwitching = false;
                                        }
                                    }
                                );
                            });
                        }
                    });
                } else {
                    this.activeTab = id;
                    this.isSwitching = false;
                }
            },
            initScrollReveal() {
                if (window.gsap && window.ScrollTrigger) {
                    window.ScrollTrigger.create({
                        trigger: '#menu',
                        start: 'top 82%',
                        once: true,
                        onEnter: () => {
                            window.gsap.fromTo('.ref-dish-item',
                                { opacity: 0, y: 16 },
                                {
                                    opacity: 1,
                                    y: 0,
                                    duration: 0.45,
                                    stagger: 0.05,
                                    ease: 'power3.out',
                                    clearProps: 'transform'
                                }
                            );
                        }
                    });
                }
            },
            get currentCategory() {
                return this.categories.find(c => c.id === this.activeTab) || this.categories[0];
            }
        };
    }
</script>
