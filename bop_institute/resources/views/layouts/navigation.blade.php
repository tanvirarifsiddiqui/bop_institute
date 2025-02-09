<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container-fluid">
        <!-- Sidebar Drawer Button -->
        <button
            id="toggleSidebar"
            class="navbar-toggler me-2 d-md-none"
            type="button"
            aria-label="Toggle sidebar"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand Name with Logo -->
        <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" style="height: 30px; width: auto; margin-right: 8px;">
            BOP Institute
        </a>


        <!-- Right Navbar Toggle Button -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/coming-soon">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/coming-soon">Lab Testing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/formulas">Formula Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/coming-soon">Software</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/coming-soon">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/contact">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle d-flex align-items-center"
                            href="#"
                            id="profileDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <img
                                src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset(Auth::user()->gender == 'male' ? 'images/profile_pic/male.png' : 'images/profile_pic/female.png') }}"
                                alt="Profile Picture"
                                class="rounded-circle"
                                style="width: 35px; height: 35px; object-fit: cover; margin-right: 5px;"
                            />
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li>
                                <h6 class="dropdown-header">Hello, {{ Auth::user()->name }}!</h6>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/profile">Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/settings">Settings</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
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
