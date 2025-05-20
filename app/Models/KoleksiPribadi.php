<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KoleksiPribadi extends Model
{
    use HasFactory;

    protected $fillable = ['UserID', 'BukuID', 'TanggalPeminjaman', 'TanggalPengembalian', 'StatusPeminjaman'];

    protected $table = 'peminjamans';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'BukuID', 'id');
    }
    public function peminjaman()
{
    return $this->hasOne(Peminjaman::class, 'BukuID', 'BukuID')->latestOfMany();
}

}
