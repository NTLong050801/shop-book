<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;

class DatabaseSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->activateAllPlugins();

        $this->call(LanguageSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(AmenitySeeder::class);
        $this->call(RoomCategorySeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(TourSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ThemeOptionSeeder::class);
        $this->call(MainMenuSeeder::class);
        $this->call(SidebarPostWidgetSeeder::class);
        $this->call(SidebarWidgetSeeder::class);
        $this->call(PartnerSeeder::class);
    }
}
