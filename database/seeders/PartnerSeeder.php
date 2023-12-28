<?php

namespace Database\Seeders;

use Botble\Partner\Models\Partner;
use Botble\Partner\Models\PartnerCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partner::query()->delete();
        PartnerCategory::query()->delete();
        $categoriesPartner = [
            [
                'name' => 'KHÁCH SẠN',
                'description' => 'Vintravel hợp tác với các chuỗi khách sạn trên toàn thế giới để bảo đảm mang lại kỳ nghỉ tuyệt vời nhất tại mọi điểm đến.',
                'order' => 0,
            ],

            [
                'name' => 'HÀNG KHÔNG',
                'description' => 'Những đối tác hàng không toàn cầu sẽ chắp cánh đưa bạn đến mọi địa điểm trên thế giới.',
                'order' => 1,
            ]
        ];
        $partners = [
            0 => [
                [
                    'name' => 'Melia',
                    'logo' => 'banner/melia.png',
                ],
                [
                    'name' => 'IHG',
                    'logo' => 'banner/ihg-hotels.png',
                ],
                [
                    'name' => 'The ascott',
                    'logo' => 'banner/the-ascott-limited.png',
                ],
                [
                    'name' => 'Vinpearl',
                    'logo' => 'banner/vinpearl.jpg',
                ],
                [
                    'name' => 'Marriott',
                    'logo' => 'banner/MAR.png',
                ],
                [
                    'name' => 'FLC Group',
                    'logo' => 'banner/flc.png',
                ],
            ],
            1 => [
                [
                    'name' => 'Pacific airline',
                    'logo' => 'banner/Pacific-airlines.png',
                ],
                [
                    'name' => 'Bamboo',
                    'logo' => 'banner/Logo-Bamboo-Airways-V.png',
                ],
                [
                    'name' => 'Viet travel',
                    'logo' => 'banner/vietravel.png',
                ],
                [
                    'name' => 'Vietjet',
                    'logo' => 'banner/Vietjet.png',
                ],
                [
                    'name' => 'Singapore Airline',
                    'logo' => 'banner/sg-airlines.png',
                ],
                [
                    'name' => 'VietNam airline',
                    'logo' => 'banner/vn-air-logo.png',
                ],
            ]
        ];

        foreach ($categoriesPartner as $key => $categoryPartner) {
            $category = PartnerCategory::create([
                'name' => $categoryPartner['name'],
                'description' => $categoryPartner['description'],
                'order' => $categoryPartner['order'],
            ]);
            foreach ($partners[$key] as $index => $partnerArray) {
                Partner::create([
                    'name' => $partnerArray['name'],
                    'logo' => $partnerArray['logo'],
                    'partner_category_id' => $category->id,
                    'order' => $index,
                ]);
            }
        }

    }
}
