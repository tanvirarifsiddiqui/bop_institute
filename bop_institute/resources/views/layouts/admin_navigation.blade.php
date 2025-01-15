<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.home') }}">BOP Institute</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('admin.home') ? 'active' : '' }}" href="{{ route('admin.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('admin.formulas.index') ? 'active' : '' }}" href="{{ route('admin.formulas.index') }}">Formula E-Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('admin.categories.index') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">Categories</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('admin.logout')"
                                               onclick="event.preventDefault();
                                        this.closest('form').submit();" style="color: white;">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
