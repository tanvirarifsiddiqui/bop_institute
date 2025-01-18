<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/">BOP Institute</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-light" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/courses">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/lab-testing">Lab Testing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/formulas">Formula Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/software">Software</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/contact">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-link nav-link text-light" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
