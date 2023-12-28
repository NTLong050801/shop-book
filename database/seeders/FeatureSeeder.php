<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Hotel\Models\Feature;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends BaseSeeder
{
    public function run(): void
    {
        Feature::query()->truncate();

        $features = [
            [
                'name' => 'Bải biển riêng',
            ],
            [
                'name' => 'Phòng rộng',
            ],
            [
                'name' => 'Khu vui chơi',
            ],
        ];

        foreach ($features as $feature) {
            Feature::query()->create($feature);
        }
    }
}
