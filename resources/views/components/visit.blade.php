<section id="visit" class="relative bg-paper py-20 sm:py-28" x-data="{ reservationOpen: false }">
    <div class="mx-auto grid max-w-[92rem] gap-12 px-5 sm:px-8 lg:grid-cols-12 lg:gap-16">
        <!-- Left: Details & Actions -->
        <div class="lg:col-span-6">
            <p class="label-caps text-saffron">Visit us</p>
            <h2 class="mt-5 font-display text-5xl leading-[0.95] text-ember sm:text-6xl">
                Find us on<span class="block italic text-terracotta">Cushman Street</span>
            </h2>
            <p class="mt-6 max-w-md text-sm leading-[1.9] text-ink/65">
                A short drive from downtown Fairbanks. Dine in with us, call ahead for take out, or let us cater your next gathering.
            </p>

            <dl class="mt-10 space-y-7">
                <div class="flex gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin mt-1 h-4 w-4 shrink-0 text-saffron"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    <div>
                        <dt class="text-[9px] uppercase tracking-[0.22em] text-ink/40">Address</dt>
                        <dd class="mt-1.5 text-sm leading-relaxed text-ink/80">1528 S Cushman St, Fairbanks, AK 99701, United States</dd>
                    </div>
                </div>

                <div class="flex gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone mt-1 h-4 w-4 shrink-0 text-saffron"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    <div>
                        <dt class="text-[9px] uppercase tracking-[0.22em] text-ink/40">Call us</dt>
                        <dd class="mt-1.5">
                            <a href="tel:+19073283218" class="text-sm text-ink/80 transition-colors hover:text-terracotta">+1 907-328-3218</a>
                        </dd>
                    </div>
                </div>

                <div class="flex gap-4">
                    <svg class="mt-1 h-4 w-4 shrink-0 text-saffron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 2v7c0 1.1.9 2 2 2h1a2 2 0 0 0 2-2V2"></path><path d="M6 2v20"></path><path d="M21 15V2a5 5 0 0 0-3 4.5V15h3Z"></path><path d="M18 15v7"></path></svg>
                    <div>
                        <dt class="text-[9px] uppercase tracking-[0.22em] text-ink/40">Service</dt>
                        <dd class="mt-1.5 text-sm text-ink/80">Dine in · Take out · Catering</dd>
                    </div>
                </div>
            </dl>

            <div class="mt-10 flex flex-col gap-3 sm:flex-row">
                <a href="https://www.google.com/maps/search/?api=1&amp;query=1528+S+Cushman+St,+Fairbanks,+AK+99701" target="_blank" rel="noreferrer" class="btn-primary">
                    Get directions
                </a>
                <a href="tel:+19073283218" class="btn-secondary">
                    Call to order
                </a>
                <button type="button" 
                        @click="reservationOpen = true"
                        class="btn-secondary">
                    Book a Table
                </button>
            </div>
        </div>

        <!-- Right: Map Imagery Card -->
        <div class="lg:col-span-6">
            <a href="https://www.google.com/maps/search/?api=1&amp;query=1528+S+Cushman+St,+Fairbanks,+AK+99701" target="_blank" rel="noreferrer" class="group relative block aspect-[4/3] w-full overflow-hidden rounded-sm bg-ink shadow-xl">
                <div class="absolute inset-0 opacity-40 transition-opacity duration-700 group-hover:opacity-55">
                    <img src="/images/spices.png" class="w-full h-full inset-0 absolute object-cover" alt="Indian spices arranged on a dark surface">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-ink via-ink/60 to-ink/30"></div>
                <div class="absolute inset-0 flex flex-col justify-between p-7 sm:p-10">
                    <div class="flex items-start justify-between">
                        <span class="rounded-full border border-white/25 px-4 py-2 text-[9px] uppercase tracking-[0.2em] text-white/70">Fairbanks, AK 99701</span>
                        <span class="flex h-10 w-10 items-center justify-center rounded-full border border-white/25 text-white/70 transition-colors duration-500 group-hover:border-saffron group-hover:text-saffron">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </span>
                    </div>
                    <div>
                        <p class="text-[9px] uppercase tracking-[0.28em] text-saffron">Hari Om Cuisine of India</p>
                        <p class="mt-3 font-display text-3xl leading-tight text-paper sm:text-4xl">1528 S Cushman St</p>
                        <p class="mt-2 text-[11px] uppercase tracking-[0.16em] text-white/45">Open the map in Google Maps</p>
                    </div>
                </div>
            </a>
            <p class="mt-4 text-center text-[10px] uppercase tracking-[0.18em] text-ink/35">
                Call for today's kitchen hours · +1 907-328-3218
            </p>
        </div>
    </div>

    <!-- Table Reservation Modal -->
    <div x-show="reservationOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center bg-ink/80 p-4 backdrop-blur-sm">
        <div @click.away="reservationOpen = false" class="relative w-full max-w-lg rounded-sm bg-paper p-8 shadow-2xl border border-terracotta/20 text-ink">
            <button @click="reservationOpen = false" class="absolute right-5 top-5 text-ink/50 hover:text-ink">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
            <p class="label-caps text-saffron">Reservations</p>
            <h3 class="mt-2 font-display text-3xl text-ember">Book a Table</h3>
            <p class="mt-2 text-xs text-ink/65">Experience traditional Indian dining on S Cushman St.</p>

            <form action="{{ route('reservation.store') }}" method="POST" class="mt-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-[10px] uppercase tracking-[0.16em] text-ink/60">Your Name</label>
                    <input type="text" name="name" required class="mt-1 w-full rounded border border-terracotta/20 bg-white/70 px-3 py-2 text-sm focus:border-saffron focus:outline-none">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.16em] text-ink/60">Email</label>
                        <input type="email" name="email" required class="mt-1 w-full rounded border border-terracotta/20 bg-white/70 px-3 py-2 text-sm focus:border-saffron focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.16em] text-ink/60">Phone</label>
                        <input type="tel" name="phone" required class="mt-1 w-full rounded border border-terracotta/20 bg-white/70 px-3 py-2 text-sm focus:border-saffron focus:outline-none">
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.16em] text-ink/60">Date</label>
                        <input type="date" name="date" required class="mt-1 w-full rounded border border-terracotta/20 bg-white/70 px-3 py-2 text-sm focus:border-saffron focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.16em] text-ink/60">Time</label>
                        <input type="time" name="time" required class="mt-1 w-full rounded border border-terracotta/20 bg-white/70 px-3 py-2 text-sm focus:border-saffron focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.16em] text-ink/60">Guests</label>
                        <input type="number" name="guests" min="1" max="20" value="2" required class="mt-1 w-full rounded border border-terracotta/20 bg-white/70 px-3 py-2 text-sm focus:border-saffron focus:outline-none">
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] uppercase tracking-[0.16em] text-ink/60">Special Requests</label>
                    <textarea name="special_requests" rows="2" class="mt-1 w-full rounded border border-terracotta/20 bg-white/70 px-3 py-2 text-sm focus:border-saffron focus:outline-none"></textarea>
                </div>
                <button type="submit" class="btn-primary w-full text-center">
                    Confirm Reservation Request
                </button>
            </form>
        </div>
    </div>
</section>
