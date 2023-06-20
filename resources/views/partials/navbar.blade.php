<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-2 px-lg-2">
        <a class="navbar-brand" href="/">TopUpin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="d-flex navbar-nav ms-auto mb-2 mb-lg-0 ms-lg-4">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hello, {{ auth()->user()->name }} </a>
                    <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                        <li>
                        
                        <form action="/logout" method="post">
                        @csrf
                          <button type="submit" class="dropdown-item" href="/">Log Out <i class="bi bi-box-arrow-in-right"></i></button>
                        </form>
                        </li>
                        @can('admin')
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="/admin">Dashboard</a></li>
                        @endcan
                    </ul>
                </li>
                @else
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                
                @endauth
            </ul>
            
        </div>
    </div>
</nav>