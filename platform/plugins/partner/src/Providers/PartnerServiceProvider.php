<?php

namespace Botble\Partner\Providers;

use Botble\Partner\Models\Partner;
use Botble\Base\Facades\DashboardMenu;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Base\Supports\ServiceProvider;
use Illuminate\Routing\Events\RouteMatched;

class PartnerServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/partner')
            ->loadHelpers()
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes();

        if (defined('LANGUAGE_ADVANCED_MODULE_SCREEN_NAME')) {
            \Botble\LanguageAdvanced\Supports\LanguageAdvancedManager::registerModule(Partner::class, [
                'name',
            ]);
            \Botble\LanguageAdvanced\Supports\LanguageAdvancedManager::registerModule(\Botble\Partner\Models\PartnerCategory::class, [
                'name',
            ]);
        }

        $this->app['events']->listen(RouteMatched::class, function () {
            DashboardMenu::registerItem([
                'id' => 'cms-plugins-partner',
                'priority' => 5,
                'parent_id' => null,
                'name' => 'plugins/partner::partner.name',
                'icon' => 'fa-regular fa-handshake',
                'url' => route('partner.index'),
                'permissions' => ['partner.index'],
            ]);
            \Botble\Base\Facades\DashboardMenu::registerItem([
                'id' => 'cms-plugins-partner-list',
                'priority' => 1,
                'parent_id' => 'cms-plugins-partner',
                'name' => 'plugins/partner::partner.name',
                'icon' => null,
                'url' => route('partner.index'),
                'permissions' => ['partner.index'],
            ]);
            \Botble\Base\Facades\DashboardMenu::registerItem([
                'id' => 'cms-plugins-partner-category',
                'priority' => 0,
                'parent_id' => 'cms-plugins-partner',
                'name' => 'plugins/partner::partner-category.name',
                'icon' => null,
                'url' => route('partner-category.index'),
                'permissions' => ['partner-category.index'],
            ]);
        });
    }
}
