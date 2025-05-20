@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 400px; background-color: rgba(0, 0, 0, 0.7); border-radius: 10px; padding: 20px;">
    <h2 class="text-white text-center fw-bold">Login</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="text-white">Username</label>
            <input type="text" name="username" class="form-control" required autofocus style="background-color: #333; color: white; border: 1px solid #555;">
        </div>

        <div class="mb-3">
            <label class="text-white">Password</label>
            <input type="password" name="password" class="form-control" required style="background-color: #333; color: white; border: 1px solid #555;">
        </div>
        
        <div class="mb-3 text-center">
            <label class="text-white">Belum punya akun?</label>
            <a href="{{ url('/register') }}" class="text-danger">Daftar</a>
        </div>
        
        <button type="submit" class="btn btn-danger w-100">🔓 Login</button>
    </form>
</div>

<style>
    body {
        background: url('https://your-image-url.com/background.jpg') no-repeat center center fixed;
        background-size: cover;
        color: white;
    }
    .btn-danger {
        background-color: #e50914;
        border: none;
    }
    .btn-danger:hover {
        background-color: #f40612;
    }
</style>
@endsection