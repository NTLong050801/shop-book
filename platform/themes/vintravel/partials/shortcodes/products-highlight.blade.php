<div class="products-main products-highlight">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-head inner-white">
                    <div class="inner-left">
                        <div class="inner-title">
                            Ưu đãi
                            <br>
                            Giá shock
                        </div>
                        <div class="inner-line"></div>
                    </div>
                    <div class="inner-right">
                        <div class="box-countdown inner-white">
                            <div class="inner-label">Kết thúc sau</div>
                            <div class="inner-time">
                  <span class="inner-item">
                    <span id="hours">0</span>
                    <span>Giờ</span>
                  </span>
                                <span class="inner-dot">:</span>
                                <span class="inner-item">
                    <span id="minutes">0</span>
                    <span>Phút</span>
                  </span>
                                <span class="inner-dot">:</span>
                                <span class="inner-item">
                    <span id="seconds">0</span>
                    <span>Giây</span>
                  </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="swiper productsMainJS">
        <div class="swiper-wrapper">
            @foreach($vouchers as $voucher)
                <div class="swiper-slide">
                    <div class="product-item">
                        @if(get_percentage_discount($voucher->price,$voucher->price_old) > 0)
                            <div class="inner-discount">
                                <span>{{get_percentage_discount($voucher->price,$voucher->price_old)}}%</span>
                                <span>OFF</span>
                            </div>
                        @endif
                        <div class="inner-image">
                            {{ RvMedia::image($voucher->room->image, $voucher->room->name, 'room') }}
                        </div>
                        <div class="inner-content">
                            <div class="inner-price">
                                @if(get_percentage_discount($voucher->price,$voucher->price_old) > 0)
                                    <div class="inner-price-old">{{ number_format($voucher->price_old) }} VNĐ</div>
                                    <div class="inner-price-new">{{ number_format($voucher->price) }} VNĐ</div>
                                @else
                                    <div class="inner-price-new">{{ number_format($voucher->price) }} VNĐ</div>
                                @endif
                            </div>
                            <div class="inner-title custom-inner-title">
                                <a href="{{ $voucher->room->url }}">
                                    Voucher {{ $voucher->room->name }}
                                </a>
                            </div>
                            <div class="inner-text">
                                {{$voucher->number_orders ?? 500}}+ người đẫ đặt
                            </div>
                            <div class="inner-desc custom-inner-desc">
                                @foreach(explode("\n", $voucher->content) as $itemContent)
                                    • {{ $itemContent }}
                                    <br>
                                @endforeach
                            </div>
                            <a href="{{ $voucher->room->url }}" class="button-round button-round-main">
                                Xem chi tiết
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next swiper-button-circle swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-circle swiper-button-white"></div>
    </div>

    <div class="inner-view-more">
        <a href="{{ route('public.rooms',['type'=>'promotion']) }}" class="button button-main">
            Xem tất cả
        </a>
    </div>
</div>
