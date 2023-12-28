<!-- Slider Main -->
<div class="swiper slider-main sliderMainJS">
    <div class="swiper-wrapper">
        @for ($i = 1; $i <= 5; $i++)
            @if (theme_option('slider-image-' . $i))
                <div class="swiper-slide">
                    <div class="inner-item">
                        <img src="{{ RvMedia::getImageUrl(theme_option('slider-image-' . $i))  }}" alt="">
                        <div class="inner-box">
                            <div class="container">
                                <div class="inner-content">
                                    <div class="inner-title">
                                        {{ html_entity_decode(theme_option('slider-title-' . $i)) }}
                                    </div>
                                    <div class="inner-desc">
                                        {{ html_entity_decode(theme_option('slider-description-' . $i)) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endfor
    </div>
    <div class="swiper-pagination-vertical">
        <div class="inner-line"></div>
        <div class="swiper-pagination swiper-pagination-white"></div>
    </div>
</div>
<!-- End Slider Main -->

<!-- Search Advanced -->
{!! do_shortcode('[search-advanced]') !!}
<!-- End Search Advanced -->

<!-- Ưu đãi giá shock -->
{!! do_shortcode('[products-highlight]') !!}
<!-- Hết Ưu đãi giá shock -->

<!-- Khách sạn & Nghỉ dưỡng -->
{!! do_shortcode('[products-main title="Khách sạn<br>& Nghỉ dưỡng" type="rooms"]') !!}
<!-- Hết Khách sạn & Nghỉ dưỡng -->

<!-- Vé vui chơi & Giải trí -->
{!! do_shortcode('[products-main class="bg-light" title="COMBO Du Lịch" type="tours"]') !!}
<!-- Vé vui chơi & Giải trí -->

<!-- Nhận ưu đãi -->
{!! do_shortcode('[receive-email]') !!}
<!-- Hết Nhận ưu đãi -->

<!-- Dịch vụ du lịch -->
<div class="box-services">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-head">
                    <div class="inner-left">
                        <div class="inner-title">
                            Dịch vụ du lịch
                        </div>
                        <div class="inner-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="inner-item">
        <div class="container">
            <div class="inner-wrap">
                <div class="inner-image">
                    <img src="{{ Theme::asset()->url('images/banner/banner-4.png') }}" alt="">
                </div>
                <div class="inner-content">
                    <div class="inner-title">
                        Vé Máy Bay
                    </div>
                    <div class="inner-desc">
                        Đăt vé máy bay giá rẻ nhanh chóng với nhiều ưu đãi hấp dẫn cho chuyến đ sắp tới của bạn.
                    </div>
                    <a href="trang-ket-qua.html" class="button button-highlight">
                        Xem thêm
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="inner-item">
        <div class="container">
            <div class="inner-wrap">
                <div class="inner-content">
                    <div class="inner-title">
                        Visa
                    </div>
                    <div class="inner-desc">
                        Dịch vụ làm visa quốc tế nhanh chóng, uy tín và giá rẻ
                    </div>
                    <a href="trang-ket-qua.html" class="button button-highlight">
                        Xem thêm
                    </a>
                </div>
                <div class="inner-image">
                    <img src="{{ Theme::asset()->url('images/banner/banner-5.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hết Dịch vụ du lịch -->

{!! do_shortcode('[all-places]') !!}

<!-- VinTravel JSC -->
<div class="box-highlight">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-head">
                    <div class="inner-left">
                        <div class="inner-title">
                            VinTravel JSC
                        </div>
                        <div class="inner-line"></div>
                    </div>
                    <div class="inner-desc">
                        Vintravel JSC tự hào là đơn vị lữ hành chuyên cung cấp dịch vụ du lịch và nghỉ dưỡng của các khách sạn và resort 4 - 5* tại Việt Nam.
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 mb-3">
                <div class="inner-box zoom-effect">
                    <img src="{{ Theme::asset()->url('images/banner/doi-tac@2x.png') }}" alt="">
                    <div class="inner-title">
                        ĐỐI TÁC CHIẾN LƯỢC
                    </div>
                    <div class="inner-desc">
                        Đối tác chiến lược của các khách sạn, resort 5* tại Việt Nam và trên thế giới
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 mb-3">
                <div class="inner-box zoom-effect">
                    <img src="{{ Theme::asset()->url('images/banner/gia-tot@2x.png') }}" alt="">
                    <div class="inner-title">
                        GIÁ TỐT NHẤT THỊ TRƯỜNG
                    </div>
                    <div class="inner-desc">
                        Cam kết giá tốt nhất thị trường & Sẵn quỹ phòng cuối tuần, ngày lễ
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 mb-3">
                <div class="inner-box zoom-effect">
                    <img src="{{ Theme::asset()->url('images/banner/ho-tro@2x.png') }}" alt="">
                    <div class="inner-title">
                        HỖ TRỢ KHÁCH HÀNG 24/7
                    </div>
                    <div class="inner-desc">
                        Đội ngũ nhân viên của VIntravel luôn sẵn sàng giúp đỡ khách hàng trong từng bước của quá trình đặt dich vụ.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hết VinTravel JSC -->
@if (is_plugin_active('partner'))
    {{--Đối tác--}}
    {!! do_shortcode('[box-partners class="bg-light"]') !!}
    {{--Hết đối tác--}}
@endif
