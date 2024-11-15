<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat data admin
        User::create([
            'id' => '1',
            'username' => 'admin',
            'name' => 'Admin Nich',
            'password' => Hash::make('ademin1278'), // Password harus di-hash
            'role' => '1',
        ]);

        User::create([
            'id' => '340060555',
            'username' => 'banuburkhairi',
            'name' => 'Banu Burkhairi',
            'password' => Hash::make('@bps1699'),
            'role' => '1',
        ]);

        // Membuat data operator
        User::create([
            'id' => '340059736',
            'username' => 'rica.purnama',
            'name' => 'Rica Purnama Sari Saragih',
            'password' => Hash::make('340059736'),
            'role' => '2',
        ]);
    }
}
