<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KategoriBuku extends Model
{
    use HasFactory;

    protected $fillable = ['NamaKategori', 'KategoriID', 'BukuID'];

    public function buku(): BelongsToMany
    {
        return $this->belongsToMany(Buku::class, 'kategori_buku_relasis', 'KategoriID', 'BukuID');
    }
}
