<?php

namespace Database\Seeders;

use App\Models\KasabianUlasanBuku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KasabianUlasanBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KasabianUlasanBuku::insert([
            ['userId' => '3', 'bukuId' => '1', 'ulasan' => 'Nice book!', 'rating' => 5],
        ]);
    }
}
