<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="icon" href="images/favicon.png"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! Theme::partial('head') !!}
</head>

<body>

{!! Theme::partial('main-menu') !!}

{!! Theme::content() !!}

<!-- Footer -->
<div class="footer">
    <div class="inner-main">
        <div class="container">
            <div class="inner-wrap">
                <div class="inner-box">
                    <div class="inner-title">
                        CÔNG TY CỔ PHẦN VINTRAVEL
                    </div>
                    <div class="inner-list">
                        <div class="inner-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span><b>VP Hà Nội:</b> Tầng 2, toà nhà Văn Phòng Số 122A phố Trịnh Đình Cửu, Phường Định Công, Quận Hoàng Mai, TP. Hà Nội</span>
                        </div>
                        <div class="inner-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span><b>VP Hạ Long:</b> Biệt thự liền kề số 01 đường San Hô II, Green Bay Garden Hạ Long, Quảng Ninh</span>
                        </div>
                        <div class="inner-item">
                            <i class="fa-solid fa-phone"></i>
                            <span>092 169 7777 | 092 183 6789</span>
                        </div>
                        <div class="inner-item">
                            <i class="fa-solid fa-envelope"></i>
                            <span>info@vintrveljsc.com</span>
                        </div>
                    </div>
                </div>
                <div class="inner-box">
                    <div class="inner-title">
                        Dịch vụ
                    </div>
                    {!!
                           Menu::renderMenuLocation('footer-menu', [
                               'options' => [],
                               'theme'   => true,
                               'view' => 'footer-menu',
                            ])
                    !!}
                </div>
                <div class="inner-box">
                    <div class="inner-title">
                        Kết nối với Vintravel
                    </div>

                    <div class="inner-socials">
                        <ul>
                            <li><a href="mailto:{{ theme_option('email') }}"><i class="fa-solid fa-envelope"></i></a></li>
                            @foreach(json_decode(theme_option('social_links')) as $item)
                                <li><a href="{{$item[2]->value}}" target="_blank"><i class="{{$item[1]->value}}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="inner-images">
                        @if(theme_option('image_footer_dmca'))
                            <a href="#" target="_blank">
                                <img src="{{ Theme::asset()->url('images/core/dmca@2x.png') }}" alt="">
                            </a>
                        @endif
                        @if(theme_option('image_footer_moiat'))
                            <a href="#" target="_blank">
                                <img src="{{ Theme::asset()->url('images/core/da-thong-bao-bo-cong-thuong@2x.png') }}" alt="">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="inner-copyright">
        COPYRIGHT © 2023 VINTRAVELJSC. ALL RIGHTS RESERVED
    </div>
</div>
<!-- Hết Footer -->

{!! Theme::partial('footer') !!}

<script
    type="text/javascript"
    src="{{ asset('vendor/core/core/js-validation/js/js-validation.js') }}"
></script>
{!! JsValidator::formRequest(\Botble\Member\Http\Requests\LoginRequest::class) !!}
</body>

</html>
