@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>📝 Daftar Akun Baru</h2>
    @if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="NamaLengkap" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div>
                    <label>Peran</label>
                    <select name="peran">
                        <option value="users" {{ old('peran') == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                    <div>
                        <br>
                        <label>Sudah Punya akun?</label>
                        <a href="{{ url('/login') }}" class="text-center mt-5">Login</a>
                            </div>
                            <br>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Daftar</button>
                <a href="{{ url('/') }}" class="btn btn-secondary">Batal</a>
            </form>
            </form>
            
        </div>
@endsection
