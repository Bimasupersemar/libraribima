@extends('layouts.app')

@section('content')
<div class="container mt-4 text-black">
    <h2 class="fw-bold">Tambah Buku Baru</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="Judul" class="form-label text-black">Judul Buku</label>
            <input type="text" name="Judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Penulis" class="form-label">Penulis</label>
            <input type="text" name="Penulis" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Penerbit" class="form-label">Penerbit</label>
            <input type="text" name="Penerbit" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="TahunTerbit" class="form-label">Tahun Terbit</label>
            <input type="number" name="TahunTerbit" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori Buku</label>
            <select name="kategori_id[]" class="form-select" multiple required>
                @foreach ($kategoris as $k)
                    <option value="{{ $k->id }}">{{ $k->NamaKategori }}</option>
                @endforeach
            </select>
           
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('books.index') }}" class="btn btn-primary">Kembali</a>
    </form>
</div>
@endsection
