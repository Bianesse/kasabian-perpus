<?php

namespace Database\Seeders;

use App\Models\KasabianKategoriBukuRelasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KasabianKategoriBukuRelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KasabianKategoriBukuRelasi::insert([
            ['bukuId' => 1, 'kategoriId' => '3'],
            ['bukuId' => 2, 'kategoriId' => '2'],
            ['bukuId' => 3, 'kategoriId' => '2'],
            ['bukuId' => 4, 'kategoriId' => '2'],
            ['bukuId' => 5, 'kategoriId' => '3'],
            ['bukuId' => 6, 'kategoriId' => '2'],
            ['bukuId' => 7, 'kategoriId' => '3'],
        ]);
    }
}
