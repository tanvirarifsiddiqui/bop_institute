<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts and Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> <!-- Custom styles -->
</head>
<body class="bg-light">
<div class="container">
    <!-- Center the card both vertically and horizontally -->
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <!-- Logo at the top of the card -->
                    <div class="text-center">
                        <a href="/">
                            <x-application-logo class="img-fluid" />
                        </a>
                        <hr>
                    </div>
                    <!-- Page content goes here -->
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
