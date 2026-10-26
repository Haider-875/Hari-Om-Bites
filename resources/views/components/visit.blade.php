<section id="visit" x-data="{ reservationOpen: false }" class="relative bg-paper py-20 sm:py-28">
    <div class="mx-auto grid max-w-[92rem] gap-12 px-5 sm:px-8 lg:grid-cols-12 lg:gap-16">
        <!-- Left Column: Details & Actions -->
        <div class="lg:col-span-6">
            <p class="label-caps text-saffron">Visit us</p>
            <h2 class="mt-5 font-display text-5xl leading-[0.95] text-ember sm:text-6xl">
                Find us on
                <span class="block italic text-terracotta">Cushman Street</span>
            </h2>
            <p class="mt-6 max-w-md text-sm leading-[1.9] text-ink/65">
                A short drive from downtown Fairbanks. Dine in with us, call ahead for take out, or let us cater your next gathering.
            </p>

            <dl class="mt-10 space-y-7">
                <!-- Address -->
                <div class="flex gap-4">
                    <svg class="mt-1 h-4 w-4 shrink-0 text-saffron" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div>
                        <dt class="text-[9px] uppercase tracking-[0.22em] text-ink/40">Address</dt>
                        <dd class="mt-1.5 text-sm leading-relaxed text-ink/80">
                            1528 S Cushman St, Fairbanks, AK 99701, United States
                        </dd>
                    </div>
                </div>

                <!-- Call Us -->
                <div class="flex gap-4">
                    <svg class="mt-1 h-4 w-4 shrink-0 text-saffron" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <div>
                        <dt class="text-[9px] uppercase tracking-[0.22em] text-ink/40">Call us</dt>
                        <dd class="mt-1.5">
                            <a href="tel:+19073283218" class="text-sm text-ink/80 transition-colors hover:text-terracotta">
                                +1 907-328-3218
                            </a>
                        </dd>
                    </div>
                </div>

                <!-- Service -->
                <div class="flex gap-4">
                    <svg class="mt-1 h-4 w-4 shrink-0 text-saffron" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 2v7c0 1.1.9 2 2 2h1a2 2 0 0 0 2-2V2M6 2v20M21 15V2a5 5 0 0 0-3 4.5V15h3Z" />
                    </svg>
                    <div>
                        <dt class="text-[9px] uppercase tracking-[0.22em] text-ink/40">Service</dt>
                        <dd class="mt-1.5 text-sm text-ink/80">
                            Dine in · Take out · Catering
                        </dd>
                    </div>
                </div>
            </dl>

            <!-- Action Buttons -->
            <div class="mt-10 flex flex-wrap gap-3">
                <a href="https://www.google.com/maps/search/?api=1&query=1528+S+Cushman+St,+Fairbanks,+AK+99701"
                   target="_blank"
                   rel="noreferrer"
                   class="group inline-flex items-center justify-center gap-2 rounded-full bg-terracotta px-7 py-4 text-[10px] uppercase tracking-[0.2em] text-paper transition-colors hover:bg-ink">
                    <span>Get directions</span>
                    <svg class="h-3.5 w-3.5 transition-transform duration-300 group-hover:-translate-y-0.5 group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
                <a href="tel:+19073283218"
                   class="inline-flex items-center justify-center gap-2 rounded-full border border-terracotta/25 px-7 py-4 text-[10px] uppercase tracking-[0.2em] text-terracotta transition-colors hover:bg-saffron hover:text-ink">
                    Call to order
                </a>
                <button type="button"
                        @click="reservationOpen = true"
                        class="inline-flex items-center justify-center gap-2 rounded-full border border-ink/20 px-7 py-4 text-[10px] uppercase tracking-[0.2em] text-ink transition-colors hover:bg-ink hover:text-paper">
                    Book a Table
                </button>
            </div>
        </div>

        <!-- Right Column: Visual Map Card -->
        <div class="lg:col-span-6">
            <a href="https://www.google.com/maps/search/?api=1&query=1528+S+Cushman+St,+Fairbanks,+AK+99701"
               target="_blank"
               rel="noreferrer"
               class="group relative block aspect-[4/3] w-full overflow-hidden rounded-sm bg-ink shadow-xl">
                <div class="absolute inset-0 opacity-40 transition-opacity duration-700 group-hover:opacity-55">
                    <img src="{{ asset('images/spices.png') }}"
                         alt="Indian spices arranged on a dark surface"
                         class="h-full w-full object-cover" />
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-ink via-ink/60 to-ink/30"></div>

                <div class="absolute inset-0 flex flex-col justify-between p-7 sm:p-10">
                    <div class="flex items-start justify-between">
                        <span class="rounded-full border border-white/25 px-4 py-2 text-[9px] uppercase tracking-[0.2em] text-white/70">
                            Fairbanks, AK 99701
                        </span>
                        <span class="flex h-10 w-10 items-center justify-center rounded-full border border-white/25 text-white/70 transition-colors duration-500 group-hover:border-saffron group-hover:text-saffron">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
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
         style="display: none;"
         class="fixed inset-0 z-50 flex items-center justify-center bg-ink/70 p-4 backdrop-blur-sm">
        <div @click.away="reservationOpen = false"
             class="w-full max-w-lg rounded-sm bg-paper p-6 shadow-2xl sm:p-8 border border-terracotta/20">
            <div class="flex items-center justify-between border-b border-ink/10 pb-4">
                <div>
                    <p class="label-caps text-saffron">Reserve a table</p>
                    <h3 class="font-display text-2xl text-ember mt-1">Hari Om Cuisine of India</h3>
                </div>
                <button type="button" @click="reservationOpen = false" class="text-ink/40 hover:text-ink text-2xl font-light">&times;</button>
            </div>

            <form action="{{ route('reservation.store') }}" method="POST" class="mt-6 space-y-4">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] uppercase tracking-wider text-ink/60 mb-1">Your Name *</label>
                        <input type="text" name="name" required class="w-full rounded-sm border border-ink/20 bg-white px-3 py-2 text-sm focus:border-terracotta focus:outline-none" />
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-wider text-ink/60 mb-1">Phone Number *</label>
                        <input type="tel" name="phone" required placeholder="+1 907-..." class="w-full rounded-sm border border-ink/20 bg-white px-3 py-2 text-sm focus:border-terracotta focus:outline-none" />
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] uppercase tracking-wider text-ink/60 mb-1">Email Address *</label>
                    <input type="email" name="email" required class="w-full rounded-sm border border-ink/20 bg-white px-3 py-2 text-sm focus:border-terracotta focus:outline-none" />
                </div>

                <div class="grid grid-cols-3 gap-3">
                    <div>
                        <label class="block text-[10px] uppercase tracking-wider text-ink/60 mb-1">Guests *</label>
                        <select name="guests" required class="w-full rounded-sm border border-ink/20 bg-white px-3 py-2 text-sm focus:border-terracotta focus:outline-none">
                            <option value="1">1 Person</option>
                            <option value="2" selected>2 People</option>
                            <option value="3">3 People</option>
                            <option value="4">4 People</option>
                            <option value="5">5 People</option>
                            <option value="6">6+ People</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-wider text-ink/60 mb-1">Date *</label>
                        <input type="date" name="date" required value="{{ date('Y-m-d') }}" class="w-full rounded-sm border border-ink/20 bg-white px-3 py-2 text-sm focus:border-terracotta focus:outline-none" />
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase tracking-wider text-ink/60 mb-1">Time *</label>
                        <select name="time" required class="w-full rounded-sm border border-ink/20 bg-white px-3 py-2 text-sm focus:border-terracotta focus:outline-none">
                            <option value="11:30 AM">11:30 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="12:30 PM">12:30 PM</option>
                            <option value="1:00 PM">1:00 PM</option>
                            <option value="1:30 PM">1:30 PM</option>
                            <option value="5:00 PM">5:00 PM</option>
                            <option value="5:30 PM">5:30 PM</option>
                            <option value="6:00 PM">6:00 PM</option>
                            <option value="6:30 PM">6:30 PM</option>
                            <option value="7:00 PM" selected>7:00 PM</option>
                            <option value="7:30 PM">7:30 PM</option>
                            <option value="8:00 PM">8:00 PM</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] uppercase tracking-wider text-ink/60 mb-1">Special Notes / Dietary Needs</label>
                    <textarea name="special_requests" rows="2" placeholder="Anniversary, high chair, spice preferences..." class="w-full rounded-sm border border-ink/20 bg-white px-3 py-2 text-sm focus:border-terracotta focus:outline-none"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full rounded-sm bg-terracotta py-3 text-xs uppercase tracking-widest text-paper hover:bg-ink transition-colors font-medium">
                        Request Reservation
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
