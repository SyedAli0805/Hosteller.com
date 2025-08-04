<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'admin_name' => 'Ayesha Ali',
                'admin_email' => 'ayesha.ali@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'admin_name' => 'Fatima Khan',
                'admin_email' => 'fatima.khan@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'admin_name' => 'Omar Ahmed',
                'admin_email' => 'omar.ahmed@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'admin_name' => 'Zainab Hassan',
                'admin_email' => 'zainab.hassan@example.com',
                'password' => Hash::make('password123')
            ],
            [
                'admin_name' => 'Ali Javed',
                'admin_email' => 'ali.javed@example.com',
                'password' => Hash::make('password123')
            ],
        ]);
    }
}
