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
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('UserID')->index('peminjamans_userid_foreign');
            $table->unsignedBigInteger('BukuID')->index('peminjamans_bukuid_foreign');
            $table->date('TanggalPeminjaman');
            $table->date('TanggalPengembalian')->nullable();
            $table->string('StatusPeminjaman', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
