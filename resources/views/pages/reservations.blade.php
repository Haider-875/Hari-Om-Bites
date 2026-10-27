@extends('layouts.app')

@section('content')
<div class="min-vh-100 bg-paper">
    <!-- Header Banner -->
    <section class="position-relative overflow-hidden bg-ink py-5" style="padding-top: 8rem !important; padding-bottom: 5rem !important;">
        <div class="position-absolute inset-0" style="opacity: 0.25;">
            <img src="/images/interior.png" class="w-100 h-100 object-cover" alt="Dining Room">
        </div>
        <div class="position-absolute inset-0 bg-gradient-b-hero"></div>

        <div class="position-relative max-w-92rem px-3 px-sm-4 text-center">
            <div class="max-w-3xl mx-auto text-center">
                <p class="label-caps text-saffron m-0 text-center" style="font-size: 10px; letter-spacing: 0.2em;">Dine In Experience</p>
                <h1 class="mt-3 font-display text-paper m-0 text-center" style="font-size: 26px; line-height: 1.25;">
                    Reserve Your<span class="d-block fst-italic text-terracotta">Table</span>
                </h1>
                <p class="mt-3 max-w-2xl text-white-70 leading-relaxed m-0 mx-auto text-center" style="font-size: 14px;">
                    Join us for an unforgettable evening of Punjabi hospitality, warm tandoor breads, and comforting curries on South Cushman Street.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-5" style="padding-top: 4rem !important; padding-bottom: 5rem !important;">
        <div class="max-w-92rem px-3 px-sm-4">
            <div class="row g-4 g-lg-5">
                <!-- Left: Booking Form -->
                <div class="col-12 col-lg-7">
                    @if(session('success'))
                        <div class="alert alert-success rounded-sm p-4 mb-4 border-0 shadow-sm" style="background-color: #ecfdf5; color: #065f46;">
                            <h3 class="font-display fs-5 fw-semibold m-0">Reservation Received</h3>
                            <p class="mt-1 small m-0">{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="rounded-sm border border-terracotta-20 bg-white-70 p-4 p-sm-5 shadow-lg">
                        <p class="label-caps text-saffron m-0" style="font-size: 10px; letter-spacing: 0.2em;">Bookings</p>
                        <h2 class="mt-2 font-display text-ember m-0" style="font-size: 26px; line-height: 1.25;">Table Request</h2>
                        <p class="mt-3 leading-relaxed text-ink-65 m-0" style="font-size: 14px;">
                            Please submit your reservation details below. For parties larger than 8 guests or same-evening inquiries, we recommend calling the kitchen directly.
                        </p>

                        <form action="{{ route('reservation.store') }}" method="POST" class="mt-4 d-flex flex-column gap-3">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <label class="d-block text-uppercase tracking-wider-custom text-ink-70 m-0" style="font-size: 10px;">Your Full Name *</label>
                                    <input type="text" name="name" required class="form-control mt-2 border-terracotta-20 bg-paper text-ink" placeholder="Jane Doe">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="d-block text-uppercase tracking-wider-custom text-ink-70 m-0" style="font-size: 10px;">Email Address *</label>
                                    <input type="email" name="email" required class="form-control mt-2 border-terracotta-20 bg-paper text-ink" placeholder="jane@example.com">
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-12 col-sm-4">
                                    <label class="d-block text-uppercase tracking-wider-custom text-ink-70 m-0" style="font-size: 10px;">Phone Number *</label>
                                    <input type="tel" name="phone" required class="form-control mt-2 border-terracotta-20 bg-paper text-ink" placeholder="+1 (907) 000-0000">
                                </div>
                                <div class="col-12 col-sm-4">
                                    <label class="d-block text-uppercase tracking-wider-custom text-ink-70 m-0" style="font-size: 10px;">Date *</label>
                                    <input type="date" name="date" required value="{{ date('Y-m-d') }}" class="form-control mt-2 border-terracotta-20 bg-paper text-ink">
                                </div>
                                <div class="col-12 col-sm-4">
                                    <label class="d-block text-uppercase tracking-wider-custom text-ink-70 m-0" style="font-size: 10px;">Guests *</label>
                                    <select name="guests" required class="form-select mt-2 border-terracotta-20 bg-paper text-ink">
                                        <option value="1">1 Guest</option>
                                        <option value="2" selected>2 Guests</option>
                                        <option value="3">3 Guests</option>
                                        <option value="4">4 Guests</option>
                                        <option value="5">5 Guests</option>
                                        <option value="6">6 Guests</option>
                                        <option value="7">7 Guests</option>
                                        <option value="8">8 Guests</option>
                                        <option value="9">9+ Guests (Large Party)</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="d-block text-uppercase tracking-wider-custom text-ink-70 m-0" style="font-size: 10px;">Preferred Time *</label>
                                <select name="time" required class="form-select mt-2 border-terracotta-20 bg-paper text-ink">
                                    <option value="5:00 PM">5:00 PM</option>
                                    <option value="5:30 PM">5:30 PM</option>
                                    <option value="6:00 PM">6:00 PM</option>
                                    <option value="6:30 PM">6:30 PM</option>
                                    <option value="7:00 PM" selected>7:00 PM</option>
                                    <option value="7:30 PM">7:30 PM</option>
                                    <option value="8:00 PM">8:00 PM</option>
                                    <option value="8:30 PM">8:30 PM</option>
                                </select>
                            </div>

                            <div>
                                <label class="d-block text-uppercase tracking-wider-custom text-ink-70 m-0" style="font-size: 10px;">Special Requests / Dietary Notes</label>
                                <textarea name="special_requests" rows="3" class="form-control mt-2 border-terracotta-20 bg-paper text-ink" placeholder="Let us know if celebrating an anniversary, preferred booth seating, or severe allergies."></textarea>
                            </div>

                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn-primary hero-cta-btn text-center justify-content-center">
                                    Table Reservation
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right: Guidelines & Hours -->
                <div class="col-12 col-lg-5">
                    <div class="d-flex flex-column gap-4">
                        <div class="rounded-sm border border-terracotta-15 bg-white-50 p-4 p-sm-5">
                            <p class="label-caps text-saffron m-0" style="font-size: 10px; letter-spacing: 0.2em;">Kitchen Policy</p>
                            <h3 class="mt-2 font-display text-ember m-0" style="font-size: 26px; line-height: 1.25;">Dining Guidelines</h3>
                            <ul class="list-unstyled mt-4 d-flex flex-column gap-3 leading-relaxed text-ink-75 m-0" style="font-size: 14px;">
                                <li class="d-flex align-items-start gap-2">
                                    <span class="mt-2 flex-shrink-0 rounded-full bg-terracotta" style="width: 6px; height: 6px;"></span>
                                    <span><strong>Seating Grace:</strong> We hold tables for 15 minutes past your reserved time before releasing them to waiting walk-in guests.</span>
                                </li>
                                <li class="d-flex align-items-start gap-2">
                                    <span class="mt-2 flex-shrink-0 rounded-full bg-terracotta" style="width: 6px; height: 6px;"></span>
                                    <span><strong>Dietary Inquiries:</strong> 100% of our curries are made fresh to order. Gluten-free and vegan accommodations are gladly made.</span>
                                </li>
                                <li class="d-flex align-items-start gap-2">
                                    <span class="mt-2 flex-shrink-0 rounded-full bg-terracotta" style="width: 6px; height: 6px;"></span>
                                    <span><strong>Large Parties:</strong> Parties of 8 or more are encouraged to call ahead for family-style banquet arrangements.</span>
                                </li>
                            </ul>
                        </div>

                        <div class="rounded-sm border border-terracotta-15 bg-ink p-4 p-sm-5 text-paper shadow-lg">
                            <p class="label-caps text-saffron m-0" style="font-size: 10px; letter-spacing: 0.2em;">Immediate Inquiries</p>
                            <h3 class="mt-2 font-display text-paper m-0" style="font-size: 26px; line-height: 1.25;">Prefer to Call Ahead?</h3>
                            <p class="mt-3 leading-relaxed text-white-65 m-0" style="font-size: 14px;">
                                Our host is ready to assist you with same-day dining or take-out orders.
                            </p>
                            <a href="tel:+19073283218" class="mt-3 d-block font-display text-saffron text-decoration-none" style="font-size: 2rem;">
                                +1 907-328-3218
                            </a>
                            <p class="mt-2 text-uppercase tracking-wider-custom text-white-40 m-0" style="font-size: 10px;">
                                1528 S Cushman St · Fairbanks, AK
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
