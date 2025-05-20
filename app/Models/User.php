<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['username', 'password', 'email', 'NamaLengkap', 'Alamat', 'peran'];

    public function peminjaman(): HasMany
    {
        return $this->hasMany(Peminjaman::class, 'UserID');
    }

    public function ulasan(): HasMany
    {
        return $this->hasMany(UlasanBuku::class, 'UserID');
    }

    public function koleksi(): HasMany
    {
        return $this->hasMany(KoleksiPribadi::class, 'UserID');
    }
}
