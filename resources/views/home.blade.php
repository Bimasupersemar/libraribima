@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-color: #2b95d3;
            --primary-dark: #1e31ff;
            --primary-light: #d6d6d6;
            --secondary-color: #1a1a1a;
            --accent-color: #ffd700;
            --light-bg: #f8f9fa;
            --card-shadow: 0 10px 20px rgba(17, 5, 77, 0.1);
            --card-hover-shadow: 0 15px 30px rgba(69, 69, 69, 0.2);
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: #333;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
            color: white;
            padding: 6rem 0 4rem;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            opacity: 0.2;
            z-index: 0;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
        }
        
        .hero-title {
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 1.5rem;
        }
        
        .hero-subtitle {
            font-weight: 300;
            max-width: 700px;
            margin: 0 auto 2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
        
        .feature-card {
            background: white;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-shadow: var(--card-shadow);
            height: 100%;
            position: relative;
            z-index: 1;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            transition: height 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--card-hover-shadow);
        }
        
        .feature-card:hover::before {
            height: 10px;
        }
        
        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .card-icon {
            transform: scale(1.1);
            color: var(--primary-light);
        }
        
        .card-title {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }
        
        .card-text {
            color: #666;
            margin-bottom: 1.5rem;
        }
        
        .btn-custom {
            border: none;
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
        }
        
        .btn-warning-custom {
            background: linear-gradient(135deg, var(--accent-color), #ffae42);
            color: #333;
        }
        
        .btn-success-custom {
            background: linear-gradient(135deg, #28a745, #218838);
            color: white;
        }
        
        .btn-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
            border-radius: 50px;
        }
        
        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 14px rgba(0,0,0,0.1);
        }
        
        .btn-custom:hover::before {
            opacity: 1;
        }
        
        .dashboard-section {
            padding: 3rem 0;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 2.5rem;
            font-weight: 600;
            color: var(--secondary-color);
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }
        
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-primary-color);
        }
        
        .stats-icon {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }
        
        .stats-title {
            font-size: 0.9rem;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .recent-table {
            background: white;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }
        
        .table thead {
            background: linear-gradient(90deg, var(--primary-color), var(--primary-dark));
            color: white;
        }
        
        .table th {
            border: none;
            font-weight: 500;
        }
        
        .table td {
            vertical-align: middle;
        }
        
        .badge-custom {
            padding: 5px 10px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.75rem;
        }
        
        .badge-primary-custom {
            background-color: rgba(139, 0, 0, 0.1);
            color: var(--primary-color);
        }
        
        .badge-success-custom {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }
        
        .badge-warning-custom {
            background-color: rgba(255, 193, 7, 0.1);
            color: #042f55;
        }
        
        .floating-books {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: 0;
        }
        
        .floating-book {
            position: absolute;
            opacity: 0.1;
            animation: float 15s infinite linear;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
            }
            100% {
                transform: translateY(0) rotate(0deg);
            }
        }
        
        .search-box {
            max-width: 500px;
            margin: 0 auto 2rem;
            position: relative;
        }
        
        .search-input {
            border-radius: 50px;
            padding: 12px 25px;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            box-shadow: 0 5px 20px rgba(139, 0, 0, 0.2);
            border-color: var(--primary-color);
        }
        
        .search-btn {
            position: absolute;
            right: 5px;
            top: 5px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 50px;
            padding: 7px 20px;
            transition: all 0.3s ease;
        }
        
        .search-btn:hover {
            transform: scale(1.05);
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 4rem 0 3rem;
            }
            
            .hero-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <div class="hero-section text-center">
        <div class="floating-books">
            <i class="floating-book fas fa-book" style="top: 10%; left: 5%; font-size: 3rem; animation-delay: 0s;"></i>
            <i class="floating-book fas fa-book-open" style="top: 30%; left: 80%; font-size: 2.5rem; animation-delay: 2s;"></i>
            <i class="floating-book fas fa-bookmark" style="top: 70%; left: 15%; font-size: 3.5rem; animation-delay: 4s;"></i>
            <i class="floating-book fas fa-book-reader" style="top: 80%; left: 70%; font-size: 2rem; animation-delay: 6s;"></i>
        </div>
        <div class="container hero-content">
            <h1 class="hero-title animate__animated animate__fadeInDown">Selamat Datang di <span style="color: var(--accent-color)">Librari</span></h1>
            <p class="hero-subtitle animate__animated animate__fadeIn animate__delay-1s">Temukan, pinjam, dan nikmati ribuan koleksi buku digital kami dari berbagai genre dan kategori</p>
        </div>
    </div>

    @if (auth()->user()->peran === 'admin')
    <!-- Admin Dashboard Section -->
                <!-- Quick Actions -->
               <div class="d-flex justify-content-right align-items-center min-vh-40">
    <div class="col-md-4 animate__animated animate__fadeIn animate__delay-2s">
        <div class="card p-4 shadow animate__animated animate__fadeInUp animate__delay-1s">
            <h5 class="mb-4 text-black fw-bold text-right">Aksi Cepat</h5>
            
            <a href="{{ url('/books/create') }}" class="btn btn-primary w-100 mb-3">
                <i class="fas fa-plus-circle me-2"></i>Tambah Buku Baru
            </a>
            <a href="{{ url('/peminjaman') }}" class="btn btn-warning w-100 mb-3">
                <i class="fas fa-clipboard-list me-2"></i>Kelola Peminjaman
            </a>
            <a href="{{ url('/users') }}" class="btn btn-danger w-100 mb-3">
                <i class="fas fa-users me-2"></i>Kelola Anggota
            </a>
            <a href="{{ url('/laporan') }}" class="btn btn-info w-100 mb-3">
                <i class="fas fa-chart-bar me-2"></i>Lihat Laporan
            </a>
        </div>
    </div>
