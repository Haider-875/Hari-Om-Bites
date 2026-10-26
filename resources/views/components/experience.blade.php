<section id="experience" class="relative isolate overflow-hidden bg-ink py-24 sm:py-32">
    <!-- Ambience Background Image -->
    <div class="absolute inset-0 opacity-30">
        <img src="{{ asset('images/interior.png') }}"
             alt="Warm Indian restaurant interior with copper accents and a snowy Fairbanks window"
             class="h-full w-full object-cover" />
    </div>

    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-ink via-ink/70 to-ink"></div>

    <div class="relative mx-auto max-w-[92rem] px-5 sm:px-8">
        <!-- Section Title -->
        <div class="max-w-2xl">
            <p class="label-caps text-saffron">The experience</p>
            <h2 class="mt-5 font-display text-5xl leading-[0.95] text-paper sm:text-6xl lg:text-7xl">
                Good food, good people,
                <span class="block italic text-saffron">good times</span>
            </h2>
            <p class="mt-6 max-w-lg text-sm leading-[1.9] text-white/60">
                Walk in from the cold and the kitchen does the rest — spice in the air, bread coming off the tandoor, and a table that keeps filling up.
            </p>
        </div>

        <!-- 3 Pillars Grid -->
        <div class="mt-14 grid gap-px overflow-hidden rounded-sm border border-white/10 bg-white/10 sm:grid-cols-3">
            <!-- Dine In -->
            <div class="group bg-ink/70 p-7 backdrop-blur-sm transition-colors duration-500 hover:bg-ink/90 sm:p-9">
                <div class="flex h-11 w-11 items-center justify-center rounded-full border border-saffron/40 text-saffron transition-colors duration-500 group-hover:bg-saffron group-hover:text-ink">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="mt-6 font-display text-3xl text-paper">Dine in</h3>
                <p class="mt-3 text-[13px] leading-[1.85] text-white/55">
                    Copper bowls, warm naan and a table that fills up with thali. Walk in and settle in — the kitchen cooks every curry to order.
                </p>
            </div>

            <!-- Take Out -->
            <div class="group bg-ink/70 p-7 backdrop-blur-sm transition-colors duration-500 hover:bg-ink/90 sm:p-9">
                <div class="flex h-11 w-11 items-center justify-center rounded-full border border-saffron/40 text-saffron transition-colors duration-500 group-hover:bg-saffron group-hover:text-ink">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <h3 class="mt-6 font-display text-3xl text-paper">Take out</h3>
                <p class="mt-3 text-[13px] leading-[1.85] text-white/55">
                    Call the kitchen, tell us what you are craving, and we will have it packed hot and ready for the drive home through the snow.
                </p>
            </div>

            <!-- Catering -->
            <div class="group bg-ink/70 p-7 backdrop-blur-sm transition-colors duration-500 hover:bg-ink/90 sm:p-9">
                <div class="flex h-11 w-11 items-center justify-center rounded-full border border-saffron/40 text-saffron transition-colors duration-500 group-hover:bg-saffron group-hover:text-ink">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="mt-6 font-display text-3xl text-paper">Catering</h3>
                <p class="mt-3 text-[13px] leading-[1.85] text-white/55">
                    Feeding a party, an office or a family gathering? We build platters of curries, biryani, breads and sweets for the whole room.
                </p>
            </div>
        </div>
    </div>
</section>
