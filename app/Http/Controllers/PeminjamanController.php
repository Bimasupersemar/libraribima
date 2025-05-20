<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('user', 'buku')->get();
        return view('peminjaman.index', compact('peminjamans'));
    }

   public function create(Request $request)
{
    $bukuTerpilih = null;

    if ($request->has('bukuid')) {
        $bukuTerpilih = Buku::find($request->bukuid);
    }

    return view('peminjaman.create', compact('bukuTerpilih'));
}

    public function store(Request $request)
    {
        $request->validate([
            'bukuid' => 'required|exists:bukus,id',
            'tanggal_pengembalian' => 'required|date|after_or_equal:today',
            'status_peminjaman' => 'required',
        ]);

        Peminjaman::create([
           'UserID' => Auth::id(),
            'BukuID' => $request->bukuid,
            'TanggalPeminjaman' => now(),
            'TanggalPengembalian' => $request->tanggal_pengembalian, 
            'StatusPeminjaman' => $request->status_peminjaman,  
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        return redirect()->route('koleksi.index')->with('success', 'Peminjaman berhasil ditambahkan');
    }
    public function dikembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->StatusPeminjaman = 'Dikembalikan';
        $peminjaman->TanggalPengembalian = Carbon::now()->toDateString();
        $peminjaman->save();
    
        return redirect()->back()->with('success', 'Buku berhasil dikembalikan.');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        return view('peminjaman.edit', compact('peminjaman'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'StatusPeminjaman' => 'required',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->StatusPeminjaman = $request->StatusPeminjaman;
        $peminjaman->save();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui');
    }

   
    public function destroy($id)
    {
        Peminjaman::destroy($id);
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus');
    }
}
