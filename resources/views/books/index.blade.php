@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-black fw-bold"><i class="fas fa-book me-2"></i>Daftar Buku</h4>
        @if (auth()->user()->peran === 'admin')
            <a href="{{ route('books.create') }}" class="btn btn-success">Tambah Buku</a>
        @endif
    </div>

    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach ($books as $book)
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
</div>
@endsection
