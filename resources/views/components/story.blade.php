<section id="story" class="relative overflow-hidden bg-paper py-20 sm:py-28 lg:py-32">
    <div class="mx-auto grid max-w-[92rem] gap-14 px-5 sm:px-8 lg:grid-cols-12 lg:items-center lg:gap-20">
        <!-- Visual Collage Column with Hover Zoom -->
        <div class="lg:col-span-6 gsap-fade-up">
            <div class="relative aspect-[4/5] w-full overflow-hidden rounded-sm bg-cream shadow-[0_20px_45px_-20px_rgba(23,23,23,0.35)]">
                <img src="/images/tandoor.png" 
                     class="w-full h-full inset-0 absolute object-cover transition-transform duration-700 hover:scale-105" 
                     alt="Fresh naan being pressed onto the wall of a glowing clay tandoor in Fairbanks">
                <div class="absolute inset-0 bg-gradient-to-t from-ink/40 via-transparent to-transparent"></div>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-4">
                <div class="relative aspect-square w-full overflow-hidden rounded-sm bg-cream shadow-md">
                    <img src="/images/spices.png" 
                         class="w-full h-full inset-0 absolute object-cover transition-transform duration-700 hover:scale-105" 
                         alt="Whole Indian spices in dark ceramic bowls">
                </div>
                <div class="relative aspect-square w-full overflow-hidden rounded-sm bg-cream shadow-md">
                    <img src="/images/samosas.png" 
                         class="w-full h-full inset-0 absolute object-cover transition-transform duration-700 hover:scale-105" 
                         alt="Golden samosas with chutney on a terracotta plate">
                </div>
            </div>
        </div>

        <!-- Story Copy & Metrics Column -->
        <div class="lg:col-span-6 lg:pl-4 gsap-fade-up">
            <p class="label-caps text-saffron">Our story</p>
            <h2 class="mt-5 font-display text-5xl leading-[0.95] text-ember sm:text-6xl">
                Slow-cooked,<span class="block italic text-terracotta">never rushed</span>
            </h2>
            <div class="mt-7 space-y-5 text-sm leading-[1.85] text-ink/70 sm:text-[15px]">
                <p>At Hari Om Cuisine of India we cook the way it is done back home: onions cooked down slowly until they sweeten, whole spices toasted and ground the same day, and naan pressed onto the hot wall of the tandoor until it blisters and puffs.</p>
                <p>Our kitchen on South Cushman Street serves Fairbanks the length of the Indian table — crisp pakoras and papad to start, creamy dhaba dal, palak paneer and Kashmiri dum aloo, slow-braised lamb rogan josh, saffron biryani and the full thali platter.</p>
                <p>Whether it is a weeknight take-out box or a table full of friends on a cold Alaskan evening, the food leaves the kitchen the same way: hot, generous and made to order.</p>
            </div>

            <!-- Stats Ribbon -->
            <div class="mt-10 grid grid-cols-3 gap-4 border-t border-terracotta/15 pt-7">
                <div>
                    <p class="font-display text-4xl leading-none text-terracotta">61</p>
                    <p class="mt-2 text-[9px] uppercase tracking-[0.18em] text-ink/45">Dishes &amp; pours</p>
                </div>
                <div>
                    <p class="font-display text-4xl leading-none text-terracotta">20</p>
                    <p class="mt-2 text-[9px] uppercase tracking-[0.18em] text-ink/45">Vegetarian</p>
                </div>
                <div>
                    <p class="font-display text-4xl leading-none text-terracotta">42</p>
                    <p class="mt-2 text-[9px] uppercase tracking-[0.18em] text-ink/45">Gluten free</p>
                </div>
            </div>

            <!-- Redesigned CTA Button (No arrows) -->
            <div class="mt-9 flex flex-wrap items-center gap-4">
                <a href="{{ route('story') }}" class="btn-secondary-dark">
                    Explore our complete story
                </a>
                <a href="{{ route('menu') }}" class="btn-terracotta">
                    See the full menu
                </a>
            </div>
            <p class="mt-6 text-[11px] uppercase tracking-[0.18em] text-ink/40">1528 S Cushman St · Fairbanks, Alaska</p>
        </div>
    </div>

    <!-- Inside Hari Om: Atmosphere Gallery Carousel Slider -->
    <div class="mx-auto mt-20 max-w-[92rem] px-5 sm:mt-24 sm:px-8">
        <div class="flex flex-col gap-4 border-t border-terracotta/15 pt-10 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="label-caps text-saffron">Inside Hari Om</p>
                <h3 class="mt-3 font-display text-3xl leading-tight text-ember sm:text-4xl">
                    A little piece of India<span class="italic text-terracotta"> in Fairbanks</span>
                </h3>
            </div>
            <div class="flex flex-col items-start gap-3 sm:items-end">
                <p class="max-w-sm text-xs leading-relaxed text-ink/55">
                    Hand-painted walls, brass and marigolds, fabric lanterns glowing over the tables — the room is part of the meal.
                </p>
                <a href="{{ route('gallery') }}" class="btn-secondary-dark !py-2 !px-4 text-[10px]">
                    View full gallery
                </a>
            </div>
        </div>

        <!-- Touch-Enabled Responsive Swiper Slider -->
        <div class="swiper gallery-swiper mt-8 pb-10">
            <div class="swiper-wrapper">
                <!-- Slide 1: Shrine -->
                <div class="swiper-slide">
                    <figure class="group">
                        <div class="relative aspect-[4/3] w-full overflow-hidden rounded-sm bg-cream shadow-md">
                            <img src="/images/cultureShrine.jpg" 
                                 class="w-full h-full inset-0 absolute object-cover transition-transform duration-700 group-hover:scale-[1.04]" 
                                 alt="Ganesh, fresh flowers and a hand-painted Om on the green wall — the heart of our dining room.">
                        </div>
                        <figcaption class="mt-4">
                            <p class="text-[9px] uppercase tracking-[0.22em] text-terracotta/70">The shrine</p>
                            <p class="mt-2 text-xs leading-relaxed text-ink/65">Ganesh, fresh flowers and a hand-painted Om on the green wall — the heart of our dining room.</p>
                        </figcaption>
                    </figure>
                </div>

                <!-- Slide 2: Booths & Murals -->
                <div class="swiper-slide">
                    <figure class="group">
                        <div class="relative aspect-[4/3] w-full overflow-hidden rounded-sm bg-cream shadow-md">
                            <img src="/images/cultureBooths.jpg" 
                                 class="w-full h-full inset-0 absolute object-cover transition-transform duration-700 group-hover:scale-[1.04]" 
                                 alt="Burgundy booths under our Alaska mural, hung with fabric lanterns and fairy lights.">
                        </div>
                        <figcaption class="mt-4">
                            <p class="text-[9px] uppercase tracking-[0.22em] text-terracotta/70">Booths &amp; murals</p>
                            <p class="mt-2 text-xs leading-relaxed text-ink/65">Burgundy booths under our Alaska mural, hung with fabric lanterns and fairy lights.</p>
                        </figcaption>
                    </figure>
                </div>

                <!-- Slide 3: Door on Cushman -->
                <div class="swiper-slide">
                    <figure class="group">
                        <div class="relative aspect-[4/3] w-full overflow-hidden rounded-sm bg-cream shadow-md">
                            <img src="/images/cultureExterior.jpg" 
                                 class="w-full h-full inset-0 absolute object-cover transition-transform duration-700 group-hover:scale-[1.04]" 
                                 alt="Up the red stairs on South Cushman Street — look for the Om and the gold drapes.">
                        </div>
                        <figcaption class="mt-4">
                            <p class="text-[9px] uppercase tracking-[0.22em] text-terracotta/70">Our door on Cushman</p>
                            <p class="mt-2 text-xs leading-relaxed text-ink/65">Up the red stairs on South Cushman Street — look for the Om and the gold drapes.</p>
                        </figcaption>
                    </figure>
                </div>

                <!-- Slide 4: Clay Tandoor Craft -->
                <div class="swiper-slide">
                    <figure class="group">
                        <div class="relative aspect-[4/3] w-full overflow-hidden rounded-sm bg-cream shadow-md">
                            <img src="/images/tandoor.png" 
                                 class="w-full h-full inset-0 absolute object-cover transition-transform duration-700 group-hover:scale-[1.04]" 
                                 alt="Traditional clay tandoor oven baking fresh naan and spiced skewers.">
                        </div>
                        <figcaption class="mt-4">
                            <p class="text-[9px] uppercase tracking-[0.22em] text-terracotta/70">Tandoor Clay Oven</p>
                            <p class="mt-2 text-xs leading-relaxed text-ink/65">Hand-kneaded dough stretched thin and slapped against 800° blistering clay walls.</p>
                        </figcaption>
                    </figure>
                </div>

                <!-- Slide 5: Whole Spices -->
                <div class="swiper-slide">
                    <figure class="group">
                        <div class="relative aspect-[4/3] w-full overflow-hidden rounded-sm bg-cream shadow-md">
                            <img src="/images/spices.png" 
                                 class="w-full h-full inset-0 absolute object-cover transition-transform duration-700 group-hover:scale-[1.04]" 
                                 alt="Whole Indian spices in dark ceramic bowls">
                        </div>
                        <figcaption class="mt-4">
                            <p class="text-[9px] uppercase tracking-[0.22em] text-terracotta/70">Heritage Spices</p>
                            <p class="mt-2 text-xs leading-relaxed text-ink/65">Hand-roasted whole spices ground daily for depth, sweetness, and warmth.</p>
                        </figcaption>
                    </figure>
                </div>

                <!-- Slide 6: Warm Dining Room -->
                <div class="swiper-slide">
                    <figure class="group">
                        <div class="relative aspect-[4/3] w-full overflow-hidden rounded-sm bg-cream shadow-md">
                            <img src="/images/interior.png" 
                                 class="w-full h-full inset-0 absolute object-cover transition-transform duration-700 group-hover:scale-[1.04]" 
                                 alt="Hari Om warm dining room interior">
                        </div>
                        <figcaption class="mt-4">
                            <p class="text-[9px] uppercase tracking-[0.22em] text-terracotta/70">Dining Room Glow</p>
                            <p class="mt-2 text-xs leading-relaxed text-ink/65">A cozy sanctuary on freezing Fairbanks nights filled with rich aromas and warmth.</p>
                        </figcaption>
                    </figure>
                </div>
            </div>

            <!-- Gallery Slider Pagination -->
            <div class="gallery-pagination mt-6 flex justify-center gap-2"></div>
        </div>
    </div>
</section>
