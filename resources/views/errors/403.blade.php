<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oops! 403 - Akses Ditolak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
        }
        h1 {
            font-size: 120px;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <h1>403</h1>
    <h3>Oops! Kamu harus login dulu 🚫</h3>
    <p>Sepertinya kamu mencoba mengakses halaman yang butuh login.</p>
    <a href="{{ url('/login') }}" class="btn btn-danger mt-3">🔒 Login Sekarang</a>
</body>
</html>
