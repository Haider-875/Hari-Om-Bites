<footer class="bg-ink text-paper">
    <div class="max-w-92rem mx-auto px-3 px-sm-4 px-lg-5 py-5">
        <div class="row g-4 g-lg-5">
            <!-- Col 1: Branding -->
            <div class="col-12 col-md-6 col-lg-4">
                <p class="footer-eyebrow">Good food · Good people · Good times</p>
                <div class="mt-3">
                    <img src="/images/logo.png" 
                         alt="Hari Om Cuisine of India" 
                         width="612" 
                         height="311" 
                         class="footer-logo user-select-none">
                </div>
                <p class="mt-3 footer-bio">
                    Traditional Indian cooking on S Cushman Street — dine in, take out and catering in the heart of Fairbanks, Alaska.
                </p>
            </div>

            <!-- Col 2: Explore -->
            <div class="col-6 col-md-3 col-lg-2">
                <p class="footer-heading">Explore</p>
                <ul class="list-unstyled mt-3 d-flex flex-column gap-2 footer-nav-list">
                    <li><a class="footer-nav-link" href="{{ route('story') }}">Our story</a></li>
                    <li><a class="footer-nav-link" href="{{ route('menu') }}">Full menu</a></li>
                    <li><a class="footer-nav-link" href="{{ route('gallery') }}">Food gallery</a></li>
                    <li><a class="footer-nav-link" href="{{ route('reservations') }}">Reservations</a></li>
                    <li><a class="footer-nav-link" href="{{ route('contact') }}">Visit & Contact</a></li>
                </ul>
            </div>

            <!-- Col 3: The menu -->
            <div class="col-6 col-md-3 col-lg-2">
                <p class="footer-heading">The menu</p>
                <ul class="list-unstyled mt-3 d-flex flex-column gap-2 footer-nav-list">
                    <li><a class="footer-nav-link" href="{{ route('menu') }}#appetizers">Appetizers</a></li>
                    <li><a class="footer-nav-link" href="{{ route('menu') }}#soups">Soups</a></li>
                    <li><a class="footer-nav-link" href="{{ route('menu') }}#veg-entrees">Veg Entrees</a></li>
                    <li><a class="footer-nav-link" href="{{ route('menu') }}#non-veg-entrees">Non Veg Entrees</a></li>
                    <li><a class="footer-nav-link" href="{{ route('menu') }}#thali-platter">Thali Platter</a></li>
                </ul>
            </div>

            <!-- Col 4: Find us -->
            <div class="col-12 col-md-6 col-lg-4">
                <p class="footer-heading">Find us</p>
                <div class="mt-3 d-flex flex-column gap-3">
                    <a href="https://www.google.com/maps/search/?api=1&amp;query=1528+S+Cushman+St,+Fairbanks,+AK+99701" target="_blank" rel="noreferrer" class="footer-contact-item text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="footer-contact-icon"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <span>1528 S Cushman St, Fairbanks, AK 99701, United States</span>
                    </a>
                    <a href="tel:+19073283218" class="footer-contact-item text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="footer-contact-icon"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <span>+1 907-328-3218</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright Line -->
        <div class="mt-5 pt-4 d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 border-top border-white-10 text-white-60 text-center text-md-start footer-bottom">
            <p class="mb-0">© 2026 Hari Om Cuisine Of India</p>
            <a href="https://azorasolution.com/" target="_blank" rel="noreferrer" class="footer-credit-link">Designed By Azora Solutions</a>
            <p class="mb-0">Dine in · Take out · Catering · Fairbanks, Alaska</p>
        </div>
    </div>
</footer>
