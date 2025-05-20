@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>📚 Tambah Peminjaman</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <input type="hidden" name="userid" value="{{ auth()->id() }}">
            <p><strong>👤 Peminjam:</strong> {{ auth()->user()->username }}</p>             
        </div>

        <div class="mb-3">
            <label for="bukuid" class="form-label">Buku</label>
           @if ($bukuTerpilih)
    <input type="hidden" name="bukuid" value="{{ $bukuTerpilih->id }}">
    <p><strong>📘 Buku yang dipinjam:</strong> {{ $bukuTerpilih->Judul }}</p>
@else
    <div class="alert alert-warning">Tidak ada buku yang dipilih.</div>
@endif
        </div>

        <div class="mb-3">
            <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
            <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status_peminjaman" class="form-label">Status</label>
            <select name="status_peminjaman" class="form-select" required>
                <option value="Dipinjam">Dipinjam</option>
                
            </select>
        </div>
        <script>
            const tanggalPengembalian = document.getElementById('tanggal_pengembalian');
            const today = new Date().toISOString().split('T')[0];
            tanggalPengembalian.min = today;
        </script>

        <button type="submit" class="btn btn-success">💾 Simpan</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">🔙 Kembali</a>
    </form>
</div>
@endsection
