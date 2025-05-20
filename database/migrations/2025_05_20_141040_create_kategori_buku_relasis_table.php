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
        Schema::create('kategori_buku_relasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('BukuID')->index('kategori_buku_relasis_bukuid_foreign');
            $table->unsignedBigInteger('KategoriID')->index('kategori_buku_relasis_kategoriid_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_buku_relasis');
    }
};
