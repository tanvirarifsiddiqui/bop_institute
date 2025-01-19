@extends('layouts.app')

@section('title', 'Welcome to BOP Institute')

@section('content')
    <div class="container-fluid my-md-3">
        <!-- Carousel Section -->
        @include('layouts.carousel')

        <!-- Company Information Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg border-0" style="background-color: #f8f9fa;">
                    <div class="card-body">
                        <h2 class="card-title text-center text-primary">ABOUT BOP SCIENCE AND RESEARCH INSTITUTE</h2>
                        <hr>
                        <p class="card-text text-justify">
                            <strong>BOP Science and Research Institute</strong> is the first testing and training center in Bangladesh, founded in 2021, focusing on product research. They provide formulations and training to entrepreneurs, aiming to create skilled chemists and quality products. Training is not limited to the unemployed but also includes businessmen, college/university students, and citizens, thereby boosting the economy.
                        </p>
                        <p class="card-text text-justify">
                            The institute offers affordable solutions for companies by providing desired products, formulations, and training, making it easier to develop quality products and expand their businesses globally. Their goal is to enhance the skills of Bangladeshi citizens through various types of training, transforming them into globally recognized individuals.
                        </p>
                        <p class="card-text text-justify">
                            The institute conducts various testing procedures, offers different formulations, and provides formula-based factory projects to entrepreneurs.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Best Purchased Formulas Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg border-0 p-4" style="background-color: #f8f9fa;">
                    <div class="card-body">
                        <h2 class="text-center text-primary">EXPLORE OUR FORMULA BOOKS</h2>
                        <p class="text-center">Discover a wide range of chemical formulations tailored to your needs.</p>
                        <hr>
                        <div class="row">
                            @foreach($topPurchasedFormulas as $formula)
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <div class="card formula-card shadow-sm border-0">
                                        <img src="{{ asset('storage/' . $formula->image) }}" class="card-img-top" alt="{{ $formula->title }}">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $formula->title }}</h5>
                                            <p class="card-text">{{ Str::limit($formula->description, 50) }}</p>

                                            <!-- Pricing Logic -->
                                            @php
                                                $discountAmount = $formula->price * ($formula->discount / 100);
                                                $finalPrice = $formula->price - $discountAmount;
                                            @endphp
                                            <p class="card-text">
                                                <strong class="text-muted" style="text-decoration: line-through;">${{ number_format($formula->price, 2) }}</strong>
                                                <strong class="text-success"> ${{ number_format($finalPrice, 2) }}</strong>
                                            </p>

                                            <!-- Purchase Button -->
                                            <a href="#" class="btn btn-purchase">Purchase</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- More Explore Section -->
                        <div class="text-center mt-4">
                            <a href="{{ route('admin.formulas.index') }}" class="btn btn-explore">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

<style>
    /* Styles for Formula Cards */
    .formula-card {
        background-color: #ffffff; /* White background for cards */
        border: none;
        border-radius: 0.5rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    }

    .formula-card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    }

    .formula-card .card-img-top {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
        max-height: 150px;
        object-fit: cover;
    }

    .formula-card .card-title {
        font-weight: bold;
        color: #343a40; /* Dark gray for titles */
    }

    .formula-card .card-text {
        color: #6c757d; /* Medium gray for text */
        font-size: 0.9rem;
    }

    /* Purchase Button */
    .btn-purchase {
        background-color: #007bff; /* Vibrant blue */
        color: #ffffff; /* White text for contrast */
        border: none;
        border-radius: 20px;
        padding: 10px 25px; /* Increased padding for better button size */
        font-weight: bold;
        text-transform: uppercase;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0px 4px 8px rgba(0, 123, 255, 0.2); /* Shadow for depth */
    }

    .btn-purchase:hover {
        background-color: #0056b3; /* Darker blue for hover effect */
        transform: scale(1.05);
        box-shadow: 0px 5px 15px rgba(0, 86, 179, 0.4); /* Enhanced shadow on hover */
    }

    /* Explore More Button */
    .btn-explore {
        background-color: #28a745; /* Green for call-to-action */
        color: #ffffff; /* White text for contrast */
        border: none;
        border-radius: 20px;
        padding: 10px 25px; /* Consistent padding with purchase button */
        font-weight: bold;
        text-transform: uppercase;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0px 4px 8px rgba(40, 167, 69, 0.2); /* Shadow for depth */
    }

    .btn-explore:hover {
        background-color: #218838; /* Darker green for hover effect */
        transform: scale(1.05);
        box-shadow: 0px 5px 15px rgba(33, 136, 56, 0.4); /* Enhanced shadow on hover */
    }

    /* General Card Shadow */
    .card.shadow-lg {
        border-radius: 1rem;
    }

    .card.shadow-lg .card-body h2 {
        font-weight: bold;
    }
</style>

