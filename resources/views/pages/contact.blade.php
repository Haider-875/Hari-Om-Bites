@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-paper">
    <!-- Header Banner -->
    <section class="relative isolate overflow-hidden bg-ink pb-16 pt-32 sm:pb-24 sm:pt-40">
        <div class="absolute inset-0 opacity-25">
            <img src="/images/spices.png" class="h-full w-full object-cover" alt="Spices">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-ink/90 via-ink/75 to-ink"></div>

        <div class="relative mx-auto max-w-[92rem] px-5 sm:px-8 text-center sm:text-left">
            <p class="label-caps text-saffron">Location & Inquiries</p>
            <h1 class="mt-4 font-display text-5xl leading-[0.95] text-paper sm:text-7xl lg:text-8xl">
                Visit Us in<span class="block italic text-terracotta">Fairbanks</span>
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-relaxed text-white/70">
                Located on South Cushman Street, just minutes from downtown Fairbanks. Stop by for dinner, order take out, or reach out regarding catering.
            </p>
        </div>
    </section>

    <!-- Main Content Grid -->
    <section class="py-16 sm:py-24">
        <div class="mx-auto max-w-[92rem] px-5 sm:px-8">
            <div class="grid gap-12 lg:grid-cols-12 lg:gap-16">
                <!-- Left: Details & Actions -->
                <div class="lg:col-span-5 space-y-8">
                    <div class="rounded-sm border border-terracotta/15 bg-white/60 p-8 shadow-sm">
                        <p class="label-caps text-saffron">Our Location</p>
                        <h2 class="mt-2 font-display text-3xl text-ember">1528 S Cushman St</h2>
                        <p class="mt-2 text-xs text-ink/60">Fairbanks, AK 99701, United States</p>

                        <dl class="mt-8 space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-terracotta/10 text-terracotta">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                </div>
                                <div>
                                    <dt class="text-[9px] uppercase tracking-[0.2em] text-ink/50">Address</dt>
                                    <dd class="mt-1 text-sm text-ink/80">1528 S Cushman St, Fairbanks, AK 99701</dd>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-terracotta/10 text-terracotta">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                </div>
                                <div>
                                    <dt class="text-[9px] uppercase tracking-[0.2em] text-ink/50">Telephone</dt>
                                    <dd class="mt-1">
                                        <a href="tel:+19073283218" class="text-sm font-semibold text-terracotta hover:underline">+1 907-328-3218</a>
                                    </dd>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-terracotta/10 text-terracotta">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                </div>
                                <div>
                                    <dt class="text-[9px] uppercase tracking-[0.2em] text-ink/50">Service Options</dt>
                                    <dd class="mt-1 text-sm text-ink/80">Dine in · Take out · Event Catering</dd>
                                </div>
                            </div>
                        </dl>

                        <div class="mt-8 flex flex-wrap gap-3">
                            <a href="https://www.google.com/maps/search/?api=1&amp;query=1528+S+Cushman+St,+Fairbanks,+AK+99701" target="_blank" rel="noreferrer" class="btn-primary">
                                Open Google Maps
                            </a>
                            <a href="tel:+19073283218" class="btn-secondary">
                                Call Kitchen
                            </a>
                        </div>
                    </div>

                    <!-- Map Card Preview -->
                    <div class="overflow-hidden rounded-sm border border-terracotta/15 bg-ink p-1">
                        <div class="relative aspect-video w-full overflow-hidden">
                            <img src="/images/cultureExterior.jpg" class="h-full w-full object-cover" alt="Hari Om Fairbanks Exterior">
                            <div class="absolute inset-0 bg-gradient-to-t from-ink/90 via-ink/40 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <p class="text-[9px] uppercase tracking-[0.25em] text-saffron">On South Cushman Street</p>
                                <p class="font-display text-xl text-paper">Look for the Om & Red Stairs</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Contact / Message Form -->
                <div class="lg:col-span-7">
                    @if(session('success'))
                        <div class="mb-8 rounded-sm border border-emerald-600/30 bg-emerald-50 p-6 text-emerald-900 shadow-sm">
                            <h3 class="font-display text-xl font-semibold">Message Dispatched</h3>
                            <p class="mt-1 text-sm">{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="rounded-sm border border-terracotta/20 bg-white/70 p-8 shadow-xl sm:p-10">
                        <p class="label-caps text-saffron">Inquiries & Catering</p>
                        <h2 class="mt-2 font-display text-3xl text-ember sm:text-4xl">Send Us a Message</h2>
                        <p class="mt-3 text-xs leading-relaxed text-ink/65 sm:text-sm">
                            Have questions about our ingredients, hosting private banquets, or scheduling event catering? Drop us a note below.
                        </p>

                        <form action="{{ route('contact.store') }}" method="POST" class="mt-8 space-y-6">
                            @csrf
                            <div class="grid gap-6 sm:grid-cols-2">
                                <div>
                                    <label class="block text-[10px] uppercase tracking-[0.18em] text-ink/70">Your Name *</label>
                                    <input type="text" name="name" required class="mt-2 w-full rounded border border-terracotta/20 bg-paper px-4 py-3 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta" placeholder="Your Name">
                                </div>
                                <div>
                                    <label class="block text-[10px] uppercase tracking-[0.18em] text-ink/70">Email Address *</label>
                                    <input type="email" name="email" required class="mt-2 w-full rounded border border-terracotta/20 bg-paper px-4 py-3 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta" placeholder="you@example.com">
                                </div>
                            </div>

                            <div class="grid gap-6 sm:grid-cols-2">
                                <div>
                                    <label class="block text-[10px] uppercase tracking-[0.18em] text-ink/70">Phone Number</label>
                                    <input type="tel" name="phone" class="mt-2 w-full rounded border border-terracotta/20 bg-paper px-4 py-3 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta" placeholder="+1 (907) ...">
                                </div>
                                <div>
                                    <label class="block text-[10px] uppercase tracking-[0.18em] text-ink/70">Inquiry Subject</label>
                                    <input type="text" name="subject" class="mt-2 w-full rounded border border-terracotta/20 bg-paper px-4 py-3 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta" placeholder="General, Catering, Banquets">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] uppercase tracking-[0.18em] text-ink/70">Your Message *</label>
                                <textarea name="message" rows="5" required class="mt-2 w-full rounded border border-terracotta/20 bg-paper px-4 py-3 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta" placeholder="Tell us how we can help you..."></textarea>
                            </div>

                            <button type="submit" class="btn-primary w-full text-center">
                                Submit Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
