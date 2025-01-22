<?php

namespace Database\Seeders;

use App\Models\KasabianKoleksiPribadi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KasabianKoleksiPribadiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KasabianKoleksiPribadi::insert([
            ['userId' => '3', 'bukuId' => '1'],
            ['userId' => '3', 'bukuId' => '2'],
        ]);
    }
}
