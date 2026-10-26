@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-paper">
    <!-- Header Banner -->
    <section class="relative isolate overflow-hidden bg-ink pb-16 pt-32 sm:pb-24 sm:pt-40">
        <div class="absolute inset-0 opacity-25">
            <img src="/images/interior.png" class="h-full w-full object-cover" alt="Dining Room">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-ink/90 via-ink/75 to-ink"></div>

        <div class="relative mx-auto max-w-[92rem] px-5 sm:px-8 text-center sm:text-left">
            <p class="label-caps text-saffron">Dine In Experience</p>
            <h1 class="mt-4 font-display text-5xl leading-[0.95] text-paper sm:text-7xl lg:text-8xl">
                Reserve Your<span class="block italic text-terracotta">Table</span>
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-relaxed text-white/70">
                Join us for an unforgettable evening of Punjabi hospitality, warm tandoor breads, and comforting curries on South Cushman Street.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 sm:py-24">
        <div class="mx-auto max-w-[92rem] px-5 sm:px-8">
            <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
                <!-- Left: Booking Form -->
                <div class="lg:col-span-7">
                    @if(session('success'))
                        <div class="mb-8 rounded-sm border border-emerald-600/30 bg-emerald-50 p-6 text-emerald-900 shadow-sm">
                            <h3 class="font-display text-xl font-semibold">Reservation Received</h3>
                            <p class="mt-1 text-sm">{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="rounded-sm border border-terracotta/20 bg-white/70 p-8 shadow-xl sm:p-10">
                        <p class="label-caps text-saffron">Bookings</p>
                        <h2 class="mt-2 font-display text-3xl text-ember sm:text-4xl">Table Request</h2>
                        <p class="mt-3 text-xs leading-relaxed text-ink/65 sm:text-sm">
                            Please submit your reservation details below. For parties larger than 8 guests or same-evening inquiries, we recommend calling the kitchen directly.
                        </p>

                        <form action="{{ route('reservation.store') }}" method="POST" class="mt-8 space-y-6">
                            @csrf
                            <div class="grid gap-6 sm:grid-cols-2">
                                <div>
                                    <label class="block text-[10px] uppercase tracking-[0.18em] text-ink/70">Your Full Name *</label>
                                    <input type="text" name="name" required class="mt-2 w-full rounded border border-terracotta/20 bg-paper px-4 py-3 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta" placeholder="Jane Doe">
                                </div>
                                <div>
                                    <label class="block text-[10px] uppercase tracking-[0.18em] text-ink/70">Email Address *</label>
                                    <input type="email" name="email" required class="mt-2 w-full rounded border border-terracotta/20 bg-paper px-4 py-3 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta" placeholder="jane@example.com">
                                </div>
                            </div>

                            <div class="grid gap-6 sm:grid-cols-3">
                                <div>
                                    <label class="block text-[10px] uppercase tracking-[0.18em] text-ink/70">Phone Number *</label>
                                    <input type="tel" name="phone" required class="mt-2 w-full rounded border border-terracotta/20 bg-paper px-4 py-3 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta" placeholder="+1 (907) 000-0000">
                                </div>
                                <div>
                                    <label class="block text-[10px] uppercase tracking-[0.18em] text-ink/70">Date *</label>
                                    <input type="date" name="date" required value="{{ date('Y-m-d') }}" class="mt-2 w-full rounded border border-terracotta/20 bg-paper px-4 py-3 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                                </div>
                                <div>
                                    <label class="block text-[10px] uppercase tracking-[0.18em] text-ink/70">Guests *</label>
                                    <select name="guests" required class="mt-2 w-full rounded border border-terracotta/20 bg-paper px-4 py-3 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
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
                                <label class="block text-[10px] uppercase tracking-[0.18em] text-ink/70">Preferred Time *</label>
                                <select name="time" required class="mt-2 w-full rounded border border-terracotta/20 bg-paper px-4 py-3 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
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
                                <label class="block text-[10px] uppercase tracking-[0.18em] text-ink/70">Special Requests / Dietary Notes</label>
                                <textarea name="special_requests" rows="3" class="mt-2 w-full rounded border border-terracotta/20 bg-paper px-4 py-3 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta" placeholder="Let us know if celebrating an anniversary, preferred booth seating, or severe allergies."></textarea>
                            </div>

                            <button type="submit" class="btn-primary w-full text-center">
                                Request Table Reservation
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Right: Guidelines & Hours -->
                <div class="lg:col-span-5 space-y-8">
                    <div class="rounded-sm border border-terracotta/15 bg-white/50 p-8">
                        <p class="label-caps text-saffron">Kitchen Policy</p>
                        <h3 class="mt-2 font-display text-2xl text-ember">Dining Guidelines</h3>
                        <ul class="mt-6 space-y-4 text-xs leading-relaxed text-ink/75 sm:text-sm">
                            <li class="flex items-start gap-3">
                                <span class="mt-1 h-2 w-2 shrink-0 rounded-full bg-terracotta"></span>
                                <span><strong>Seating Grace:</strong> We hold tables for 15 minutes past your reserved time before releasing them to waiting walk-in guests.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1 h-2 w-2 shrink-0 rounded-full bg-terracotta"></span>
                                <span><strong>Dietary Inquiries:</strong> 100% of our curries are made fresh to order. Gluten-free and vegan accommodations are gladly made.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1 h-2 w-2 shrink-0 rounded-full bg-terracotta"></span>
                                <span><strong>Large Parties:</strong> Parties of 8 or more are encouraged to call ahead for family-style banquet arrangements.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="rounded-sm border border-terracotta/15 bg-ink p-8 text-paper shadow-xl">
                        <p class="label-caps text-saffron">Immediate Inquiries</p>
                        <h3 class="mt-2 font-display text-2xl text-paper">Prefer to Call Ahead?</h3>
                        <p class="mt-3 text-xs leading-relaxed text-white/65 sm:text-sm">
                            Our host is ready to assist you with same-day dining or take-out orders.
                        </p>
                        <a href="tel:+19073283218" class="mt-6 block font-display text-3xl text-saffron hover:underline">
                            +1 907-328-3218
                        </a>
                        <p class="mt-2 text-[10px] uppercase tracking-[0.2em] text-white/40">
                            1528 S Cushman St · Fairbanks, AK
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
