<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['Judul', 'Penulis', 'Penerbit', 'TahunTerbit'];

    public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class, 'BukuID');
    }

    public function ulasan(): HasMany
    {
        return $this->hasMany(UlasanBuku::class, 'BukuID');
    }

    public function kategoris(): BelongsToMany
    {
        return $this->belongsToMany(KategoriBuku::class, 'kategori_buku_relasis', 'BukuID', 'KategoriID');
    }

    public function koleksi(): HasMany
    {
        return $this->hasMany(KoleksiPribadi::class, 'BukuID');
    }
}
