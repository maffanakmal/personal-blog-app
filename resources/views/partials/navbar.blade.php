<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">Apang Blog's</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/blog" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Blog
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item {{ $active === 'blog' ? 'active' : '' }} "
                                href="/blog">Posts</a></li>
                        <li><a class="dropdown-item {{ $active === 'categories' ? 'active' : '' }} "
                                href="/categories">Categories</a></li>
                        <li><a class="dropdown-item {{ $active === 'authors' ? 'active' : '' }} "
                                href="/authors">Authors</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
                            <li><a class="dropdown-divider"></a></li>
                            <li>
                              <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                              </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'login' ? 'active' : '' }}" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'register' ? 'active' : '' }}" href="/register">Sign in</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
