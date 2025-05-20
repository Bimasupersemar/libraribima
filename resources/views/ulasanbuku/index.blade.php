@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Ulasan Buku</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($ulasanbuku->isEmpty())
        <div class="alert alert-info">Belum ada ulasan yang ditambahkan.</div>
    @else
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Nama Peminjam</th>
                    <th>Ulasan</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ulasanbuku as $ulasan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ulasan->buku->Judul ?? 'Buku tidak ditemukan' }}</td>
                    <td>{{ $ulasan->user->username ?? 'User tidak ditemukan' }}</td>
                    <td>{{ $ulasan->Ulasan }}</td>
                    <td>{{ $ulasan->Rating }}/5</td>
                    @empty
            <p>Belum ada ulasan untuk buku ini.</p>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endif

    <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Buku</a>
</div>
@endsection
