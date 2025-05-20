<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('ulasan_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('UserID')->constrained('users')->onDelete('cascade');
            $table->foreignId('BukuID')->constrained('books')->onDelete('cascade');
            $table->text('Ulasan');
            $table->integer('Rating');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('ulasan_books');
    }
};

