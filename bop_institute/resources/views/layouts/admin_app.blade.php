<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'BOP Institute')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #009568, #fa0096); /* Gradient background */
            color: #333;
        }
        .navbar {
            background: linear-gradient(to right, #009568, #fa0096); /* Gradient navbar */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-nav .nav-link:hover {
            color: #ffcc00 !important; /* Highlight color on hover */
        }
        .navbar-nav .nav-link.active {
            border-bottom: 2px solid white; /* Underline effect */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Subtle shadow effect */
            transform: translateY(2px); /* Pressed effect */
            transition: all 0.2s ease-in-out;
        }
        .content {
            margin-top: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<!-- Navbar -->
@include('layouts.admin_navigation')

<!-- Main Content -->
<div class="content">
    @yield('content')
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
