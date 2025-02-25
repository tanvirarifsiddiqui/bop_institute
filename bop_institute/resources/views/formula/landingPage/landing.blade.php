@extends('formula.landingPage.main')
@section('title', $formula->title . ' | High-Quality Chemical Formulations')
@section('description', Str::limit($formula->description, 150))

@section('content')
    <!-- Hero Section -->
    <section class="hero bg-gradient py-5" style="background: linear-gradient(to right, #2c3e50, #4ca1af);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h1 class="display-4 fw-bold mb-3">{{ $formula->title }}</h1>
                    <p class="lead mb-4">{{ $formula->description }}</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('uploads/' . $formula->image) }}"
                         class="img-fluid rounded-3 shadow-lg"
                         alt="{{ $formula->title }}"
                         style="aspect-ratio: 8.5 / 11; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>


    <!-- Pricing & CTA -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="h2">Ready to Order?</h3>
                </div>
                <div class="col-md-4 text-end">
                    @if($formula->discount > 0)
                        <div class="badge bg-danger text-white mb-3">Limited Time Discount!</div>
                        <div class="card p-3 shadow-lg rounded-3">
                            <h2 class="text-primary">
                                @php
                                    $discountAmount = $formula->price * ($formula->discount / 100);
                                    $finalPrice = $formula->price - $discountAmount;
                                @endphp
                                ৳{{ number_format($finalPrice, 2) }}
                                <span class="text-muted text-decoration-line-through fs-6">৳{{ number_format($formula->price, 2) }}</span>
                            </h2>
                        </div>
                    @else
                        <div class="card p-3 shadow-lg rounded-3">
                            <h2 class="text-primary">৳{{ number_format($formula->price, 2) }}</h2>
                        </div>
                    @endif
                    <a href="{{ route('formula.profile', $formula->id) }}" class="btn btn-primary btn-lg w-100 mt-4">Order Now</a>
                </div>
            </div>
        </div>
    </section>


    <!-- FAQ -->
    <section class="bg-light py-5" id="faq">
        <div class="container">
            <h2 class="text-center mb-5">Frequently Asked Questions</h2>
            <div class="accordion" id="faqAccordion">
                @foreach($faqs as $faq)
                    <div class="accordion-item shadow-sm mb-3">
                        <h3 class="accordion-header" id="heading{{ $faq->id }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                {{ $faq->message }}
                            </button>
                        </h3>
                        <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                @if($faq->reply)
                                    <p>{{ $faq->reply }}</p>
                                @else
                                    <p><em>No reply yet.</em></p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <!-- Contact Form -->
    <section class="py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4">Contact Our Experts</h2>
                    <form method="POST" action="{{ route('formula.inquiry', $formula->id) }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control rounded-3" placeholder="Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control rounded-3" placeholder="Email" required>
                            </div>
                            <div class="col-12">
                                <label for="industry" class="form-label">Select Industry</label>
                                <select name="industry" class="form-select rounded-3" required>
                                    <option value="">Choose Industry</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control rounded-3" rows="4" placeholder="Your requirements" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary rounded-3 w-100">Send Inquiry</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h3 class="h5">Instant Support</h3>
                            <a href="https://wa.me/1234567890" class="btn btn-success btn-lg my-3 rounded-3">
                                <i class="bi bi-whatsapp"></i> WhatsApp Chat
                            </a>
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
                @foreach($relatedFormulas as $relatedFormula)
                    <div class="col-6 col-md-3">
                        <div class="card h-100 shadow-sm rounded-3" style="transition: transform 0.3s ease-in-out;">
                            <img src="{{ asset('uploads/' . $relatedFormula->image) }}" class="card-img-top rounded-3" alt="{{ $relatedFormula->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $relatedFormula->title }}</h5>
                                <p class="card-text">{{ Str::limit($relatedFormula->description, 80) }}</p>
                                <a href="{{ route('formula.landing', $relatedFormula->id) }}" class="btn btn-primary btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



@endsection
