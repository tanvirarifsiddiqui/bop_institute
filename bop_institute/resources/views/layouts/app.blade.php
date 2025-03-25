<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BOP Institute')</title>

    <!-- Fonts and Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> <!-- Custom styles -->
</head>
<style>
    .navbar-brand, .nav-link {
        color: white !important;
    }
    .navbar-nav .nav-link:hover {
        color: #ffcc00 !important; /* Highlight color on hover */
    }
    .content {
        margin-top: 20px;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>
<body>
<!-- Top Navigation -->
@include('layouts.navigation')

<div class="d-flex">
    <!-- Sidebar -->
{{--    @include('layouts.left_nav')--}}

    <!-- Main Content -->
    <div class="main-content flex-grow-1 p-4">
        <main>
            @yield('content')
        </main>
    </div>
</div>

<!-- Footer -->
@include('layouts.footer')

<!-- Scripts -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script> <!-- Ensure any custom JS is included -->
</body>
</html>
