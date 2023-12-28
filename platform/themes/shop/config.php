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
            $theme->setTitle('Copyright ©  2024 - ShopBook');
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
            $theme->asset()->usePath()->add('carousel', 'css/owl.carousel.min.css');
            $theme->asset()->usePath()->add('slick', 'css/slick.css');
            $theme->asset()->usePath()->add('magnific-popup', 'css/magnific-popup.css');
            $theme->asset()->usePath()->add('font-awesome', 'css/font.awesome.css');
            $theme->asset()->usePath()->add('ionicons-icons', 'css/ionicons.min.css');
            $theme->asset()->usePath()->add('simple-line-icons', 'css/simple-line-icons.css');
            $theme->asset()->usePath()->add('animate', 'css/animate.css');
            $theme->asset()->usePath()->add('jquery-ui', 'css/jquery-ui.min.css');
            $theme->asset()->usePath()->add('slinky-menu', 'css/slinky.menu.css');
            $theme->asset()->usePath()->add('plugins', 'css/plugins.css');
            $theme->asset()->usePath()->add('style', 'css/style.css');

//            $theme->asset()->container('footer')->add('jquery', 'libraries/jquery.min.js');
            $theme->asset()->container('footer')->usePath()->add('script', 'js/vendor/modernizr-3.7.1.min.js');
            $theme->asset()->container('footer')->usePath()->add('jquery-render', 'js/vendor/jquery-3.4.1.min.js');
            $theme->asset()->container('footer')->usePath()->add('popper', 'js/popper.js');
            $theme->asset()->container('footer')->usePath()->add('bootstrap', 'js/bootstrap.min.js');
            $theme->asset()->container('footer')->usePath()->add('carousel', 'js/owl.carousel.min.js');
            $theme->asset()->container('footer')->usePath()->add('slick', 'js/slick.min.js');
            $theme->asset()->container('footer')->usePath()->add('magnific-popup', 'js/jquery.magnific-popup.min.js');
            $theme->asset()->container('footer')->usePath()->add('counterup', 'js/jquery.counterup.min.js');
            $theme->asset()->container('footer')->usePath()->add('countdown', 'js/jquery.countdown.js');

            $theme->asset()->container('footer')->usePath()->add('jquery-ui', 'js/jquery.ui.js');
            $theme->asset()->container('footer')->usePath()->add('elevatezoom', 'js/jquery.elevatezoom.js');
            $theme->asset()->container('footer')->usePath()->add('isotope-pkgd', 'js/isotope.pkgd.min.js');
            $theme->asset()->container('footer')->usePath()->add('slinky-menu', 'js/slinky.menu.js');
            $theme->asset()->container('footer')->usePath()->add('plugins', 'js/plugins.js');

            $theme->asset()->container('footer')->usePath()->add('script', 'js/script.js');
            $theme->asset()->container('footer')->usePath()->add('main', 'js/main.js');



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
