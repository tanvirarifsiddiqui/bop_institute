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
                        <h2 class="card-title text-center text-primary">BOP SCIENCE AND RESEARCH INSTITUTE</h2>
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
                        <hr>

                        <!-- Custom Formula Carousel -->
                        <div class="formula-carousel-container">
                            <button class="carousel-btn prev-btn">&lt;</button>
                            <div class="formula-carousel">
                                @foreach ($topPurchasedFormulas as $formula)
                                    <div class="formula-item">
                                        <x-formula-card :formula="$formula" />
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-btn next-btn">&gt;</button>
                        </div>

                        <!-- More Explore Section -->
                        <div class="text-center mt-4">
                            <a href="{{ route('user.formula.index') }}" class="btn btn-explore">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

