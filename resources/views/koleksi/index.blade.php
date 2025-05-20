@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">
                <i class="fas fa-bookmark me-2"></i>Buku Saya
            </h4>
        </div>
        <div class="card-body">
   
                <div class="alert alert-secondary">
                    <i class="fas fa-user me-2"></i>Berikut adalah daftar buku yang Anda pinjam.
                </div>


            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($koleksi as $kol)
                            <tr>
                                <td>{{ $kol->peminjaman->id ?? '-' }}</td>
                                <td>
                                    @if($kol->buku)
                                        {{ $kol->buku->Judul }}
                                        <br>
                                        <small class="text-muted">Penulis: {{ $kol->buku->Penulis ?? '-' }}</small>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $kol->peminjaman->TanggalPeminjaman ? \Carbon\Carbon::parse($kol->peminjaman->TanggalPeminjaman)->format('d M Y') : '-' }}</td>
                                <td>{{ $kol->peminjaman->TanggalPengembalian ? \Carbon\Carbon::parse($kol->peminjaman->TanggalPengembalian)->format('d M Y') : '-' }}</td>
                                <td>
                                    @if($kol->peminjaman)
                                        <span class="badge 
                                            @if($kol->peminjaman->StatusPeminjaman === 'Dipinjam') bg-warning text-dark
                                            @elseif($kol->peminjaman->StatusPeminjaman === 'Dikembalikan') bg-success
                                            @else bg-secondary
                                            @endif">
                                            {{ $kol->peminjaman->StatusPeminjaman ?? '-' }}
                                        </span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($kol->peminjaman && $kol->peminjaman->StatusPeminjaman === 'Dikembalikan')
                                        <a class="btn btn-sm btn-success" href="{{ route('ulasanbuku.create', $kol->peminjaman->id) }}">
                                            <i class="fas fa-star me-1"></i> Beri Ulasan
                                        </a>
                                    @else
                                        <span class="text-muted">Belum bisa diulas</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="fas fa-book-open fa-2x mb-3 text-muted"></i>
                                    <p class="mb-0">Tidak ada data peminjaman.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(auth()->user()->peran === 'admin')
                <div class="mt-3">
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-primary">
                        <i class="fas fa-list me-1"></i> Kelola Semua Peminjaman
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection