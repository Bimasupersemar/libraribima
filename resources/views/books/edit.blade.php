@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>✏️ Edit Buku</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('books.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')    

        <div class="mb-3">
            <label for="Judul" class="form-label">Judul Buku</label>
            <input type="text" name="Judul" value="{{ $buku->Judul }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Penulis" class="form-label">Penulis</label>
            <input type="text" name="Penulis" value="{{ $buku->Penulis }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Penerbit" class="form-label">Penerbit</label>
            <input type="text" name="Penerbit" value="{{ $buku->Penerbit }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="TahunTerbit" class="form-label">Tahun Terbit</label>
            <input type="number" name="TahunTerbit" value="{{ $buku->TahunTerbit }}" class="form-control" >
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori Buku</label>
            <select name="kategori_id[]" class="form-select" multiple required>
                @foreach ($kategoris as $k)
                    <option value="{{ $k->id }}" {{ in_array($k->id, $selectedKategoriId) ? 'selected' : '' }}>
                        {{ $k->NamaKategori }}
                    </option>
                @endforeach
            </select>
        </div>       
        <button type="submit" class="btn btn-primary">💾 Update</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">🔙 Kembali</a>
    </form>
</div>
@endsection
