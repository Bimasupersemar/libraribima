<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .navbar {
        background-color: #002040 !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .navbar-brand {
        color: #ffffff !important;
        font-weight: bold;
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }

    .navbar-brand:hover {
        color: #025a8e !important;
        transform: scale(1.02);
    }

    .nav-link {
        color: #495057 !important;
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        transition: all 0.2s ease-in-out;
    }

    .nav-link:hover, .nav-link:focus {
        color: #0376B8 !important;
        background-color: rgba(3, 118, 184, 0.1);
    }

    .nav-link.active {
        color: #0376B8 !important;
        font-weight: 600;
    }

    .btn-logout {
        background-color: #0376B8;
        color: white !important;
        border: none;
        padding: 0.375rem 0.75rem;
        transition: all 0.2s ease;
    }

    .btn-logout:hover {
        background-color: #025a8e;
        transform: translateY(-1px);
    }

    .navbar-toggler {
        border: 1px solid #0376B8;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%283, 118, 184, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    .badge-notification {
        position: absolute;
        top: -5px;
        right: -5px;
        font-size: 0.6rem;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <!-- Brand Logo -->
        <a class="navbar-brand" href="{{ url('/home') }}">
            <i class="fas fa-book-open me-2"></i>Librari
        </a>
        
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Menu -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Menu untuk SEMUA USER -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('books*') ? 'active' : '' }}" href="{{ url('/books') }}">
                        <i class="fas fa-book me-1"></i>Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kategori*') ? 'active' : '' }}" href="{{ url('/kategori') }}">
                        <i class="fas fa-tags me-1"></i>Kategori
                    </a>
                </li>

                <!-- Menu khusus USER BIASA -->
                @auth
                    @if(auth()->user()->peran === 'user')
                        <li class="nav-item position-relative">
                            <a class="nav-link {{ Request::is('koleksi_pribadi*') ? 'active' : '' }}" href="{{ url('/koleksi_pribadi') }}">
                                <i class="fas fa-star me-1"></i>Koleksi Pribadi
                                <span class="badge bg-danger badge-notification">!</span>
                            </a>
                        </li>
                    @endif
                @endauth

                <!-- Menu khusus ADMIN -->
                @auth
                    @if(auth()->user()->peran === 'admin')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('peminjaman*') ? 'active' : '' }}" href="{{ url('/peminjaman') }}">
                                <i class="fas fa-clipboard-list me-1"></i>Peminjaman
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{{ url('/users') }}">
                                <i class="fas fa-users me-1"></i>User
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>

            <!-- Right Side Menu -->
            <ul class="navbar-nav ms-auto">
                @auth
                   <ul class="navbar-nav ms-auto">
            @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.profil') }}">
                <i class="fas fa-user-circle me-1"></i>
                {{ auth()->user()->name }}
            </a>
        </li>
        <li class="nav-item ms-2">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">
                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                </button>
            </form>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt me-1"></i>Login
            </a>
        </li>
    @endauth
</ul>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-1"></i>Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>