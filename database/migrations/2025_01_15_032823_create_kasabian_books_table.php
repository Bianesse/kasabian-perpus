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
        Schema::create('kasabian_books', function (Blueprint $table) {
            $table->id('bukuId');
            $table->string('kasabianJudul');
            $table->string('kasabianPenulis');
            $table->string('kasabianPenerbit');
            $table->integer('kasabianTahunTerbit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasabian_books');
    }
};
