@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>➕ Tambah Kategori Buku</h2>

    {{-- Tampilkan error validasi (kalau ada) --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="NamaKategori" class="form-label">Nama Kategori</label>
            <input type="text" name="NamaKategori" class="form-control" required value="{{ old('NamaKategori') }}">
        </div>
        <button type="submit" class="btn btn-success">💾 Simpan</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">🔙 Kembali</a>
    </form>
</div>
@endsection
