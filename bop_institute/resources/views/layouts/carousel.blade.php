<div id="carouselExampleIndicators" class="carousel slide custom-carousel shadow-lg" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/carousel_slider/slide1.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                <h5 class="text-white">Welcome to BOP Institute</h5>
                <p class="text-light">Manage formulas and categories with ease.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/carousel_slider/slide2.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                <h5 class="text-white">Explore Our Categories</h5>
                <p class="text-light">Discover a wide range of chemical formulations.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/carousel_slider/slide3.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                <h5 class="text-white">Easy Management</h5>
                <p class="text-light">Create and edit categories and formulas seamlessly.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
