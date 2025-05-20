<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBuku;
use App\Models\Buku;

class KategoriBukuController extends Controller
{
    public function index()
    {
        $kategoris = KategoriBuku::all();
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
            $request->validate([
            'NamaKategori' => 'required|unique:kategori_bukus,NamaKategori',
        ]);

        KategoriBuku::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategoris = KategoriBuku::findOrFail($id);
        return view('kategori.edit', compact('kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaKategori' => 'required|unique:kategori_bukus,NamaKategori,' . $id,
        ]);

        $kategori = KategoriBuku::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }
    public function destroy($id)
    {
        KategoriBuku::destroy($id);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }

    public function show($id)
{
    $kategori = KategoriBuku::findOrFail($id);
    $bukus = Buku::where('id', $id)->get();

    return view('kategori.kategori', compact('kategori', 'bukus'));
}
}
