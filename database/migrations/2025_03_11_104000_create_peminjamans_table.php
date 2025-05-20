<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('UserID')->constrained('users')->onDelete('cascade');
            $table->foreignId('BukuID')->constrained('books')->onDelete('cascade');
            $table->date('TanggalPeminjaman');
            $table->date('TanggalPengembalian')->nullable();
            $table->string('StatusPeminjaman', 50);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('peminjamans');
    }
};
