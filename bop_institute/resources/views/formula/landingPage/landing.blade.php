{{-- resources/views/landing.blade.php --}}
@extends('formula.landingPage.main')
@section('title', $formula->title . ' | High-Quality Chemical Formulations')
@section('description', Str::limit($formula->description, 150))

@section('content')
    <!-- Hero Section -->
    <section class="hero bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-5 fw-bold mb-3">{{ $formula->title }}</h1>
                    <p class="lead mb-4">{{ $formula->description }}</p>
                    <div class="d-flex gap-3">
                        <a href="#contact" class="btn btn-primary btn-lg">
                            <i class="bi bi-cart-check"></i> Buy Now
                        </a>
                        <a href="#contact" class="btn btn-outline-primary btn-lg">
                            Request Sample
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('uploads/' . $formula->image) }}"
                         class="img-fluid rounded-3 shadow"
                         alt="{{ $formula->title }}"
                         style="aspect-ratio: 8.5 / 11; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>

    <!-- Features & Benefits -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Key Features & Benefits</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-award fs-1 text-primary"></i>
                            <h3 class="h5 mt-3">Certified Quality</h3>
                            <p class="text-muted small">ISO 9001 Certified, GMP Compliant</p>
                        </div>
                    </div>
                </div>
                <!-- Add more feature cards -->
            </div>
        </div>
    </section>

    <!-- Pricing & CTA -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="h2">Ready to Order?</h3>
                    <p class="lead">Get competitive pricing for bulk orders</p>
                </div>
                <div class="col-md-4 text-end">
                    @if($formula->discount > 0)
                        <div class="text-danger small">Limited Time Discount!</div>
                        <h2 class="text-primary">
                            @php
                                $discountAmount = $formula->price * ($formula->discount / 100);
                                $finalPrice = $formula->price - $discountAmount;
                            @endphp
                            ৳{{ number_format($finalPrice, 2) }}
                            <span class="text-muted text-decoration-line-through fs-6">৳{{ number_format($formula->price, 2) }}</span>
                        </h2>
                    @else
                        <h2 class="text-primary">৳{{ number_format($formula->price, 2) }}</h2>
                    @endif
                    <a href="#contact" class="btn btn-primary btn-lg w-100">
                        Get Custom Quote
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Customer Experiences</h2>
            <div class="row g-4">
                <!-- Testimonial cards -->
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="bg-light py-5" id="faq">
        <div class="container">
            <h2 class="text-center mb-5">Frequently Asked Questions</h2>
            <div class="accordion">
                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button">Minimum Order Quantity</button>
                    </h3>
                    <div class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            Minimum order starts at 100 units. Contact us for bulk discounts.
                        </div>
                    </div>
                </div>
                <!-- Add more FAQ items -->
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4">Contact Our Experts</h2>
{{--                    <form method="POST" action="{{ route('contact.submit') }}">--}}
                    <form method="POST" action="#">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-12">
                                <select name="industry" class="form-select" required>
                                    <option value="">Select Industry</option>
                                    <option>Pharmaceutical</option>
                                    <option>Cosmetics</option>
                                </select>
                            </div>
                            <div class="col-12">
                            <textarea name="message" class="form-control" rows="4"
                                      placeholder="Your requirements" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    Send Inquiry
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h3 class="h5">Instant Support</h3>
                            <a href="https://wa.me/1234567890"
                               class="btn btn-success btn-lg my-3">
                                <i class="bi bi-whatsapp"></i> WhatsApp Chat
                            </a>
                            <div class="mt-4">
                                <h4 class="h6">Certifications</h4>
                                <img src="{{ asset('images/iso-badge.png') }}"
                                     alt="Certifications"
                                     class="img-fluid"
                                     style="max-width: 120px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Related Formulations</h2>
            <div class="row g-4">
                @foreach($relatedFormulas as $formula)
                    <!-- Product cards -->
                @endforeach
            </div>
        </div>
    </section>
@endsection
