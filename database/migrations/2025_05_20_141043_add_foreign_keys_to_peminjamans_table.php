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
        Schema::table('peminjamans', function (Blueprint $table) {
            $table->foreign(['BukuID'])->references(['id'])->on('bukus')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['UserID'])->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjamans', function (Blueprint $table) {
            $table->dropForeign('peminjamans_bukuid_foreign');
            $table->dropForeign('peminjamans_userid_foreign');
        });
    }
};
