<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Hotel\Models\Place;
use Botble\Slug\Models\Slug;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Botble\Slug\Facades\SlugHelper;

class PlaceSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('places');

        Place::query()->truncate();

        $places = [
            [
                'name' => 'Đà Nẵng',
                'image' => 'places/da-nang.jpg',
                'is_featured' => true,
            ],
            [
                'name' => 'Hạ Long',
                'image' => 'places/ha-long.jpg',
                'is_featured' => true,
            ],
            [
                'name' => 'Nha Trang',
                'image' => 'places/nha-trang.jpg',
                'is_featured' => true,
            ],
            [
                'name' => 'Phú Quốc',
                'image' => 'places/phu-quoc.jpg',
                'is_featured' => true,
            ],
            [
                'name' => 'Sapa',
                'image' => 'places/sapa.jpg',
                'is_featured' => true,
            ],
        ];

        foreach ($places as $place) {
            Place::query()->create($place);
        }
    }
}
