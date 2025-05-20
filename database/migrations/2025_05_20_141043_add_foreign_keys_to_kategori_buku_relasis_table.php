<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('kategori_buku_relasis', function (Blueprint $table) {
            $table->foreign(['BukuID'])->references(['id'])->on('bukus')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['KategoriID'])->references(['id'])->on('kategori_bukus')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kategori_buku_relasis', function (Blueprint $table) {
            $table->dropForeign('kategori_buku_relasis_bukuid_foreign');
            $table->dropForeign('kategori_buku_relasis_kategoriid_foreign');
        });
    }
};
