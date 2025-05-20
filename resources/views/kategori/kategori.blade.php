@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>📚 Buku dalam Kategori: {{ $kategori->NamaKategori }}</h2>
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary mb-3">⬅️ Kembali</a>

    @if ($bukus->isEmpty())
        <div class="alert alert-info">Tidak ada buku dalam kategori ini.</div>
    @else
   <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach ($bukus as $book)
        <div class="col">
            <div class="card h-100">
               <img src="https://picsum.photos/seed/sea{{ $book->id}}/300/300" class="card-img-top" alt="Cover Buku">
                  <div class="card-body">
                    <h5 class="card-title">{{ $book->Judul }}</h5>
                    <p class="card-text mb-1"><strong>Penulis:</strong> {{ $book->Penulis }}</p>
                    <p class="card-text mb-1">
                        <strong>Kategori:</strong> {{ $book->kategoris->pluck('NamaKategori')->join(', ') }}
                    </p>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-star-fill text-warning me-1"></i>
                        <span class="small">
                            {{ optional($book->ulasan)->count() > 0 ? number_format($book->ulasan->avg('Rating'), 1) : 'Belum ada rating' }}
                        </span>
                    </div>
                </div>
                <div class="card-footer bg-light d-flex flex-wrap justify-content-between gap-2">
                    @if (auth()->user()->peran === 'admin')
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-danger btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Hapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    @else
                        <form action="{{ route('peminjaman.create') }}" method="GET">
                            <input type="hidden" name="bukuid" value="{{ $book->id }}">
                            <button type="submit" class="btn btn-primary btn-sm">Pinjam</button>
                        </form>
                    @endif
                    <a class="btn btn-success btn-sm" href="{{ route('ulasanbuku.index', $book->id) }}">Ulasan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
