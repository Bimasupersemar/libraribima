<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\UlasanBuku;
use Illuminate\Contracts\Support\ValidatedData;

class BukuController extends Controller
{
   public function index(Request $request)
{
    
    $books = Buku::with(['kategoris', 'ulasan'])->get(); 
    $kategoris = KategoriBuku::all();
    $ulasan = UlasanBuku::all();
    return view('books.index', compact('books', 'kategoris', 'ulasan'));
}
    public function create()
    {
        $kategoris = KategoriBuku::all();
    return view('books.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'Judul' => 'required',
            'Penulis' => 'required',
            'Penerbit' => 'required',
            'TahunTerbit' => 'required|integer',
            'kategori_id' => 'required|exists   :kategori_bukus,id',
        ]); 
        $buku = Buku::create($request->only('Judul', 'Penulis', 'Penerbit', 'TahunTerbit', 'kategori_id'));
        $buku->kategoris()->attach($request->kategori_id);
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id)
{
    $buku = Buku::findOrFail($id);
    $kategoris = KategoriBuku::all();
    $selectedKategoriId = $buku->kategoris->pluck('id')->toArray();

    return view('books.edit', compact('buku', 'kategoris', 'selectedKategoriId'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'Judul' => 'required',
            'Penulis' => 'required',
            'Penerbit' => 'required',
            'TahunTerbit' => 'required|numeric',
            'kategori_id' => 'required|array',
        ]);
    
        $buku = Buku::findOrFail($id);
        $buku->update([
            'Judul' => $request->Judul, 
            'Penulis' => $request->Penulis,
            'Penerbit' => $request->Penerbit,
            'TahunTerbit' => $request->TahunTerbit,
        ]);
        $buku = Buku::findOrFail($id);
        $buku->update($request->only('Judul', 'Penulis', 'Penerbit', 'TahunTerbit'));
        $buku->kategoris()->sync($request->kategori_id);
    
        return redirect()->route('books.index')->with('success', 'Buku berhasil diupdate!');
    }
    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
    }
}
