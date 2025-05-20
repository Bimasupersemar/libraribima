@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Pengembalian Buku</h2>

    <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="StatusPeminjaman" class="form-label">Status Peminjaman</label>
            <select name="StatusPeminjaman" id="StatusPeminjaman" class="form-select" required>
                <option value="Dipinjam" {{ $peminjaman->StatusPeminjaman == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="Dikembalikan" {{ $peminjaman->StatusPeminjaman == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
            </select>
        </div>                          
            <button type="submit" class="btn btn-primary">💾 Update</button>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </form>
</div>

@endsection