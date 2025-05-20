<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Digital | @yield('title')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Google Fonts (Roboto) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #b4ad94;
            color: #333; /* Warna teks lebih gelap untuk kontras */
            font-family: 'Roboto', sans-serif;
        }
        .navbar {
            background-color: #000;
        }
        .navbar-brand {
            font-weight: bold;
            color: #0376B8 !important;
        }
        .navbar-nav .nav-link {
            color: #fff !important;
        }
        .navbar-nav .nav-link:hover {
            color: #0376B8 !important;
        }
        a {
            color: #0376B8; /* Warna link konsisten */
        }
        a:hover {
            color: #025a8e;
        }
        .container {
            padding-top: 20px;
        }
    </style>
</head>
<body>
    @if (!Request::is('login') && !Request::is('register'))
        @include('navbar') <!-- Pastikan file navbar.blade.php ada -->
    @endif

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap 5 JS (Bundle with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>