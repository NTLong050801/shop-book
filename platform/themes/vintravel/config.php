<?php

use Botble\Theme\Theme;

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials" and "views"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these events can be overridden by package config.
    |
    */

    'events' => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function ($theme) {
            // You can remove this line anytime.
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function (Theme $theme) {
            // Partial composer.
            // $theme->partialComposer('header', function($view) {
            //     $view->with('auth', \Auth::user());
            // });

            // You may use this event to set up your assets.
            $theme->asset()->usePath()->add('bootstrap', 'css/bootstrap.min.css');
            $theme->asset()->add('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
            $theme->asset()->usePath()->add('swiper', 'css/swiper-bundle.min.css');
            $theme->asset()->usePath()->add('daterangepicker', 'css/daterangepicker.css');
            $theme->asset()->usePath()->add('styles', 'css/styles.css');
            $theme->asset()->add('select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');

            $theme->asset()->container('footer')->add('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js');
            $theme->asset()->container('footer')->usePath()->add('bootstrap', 'js/bootstrap.bundle.min.js');
            $theme->asset()->container('footer')->usePath()->add('swiper', 'js/swiper-bundle.min.js');
            $theme->asset()->container('footer')->usePath()->add('moment', 'js/moment.min.js');
            $theme->asset()->container('footer')->usePath()->add('daterangepicker', 'js/daterangepicker.js');
            $theme->asset()->container('footer')->usePath()->add('double-range', 'js/double-range.js');
            $theme->asset()->container('footer')->usePath()->add('main', 'js/main.js');
            $theme->asset()->container('footer')->usePath()->add('booking', 'js/booking.js');
            $theme->asset()->container('footer')->add('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js');

            if (function_exists('shortcode')) {
                $theme->composer(['page', 'post'], function (\Botble\Shortcode\View\View $view) {
                    $view->withShortcodes();
                });
            }
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [

            'default' => function ($theme) {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            }
        ]
    ]
];
