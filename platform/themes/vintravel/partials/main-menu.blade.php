<?php
$excepts = ['/', 'booking/{token}'];

$classHeader = match (request()->route()->uri) {
    '/' => 'header-absolute header-white header-fixed',
    'booking/{token}' => '',
    default => 'header-padding-bottom',
};
?>

    <!-- Header -->
<header class="header {{ $classHeader }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="inner-wrap">
                    {!!
                         Menu::renderMenuLocation('header-menu', [
                             'options' => [],
                             'theme' => true,
                             'view' => 'custom-main-menu',
                         ])
                    !!}
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header -->

<!-- MenuSider -->
<div class="menu-sider" id="menuSider">
    <div class="inner-list">
        <button class="inner-close" id="buttonCloseMenu">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="inner-label">
            Menu
        </div>
        <ul>
            {!!
                 Menu::renderMenuLocation('side-menu', [
                     'options' => [],
                     'theme'   => true,
                 ])
            !!}
        </ul>
    </div>
    <div class="inner-overlay" id="menuOverlay"></div>
</div>
<!-- End MenuSider -->

<!-- Member Popup -->
{!! Theme::partial('member.login-popup') !!}
{!! Theme::partial('member.register-popup') !!}

<!-- Search Advanced -->
@if(!in_array(request()->route()->uri, $excepts))
    {!! do_shortcode('[search-advanced class="search-advanced-header"][/search-advanced]') !!}
@endif
<!-- End Search Advanced -->
