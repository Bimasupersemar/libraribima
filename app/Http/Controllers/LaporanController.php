<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Response;

class LaporanController extends Controller
{
    public function index()
    {
        // Ambil semua data peminjaman beserta relasi user & buku
        $laporan = Peminjaman::with('user', 'buku')->get();
        return view('laporan.index', compact('laporan'));
    }

    public function exportExcel()
    {
        $laporan = Peminjaman::with('user', 'buku')->get();

        // Header kolom
        $output = "Nama Peminjam\tJudul Buku\tTanggal Pinjam\tTanggal Kembali\tStatus\n";

        // Data baris
        foreach ($laporan as $data) {
            $output .= "{$data->user->NamaLengkap}\t{$data->buku->Judul}\t{$data->TanggalPeminjaman}\t{$data->TanggalPengembalian}\t{$data->StatusPeminjaman}\n";
        }

        // Kembalikan response sebagai file Excel
        return Response::make($output, 200, [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename="laporan-peminjaman.xls"',
        ]);
    }
}
