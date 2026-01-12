<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('admin')->insert([
            'id' => 1,
            'nama_admin' => 'Admin Ihsan',
            'email' => 'Adminihsan@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
