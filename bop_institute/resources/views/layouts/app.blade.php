<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BOP Institute')</title>

    <!-- Fonts and Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> <!-- Ensuring styles.css is included -->
</head>
<body>
<!-- Top Navigation -->
@include('layouts.navigation')

<div class="d-flex">
    <!-- Sidebar -->
    @include('layouts.left_nav')

    <!-- Main Content -->
    <div class="main-content">
        <main>
            @yield('content')
        </main>
    </div>
</div>

<!-- Footer -->
@include('layouts.footer')

<!-- Scripts -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
