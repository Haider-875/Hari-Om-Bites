<section id="experience" class="position-relative overflow-hidden bg-ink py-5" style="padding-top: 6rem !important; padding-bottom: 6rem !important;">
    <!-- Ambient Interior Image with Ken Burns motion -->
    <div class="position-absolute inset-0" style="opacity: 0.3;">
        <span class="d-inline-block position-relative w-100 h-100">
            <img src="/images/interior.png" 
                 class="w-100 h-100 inset-0 position-absolute object-cover animate-ken-burns" 
                 alt="Warm Indian restaurant interior with copper accents and a snowy Fairbanks window">
        </span>
    </div>
    <div class="position-absolute inset-0 bg-gradient-b-hero"></div>

    <div class="position-relative max-w-92rem mx-auto px-3 px-sm-4 px-lg-5">
        <div class="max-w-2xl gsap-fade-up">
            <p class="label-caps text-saffron m-0">The experience</p>
            <h2 class="mt-4 font-display text-paper display-title-hero m-0">
                Good food, good people,<span class="d-block fst-italic text-saffron">good times</span>
            </h2>
            <p class="mt-4 max-w-lg text-white-60 m-0" style="font-size: 14px; line-height: 1.9;">
                Walk in from the cold and the kitchen does the rest — spice in the air, bread coming off the tandoor, and a table that keeps filling up.
            </p>
        </div>

        <!-- 3 Feature Cards with GSAP Stagger Entrance -->
        <div class="gsap-stagger-group mt-5 row g-4">
            <!-- Dine in -->
            <div class="col-12 col-md-4">
                <div class="gsap-stagger-item rounded-sm border border-white-10 bg-ink-70 p-4 p-sm-5 backdrop-blur-md transition-all shadow-lg h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-center rounded-full border border-saffron-40 text-saffron w-12 h-12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-utensils-crossed"><path d="m16 2-2.3 2.3a3 3 0 0 0 0 4.2l1.8 1.8a3 3 0 0 0 4.2 0L22 8"></path><path d="M15 15 3.3 3.3a4.2 4.2 0 0 0 0 6l7.3 7.3c.7.7 2 .7 2.8 0L15 15Zm0 0 7 7"></path><path d="m2.1 21.8 6.4-6.3"></path><path d="m19 5-7 7"></path></svg>
                        </div>
                        <h3 class="mt-4 font-display text-paper m-0" style="font-size: 1.75rem;">Dine in</h3>
                        <p class="mt-3 text-white-60 m-0" style="font-size: 13px; line-height: 1.85;">
                            Copper bowls, warm naan and a table that fills up with thali. Walk in and settle in — the kitchen cooks every curry to order.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-top border-white-10">
                        <a href="{{ route('reservations') }}" class="btn-secondary py-2 px-3 tracking-wider-custom text-uppercase w-100 text-center justify-content-center" style="font-size: 10px; min-height: 44px;">
                            Book a table
                        </a>
                    </div>
                </div>
            </div>

            <!-- Take out -->
            <div class="col-12 col-md-4">
                <div class="gsap-stagger-item rounded-sm border border-white-10 bg-ink-70 p-4 p-sm-5 backdrop-blur-md transition-all shadow-lg h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-center rounded-full border border-saffron-40 text-saffron w-12 h-12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-bag"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                        </div>
                        <h3 class="mt-4 font-display text-paper m-0" style="font-size: 1.75rem;">Take out</h3>
                        <p class="mt-3 text-white-60 m-0" style="font-size: 13px; line-height: 1.85;">
                            Call the kitchen, tell us what you are craving, and we will have it packed hot and ready for the drive home through the snow.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-top border-white-10">
                        <a href="tel:+19073283218" class="btn-primary py-2 px-3 tracking-wider-custom text-uppercase w-100 text-center justify-content-center" style="font-size: 10px; min-height: 44px;">
                            Order takeout
                        </a>
                    </div>
                </div>
            </div>

            <!-- Catering -->
            <div class="col-12 col-md-4">
                <div class="gsap-stagger-item rounded-sm border border-white-10 bg-ink-70 p-4 p-sm-5 backdrop-blur-md transition-all shadow-lg h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-center rounded-full border border-saffron-40 text-saffron w-12 h-12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <h3 class="mt-4 font-display text-paper m-0" style="font-size: 1.75rem;">Catering</h3>
                        <p class="mt-3 text-white-60 m-0" style="font-size: 13px; line-height: 1.85;">
                            Feeding a party, an office or a family gathering? We build platters of curries, biryani, breads and sweets for the whole room.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-top border-white-10">
                        <a href="{{ route('contact') }}" class="btn-secondary py-2 px-3 tracking-wider-custom text-uppercase w-100 text-center justify-content-center" style="font-size: 10px; min-height: 44px;">
                            Catering inquiries
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
