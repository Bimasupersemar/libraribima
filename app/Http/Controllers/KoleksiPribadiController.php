<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KoleksiPribadi;
use Illuminate\Support\Facades\Auth;


class KoleksiPribadiController extends Controller
{
    public function index()
    {   
       $user = Auth::id(); // ambil ID user yang sedang login

    $koleksi = KoleksiPribadi::with(['user', 'buku']) 
        ->where('UserID', $user) 
        ->get();
        return view('koleksi.index', compact('koleksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'userid' => 'required|exists:users,id',
            'bukuid' => 'required|exists:bukus,id',
            'tanggal_pengembalian' => 'required|date|after_or_equal:today',
            'status_peminjaman' => 'required',
        ]);

    }
    public function edit($id)
    {
        $koleksi = KoleksiPribadi::findOrFail($id);
        return view('koleksi.edit', compact('koleksi'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'StatusPeminjaman' => 'required',
            'userid' => 'required',
            'bukuid' => 'required',
        ]);
    }

    public function destroy($id)
    {
        KoleksiPribadi::destroy($id);
        return redirect()->route('koleksi.index')->with('success', 'Buku dihapus dari koleksi pribadi');
    }
}
