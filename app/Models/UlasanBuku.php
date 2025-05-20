<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UlasanBuku extends Model
{
    use HasFactory;

    protected $fillable = ['UserID', 'BukuID', 'Ulasan', 'Rating'];
    protected $table = 'ulasan_bukus';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'BukuID');
    }
}

