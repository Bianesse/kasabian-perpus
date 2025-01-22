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
        Schema::create('kasabian_koleksi_pribadi', function (Blueprint $table) {
            $table->id('koleksiId');
            $table->foreignId('userId')->constrained('users')->cascadeOnDelete();
            $table->foreignId('bukuId')->constrained('kasabian_books', 'bukuId')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasabian_koleksi_pribadi');
    }
};
