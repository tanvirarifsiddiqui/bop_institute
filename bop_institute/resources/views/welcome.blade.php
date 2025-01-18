@extends('layouts.app')

@section('title', 'Welcome to BOP Institute')

@section('content')
    <div class="container-fluid my-md-3">
        <!-- Carousel Section -->
        @include('layouts.carousel')

        <!-- Content Section -->
        <div class="row mt-4">
            <div class="col-12">
                <h2 class="text-center">Explore Our Formulas</h2>
                <p class="text-center">Discover a wide range of chemical formulations tailored to your needs.</p>
                <div class="row">
                    <!-- Example Cards -->
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Formula 1">
                            <div class="card-body">
                                <h5 class="card-title">Formula 1</h5>
                                <p class="card-text">Description of Formula 1.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Formula 2">
                            <div class="card-body">
                                <h5 class="card-title">Formula 2</h5>
                                <p class="card-text">Description of Formula 2.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Formula 3">
                            <div class="card-body">
                                <h5 class="card-title">Formula 3</h5>
                                <p class="card-text">Description of Formula 3.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Formula 4">
                            <div class="card-body">
                                <h5 class="card-title">Formula 4</h5>
                                <p class="card-text">Description of Formula 4.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Formula 4">
                            <div class="card-body">
                                <h5 class="card-title">Formula 4</h5>
                                <p class="card-text">Description of Formula 4.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Formula 4">
                            <div class="card-body">
                                <h5 class="card-title">Formula 4</h5>
                                <p class="card-text">Description of Formula 4.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Formula 4">
                            <div class="card-body">
                                <h5 class="card-title">Formula 4</h5>
                                <p class="card-text">Description of Formula 4.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
