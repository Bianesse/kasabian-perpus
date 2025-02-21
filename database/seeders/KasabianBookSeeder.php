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
            ['kasabianJudul' => 'The Alchemist', 'kasabianPenulis' => 'Paulo Coelho', 'kasabianPenerbit' => 'Harper Collins', 'kasabianTahunTerbit' => '2015', 'kasabianDeskripsi' => 'An Andalusian shepherd boy named Santiago dreams of a treasure while in a ruined church. He consults a Gypsy fortune-teller about the meaning of the recurring dream. The woman interprets it as a prophecy, telling the boy that he will discover a treasure at the Egyptian pyramids.', 'stock' => 5],
            ['kasabianJudul' => 'A Place Called Perfect', 'kasabianPenulis' => 'Hellena Duggan', 'kasabianPenerbit' => 'Bhuana Ilmu Populer', 'kasabianTahunTerbit' => '2022', 'kasabianDeskripsi' => "Violet never wanted to move to Perfect. Who wants to live in a town where everyone has to wear glasses to stop them going blind? And who wants to be tidy and perfectly behaved all the time? Violet quickly discovers there's something weird going on - her mam is acting strange and her dad has disappeared.", 'stock' => 10],
        ]);
    }
}
