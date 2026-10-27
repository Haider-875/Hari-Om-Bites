@extends('layouts.app')

@section('content')
<div class="min-vh-100 bg-paper">
    <!-- Header Banner -->
    <section class="position-relative overflow-hidden bg-ink py-5" style="padding-top: 8rem !important; padding-bottom: 5rem !important;">
        <div class="position-absolute inset-0" style="opacity: 0.25;">
            <img src="/images/spices.png" class="w-100 h-100 object-cover" alt="Spices">
        </div>
        <div class="position-absolute inset-0 bg-gradient-b-hero"></div>

        <div class="position-relative max-w-92rem px-3 px-sm-4 text-center text-sm-start">
            <p class="label-caps text-saffron m-0">Location & Inquiries</p>
            <h1 class="mt-3 font-display text-paper display-title-hero m-0">
                Visit Us in<span class="d-block fst-italic text-terracotta">Fairbanks</span>
            </h1>
            <p class="mt-4 max-w-2xl text-white-70 leading-relaxed fs-6 m-0">
                Located on South Cushman Street, just minutes from downtown Fairbanks. Stop by for dinner, order take out, or reach out regarding catering.
            </p>
        </div>
    </section>

    <!-- Main Content Grid -->
    <section class="py-5" style="padding-top: 4rem !important; padding-bottom: 5rem !important;">
        <div class="max-w-92rem px-3 px-sm-4">
            <div class="row g-4 g-lg-5">
                <!-- Left: Details & Actions -->
                <div class="col-12 col-lg-5">
                    <div class="d-flex flex-column gap-4">
                        <div class="rounded-sm border border-terracotta-15 bg-white-60 p-4 p-sm-5 shadow-sm">
                            <p class="label-caps text-saffron m-0">Our Location</p>
                            <h2 class="mt-2 font-display fs-2 text-ember m-0">1528 S Cushman St</h2>
                            <p class="mt-1 small text-ink-60 m-0">Fairbanks, AK 99701, United States</p>

                            <dl class="mt-4 d-flex flex-column gap-3 mb-0">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="mt-1 d-flex align-items-center justify-content-center rounded-full text-terracotta flex-shrink-0 w-8 h-8" style="background-color: rgba(124, 45, 18, 0.1);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    </div>
                                    <div>
                                        <dt class="text-uppercase tracking-wider-custom text-ink-50 m-0" style="font-size: 9px;">Address</dt>
                                        <dd class="mt-1 small text-ink-80 m-0">1528 S Cushman St, Fairbanks, AK 99701</dd>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3">
                                    <div class="mt-1 d-flex align-items-center justify-content-center rounded-full text-terracotta flex-shrink-0 w-8 h-8" style="background-color: rgba(124, 45, 18, 0.1);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                    </div>
                                    <div>
                                        <dt class="text-uppercase tracking-wider-custom text-ink-50 m-0" style="font-size: 9px;">Telephone</dt>
                                        <dd class="mt-1 m-0">
                                            <a href="tel:+19073283218" class="small fw-semibold text-terracotta text-decoration-none hover-text-saffron">+1 907-328-3218</a>
                                        </dd>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3">
                                    <div class="mt-1 d-flex align-items-center justify-content-center rounded-full text-terracotta flex-shrink-0 w-8 h-8" style="background-color: rgba(124, 45, 18, 0.1);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    </div>
                                    <div>
                                        <dt class="text-uppercase tracking-wider-custom text-ink-50 m-0" style="font-size: 9px;">Service Options</dt>
                                        <dd class="mt-1 small text-ink-80 m-0">Dine in · Take out · Event Catering</dd>
                                    </div>
                                </div>
                            </dl>

                            <div class="mt-4 pt-2 d-flex flex-column flex-sm-row justify-content-center justify-content-sm-start align-items-center gap-3">
                                <a href="https://www.google.com/maps/search/?api=1&amp;query=1528+S+Cushman+St,+Fairbanks,+AK+99701" target="_blank" rel="noreferrer" class="btn-primary w-100 w-sm-auto text-center justify-content-center" style="min-height: 44px;">
                                    Open Google Maps
                                </a>
                                <a href="tel:+19073283218" class="btn-primary w-100 w-sm-auto text-center justify-content-center" style="min-height: 44px;">
                                    Call Kitchen
                                </a>
                            </div>
                        </div>

                        <!-- Map Card Preview -->
                        <div class="overflow-hidden rounded-sm border border-terracotta-15 bg-ink p-1">
                            <div class="position-relative aspect-video w-100 overflow-hidden">
                                <img src="/images/cultureExterior.jpg" class="w-100 h-100 object-cover" alt="Hari Om Fairbanks Exterior">
                                <div class="position-absolute inset-0 bg-gradient-t-ink"></div>
                                <div class="position-absolute bottom-0 start-0 end-0 p-3">
                                    <p class="text-uppercase tracking-widest-custom text-saffron m-0" style="font-size: 9px;">On South Cushman Street</p>
                                    <p class="font-display fs-5 text-paper m-0">Look for the Om & Red Stairs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Contact / Message Form -->
                <div class="col-12 col-lg-7">
                    @if(session('success'))
                        <div class="alert alert-success rounded-sm p-4 mb-4 border-0 shadow-sm" style="background-color: #ecfdf5; color: #065f46;">
                            <h3 class="font-display fs-5 fw-semibold m-0">Message Dispatched</h3>
                            <p class="mt-1 small m-0">{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="rounded-sm border border-terracotta-20 bg-white-70 p-4 p-sm-5 shadow-lg">
                        <p class="label-caps text-saffron m-0">Inquiries & Catering</p>
                        <h2 class="mt-2 font-display text-ember display-title-section m-0">Send Us a Message</h2>
                        <p class="mt-3 small leading-relaxed text-ink-65 m-0">
                            Have questions about our ingredients, hosting private banquets, or scheduling event catering? Drop us a note below.
                        </p>

                        <form action="{{ route('contact.store') }}" method="POST" class="mt-4 d-flex flex-column gap-3">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <label class="d-block text-uppercase tracking-wider-custom text-ink-70 m-0" style="font-size: 10px;">Your Name *</label>
                                    <input type="text" name="name" required class="form-control mt-2 border-terracotta-20 bg-paper text-ink" placeholder="Your Name">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="d-block text-uppercase tracking-wider-custom text-ink-70 m-0" style="font-size: 10px;">Email Address *</label>
                                    <input type="email" name="email" required class="form-control mt-2 border-terracotta-20 bg-paper text-ink" placeholder="you@example.com">
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <label class="d-block text-uppercase tracking-wider-custom text-ink-70 m-0" style="font-size: 10px;">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control mt-2 border-terracotta-20 bg-paper text-ink" placeholder="+1 (907) ...">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="d-block text-uppercase tracking-wider-custom text-ink-70 m-0" style="font-size: 10px;">Inquiry Subject</label>
                                    <input type="text" name="subject" class="form-control mt-2 border-terracotta-20 bg-paper text-ink" placeholder="General, Catering, Banquets">
                                </div>
                            </div>

                            <div>
                                <label class="d-block text-uppercase tracking-wider-custom text-ink-70 m-0" style="font-size: 10px;">Your Message *</label>
                                <textarea name="message" rows="5" required class="form-control mt-2 border-terracotta-20 bg-paper text-ink" placeholder="Tell us how we can help you..."></textarea>
                            </div>

                            <button type="submit" class="btn-primary w-100 text-center justify-content-center mt-3" style="min-height: 44px;">
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
