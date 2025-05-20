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
        Schema::create('ulasan_bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('UserID')->index('ulasan_bukus_userid_foreign');
            $table->unsignedBigInteger('BukuID')->index('ulasan_bukus_bukuid_foreign');
            $table->text('Ulasan');
            $table->integer('Rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan_bukus');
    }
};
