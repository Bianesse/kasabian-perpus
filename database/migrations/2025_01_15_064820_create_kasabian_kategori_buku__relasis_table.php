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

        Schema::create('kasabian_kategori_bukus', function (Blueprint $table) {
            $table->id('kategoriId');
            $table->string('kasabianNamaKategori');
            $table->timestamps();
        });

        Schema::create('kasabian_kategori_buku_relasis', function (Blueprint $table) {
            $table->id('kategoriBukuID');
            $table->foreignId('bukuId')->constrained('kasabian_books', 'bukuId');
            $table->foreignId('kategoriId')->constrained('kasabian_kategori_bukus', 'kategoriId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasabian_kategori_buku');
        Schema::dropIfExists('kasabian_kategori_buku_relasi');
    }
};
