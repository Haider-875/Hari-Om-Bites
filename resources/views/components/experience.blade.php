<section id="experience" class="relative isolate overflow-hidden bg-ink py-24 sm:py-32">
    <!-- Ambient Interior Image with Ken Burns motion -->
    <div class="absolute inset-0 opacity-30">
        <span class="inline-block relative h-full w-full">
            <img src="/images/interior.png" 
                 class="w-full h-full inset-0 absolute object-cover animate-ken-burns" 
                 alt="Warm Indian restaurant interior with copper accents and a snowy Fairbanks window">
        </span>
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-ink via-ink/75 to-ink"></div>

    <div class="relative mx-auto max-w-[92rem] px-5 sm:px-8">
        <div class="max-w-2xl gsap-fade-up">
            <p class="label-caps text-saffron">The experience</p>
            <h2 class="mt-5 font-display text-5xl leading-[0.95] text-paper sm:text-6xl lg:text-7xl">
                Good food, good people,<span class="block italic text-saffron">good times</span>
            </h2>
            <p class="mt-6 max-w-lg text-sm leading-[1.9] text-white/60">
                Walk in from the cold and the kitchen does the rest — spice in the air, bread coming off the tandoor, and a table that keeps filling up.
            </p>
        </div>

        <!-- 3 Feature Cards with GSAP Stagger Entrance -->
        <div class="gsap-stagger-group mt-14 grid gap-4 overflow-hidden sm:grid-cols-3">
            <!-- Dine in -->
            <div class="gsap-stagger-item group rounded-sm border border-white/10 bg-ink/70 p-7 backdrop-blur-md transition-all duration-500 hover:border-saffron/40 hover:-translate-y-1 sm:p-9 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-saffron/40 text-saffron transition-colors duration-500 group-hover:bg-saffron group-hover:text-ink">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-utensils-crossed"><path d="m16 2-2.3 2.3a3 3 0 0 0 0 4.2l1.8 1.8a3 3 0 0 0 4.2 0L22 8"></path><path d="M15 15 3.3 3.3a4.2 4.2 0 0 0 0 6l7.3 7.3c.7.7 2 .7 2.8 0L15 15Zm0 0 7 7"></path><path d="m2.1 21.8 6.4-6.3"></path><path d="m19 5-7 7"></path></svg>
                </div>
                <h3 class="mt-6 font-display text-3xl text-paper">Dine in</h3>
                <p class="mt-3 text-[13px] leading-[1.85] text-white/60">
                    Copper bowls, warm naan and a table that fills up with thali. Walk in and settle in — the kitchen cooks every curry to order.
                </p>
                <div class="mt-6 pt-4 border-t border-white/10">
                    <a href="{{ route('reservations') }}" class="btn-secondary !py-2 !px-4 text-[10px] w-full text-center">
                        Book a table
                    </a>
                </div>
            </div>

            <!-- Take out -->
            <div class="gsap-stagger-item group rounded-sm border border-white/10 bg-ink/70 p-7 backdrop-blur-md transition-all duration-500 hover:border-saffron/40 hover:-translate-y-1 sm:p-9 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-saffron/40 text-saffron transition-colors duration-500 group-hover:bg-saffron group-hover:text-ink">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-bag"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                </div>
                <h3 class="mt-6 font-display text-3xl text-paper">Take out</h3>
                <p class="mt-3 text-[13px] leading-[1.85] text-white/60">
                    Call the kitchen, tell us what you are craving, and we will have it packed hot and ready for the drive home through the snow.
                </p>
                <div class="mt-6 pt-4 border-t border-white/10">
                    <a href="tel:+19073283218" class="btn-primary !py-2 !px-4 text-[10px] w-full text-center">
                        Order takeout
                    </a>
                </div>
            </div>

            <!-- Catering -->
            <div class="gsap-stagger-item group rounded-sm border border-white/10 bg-ink/70 p-7 backdrop-blur-md transition-all duration-500 hover:border-saffron/40 hover:-translate-y-1 sm:p-9 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-saffron/40 text-saffron transition-colors duration-500 group-hover:bg-saffron group-hover:text-ink">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <h3 class="mt-6 font-display text-3xl text-paper">Catering</h3>
                <p class="mt-3 text-[13px] leading-[1.85] text-white/60">
                    Feeding a party, an office or a family gathering? We build platters of curries, biryani, breads and sweets for the whole room.
                </p>
                <div class="mt-6 pt-4 border-t border-white/10">
                    <a href="{{ route('contact') }}" class="btn-secondary !py-2 !px-4 text-[10px] w-full text-center">
                        Catering inquiries
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
