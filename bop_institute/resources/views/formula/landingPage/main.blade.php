<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head Content -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Custom Styles -->
    <style>
        /* Define color variables for consistency */
        :root {
            --primary-color: #e86166; /* Professional Red */
            --secondary-color: #550a0a; /* Light Reddish Background */
            --text-color: #333333; /* Dark Text */
            --white-color: #FFFFFF;
            --dark-red: #9E1B21; /* Darker Red for Hover States */
            --light-bg: #f7f8fa; /* Light background for sections */
            --card-shadow: rgba(0, 0, 0, 0.1); /* Light shadow for cards */
            --hover-shadow: rgba(0, 0, 0, 0.15); /* Shadow on hover */
        }

        body {
            background-color: var(--secondary-color);
            color: var(--text-color);
            font-family: 'Arial', sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            color: var(--primary-color);
            font-weight: bold;
        }

        a {
            color: var(--primary-color);
            text-decoration: none;
        }

        a:hover {
            color: var(--dark-red);
            text-decoration: underline;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--dark-red);
            border-color: var(--dark-red);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: var(--white-color);
            border-color: var(--primary-color);
        }

        /* Adjusting Cards */
        .card {
            background-color: var(--white-color);
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 6px var(--card-shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px var(--hover-shadow);
        }

        .card h3, .card p {
            color: var(--text-color);
        }

        /* Section Backgrounds */
        .bg-light {
            background-color: var(--light-bg) !important;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(to right, #ff8a00, #e52e71);
            color: var(--white-color);
            padding: 80px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .hero .btn-primary {
            padding: 0.75rem 1.5rem;
            font-size: 1.2rem;
            border-radius: 30px;
        }

        /* Footer */
        footer {
            background-color: var(--primary-color);
            color: var(--white-color);
            text-align: center;
            padding: 30px 0;
        }

        /* Card and Section Enhancements */
        .section-padding {
            padding: 60px 0;
        }

        .section-title {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 40px;
        }

    </style>
</head>
<body>

{{-- @include('partials.navbar') --}}

<main>
    @yield('content')
</main>

<!-- Footer -->
<footer>
    <p>&copy; 2025 BOP Institute. All Rights Reserved.</p>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')

</body>
</html>
