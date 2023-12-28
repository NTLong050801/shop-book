<?php

namespace Database\Seeders;

use Botble\Theme\Facades\Theme;
use Botble\Widget\Models\Widget as WidgetModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SidebarPostWidgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WidgetModel::query()->where('sidebar_id','posts_sidebar')->delete();
        $data = [
            [
                'widget_id' => 'ArticlesViewListWidget',
                'sidebar_id' => 'posts_sidebar',
                'position' => 0,
                'data' => [
                    'id' => 'ArticlesViewListWidget',
                    'name' => 'BÀI VIẾT NỔI BẬT',
                ],
            ],
            [
                'widget_id' => 'BoxBannerWidget',
                'sidebar_id' => 'posts_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'BoxBannerWidget',
                    'name' => 'ƯU ĐÃI GIÁ SHOCK',
                    'images' => 'banner/uu-dai.jpg',
                    'url' => '#'
                ],
            ],
            [
                'widget_id' => 'BoxTagsHighlightWidget',
                'sidebar_id' => 'posts_sidebar',
                'position' => 2,
                'data' => [
                    'id' => 'BoxTagsHighlightWidget',
                    'name' => 'CHỦ ĐỀ YÊU THÍCH',
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
