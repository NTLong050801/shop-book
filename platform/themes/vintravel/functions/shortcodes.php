<?php

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseQueryBuilder;
use Botble\Blog\Models\Category;
use Botble\Hotel\Repositories\Interfaces\AmenityInterface;
use Botble\Hotel\Repositories\Interfaces\PlaceInterface;
use Botble\Hotel\Repositories\Interfaces\RoomCategoryInterface;
use Botble\Hotel\Repositories\Interfaces\RoomInterface;
use Botble\Hotel\Repositories\Interfaces\TourInterface;
use Botble\Hotel\Repositories\Interfaces\VoucherInterface;
use Botble\Partner\Models\Partner;
use Botble\Partner\Models\PartnerCategory;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Theme\Facades\Theme;
use Botble\Theme\Supports\ThemeSupport;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

app()->booted(function () {
    ThemeSupport::registerGoogleMapsShortcode();
    ThemeSupport::registerYoutubeShortcode();

    if (is_plugin_active('blog')) {
        Shortcode::register('featured-posts', __('Featured posts'), __('Featured posts'), function (ShortcodeCompiler $shortcode) {
            $posts = get_featured_posts((int)$shortcode->limit ?: 5, [
                'author',
                'categories' => function ($query) {
                    $query->limit(1);
                },
            ]);

            return Theme::partial('shortcodes.featured-posts', compact('posts'));
        });

        Shortcode::setAdminConfig('featured-posts', function (array $attributes, string|null $content) {
            return Theme::partial('shortcodes.featured-posts-admin-config', compact('attributes', 'content'));
        });

        Shortcode::register('recent-posts', __('Recent posts'), __('Recent posts'), function (ShortcodeCompiler $shortcode) {
            $posts = get_latest_posts(7, [], ['slugable']);

            return Theme::partial('shortcodes.recent-posts', ['title' => $shortcode->title, 'posts' => $posts]);
        });

        Shortcode::setAdminConfig('recent-posts', function (array $attributes, string|null $content) {
            return Theme::partial('shortcodes.recent-posts-admin-config', compact('attributes', 'content'));
        });

        Shortcode::register('category-posts', __('Category posts'), __('Category posts'), function (ShortcodeCompiler $shortcode) {
            $categories = get_all_categories([], ['posts']);
            return Theme::partial('shortcodes.category-posts', [
                'categories' => $categories,
            ]);
        });

        Shortcode::register(
            'featured-categories-posts',
            __('Featured categories posts'),
            __('Featured categories posts'),
            function (ShortcodeCompiler $shortcode) {
                $with = [
                    'slugable',
                    'posts' => function (BelongsToMany|BaseQueryBuilder $query) {
                        $query
                            ->wherePublished()
                            ->orderByDesc('created_at');
                    },
                    'posts.slugable',
                ];

                if (is_plugin_active('language-advanced')) {
                    $with[] = 'posts.translations';
                }

                $posts = collect();

                if ($categoryId = $shortcode->category_id) {
                    $with['posts'] = function (BelongsToMany|BaseQueryBuilder $query) {
                        $query
                            ->wherePublished()
                            ->orderByDesc('created_at')
                            ->take(6);
                    };

                    $category = Category::query()
                        ->with($with)
                        ->wherePublished()
                        ->where('id', $categoryId)
                        ->select([
                            'id',
                            'name',
                            'description',
                            'icon',
                        ])
                        ->first();

                    if ($category) {
                        $posts = $category->posts;
                    } else {
                        $posts = collect();
                    }
                } else {
                    $categories = get_featured_categories(2, $with);

                    foreach ($categories as $category) {
                        $posts = $posts->merge($category->posts->take(3));
                    }

                    $posts = $posts->sortByDesc('created_at');
                }

                return Theme::partial(
                    'shortcodes.featured-categories-posts',
                    ['title' => $shortcode->title, 'posts' => $posts]
                );
            }
        );

        Shortcode::setAdminConfig('featured-categories-posts', function (array $attributes) {
            $categories = Category::query()
                ->wherePublished()
                ->pluck('name', 'id')
                ->all();

            return Theme::partial(
                'shortcodes.featured-categories-posts-admin-config',
                compact('attributes', 'categories')
            );
        });
    }

    if (is_plugin_active('gallery')) {
        Shortcode::register('all-galleries', __('All Galleries'), __('All Galleries'), function (ShortcodeCompiler $shortcode) {
            return Theme::partial('shortcodes.all-galleries', ['limit' => (int)$shortcode->limit]);
        });

        Shortcode::setAdminConfig('all-galleries', function (array $attributes, string|null $content) {
            return Theme::partial('shortcodes.all-galleries-admin-config', compact('attributes', 'content'));
        });
    }

    if (is_plugin_active('hotel')) {
        add_shortcode(
            'search-advanced',
            'Search Advanced',
            'Search Advanced',
            function ($shortCode) {
                return Theme::partial('shortcodes.search-advanced', [
                    'class' => $shortCode->class,
                ]);
            }
        );

        add_shortcode(
            'search-advanced-content',
            'Search Advanced Content',
            'Search Advanced Content',
            function ($shortCode) {
                $places = app(PlaceInterface::class)->allBy([
                    'status' => BaseStatusEnum::PUBLISHED,
                ]);

                return Theme::partial('shortcodes.search-advanced-content', [
                    'class' => $shortCode->class,
                    'places' => $places,
                ]);
            }
        );

        add_shortcode(
            'all-places',
            'All Places',
            'All Places',
            function () {
                $places = app(PlaceInterface::class)->allBy([
                    'status' => BaseStatusEnum::PUBLISHED,
                    'is_featured' => true,
                ]);

                return Theme::partial('shortcodes.all-places', compact('places'));
            }
        );

        add_shortcode(
            'products-highlight',
            'products-highlight',
            'products-highlight',
            function ($shortCode) {
                $vouchers = app(VoucherInterface::class)->advancedGet([
                    'with' => ['room'],
                    'condition' => [
                        'status' => BaseStatusEnum::PUBLISHED,
                        ['price','<',DB::raw('price_old')],
                    ],
                    'take' => 10,
                ]);
                return Theme::partial('shortcodes.products-highlight', [
                    'vouchers' => $vouchers,
                ]);
            }
        );

        add_shortcode(
            'products-main',
            'products-main',
            'products-main',
            function ($shortCode) {
                switch ($shortCode->type) {
                    case 'tours':
                        $route = route('public.tours');
                        $list = app(TourInterface::class)->advancedGet([
                            'condition' => [
                                'status' => BaseStatusEnum::PUBLISHED,
                            ],
                            'take' => 10,
                        ]);
                        break;
                    default:
                        $route = route('public.rooms');
                        $list = app(RoomInterface::class)->advancedGet([
                            'condition' => [
                                'status' => BaseStatusEnum::PUBLISHED,
                            ],
                            'take' => 10,
                        ]);
                }
                return Theme::partial('shortcodes.products-main', [
                    'class' => $shortCode->class,
                    'title' => $shortCode->title,
                    'type' => $shortCode->type,
                    'route' => $route,
                    'list' => $list,
                ]);
            }
        );

        add_shortcode(
            'receive-email',
            'receive-email',
            'receive-email',
            function ($shortCode) {
                return Theme::partial('shortcodes.receive-email');
            }
        );

        add_shortcode(
            'service-item',
            'service-item',
            'service-item',
            function ($shortCode) {
                return Theme::partial('shortcodes.service-item', [
                    'rtl' => $shortCode->rtl,
                ]);
            }
        );

        add_shortcode(
            'box-highlight',
            'box-highlight',
            'box-highlight',
            function ($shortCode) {
                return Theme::partial('shortcodes.box-highlight', [
                    'rtl' => $shortCode->rtl,
                ]);
            }
        );
    }
    if (is_plugin_active('partner')) {
        add_shortcode(
            'box-partners',
            'box-partners',
            'box-partners',
            function ($shortCode) {
                $categories = PartnerCategory::where('status', BaseStatusEnum::PUBLISHED)->orderBy('order')->get();
                $partners = Partner::with('partnerCategory')
                    ->where('status', BaseStatusEnum::PUBLISHED)
                    ->orderBy('order')
                    ->get();

                $groupedPartners = $partners->groupBy('partner_category_id');

                return Theme::partial('shortcodes.box-partners', [
                    'class' => $shortCode->class,
                    'categories' => $categories,
                    'groupedPartners' => $groupedPartners,
                ]);
            }
        );
    }
});
