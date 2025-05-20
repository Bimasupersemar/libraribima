<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBukuRelasi;

class KategoriBukuRelasiController extends Controller
{
    public function index()
    {
        $relasis = KategoriBukuRelasi::with('buku', 'kategori')->get();
        return view('relasi.index', compact('relasis'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'BukuID' => 'required|exists:books,id',
            'KategoriID' => 'required|exists:kategori_books,id',
        ]);

        KategoriBukuRelasi::create($request->all());
        return redirect()->route('relasi.index')->with('success', 'Relasi kategori berhasil ditambahkan');
    }

    public function destroy($id)
    {
        KategoriBukuRelasi::destroy($id);
        return redirect()->route('relasi.index')->with('success', 'Relasi kategori berhasil dihapus');
    }
}
