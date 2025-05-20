@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Beri Ulasan Buku</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('ulasanbuku.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="UserID" value="{{ $peminjaman->UserID }}">
                        <input type="hidden" name="BukuID" value="{{ $peminjaman->BukuID }}">

                        <div class="mb-4">
                            <label for="Ulasan" class="form-label">Ulasan:</label>
                            <textarea name="Ulasan" id="Ulasan" class="form-control" rows="4" required placeholder="Tulis ulasan Anda di sini..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="Rating" class="form-label">Rating:</label>
                            <input type="number" name="Rating" id="Rating" class="form-control" min="1" max="5" required placeholder="Pilih rating (1-5)">
                        </div>

                        <div class="mb-4">
                            @if($buku)
                                <p><strong>Buku:</strong> {{ $buku->Judul }}</p>  <!-- Nama buku -->
                            @else
                                <p><strong>Buku:</strong> Data buku tidak tersedia.</p>
                            @endif
                            <p><strong>Peminjam:</strong> {{ $user->username }}</p> <!-- Nama peminjam -->
                        </div>  
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-success">Beri Ulasan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali ke Daftar Buku</a>
            </div>
        </div>
    </div>
</div>
@endsection
