<div class="inner-item">
    <div class="container">
        <div class="inner-wrap">
            @if($rtl)
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
                <div class="inner-image">
                    <img src="{{ Theme::asset()->url('images/banner/banner-4.png') }}" alt="">
                </div>
            @else
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
            @endif
        </div>
    </div>
</div>
