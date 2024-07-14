<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            [
                'check_in' => '2024-06-01',
                'check_out' => '2024-06-10',
                'no_of_rooms' => 2,
                'status' => 'confirmed',
                'hostel_id' => 1,
                'user_id' => 1,
            ],
            [
                'check_in' => '2024-06-15',
                'check_out' => '2024-06-20',
                'no_of_rooms' => 1,
                'status' => 'pending',
                'hostel_id' => 2,
                'user_id' => 2,
            ],
            [
                'check_in' => '2024-07-01',
                'check_out' => '2024-07-05',
                'no_of_rooms' => 3,
                'status' => 'confirmed',
                'hostel_id' => 3,
                'user_id' => 3,
            ],
            [
                'check_in' => '2024-07-10',
                'check_out' => '2024-07-15',
                'no_of_rooms' => 1,
                'status' => 'canceled',
                'hostel_id' => 4,
                'user_id' => 4,
            ],
            [
                'check_in' => '2024-08-01',
                'check_out' => '2024-08-10',
                'no_of_rooms' => 2,
                'status' => 'confirmed',
                'hostel_id' => 1,
                'user_id' => 5,
            ],
        ]);
    }
}
