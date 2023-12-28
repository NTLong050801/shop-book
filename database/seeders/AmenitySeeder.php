<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Hotel\Models\Amenity;
use Illuminate\Support\Facades\DB;

class AmenitySeeder extends BaseSeeder
{
    public function run(): void
    {
        Amenity::query()->truncate();

        $amenities = [
            [
                'name' => 'Bãi đậu xe ô tô tại khách sạn',
                'is_featured' => true,
            ],
            [
                'name' => 'Dịch vụ dọn phòng',
                'is_featured' => true,
            ],
            [
                'name' => 'Hồ bơi',
                'is_featured' => true,
            ],
            [
                'name' => 'Khu vui chơi ngoài trời',
                'is_featured' => true,
            ],
            [
                'name' => 'Business Center',
                'is_featured' => true,
            ],
            [
                'name' => 'Phòng họp',
                'is_featured' => true,
            ],
            [
                'name' => 'Quầy bar rooftop',
                'is_featured' => true,
            ],
            [
                'name' => 'Hồ bơi ngoài trời',
                'is_featured' => true,
            ],
            [
                'name' => 'Khu vui chơi trẻ em',
                'is_featured' => true,
            ],
            [
                'name' => 'Business Center',
                'is_featured' => true,
            ],
            [
                'name' => 'Phòng gia đình',
                'is_featured' => true,
            ],
            [
                'name' => 'Quầy bar cạnh bể bơi',
            ],
            [
                'name' => 'Trạm sạc xe điện',
            ],
            [
                'name' => 'Dịch vụ chăm sóc trẻ em',
            ],
            [
                'name' => 'Jacuzzi',
            ],
            [
                'name' => 'Dịch vụ giặt ủi',
            ],
            [
                'name' => 'Sân chơi golf',
            ],
        ];

        foreach ($amenities as $amenity) {
            Amenity::query()->create($amenity);
        }
    }
}
