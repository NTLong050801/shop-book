<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Setting\Models\Setting as SettingModel;
use Botble\Theme\Facades\Theme;

class ThemeOptionSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->uploadFiles('core');
        $this->uploadFiles('banner');

        $theme = Theme::getThemeName();

        SettingModel::query()->insertOrIgnore([
            [
                'key' => 'show_admin_bar',
                'value' => '1',
            ],
            [
                'key' => 'theme',
                'value' => $theme,
            ],
            [
                'key' => 'admin_logo',
                'value' => 'core/logo.png',
            ],
            [
                'key' => 'admin_favicon',
                'value' => 'core/favicon.png',
            ],
        ]);

        $data = [
            [
                'key' => 'site_title',
                'value' => 'VinTravel',
            ],
            [
                'key' => 'copyright',
                'value' => '©' . now()->format('Y') . ' VinTravel. All right reserved.',
            ],
            [
                'key' => 'cookie_consent_message',
                'value' => 'Trải nghiệm của bạn trên trang này sẽ được cải thiện bằng cách cho phép cookie ',
            ],
            [
                'key' => 'cookie_consent_learn_more_url',
                'value' => url('cookie-policy'),
            ],
            [
                'key' => 'cookie_consent_learn_more_text',
                'value' => 'Chính sách cookie',
            ],
            [
                'key' => 'homepage_id',
                'value' => '0',
            ],
            [
                'key' => 'blog_page_id',
                'value' => '2',
            ],
            [
                'key' => 'logo',
                'value' => 'core/logo.png',
            ],
            [
                'key' => 'logo_white',
                'value' => 'core/logo.png',
            ],
            [
                'key' => 'favicon',
                'value' => 'core/favicon.png',
            ],
            [
                'key' => 'email',
                'value' => 'info@vintrveljsc.com',
            ],
            [
                'key' => 'address',
                'value' => 'Tầng 2, toà nhà Văn Phòng Số 122A phố Trịnh Đình Cửu, Phường Định Công, Quận Hoàng Mai, TP. Hà Nội',
            ],
            [
                'key' => 'hotline',
                'value' => '092 169 7777',
            ],
            [
                'key' => 'term_of_use_url',
                'value' => '#',
            ],
            [
                'key' => 'privacy_policy_url',
                'value' => '#',
            ],
            [
                'key' => 'preloader_enabled',
                'value' => 'no',
            ],
        ];

        SettingModel::query()->whereIn('key', collect($data)->pluck('key'))->delete();

        foreach ($data as $item) {
            $item['key'] = 'theme-' . $theme . '-' . $item['key'];

            SettingModel::query()->insertOrIgnore($item);
        }

        $socialLinks = [
            [
                [
                    'key' => 'social-name',
                    'value' => 'Facebook',
                ],
                [
                    'key' => 'social-icon',
                    'value' => 'fab fa-facebook-f',
                ],
                [
                    'key' => 'social-url',
                    'value' => 'https://www.facebook.com/',
                ],
            ],
            [
                [
                    'key' => 'social-name',
                    'value' => 'Twitter',
                ],
                [
                    'key' => 'social-icon',
                    'value' => 'fab fa-twitter',
                ],
                [
                    'key' => 'social-url',
                    'value' => 'https://www.twitter.com/',
                ],
            ],
            [
                [
                    'key' => 'social-name',
                    'value' => 'Youtube',
                ],
                [
                    'key' => 'social-icon',
                    'value' => 'fab fa-youtube',
                ],
                [
                    'key' => 'social-url',
                    'value' => 'https://www.youtube.com/',
                ],
            ],
            [
                [
                    'key' => 'social-name',
                    'value' => 'Behance',
                ],
                [
                    'key' => 'social-icon',
                    'value' => 'fab fa-behance',
                ],
                [
                    'key' => 'social-url',
                    'value' => 'https://www.behance.com/',
                ],
            ],
            [
                [
                    'key' => 'social-name',
                    'value' => 'Linkedin',
                ],
                [
                    'key' => 'social-icon',
                    'value' => 'fab fa-linkedin',
                ],
                [
                    'key' => 'social-url',
                    'value' => 'https://www.linkedin.com/',
                ],
            ],
        ];

        SettingModel::query()->insertOrIgnore([
            'key' => 'theme-' . $theme . '-social_links',
            'value' => json_encode($socialLinks),
        ]);
        SettingModel::query()->where('key', 'LIKE', 'theme-' . $theme . '-image_footer_dmca')->delete();
        SettingModel::query()->insertOrIgnore([
            'key' => 'theme-' . $theme . '-image_footer_dmca',
            'value' => true,
        ]);
        SettingModel::query()->where('key', 'LIKE', 'theme-' . $theme . '-image_footer_moiat')->delete();
        SettingModel::query()->insertOrIgnore([
            'key' => 'theme-' . $theme . '-image_footer_moiat',
            'value' => true,
        ]);

        SettingModel::query()->where('key', 'LIKE', 'theme-' . $theme . '-slider-%')->delete();

        SettingModel::query()->insertOrIgnore([
            [
                'key' => 'theme-' . $theme . '-slider-image-1',
                'value' => 'banner/banner-1.jpg',
            ],
            [
                'key' => 'theme-' . $theme . '-slider-title-1',
                'value' => 'Trải Nghiệm Kỳ Nghỉ Xứng Tầm',
            ],
            [
                'key' => 'theme-' . $theme . '-slider-description-1',
                'value' => 'Khách Sạn & Nghỉ Dưỡng | Tour | Combo Du Lịch',
            ],

            [
                'key' => 'theme-' . $theme . '-slider-image-2',
                'value' => 'banner/banner-2.jpg',
            ],
            [
                'key' => 'theme-' . $theme . '-slider-title-2',
                'value' => 'Trải Nghiệm Kỳ Nghỉ Xứng Tầm',
            ],
            [
                'key' => 'theme-' . $theme . '-slider-description-2',
                'value' => 'Khách Sạn & Nghỉ Dưỡng | Tour | Combo Du Lịch',
            ],

            [
                'key' => 'theme-' . $theme . '-slider-image-3',
                'value' => 'banner/banner-3.jpg',
            ],
            [
                'key' => 'theme-' . $theme . '-slider-title-3',
                'value' => 'Trải Nghiệm Kỳ Nghỉ Xứng Tầm',
            ],
            [
                'key' => 'theme-' . $theme . '-slider-description-3',
                'value' => 'Khách Sạn & Nghỉ Dưỡng | Tour | Combo Du Lịch',
            ],
        ]);
    }
}
