<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HostelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hostels')->insert([
            [
                'hostel_name' => 'Greenwood Hostel',
                'hostel_image_path' => 'images/greenwood.jpg',
                'hostel_location' => 'Karachi',
                'hostel_description' => 'A comfortable and affordable hostel in Karachi.',
                'no_of_rooms' => 10,
                'room_price' => 50.00,
                'owner_id' => 1,
            ],
            [
                'hostel_name' => 'Sunrise Hostel',
                'hostel_image_path' => 'images/sunrise.jpg',
                'hostel_location' => 'Lahore',
                'hostel_description' => 'A modern hostel in the heart of Lahore.',
                'no_of_rooms' => 15,
                'room_price' => 60.00,
                'owner_id' => 2,
            ],
            [
                'hostel_name' => 'City Center Hostel',
                'hostel_image_path' => 'images/citycenter.jpg',
                'hostel_location' => 'Islamabad',
                'hostel_description' => 'Conveniently located hostel in Islamabad.',
                'no_of_rooms' => 20,
                'room_price' => 55.00,
                'owner_id' => 3,
            ],
            [
                'hostel_name' => 'Seaview Hostel',
                'hostel_image_path' => 'images/seaview.jpg',
                'hostel_location' => 'Karachi',
                'hostel_description' => 'Hostel with a beautiful sea view in Karachi.',
                'no_of_rooms' => 12,
                'room_price' => 65.00,
                'owner_id' => 4,
            ],
            [
                'hostel_name' => 'Mountain View Hostel',
                'hostel_image_path' => 'images/mountainview.jpg',
                'hostel_location' => 'Murree',
                'hostel_description' => 'Peaceful hostel with a view of the mountains.',
                'no_of_rooms' => 8,
                'room_price' => 70.00,
                'owner_id' => 5,
            ],
        ]);
    }
}
