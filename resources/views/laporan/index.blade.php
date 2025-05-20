@extends('layouts.app')

@section('content')
<div class="text-primary">
<h3>Laporan Peminjaman</h3>
<a href="{{ route('laporan.export.excel') }}" class="btn btn-success mb-3">Export Excel</a>
<button onclick="window.print()" class="btn btn-secondary mb-3">Cetak PDF (Print)</button>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporan as $data)
            <tr>
                <td>{{ $data->user->NamaLengkap }}</td>
                <td>{{ $data->buku->Judul }}</td>
                <td>{{ $data->TanggalPeminjaman }}</td>
                <td>{{ $data->TanggalPengembalian }}</td>
                <td>{{ $data->StatusPeminjaman }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
