@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Data Peminjaman</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('peminjaman.create') }}" class="btn btn-success mb-3">Tambah Peminjaman</a>
            <a href="{{ route('laporan.index') }}" class="btn btn-success mb-3">Cetak Laporan</a>
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjamans as $peminjaman)
                    <tr>
                        <td>{{ $peminjaman->id }}</td>
                        <td>{{ $peminjaman->user->username }}</td>
                        <td>{{ $peminjaman->buku->Judul }}</td>
                        <td>{{ $peminjaman->TanggalPeminjaman }}</td>
                        <td>
                            <span class="badge {{ $peminjaman->TanggalPengembalian ? 'bg-success' : 'bg-danger' }}">
                                {{ $peminjaman->TanggalPengembalian ?? 'Belum Dikembalikan' }}
                            </span>
                        </td>
                           <td>{{ $peminjaman->StatusPeminjaman }}</td> 
                        <td>
                            <form action="{{ route('peminjaman.edit', $peminjaman->id) }}" class="d-inline">
                                <button class="btn btn-danger">Edit</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