</div>

        </div>
    </div>
    @endif

    <!-- Features Section -->
    <div class="container py-5">
        <h2 class="section-title animate__animated animate__fadeIn">Layanan Kami</h2>
        
        <div class="row g-4">
            <!-- Koleksi Buku -->
            <div class="col-md-4 animate__animated animate__fadeInUp">
                <div class="feature-card card h-100">
                    <div class="card-body p-4 text-center">
                        <div class="card-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h3 class="card-title">Koleksi Buku</h3>
                        <p class="card-text">Jelajahi ribuan buku dari berbagai genre dan kategori yang tersedia di perpustakaan kami.</p>
                        <a href="{{ url('/books') }}" class="btn btn-primary-custom btn-custom text-white">
                            <i class="fas fa-arrow-right me-2"></i>Lihat Buku
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kategori Buku -->
            <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-1s">
                <div class="feature-card card h-100">
                    <div class="card-body p-4 text-center">
                        <div class="card-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h3 class="card-title">Kategori Buku</h3>
                        <p class="card-text">Temukan buku berdasarkan kategori favoritmu untuk pengalaman membaca yang lebih terarah.</p>
                        <a href="{{ url('/kategori') }}" class="btn btn-primary-custom btn-custom text-white">
                            <i class="fas fa-arrow-right me-2"></i>Lihat Kategori
                        </a>
                    </div>
                </div>
            </div>

            @auth
            @if (auth()->user()->peran === 'admin')
            <!-- Peminjaman (Admin) -->
            <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-2s">
                <div class="feature-card card h-100">
                    <div class="card-body p-4 text-center">
                        <div class="card-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h3 class="card-title">Peminjaman</h3>
                        <p class="card-text">Kelola semua transaksi peminjaman buku oleh anggota perpustakaan.</p>
                        <a href="{{ url('/peminjaman') }}" class="btn btn-primary-custom btn-custom text-white">
                            <i class="fas fa-arrow-right me-2"></i>Kelola Peminjaman
                        </a>
                    </div>
                </div>
            </div>
            @else
            <!-- Koleksi Pribadi (User) -->
            <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-2s">
                <div class="feature-card card h-100">
                    <div class="card-body p-4 text-center">
                        <div class="card-icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <h3 class="card-title">Koleksi Saya</h3>
                        <p class="card-text">Lihat dan kelola buku yang sedang Anda pinjam atau favoritkan.</p>
                        <a href="{{ url('/koleksi_pribadi') }}" class="btn btn-primary-custom btn-custom text-white">
                            <i class="fas fa-arrow-right me-2 "></i>Lihat Koleksi
                        </a>
                    </div>
                </div>
            </div>
            @endif
            @endauth
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple animation trigger
        document.addEventListener('DOMContentLoaded', function() {
            const animateElements = document.querySelectorAll('.animate__animated');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add(entry.target.dataset.animate);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });
            
            animateElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
</body>
</html>
@endsection