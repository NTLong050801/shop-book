<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Language\Models\LanguageMeta;
use Botble\Menu\Models\Menu as MenuModel;
use Botble\Menu\Models\MenuLocation;
use Botble\Menu\Models\MenuNode;
use Botble\Page\Models\Page;
use Illuminate\Support\Arr;
use Botble\Menu\Facades\Menu;

class MainMenuSeeder extends BaseSeeder
{
    public function run(): void
    {
        $data = [
            'vi' => [
                [
                    'name' => 'Menu trên cùng',
                    'slug' => 'menu-tren-cung',
                    'location' => 'header-menu',
                    'items' => [
                        [
                            'title' => 'Ưu đãi',
                            'url' => '/rooms?type=promotion',
                        ],
                        [
                            'title' => 'COMBO DU LỊCH',
                            'url' => '/tours',
                        ],
                        [
                            'title' => 'KHÁCH SẠN & NGHỈ DƯỠNG',
                            'url' => '/rooms',
                        ],
                        [
                            'title' => 'VÉ MÁY BAY',
                            'url' => '/#',
                        ],
                    ],
                ],
                [
                    'name' => 'Menu trái',
                    'slug' => 'menu-trai',
                    'location' => 'side-menu',
                    'items' => [
                        [
                            'title' => 'Trang chủ',
                            'url' => '/',
                        ],
                        [
                            'title' => 'Ưu đãi',
                            'url' => '/rooms?type=promotion',
                        ],
                        [
                            'title' => 'KHÁCH SẠN & NGHỈ DƯỠNG',
                            'url' => '/rooms',
                        ],
                        [
                            'title' => 'COMBO DU LỊCH',
                            'url' => '/tours',
                        ],
                        [
                            'title' => 'VÉ MÁY BAY',
                            'url' => '/#',
                        ],
                        [
                            'title' => 'Tin tức',
                            'reference_id' => 2,
                            'reference_type' => Page::class,
                        ],
                    ],
                ],
                [
                    'name' => 'Menu dưới cùng',
                    'slug' => 'menu-duoi-cung',
                    'location' => 'footer-menu',
                    'items' => [
                        [
                            'title' => 'KHÁCH SẠN & NGHỈ DƯỠNG',
                            'url' => '/rooms',
                        ],
                        [
                            'title' => 'Ưu đãi',
                            'url' => '/rooms?type=promotion',
                        ],
                        [
                            'title' => 'COMBO DU LỊCH',
                            'url' => '/tours',
                        ],
                        [
                            'title' => 'VÉ VUI CHƠI',
                            'url' => '/#',
                        ],
                        [
                            'title' => 'VÉ MÁY BAY',
                            'url' => '/#',
                        ],
                        [
                            'title' => 'VISA',
                            'url' => '/#',
                        ],
                    ],
                ],
            ],
        ];

        MenuModel::query()->truncate();
        MenuLocation::query()->truncate();
        MenuNode::query()->truncate();
        LanguageMeta::query()->where('reference_type', MenuModel::class)->delete();
        LanguageMeta::query()->where('reference_type', MenuLocation::class)->delete();

        foreach ($data as $locale => $menus) {
            foreach ($menus as $index => $item) {
                $menu = MenuModel::query()->create(Arr::except($item, ['items', 'location']));

                if (isset($item['location'])) {
                    $menuLocation = MenuLocation::query()->create([
                        'menu_id' => $menu->id,
                        'location' => $item['location'],
                    ]);

                    $originValue = LanguageMeta::query()->where([
                        'reference_id' => $locale == 'en_US' || !is_int($menu->id) ? $menu->id : $menu->id + 3,
                        'reference_type' => MenuLocation::class,
                    ])->value('lang_meta_origin');

                    LanguageMeta::saveMetaData($menuLocation, $locale, $originValue);
                }

                foreach ($item['items'] as $menuNode) {
                    $this->createMenuNode($index, $menuNode, $locale, $menu->id);
                }

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::query()->where([
                        'reference_id' => $index + 1,
                        'reference_type' => MenuModel::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($menu, $locale, $originValue);
            }
        }

        Menu::clearCacheMenuItems();
    }

    protected function createMenuNode(int $index, array $menuNode, string $locale, int|string $menuId, int|string $parentId = 0): void
    {
        $menuNode['menu_id'] = $menuId;
        $menuNode['parent_id'] = $parentId;

        if (isset($menuNode['url'])) {
            $menuNode['url'] = str_replace(url(''), '', $menuNode['url']);
        }

        if (Arr::has($menuNode, 'children')) {
            $children = $menuNode['children'];
            $menuNode['has_child'] = true;

            unset($menuNode['children']);
        } else {
            $children = [];
            $menuNode['has_child'] = false;
        }

        $createdNode = MenuNode::query()->create($menuNode);

        if ($children) {
            foreach ($children as $child) {
                $this->createMenuNode($index, $child, $locale, $menuId, $createdNode->id);
            }
        }
    }
}
