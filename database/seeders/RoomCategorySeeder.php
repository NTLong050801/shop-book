<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Hotel\Models\RoomCategory;
use Illuminate\Support\Facades\DB;

class RoomCategorySeeder extends BaseSeeder
{
    public function run(): void
    {
        RoomCategory::query()->truncate();

        $roomCategories = [
            [
                'name' => 'Khu nghỉ dưỡng (Resort)',
            ],
            [
                'name' => 'Khách sạn(Hotel)',
            ],
            [
                'name' => 'Căn hộ(Apartment)',
            ],
            [
                'name' => 'Biệt thự (Villa)',
            ],
            [
                'name' => 'Du thuyền (Cruise)',
            ],
        ];

        foreach ($roomCategories as $roomCategory) {
            RoomCategory::query()->create($roomCategory);
        }
    }
}
