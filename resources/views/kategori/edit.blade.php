@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>✏️ Edit Kategori Buku</h2>

    <form action="{{ route('kategori.update', $kategoris->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="NamaKategori" class="form-label">Nama Kategori</label>
            <input type="text" name="NamaKategori" class="form-control" value="{{ $kategoris->NamaKategori }}" required>
        </div>
        <button type="submit" class="btn btn-primary">💾 Update</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">🔙 Kembali</a>
    </form>
</div>
@endsection
