<div class="product-detail">
    <div class="container">
        <div class="inner-head">
            <div class="inner-left">
                <div class="inner-title">
                    <h1>{{ $tour->name }}</h1>
                </div>
                <div class="inner-address">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>{{ $tour->address }}</span>
                </div>
                <div class="inner-tags">
                    @foreach($tour->features as $feature)
                        <a href="#">
                            {{ $feature->name }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="inner-right">
                <div class="inner-price">
                    <span>Giá chỉ từ</span>
                    <span>{{ number_format($tour->price) }} VND</span>
                </div>
                <a href="#booking" class="button button-main scroll-link">
                    Đặt ngay
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3">
                <div class="inner-info-tour">
                    <div class="inner-title">
                        Thông tin Tour
                    </div>
                    <table>
                        <tbody>
                        <tr>
                            <td>Mã Tour:</td>
                            <td>{{ $tour->code }}</td>
                        </tr>
                        <tr>
                            <td>Hành Trình:</td>
                            <td>{{ $tour->trip }}</td>
                        </tr>
                        <tr>
                            <td>Thời gian:</td>
                            <td>{{ $tour->duration }}</td>
                        </tr>
                        <tr>
                            <td>Khởi hành:</td>
                            <td>{{ $tour->schedule }}</td>
                        </tr>
                        <tr>
                            <td>Phương tiện:</td>
                            <td>{{ $tour->vehicle }}</td>
                        </tr>
                        <tr>
                            <td>Xuất phát:</td>
                            <td>{{ $tour->departure_location }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="inner-content-highlight">
                    <div class="inner-title">
                        {{ $tour->description }}
                    </div>
                    <div class="inner-desc">
                        {!! BaseHelper::clean($tour->content) !!}
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9">
                <div class="inner-main">
                    <div class="inner-images">
                        <div class="inner-tag">
                            {{ $tour->tag }}
                        </div>
                        <div class="swiper product-images-main productImagesMainJS">
                            <div class="swiper-wrapper">
                                @foreach($images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ $image }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next swiper-button-circle"></div>
                            <div class="swiper-button-prev swiper-button-circle"></div>
                        </div>
                        <div thumbsSlider="" class="swiper product-images-thumb productImagesThumbJS">
                            <div class="swiper-wrapper">
                                @foreach($images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ $image }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next swiper-button-circle"></div>
                            <div class="swiper-button-prev swiper-button-circle"></div>
                        </div>
                    </div>

                    <div class="inner-info" id="booking">
                        <div class="inner-title">
                            <span>{{ $tour->name }} |</span>
                            <span>{{ number_format($tour->price) }} VND/người</span>
                        </div>

                        <div class="inner-wrap">
                            <div class="inner-content">
                                <ul>
                                    @foreach(explode("\n", $tour->more_content) as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="inner-form">
                                <div class="inner-label">
                                    Đặt ngay, chỉ mất 5 phút. Hoặc liên hệ hotline 0921836789
                                </div>
                                <form action="{{ route('public.booking') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="type" value="tour">
                                    <input type="hidden" name="room_id" value="{{ $tour->id }}">
                                    <input type="hidden" name="date" value="{{ date('d/m/Y') }} - {{ date('d/m/Y', strtotime('+1 day')) }}">
                                    <div class="product-detail-head__amount">
                                        <div class="product-detail-head__amount-label">
                                            Ngày khởi hành
                                        </div>
                                        <div class="product-detail-head__amount-box">
                                            <input type="text" class="form-control jsDateSinge w-100" data-weekdays="{{json_encode($tour->weekdays)}}" placeholder="Chọn khoảng ngày" id="ngay" name="date" value="">
                                        </div>
                                    </div>
                                    <div class="product-detail-head__amount">
                                        <div class="product-detail-head__amount-label">
                                            <span>Người lớn</span>
                                            <span>x {{ number_format($tour->price) }}</span>
                                        </div>
                                        <div class="product-detail-head__amount-box">
                                            <button class="btn-sub" type="button">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input type="number" value="1" min="1" name="adults" id="adults">
                                            <button class="btn-add" type="button">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" value="{{ $tour->price }}" id="price">
                                    </div>
                                    <div class="product-detail-head__amount">
                                        <div class="product-detail-head__amount-label">
                                            <span>Trẻ em</span>
                                            <span>x {{ number_format($tour->price_child) }}</span>
                                        </div>
                                        <div class="product-detail-head__amount-box">
                                            <button class="btn-sub" type="button">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input type="number" value="0" min="0" name="children" id="children">
                                            <button class="btn-add" type="button">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" value="{{ $tour->price_child }}" id="price_child">
                                    </div>
                                    <div class="product-detail-head__amount">
                                        <div class="product-detail-head__amount-label">
                                            <span>Em bé</span>
                                            <span>x {{ number_format($tour->price_baby) }}</span>
                                        </div>
                                        <div class="product-detail-head__amount-box">
                                            <button class="btn-sub" type="button">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input type="number" value="0" min="0" name="babies" id="babies">
                                            <button class="btn-add" type="button">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" value="{{ $tour->price_baby }}" id="price_baby">
                                    </div>
                                    <div class="product-detail-head__price">
                                        <label>Tổng cộng:</label>
                                        <span id="total">{{ number_format($tour->price) }} đ</span>
                                    </div>
                                    <button class="btn-buy-now" type="submit">
                                        ĐẶT TOUR
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lịch trình -->
    <div class="container mt-60">
        <div class="box-collapse show" box-collapse>
            <div class="box-collapse__head">
                <div class="inner-title">
                    <span>Lịch trình</span>
                </div>
                <button class="inner-button" btn-view-more>
                    Xem Chi Tiết <i class="fa-solid fa-angle-down"></i>
                </button>
            </div>
            <div class="box-collapse__body">
                <div class="box-list-tour">
                    @foreach($tour->plan as $item)
                        <div class="inner-box">
                            <div class="inner-title">
                                {{ $item[0]['value'] }}
                            </div>
                            <div class="inner-desc">
                                {!! BaseHelper::clean($item[1]['value']) !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Hết Lịch trình -->

    <!-- DỊCH VỤ -->
    <div class="container mt-30">
        <div class="box-collapse show" box-collapse>
            <div class="box-collapse__head">
                <div class="inner-title">
                    <span>DỊCH VỤ</span>
                </div>
                <button class="inner-button" btn-view-more>
                    Xem Chi Tiết <i class="fa-solid fa-angle-down"></i>
                </button>
            </div>
            <div class="box-collapse__body">
                <div class="box-list-services-2">
                    <div class="inner-item">
                        <div class="inner-title">
                            DỊCH VỤ BAO GÔM
                        </div>
                        <div class="inner-desc">
                            {!! BaseHelper::clean($tour->services_include) !!}
                        </div>
                    </div>
                    <div class="inner-item">
                        <div class="inner-title">
                            DỊCH VỤ KHÔNG BAO GÔM
                        </div>
                        <div class="inner-desc">
                            {!! BaseHelper::clean($tour->services_exclude) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hết DỊCH VỤ -->

    <!-- ĐIỀU KIỆN ĐĂNG KÝ TOUR -->
    <div class="container mt-30">
        <div class="box-collapse show" box-collapse>
            <div class="box-collapse__head">
                <div class="inner-title">
                    <span>ĐIỀU KIỆN ĐĂNG KÝ TOUR</span>
                </div>
                <button class="inner-button" btn-view-more>
                    Xem Chi Tiết <i class="fa-solid fa-angle-down"></i>
                </button>
            </div>
            <div class="box-collapse__body">
                <div class="inner-content">
                    {!! BaseHelper::clean($tour->registration_conditions) !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Hết ĐIỀU KIỆN ĐĂNG KÝ TOUR -->

    <!-- ĐIỀU KIỆN HOÀN/HỦY -->
    <div class="container mt-30">
        <div class="box-collapse" box-collapse>
            <div class="box-collapse__head">
                <div class="inner-title">
                    <span>ĐIỀU KIỆN HOÀN/HỦY</span>
                </div>
                <button class="inner-button" btn-view-more>
                    Xem Chi Tiết <i class="fa-solid fa-angle-down"></i>
                </button>
            </div>
            <div class="box-collapse__body">
                <div class="inner-content">
                    {!! BaseHelper::clean($tour->cancel_conditions) !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Hết ĐIỀU KIỆN HOÀN/HỦY -->

    <!-- THANH TOÁN -->
    <div class="container mt-30">
        <div class="box-collapse" box-collapse>
            <div class="box-collapse__head">
                <div class="inner-title">
                    <span>THANH TOÁN</span>
                </div>
                <button class="inner-button" btn-view-more>
                    Xem Chi Tiết <i class="fa-solid fa-angle-down"></i>
                </button>
            </div>
            <div class="box-collapse__body">
                <div class="inner-content">
                    {!! BaseHelper::clean($tour->checkout_description) !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Hết THANH TOÁN -->

    <!-- TRẢI NGHIỆM KHÁCH HÀNG -->
    @if(count($testimonials) > 0)
        <div class="container mt-60">
            <div class="box-testimonials">
                <div class="inner-title">
                    TRẢI NGHIỆM KHÁCH HÀNG
                    <br>
                    VỀ {{ $tour->name }}
                </div>
                <div class="swiper testimonialsJS">
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="inner-box">
                                    <div class="inner-desc">
                                        {!! BaseHelper::clean($testimonial->content) !!}
                                    </div>
                                    <div class="inner-footer">
                                        <div class="inner-avatar">
                                            {{ RvMedia::image($testimonial->image, $testimonial->name, '$testimonial') }}
                                        </div>
                                        <div class="inner-text">
                                            <div class="inner-name">
                                                {{ $testimonial->name }}
                                            </div>
                                            <div class="inner-position">
                                                {{ $testimonial->company }}
                                            </div>
                                        </div>
                                        <div class="inner-icon">
                                            <i class="fa-solid fa-quote-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next swiper-button-circle"></div>
                    <div class="swiper-button-prev swiper-button-circle"></div>
                </div>
            </div>
        </div>
    @endif

</div>

<!-- TOUR DU LỊCH tương tự -->
<div class="products-main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-head">
                    <div class="inner-left">
                        <div class="inner-title">
                            TOUR DU LỊCH
                            <br>
                            Tương tự
                        </div>
                        <div class="inner-line"></div>
                    </div>
                    <div class="inner-right">
                        <a href="{{ route('public.tours') }}" class="button button-main hide-button-after">
                            Xem tất cả &nbsp
                            <div>
                                <i class="fa-solid fa-arrow-right text-white"></i>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="swiper productsMainJS">
        <div class="swiper-wrapper">
            @foreach($relatedTours as $relatedTour)
                <div class="swiper-slide">
                    <div class="product-item">
                        @if(get_percentage_discount($relatedTour->price,$relatedTour->price_old) > 0)
                            <div class="inner-discount">
                                <span>{{get_percentage_discount($relatedTour->price,$relatedTour->price_old)}}%</span>
                                <span>OFF</span>
                            </div>
                        @endif
                        <div class="inner-image">
                            {{ RvMedia::image($relatedTour->image, $relatedTour->name, 'tour') }}
                        </div>
                        <div class="inner-content">
                            <div class="inner-price">
                                @if(get_percentage_discount($relatedTour->price,$relatedTour->price_old) > 0)
                                    <div class="inner-price-old">{{number_format($relatedTour->old_price)}} VNĐ</div>
                                    <div class="inner-price-new">{{number_format($relatedTour->price)}} VNĐ</div>
                                @else
                                    <div class="inner-price-new">{{number_format($relatedTour->price)}} VNĐ</div>
                                @endif
                            </div>
                            <div class="inner-title custom-inner-title">
                                <a href="{{$relatedTour->url}}">
                                    {{$relatedTour->name}}
                                </a>
                            </div>
                            <div class="inner-text">
                                {{$relatedTour->number_orders ?? 500}}+ người đẫ đặt
                            </div>
                            <div class="inner-desc custom-inner-desc">
                                @foreach(explode("\n", $relatedTour?->more_content) as $itemContent)
                                    • {{ $itemContent }}
                                    <br>
                                @endforeach
                            </div>
                            <a href="{{ $relatedTour->url }}" class="button-round button-round-highlight">
                                Xem chi tiết
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next swiper-button-circle"></div>
        <div class="swiper-button-prev swiper-button-circle"></div>
    </div>
</div>
<!-- Hết TOUR DU LỊCH tương tự -->
