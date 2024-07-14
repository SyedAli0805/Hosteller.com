<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'Amina Siddiqui',
                'email' => 'amina.siddiqui@example.com',
                'password' => Hash::make('password123'),
                'hostel_id' => 1
            ],
            [
                'name' => 'Hassan Mirza',
                'email' => 'hassan.mirza@example.com',
                'password' => Hash::make('password123'),
                'hostel_id' => 1
            ],
            [
                'name' => 'Layla Qureshi',
                'email' => 'layla.qureshi@example.com',
                'password' => Hash::make('password123'),
                'hostel_id' => 2
            ],
            [
                'name' => 'Bilal Akhtar',
                'email' => 'bilal.akhtar@example.com',
                'password' => Hash::make('password123'),
                'hostel_id' => 3
            ],
            [
                'name' => 'Fareed Ayaz',
                'email' => 'fareed.ayaz@example.com',
                'password' => Hash::make('password123'),
                'hostel_id' => 4
            ]
        ]);
    }
}
