@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h2>Pengembalian Buku</h2>

    <form action="{{ route('users.update', $users->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            Nama :
            <h3 for="NamaLengkap" class="form-label text-danger">{{ $users->username }}</h3> 
            <br>
            <label for="peran" class="form-label">Peran</label>
            <select name="peran" id="peran" class="form-select" required>
                <option value="admin" {{ $users->peran == 'admin' ? 'selected' : '' }}>admin</option>
                <option value="user" {{ $users->peran == 'user' ? 'selected' : '' }}>user</option>
            </select>
        </div>                          
            <button type="submit" class="btn btn-primary">💾 Update</button>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </form>
</div>
@endsection