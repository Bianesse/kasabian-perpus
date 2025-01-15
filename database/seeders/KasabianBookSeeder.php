<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kasabian_book;

class KasabianBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kasabian_book::insert([
            ['kasabianJudul' => 'The Alchemist', 'kasabianPenulis' => 'Paulo Coelho', 'kasabianPenerbit' => 'Harper Collins', 'kasabianTahunTerbit' => '2015'],
            ['kasabianJudul' => 'A Place Called Perfect', 'kasabianPenulis' => 'Hellena Duggan', 'kasabianPenerbit' => 'Bhuana Ilmu Populer', 'kasabianTahunTerbit' => '2022'],
        ]);
    }
}
