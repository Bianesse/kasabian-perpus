<?php

namespace Database\Seeders;

use App\Models\Kasabian_role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kasabian_role::insert([
            ['kasabianRoleName' => 'Admin'],
            ['kasabianRoleName' => 'Petugas'],
            ['kasabianRoleName' => 'Peminjam'],
        ]);
    }
}
