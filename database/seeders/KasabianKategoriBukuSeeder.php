<?php

namespace Database\Seeders;

use App\Models\KasabianKategoriBuku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KasabianKategoriBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KasabianKategoriBuku::insert([
            ['kasabianNamaKategori' => 'Action'],
            ['kasabianNamaKategori' => 'Drama'],
            ['kasabianNamaKategori' => 'Philosophy'],
            ['kasabianNamaKategori' => 'fantasy'],
        ]);
    }
}
