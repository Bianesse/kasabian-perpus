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
        Schema::create('kasabian_ulasan_buku', function (Blueprint $table) {
            $table->id('ulasanId');
            $table->foreignId('bukuId')->constrained('kasabian_books', 'bukuId')->cascadeOnDelete();
            $table->foreignId('userId')->constrained('users', 'id')->cascadeOnDelete();
            $table->string('ulasan');
            $table->integer('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasabian_ulasan_buku');
    }
};
