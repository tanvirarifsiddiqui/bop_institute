<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to BOP Institute</title>
    <!-- Include local Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <div class="flex-grow-1">
        @include('layouts.navigation')

        <main>
            @include('layouts.carousel')

            <section class="container my-5">
                <h2 class="text-center">Explore Our Formulas</h2>
                <p class="text-center">Discover a wide range of chemical formulations tailored to your needs.</p>
                <!-- Add sample cards or content -->
            </section>
        </main>
        @include('layouts.left_nav') <!-- Left Navigation Panel -->
        @include('layouts.footer')
    </div>
</div>

<!-- Include local Bootstrap JS -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
