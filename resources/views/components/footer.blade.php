<footer class="bg-ink text-paper">
    <div class="mx-auto max-w-[92rem] px-5 py-16 sm:px-8 lg:py-20">
        <div class="grid gap-12 lg:grid-cols-12">
            <!-- Brand Info -->
            <div class="lg:col-span-5">
                <p class="label-caps text-saffron">Good food · Good people · Good times</p>
                <div class="mt-6">
                    <img src="{{ asset('images/logo.png') }}"
                         alt="Hari Om Cuisine of India"
                         class="h-16 w-auto sm:h-[4.5rem] object-contain" />
                </div>
                <p class="mt-6 max-w-sm text-sm leading-relaxed text-white/55">
                    Traditional Indian cooking on S Cushman Street — dine in, take out and catering in the heart of Fairbanks, Alaska.
                </p>
            </div>

            <!-- Navigation Links -->
            <div class="lg:col-span-2">
                <p class="label-caps text-white/40">Explore</p>
                <ul class="mt-5 space-y-3 text-sm text-white/70">
                    <li><a href="{{ url('/#story') }}" class="transition-colors hover:text-saffron">Our story</a></li>
                    <li><a href="{{ url('/#selection') }}" class="transition-colors hover:text-saffron">Chef's selection</a></li>
                    <li><a href="{{ route('menu') }}" class="transition-colors hover:text-saffron">Full menu</a></li>
                    <li><a href="{{ url('/#visit') }}" class="transition-colors hover:text-saffron">Visit us</a></li>
                </ul>
            </div>

            <!-- Menu Quick Links -->
            <div class="lg:col-span-2">
                <p class="label-caps text-white/40">The menu</p>
                <ul class="mt-5 space-y-3 text-sm text-white/70">
                    <li><a href="{{ url('/menu#appetizers') }}" class="transition-colors hover:text-saffron">Appetizers</a></li>
                    <li><a href="{{ url('/menu#soups') }}" class="transition-colors hover:text-saffron">Soups</a></li>
                    <li><a href="{{ url('/menu#veg-entrees') }}" class="transition-colors hover:text-saffron">Veg Entrees</a></li>
                    <li><a href="{{ url('/menu#non-veg-entrees') }}" class="transition-colors hover:text-saffron">Non Veg Entrees</a></li>
                    <li><a href="{{ url('/menu#thali') }}" class="transition-colors hover:text-saffron">Thali Platter</a></li>
                </ul>
            </div>

            <!-- Contact & Directions -->
            <div class="lg:col-span-3">
                <p class="label-caps text-white/40">Find us</p>
                <a href="https://www.google.com/maps/search/?api=1&query=1528+S+Cushman+St,+Fairbanks,+AK+99701"
                   target="_blank"
                   rel="noreferrer"
                   class="mt-5 flex items-start gap-3 text-sm leading-relaxed text-white/70 transition-colors hover:text-saffron">
                    <svg class="mt-0.5 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    1528 S Cushman St, Fairbanks, AK 99701, United States
                </a>
                <a href="tel:+19073283218"
                   class="mt-4 flex items-center gap-3 text-sm text-white/70 transition-colors hover:text-saffron">
                    <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    +1 907-328-3218
                </a>
                <a href="tel:+19073283218"
                   class="mt-6 inline-flex items-center gap-2 rounded-full border border-saffron/50 px-5 py-3 text-[10px] uppercase tracking-[0.22em] text-saffron transition-colors hover:bg-saffron hover:text-ink">
                    <span>Call to order</span>
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Copyright / Bottom Ribbon -->
        <div class="mt-14 flex flex-col gap-3 border-t border-white/10 pt-6 text-[10px] uppercase tracking-[0.18em] text-white/35 sm:flex-row sm:items-center sm:justify-between">
            <p>© {{ date('Y') }} Hari Om Cuisine Of India</p>
            <p>Dine in · Take out · Catering · Fairbanks, Alaska</p>
        </div>
    </div>
</footer>
