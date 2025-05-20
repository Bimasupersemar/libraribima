<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\UlasanBuku;
use App\Models\Peminjaman;
use App\Models\User;

class UlasanBukuController extends Controller
{
    public function index($BukuID)
    {
        $buku = Buku::findOrFail($BukuID);
      $ulasanbuku = UlasanBuku::where('BukuID', $BukuID)->with('user')->latest()->get();
        return view('ulasanbuku.index', compact('ulasanbuku'));
    }
        public function create(Peminjaman $peminjaman)
    {
        
        $buku = $peminjaman->buku;

        if (!$buku) {
            // Jika buku tidak ada, kamu bisa redirect atau memberikan pesan error
            return redirect()->route('koleksi.index')->with('error', 'Buku tidak ditemukan.');
        }
        $user = $peminjaman->user;
        return view('ulasanbuku.create', compact('peminjaman', 'buku', 'user'));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'UserID' => 'required|exists:users,id',
            'BukuID' => 'required|exists:bukus,id',
            'Ulasan' => 'required',
            'Rating' => 'required|integer|min:1|max:5',
        ]);

        UlasanBuku::create($request->all());
        return redirect()->route('koleksi.index')->with('success', 'Ulasan berhasil ditambahkan');
    }

    public function destroy($id)
    {
        UlasanBuku::destroy($id);
        return redirect()->route('ulasanbuku.index')->with('success', 'Ulasan berhasil dihapus');
    }

}
