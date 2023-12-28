<?php

namespace Database\Seeders;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Hotel\Repositories\Interfaces\AmenityInterface;
use Botble\Hotel\Repositories\Interfaces\PlaceInterface;
use Botble\Hotel\Repositories\Interfaces\RoomCategoryInterface;
use Botble\Theme\Facades\Theme;
use Botble\Widget\Facades\WidgetGroup;
use Botble\Widget\Models\Widget as WidgetModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SidebarWidgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WidgetGroup::setGroup([
            'id' => 'hotel_sidebar',
            'name' => trans('packages/widget::widget.hotel_sidebar'),
            'description' => trans('packages/widget::widget.hotel_sidebar_description'),
        ]);

        $amenities = app(AmenityInterface::class)->allBy([
            'status' => BaseStatusEnum::PUBLISHED,
        ])->pluck('id')->toArray();
        $categories = app(RoomCategoryInterface::class)->allBy([
            'status' => BaseStatusEnum::PUBLISHED,
        ])->pluck('id')->toArray();
        $places = app(PlaceInterface::class)->allBy([
            'status' => BaseStatusEnum::PUBLISHED,
        ])->pluck('id')->toArray();
        $data = [
            [
                'widget_id' => 'HotlineWidget',
                'sidebar_id' => 'hotel_sidebar',
                'position' => 0,
                'data' => [
                    'id' => 'HotlineWidget',
                    'title' => 'HỖ TRỢ 24/71',
                ],
            ],
            [
                'widget_id' => 'FilterPricingWidget',
                'sidebar_id' => 'hotel_sidebar',
                'position' => 0,
                'data' => [
                    'id' => 'FilterPricingWidget',
                    'title' => 'Ngân sách của bạn (mỗi đêm)',
                ],
            ],
            [
                'widget_id' => 'FilterHotelAmenitiesWidget',
                'sidebar_id' => 'hotel_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'FilterHotelAmenitiesWidget',
                    'title' => 'Các bộ lọc phổ biến',
                    'amenities' => $amenities,
                ],
            ],
            [
                'widget_id' => 'FilterHotelCategoriesWidget',
                'sidebar_id' => 'hotel_sidebar',
                'position' => 2,
                'data' => [
                    'id' => 'FilterHotelCategoriesWidget',
                    'title' => 'Loại hình chỗ ở',
                    'categories' => $categories,
                ],
            ],
            [
                'widget_id' => 'FilterPlaceWidget',
                'sidebar_id' => 'hotel_sidebar',
                'position' => 3,
                'data' => [
                    'id' => 'FilterPlaceWidget',
                    'title' => 'Khu vực',
                    'places' => $places,
                ],
            ],
            [
                'widget_id' => 'HotlineWidget',
                'sidebar_id' => 'tour_sidebar',
                'position' => 0,
                'data' => [
                    'id' => 'HotlineWidget',
                    'title' => 'HỖ TRỢ 24/71',
                ],
            ],
            [
                'widget_id' => 'FilterPricingWidget',
                'sidebar_id' => 'tour_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'FilterPricingWidget',
                    'title' => 'Ngân sách của bạn (mỗi đêm)',
                ],
            ],
            [
                'widget_id' => 'FilterPlaceWidget',
                'sidebar_id' => 'tour_sidebar',
                'position' => 2,
                'data' => [
                    'id' => 'FilterPlaceWidget',
                    'title' => 'Khu vực',
                    'places' => $places,
                ],
            ],
        ];
        $theme = Theme::getThemeName();
        foreach ($data as $item) {
            $item['theme'] = $theme;
            WidgetModel::query()->create($item);
        }

    }
}
