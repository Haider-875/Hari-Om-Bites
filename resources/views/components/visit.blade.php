<section id="visit" class="position-relative bg-paper py-5" style="padding-top: 5rem !important; padding-bottom: 5rem !important;" x-data="{ reservationOpen: false }">
    <div class="max-w-92rem mx-auto px-3 px-sm-4 px-lg-5">
        <div class="row g-4 g-lg-5 align-items-center">
            <!-- Left: Details & Actions -->
            <div class="col-12 col-lg-6">
                <p class="label-caps text-saffron m-0">Visit us</p>
                <h2 class="mt-3 font-display text-ember display-title-section m-0">
                    Find us on<span class="d-block fst-italic text-terracotta">Cushman Street</span>
                </h2>
                <p class="mt-4 max-w-md text-ink-65 m-0" style="font-size: 14px; line-height: 1.9;">
                    A short drive from downtown Fairbanks. Dine in with us, call ahead for take out, or let us cater your next gathering.
                </p>

                <dl class="mt-4 d-flex flex-column gap-4">
                    <div class="d-flex gap-3 align-items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin mt-1 w-4 h-4 flex-shrink-0 text-saffron"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <div>
                            <dt class="text-uppercase tracking-wider-custom text-ink-40 m-0" style="font-size: 9px;">Address</dt>
                            <dd class="mt-1 small leading-relaxed text-ink-80 m-0">1528 S Cushman St, Fairbanks, AK 99701, United States</dd>
                        </div>
                    </div>

                    <div class="d-flex gap-3 align-items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone mt-1 w-4 h-4 flex-shrink-0 text-saffron"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <div>
                            <dt class="text-uppercase tracking-wider-custom text-ink-40 m-0" style="font-size: 9px;">Call us</dt>
                            <dd class="mt-1 m-0">
                                <a href="tel:+19073283218" class="small text-ink-80 transition-colors hover-text-saffron text-decoration-none">+1 907-328-3218</a>
                            </dd>
                        </div>
                    </div>

                    <div class="d-flex gap-3 align-items-start">
                        <svg class="mt-1 w-4 h-4 flex-shrink-0 text-saffron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 2v7c0 1.1.9 2 2 2h1a2 2 0 0 0 2-2V2"></path><path d="M6 2v20"></path><path d="M21 15V2a5 5 0 0 0-3 4.5V15h3Z"></path><path d="M18 15v7"></path></svg>
                        <div>
                            <dt class="text-uppercase tracking-wider-custom text-ink-40 m-0" style="font-size: 9px;">Service</dt>
                            <dd class="mt-1 small text-ink-80 m-0">Dine in · Take out · Catering</dd>
                        </div>
                    </div>
                </dl>

                <div class="mt-4 pt-2 d-flex flex-column flex-sm-row justify-content-center justify-content-sm-start align-items-center gap-3">
                    <a href="https://www.google.com/maps/search/?api=1&amp;query=1528+S+Cushman+St,+Fairbanks,+AK+99701" target="_blank" rel="noreferrer" class="btn-primary w-100 w-sm-auto text-center justify-content-center" style="min-height: 44px;">
                        Get directions
                    </a>
                    <button type="button" 
                            @click="reservationOpen = true"
                            class="btn-primary w-100 w-sm-auto text-center justify-content-center"
                            style="min-height: 44px;">
                        Book a Table
                    </button>
                </div>
            </div>

            <!-- Right: Map Imagery Card -->
            <div class="col-12 col-lg-6">
                <a href="https://www.google.com/maps/search/?api=1&amp;query=1528+S+Cushman+St,+Fairbanks,+AK+99701" target="_blank" rel="noreferrer" class="position-relative d-block aspect-4-3 w-100 overflow-hidden rounded-sm bg-ink shadow-lg text-decoration-none" style="box-shadow: 0 20px 45px -18px rgba(23,23,23,0.35);">
                    <div class="position-absolute inset-0" style="opacity: 0.4;">
                        <img src="/images/spices.png" class="w-100 h-100 inset-0 position-absolute object-cover" alt="Indian spices arranged on a dark surface">
                    </div>
                    <div class="position-absolute inset-0 bg-gradient-t-ink"></div>
                    <div class="position-absolute inset-0 d-flex flex-column justify-content-between p-4 p-sm-5">
                        <div class="d-flex align-items-start justify-content-between">
                            <span class="rounded-full border border-white-25 px-3 py-1 text-uppercase tracking-wider-custom text-white-70" style="font-size: 9px;">Fairbanks, AK 99701</span>
                            <span class="d-flex align-items-center justify-content-center rounded-full border border-white-25 text-white-70 w-10 h-10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            </span>
                        </div>
                        <div>
                            <p class="text-uppercase tracking-widest-custom text-saffron m-0" style="font-size: 9px;">Hari Om Cuisine of India</p>
                            <p class="mt-2 font-display text-paper m-0" style="font-size: clamp(1.75rem, 3vw, 2.25rem); line-height: 1.2;">1528 S Cushman St</p>
                            <p class="mt-1 text-uppercase tracking-wider-custom text-white-45 m-0" style="font-size: 11px;">Open the map in Google Maps</p>
                        </div>
                    </div>
                </a>
                <p class="mt-3 text-center text-uppercase tracking-wider-custom text-ink-75 fw-medium m-0" style="font-size: 10px;">
                    Call for today's kitchen hours · +1 907-328-3218
                </p>
            </div>
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
         class="modal-overlay bg-ink-80 p-3 backdrop-blur-sm">
        <div @click.away="reservationOpen = false" class="position-relative w-100 rounded-sm bg-paper p-4 p-sm-5 shadow-lg border border-terracotta-20 text-ink max-w-lg" style="max-height: 90vh; overflow-y: auto; -webkit-overflow-scrolling: touch;">
            <button type="button" 
                    @click.stop="reservationOpen = false" 
                    class="position-absolute border-0 bg-transparent text-ink-50 p-2 cursor-pointer" 
                    style="top: 1rem; right: 1rem; z-index: 20;"
                    aria-label="Close reservation modal">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="pointer-events: none;"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
            <p class="label-caps text-saffron m-0">Reservations</p>
            <h3 class="mt-2 font-display text-ember fs-2 m-0">Book a Table</h3>
            <p class="mt-2 small text-ink-65 m-0">Experience traditional Indian dining on S Cushman St.</p>

            <form action="{{ route('reservation.store') }}" method="POST" class="mt-4 d-flex flex-column gap-3">
                @csrf
                <div>
                    <label class="d-block text-uppercase tracking-wider-custom text-ink-60 m-0" style="font-size: 10px;">Your Name</label>
                    <input type="text" name="name" required class="form-control form-control-sm mt-1 bg-white-70 border-terracotta-20">
                </div>
                <div class="row g-3">
                    <div class="col-12 col-sm-6">
                        <label class="d-block text-uppercase tracking-wider-custom text-ink-60 m-0" style="font-size: 10px;">Email</label>
                        <input type="email" name="email" required class="form-control form-control-sm mt-1 bg-white-70 border-terracotta-20">
                    </div>
                    <div class="col-12 col-sm-6">
                        <label class="d-block text-uppercase tracking-wider-custom text-ink-60 m-0" style="font-size: 10px;">Phone</label>
                        <input type="tel" name="phone" required class="form-control form-control-sm mt-1 bg-white-70 border-terracotta-20">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-12 col-sm-4">
                        <label class="d-block text-uppercase tracking-wider-custom text-ink-60 m-0" style="font-size: 10px;">Date</label>
                        <input type="date" name="date" required class="form-control form-control-sm mt-1 bg-white-70 border-terracotta-20">
                    </div>
                    <div class="col-12 col-sm-4">
                        <label class="d-block text-uppercase tracking-wider-custom text-ink-60 m-0" style="font-size: 10px;">Time</label>
                        <input type="time" name="time" required class="form-control form-control-sm mt-1 bg-white-70 border-terracotta-20">
                    </div>
                    <div class="col-12 col-sm-4">
                        <label class="d-block text-uppercase tracking-wider-custom text-ink-60 m-0" style="font-size: 10px;">Guests</label>
                        <input type="number" name="guests" min="1" max="20" value="2" required class="form-control form-control-sm mt-1 bg-white-70 border-terracotta-20">
                    </div>
                </div>
                <div>
                    <label class="d-block text-uppercase tracking-wider-custom text-ink-60 m-0" style="font-size: 10px;">Special Requests</label>
                    <textarea name="special_requests" rows="2" class="form-control form-control-sm mt-1 bg-white-70 border-terracotta-20"></textarea>
                </div>
                <button type="submit" class="btn-primary w-100 text-center justify-content-center mt-2" style="min-height: 44px;">
                    Confirm Reservation Request
                </button>
            </form>
        </div>
    </div>
</section>
