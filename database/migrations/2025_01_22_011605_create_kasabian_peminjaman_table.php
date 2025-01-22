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
        Schema::create('kasabian_peminjaman', function (Blueprint $table) {
            $table->id('peminjamanId');
            $table->foreignId('userId')->constrained('users')->cascadeOnDelete();
            $table->foreignId('bukuId')->constrained('kasabian_books', 'bukuId')->cascadeOnDelete();
            $table->date('tanggalPeminjaman');
            $table->date('tanggalPengembalian');
            $table->string('statusPeminjaman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasabian_peminjaman');
    }
};
