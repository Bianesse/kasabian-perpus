<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            ['kasabianUsername' => 'Mista', 'kasabianEmail' => 'mista@gmail.com', 'password' => Hash::make('mista123'), 'kasabianRoleId' => '1', 'kasabianNamaLengkap' => 'Mista Sr.', 'kasabianAlamat' => 'Cimahi' ],
            ['kasabianUsername' => 'Jon', 'kasabianEmail' => 'jon@gmail.com', 'password' => Hash::make('jon123'), 'kasabianRoleId' => '2', 'kasabianNamaLengkap' => 'Jon Doe', 'kasabianAlamat' => 'Cimahi' ],
            ['kasabianUsername' => 'Kai', 'kasabianEmail' => 'kai@gmail.com', 'password' => Hash::make('kai123'), 'kasabianRoleId' => '3', 'kasabianNamaLengkap' => 'Kai C', 'kasabianAlamat' => 'Bandung' ],
        ]);
    }
}
