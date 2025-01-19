<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/">BOP Institute</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
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
{{--            <form class="d-flex mx-3" action="/search" method="GET">--}}
{{--                <input class="form-control me-2 rounded-pill bg-darker-blue text-light" type="search" placeholder="Search" aria-label="Search" name="query" style="border-color: blue;">--}}
{{--                <button class="btn btn-outline-light" type="submit">--}}
{{--                    <i class="fas fa-search"></i>--}}
{{--                </button>--}}
{{--            </form>--}}
            <ul class="navbar-nav ms-auto">
                @auth
                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img
                                src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset(Auth::user()->gender == 'male' ? 'images/profile_pic/female.png' : 'images/profile_pic/male.png') }}"
                                alt="Profile Picture"
                                class="rounded-circle"
                                style="width: 35px; height: 35px; object-fit: cover; margin-right: 5px;">
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li>
                                <h6 class="dropdown-header" style="color: #000080;">Hello, {{ Auth::user()->name }}!</h6>
                            </li>
                            <li><a class="dropdown-item" href="/profile" style="color: #000080;">Profile</a></li>
                            <li><a class="dropdown-item" href="/settings" style="color: #000080;">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit" style="color: #000080;">Logout</button>
                                </form>
                            </li>
                        </ul>
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
