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
        Schema::create('koleksi_pribadis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('UserID')->index('koleksi_pribadis_userid_foreign');
            $table->unsignedBigInteger('BukuID')->index('koleksi_pribadis_bukuid_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koleksi_pribadis');
    }
};
