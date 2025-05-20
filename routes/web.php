<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KoleksiPribadiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UlasanBukuController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {  
    Route::get('/books', [BukuController::class, 'index']);
    Route::get('/kategori', [KategoriBukuController::class, 'index']);
    Route::get('/peminjaman', [PeminjamanController::class, 'index']);
    Route::get('/koleksi_pribadi', [KoleksiPribadiController::class, 'index']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/profil', [UserController::class, 'profil'])->name('users.profil');
    Route::get('/ulasanbuku', [UlasanBukuController::class, 'index']);
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Routing untuk Kategori Buku
Route::resource('kategori', KategoriBukuController::class)->except(['show']);
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index')->middleware('auth');
Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.export.excel')->middleware('auth');

// Routing untuk Peminjaman Buku
Route::resource('peminjaman', PeminjamanController::class);
Route::resource('users', UserController::class);
Route::resource('books', BukuController::class);
Route::resource('ulasanbuku', UlasanBukuController::class)->except(['show']);
Route::get('/ulasanbuku/{BukuID}', [UlasanBukuController::class, 'index'])->name('ulasanbuku.index');
Route::get('/ulasanbuku/create/{peminjaman}', [UlasanBukuController::class, 'create'])->name('ulasanbuku.create');
// Routing untuk Koleksi Pribadi
Route::resource('koleksi', KoleksiPribadiController::class);
Route::get('/kategori/{id}', [KategoriBukuController::class, 'show'])->name('kategori.show');
