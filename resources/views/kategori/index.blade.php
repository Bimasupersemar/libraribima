@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">📂 Daftar Kategori Buku</h2>
        @if (auth()->user()->peran === 'admin')
            <a href="{{ route('kategori.create') }}" class="btn btn-primary">➕ Tambah Kategori</a>
        @endif
    </div>

    <div class="row g-3">
        @foreach($kategoris as $k)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm border-0 bg-light position-relative">
                <div class="card-body text-center">
                    <i class="bi bi-bookmark-star fs-1 text-primary mb-3"></i>
                    <h5 class="card-title">{{ $k->NamaKategori }}</h5>
                    @if (auth()->user()->peran === 'admin')
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-sm btn-warning">✏️</a>
                            <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑️</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('kategori.show', $k->id) }}" class="btn btn-info mt-3">📖 Lihat Buku</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Tambahkan Bootstrap Icons jika belum --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
