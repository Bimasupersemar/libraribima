@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4>Tambah User</h4>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="namalengkap" class="form-control" required>
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
                        <option value="">-- Pilih Peran --</option>
                        <option value="admin" {{ old('peran') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ old('peran') == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
