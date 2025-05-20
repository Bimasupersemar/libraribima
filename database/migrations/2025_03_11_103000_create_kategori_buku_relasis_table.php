<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('kategori_buku_relasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('BukuID')->constrained('books')->onDelete('cascade');
            $table->foreignId('KategoriID')->constrained('kategori_books')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('kategori_buku_relasis');
    }
};
