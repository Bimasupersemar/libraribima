<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('Judul', 255);
            $table->string('Penulis', 255);
            $table->string('Penerbit', 255);
            $table->integer('TahunTerbit');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('books');
    }
};
