<div class="product-detail">
    <div class="container">
        <div class="inner-head">
            <div class="inner-left">
                <div class="inner-title">
                    <h1>{{ $room->name }}</h1>
                    <div class="box-stars">
                        @for($i=1; $i<=5; $i++)
                            @if($i>$room->rating)
                                <i class="fa-regular fa-star"></i>
                            @else
                                <i class="fa-solid fa-star"></i>
                            @endif
                        @endfor
                    </div>
                </div>
                @if(!empty($room->address))
                    <div class="inner-address">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ $room->address }}</span>
                    </div>
                @endif
                <div class="inner-tags">
                    @foreach($room->features as $feature)
                        <a href="#">
                            {{ $feature->name }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="inner-right">
                <div class="inner-price">
                    <span>Giá chỉ từ</span>
                    <span>{{ number_format($room->price) }} VND</span>
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
                <div class="inner-map">
                    {!! $room->map !!}
                </div>
                <div class="inner-content-highlight">
                    <div class="inner-title">
                        {{ $room->description }}
                    </div>
                    <div class="inner-desc">
                        {!! BaseHelper::clean($room->content) !!}
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9">
                <div class="inner-main">
                    <div class="inner-images">
                        @if(($room->vouchers->count()))
                            <div class="inner-tag">
                                {{ $room->vouchers->first()->tag }}
                            </div>
                        @endif
                        <div class="swiper product-images-main productImagesMainJS">
                            <div class="swiper-wrapper">
                                @foreach($images as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ $image }}" alt="">
                                    </div>
                                @endforeach
                            </div>
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

                    @foreach($room->vouchers as $voucher)
                        <div class="inner-info">
                            <div class="inner-title">
                                <span>{{ $voucher->name }} |</span>
                                <span>{{ number_format($voucher->price) }} VND/người</span>
                            </div>

                            <div class="inner-wrap">
                                <div class="inner-content">
                                    <ul>
                                        @foreach(explode("\n", $voucher->content) as $item)
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
                                        <input type="hidden" name="type" value="voucher">
                                        <input type="hidden" name="room_id" value="{{ $voucher->id }}">
                                        <div class="product-detail-head__amount">
                                            <div class="product-detail-head__amount-label">
                                                Ngày
                                            </div>
                                            <div class="product-detail-head__amount-box">
                                                <input type="text" class="form-control jsDateRange w-100" placeholder="Chọn khoảng ngày" id="date_range" name="date"
                                                       value="{{ $startDate->format('d/m/Y') }} - {{ $endDate->format('d/m/Y') }}">
                                            </div>
                                        </div>
                                        <div class="product-detail-head__amount">
                                            <div class="product-detail-head__amount-label">
                                                <span>Người lớn</span>
                                                <span>x {{ number_format($voucher->price) }}</span>
                                            </div>
                                            <div class="product-detail-head__amount-box">
                                                <button class="btn-sub" type="button">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="number" value="{{ request()->input('adults', 1) }}" min="1" name="adults" id="adults">
                                                <button class="btn-add" type="button">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <input type="hidden" value="{{ $voucher->price }}" id="price">
                                        </div>
                                        <div class="product-detail-head__amount">
                                            <div class="product-detail-head__amount-label">
                                                <span>Trẻ em</span>
                                                <span>x {{ number_format($voucher->price_child) }}</span>
                                            </div>
                                            <div class="product-detail-head__amount-box">
                                                <button class="btn-sub" type="button">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="number" value="{{ request()->input('children', 0) }}" min="0" name="children" id="children">
                                                <button class="btn-add" type="button">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <input type="hidden" value="{{ $voucher->price_child }}" id="price_child">
                                        </div>
                                        <div class="product-detail-head__amount">
                                            <div class="product-detail-head__amount-label">
                                                <span>Em bé</span>
                                                <span>x {{ number_format($voucher->price_baby) }}</span>
                                            </div>
                                            <div class="product-detail-head__amount-box">
                                                <button class="btn-sub" type="button">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="number" value="{{ request()->input('babies', 0) }}" min="0" name="babies" id="babies">
                                                <button class="btn-add" type="button">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <input type="hidden" value="{{ $voucher->price_baby }}" id="price_baby">
                                        </div>
                                        <div class="product-detail-head__price">
                                            <label>Tổng cộng:</label>
                                            <span id="total">{{ number_format($voucher->price) }} đ</span>
                                        </div>
                                        <button class="btn-buy-now" type="submit">
                                            YÊU CẦU ĐẶT
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="search-advanced type-2 mt-30 mb-30">
                        <div class="inner-title">
                            Bảng giá {{$room->name}}
                        </div>
                        <form id="booking_form">
                            @csrf
                            <input type="hidden" id="form_action" value="{{ route('public.booking') }}">
                            <input type="hidden" name="type" value="room">
                            <input type="hidden" name="room_id" id="room_id_input">
                            <div class="inner-form">
                                <div class="inner-elements">
                                    <div class="inner-box inner-date">
                                        <label for="ngay">Ngày</label>
                                        <div class="inner-input">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <input type="text" class="form-control jsDateRange" placeholder="Chọn khoảng ngày" id="ngay" name="date"
                                                   value="{{ $startDate->format('d/m/Y') }} - {{ $endDate->format('d/m/Y') }}">
                                        </div>
                                    </div>
                                    <div class="inner-box inner-quantity">
                                        <label>Người lớn</label>
                                        <div class="inner-input">
                                            <i class="fa-solid fa-user"></i>
                                            <input type="number" placeholder="0 Người Lớn" min="1" name="adults" value="{{ request()->input('adults', 1) }}">
                                        </div>
                                    </div>
                                    <div class="inner-box inner-quantity">
                                        <label>Trẻ em</label>
                                        <div class="inner-input">
                                            <i class="fa-solid fa-user"></i>
                                            <input type="number" placeholder="0 Trẻ Em" name="children" min="0" value="{{ request()->input('children', 0) }}">
                                        </div>
                                    </div>
                                    <div class="inner-box inner-quantity">
                                        <label>Em bé</label>
                                        <div class="inner-input">
                                            <i class="fa-solid fa-user"></i>
                                            <input type="number" placeholder="0 Em bé" min="0" name="babies" value="{{ request()->input('babies', 0) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="inner-button">
                                    <button type="submit">
                                        <img src="{{ Theme::asset()->url('images/core/icon-arrow-right.png') }}" alt="">
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bảng chọn phòng -->
    <div class="container mt-60" id="booking">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="inner-table-services" table-services>
                    <div class="inner-table">
                        <div class="inner-thead">
                            <div class="inner-tr">
                                <div class="inner-col">Loại phòng</div>
                                <div class="inner-col">Các lựa chọn</div>
                                <div class="inner-col">Giá ưu đãi</div>
                                <div class="inner-col"></div>
                            </div>
                        </div>
                        <div class="inner-body">
                            @foreach($room->optionCategories as $optionCategory)
                                <div class="inner-tr">
                                    <div class="inner-col">
                                        <div class="inner-title">
                                            {{ $optionCategory->name }}
                                        </div>
                                        <div class="inner-image">
                                            {{ RvMedia::image($optionCategory->image, $optionCategory->name, 'room') }}
                                        </div>
                                        <div class="inner-list-util">
                                            @if(!empty($optionCategory->image))
                                                <div class="inner-item-util">
                                                    <span class="show-detail-image" role="button" data-toggle="modal" data-target="#room_{{$optionCategory->id}}">Xem ảnh phòng chi tiết</span>
                                                    <div class="modal fade room-images-modal " id="room_{{$optionCategory->id}}">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="close-modal-button" data-dismiss="modal">
                                                                <button type="button" class="close text-white mb-3" data-dismiss="modal"><i class="fa-solid fa-xmark fa-2xl cursor-pointer"></i></button>
                                                            </div>
                                                            <div class="modal-content">
                                                                <div class="modal-body p-0">
                                                                    <div class="row">
                                                                        <div class="col-xl-9 col-lg-9 p-0">
                                                                            <div class="inner-main h-100">
                                                                                <div class="inner-images h-100">
                                                                                    <div class="swiper product-images-main productImagesMainJS h-100">
                                                                                        <div class="swiper-wrapper h-100">
                                                                                            @foreach($optionCategory->images as $image)
                                                                                                <div class="swiper-slide">
                                                                                                    <img src="{{ RvMedia::getImageUrl($image,'600', false, RvMedia::getDefaultImage())}}" class="w-100 h-100 p-0 m-0 object-fit-inherit" alt="">
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-button-next swiper-button-circle"></div>
                                                                                    <div class="swiper-button-prev swiper-button-circle"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-3 col-lg-3 p-3">
                                                                            <div class="box-head inner-left inner-title fs-25px">
                                                                                {{ $optionCategory->name }}
                                                                            </div>
                                                                            <div class="inner-list-util">
                                                                                @if(!empty($optionCategory->size))
                                                                                    <div class="inner-item-util">
                                                                                        <img src="{{ Theme::asset()->url('images/core/icons/icon-size.jpg') }}" alt="">
                                                                                        <span>{{ $optionCategory->size }}m<sup>2</sup></span>
                                                                                    </div>
                                                                                @endif
                                                                                @if(!empty($optionCategory->max_adults) || !empty($optionCategory->max_children))
                                                                                    <div class="inner-item-util">
                                                                                        <img src="{{ Theme::asset()->url('images/core/icons/icon-people.jpg') }}" alt="">
                                                                                        <span>Tối đa <strong>{{ $optionCategory->max_adults }}</strong> người lớn & <strong>{{ $optionCategory->max_children }}</strong> trẻ em</span>
                                                                                    </div>
                                                                                @endif
                                                                                @if(!empty($optionCategory->beds))
                                                                                    <div class="inner-item-util">
                                                                                        <img src="{{ Theme::asset()->url('images/core/icons/icon-bed.jpg') }}" alt="">
                                                                                        <span>{{ $optionCategory->beds }}</span>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <p class="inner-title text-dark">Tiện ích phòng</p>
                                                                            <div class="inner-list-util">
                                                                                @foreach($room->amenities as $amenity)
                                                                                    <div class="inner-item-util">
                                                                                        <span>{{ $amenity->name }}</span>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(!empty($optionCategory->size))
                                                <div class="inner-item-util">
                                                    <img src="{{ Theme::asset()->url('images/core/icons/icon-size.jpg') }}" alt="">
                                                    <span>{{ $optionCategory->size }}m<sup>2</sup></span>
                                                </div>
                                            @endif
                                            @if(!empty($optionCategory->max_adults) || !empty($optionCategory->max_children))
                                                <div class="inner-item-util">
                                                    <img src="{{ Theme::asset()->url('images/core/icons/icon-people.jpg') }}" alt="">
                                                    <span>Tối đa <strong>{{ $optionCategory->max_adults }}</strong> người lớn & <strong>{{ $optionCategory->max_children }}</strong> trẻ em</span>
                                                </div>
                                            @endif
                                            @if(!empty($optionCategory->beds))
                                                <div class="inner-item-util">
                                                    <img src="{{ Theme::asset()->url('images/core/icons/icon-bed.jpg') }}" alt="">
                                                    <span>{{ $optionCategory->beds }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="inner-rows">
                                        @foreach($optionCategory->options as $option)
                                            <div class="inner-cols @if($option->is_outstanding_room_option) inner-cols-highlight @endif">
                                                <div class="inner-col">
                                                    <div class="inner-list-highlight">
                                                        <div class="inner-label-highlight">
                                                            {{ $option->name }}
                                                        </div>
                                                        @foreach(explode("\n", $option->content) as $item)
                                                            <div class="inner-item-highlight">
                                                                {{ $item }}
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="inner-col">
                                                    <div class="inner-price">
                                                        <span>{{ number_format($option->getRoomTotalPrice($nights, request()->input('adults', 1),request()->input('children', 0),request()->input('babies', 0) )) }}</span>
                                                        <span>VND</span>
                                                    </div>
                                                    <div class="inner-text">
                                                        Giá {{ $nights }} đêm cho
                                                        {{ request()->input('adults', 1) }} người lớn
                                                        @if(request()->input('children', 0))
                                                            {{ request()->input('children', 0) }} trẻ em
                                                        @endif
                                                        @if(request()->input('babies', 0))
                                                            {{ request()->input('babies', 0) }} em bé
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="inner-col">
                                                    <button class="button button-highlight booking_button" data-room-id="{{ $option->id }}">
                                                        Đặt Phòng
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                            <div class="inner-view-more">
                                <button btn-view-more>Xem thêm <i class="fa-solid fa-angle-down"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hết Bảng chọn phòng -->

    <!-- TIỆN ÍCH KHÁCH SẠN -->
    <div class="container mt-60">
        <div class="box-list-services">
            <div class="inner-title">
                TIỆN ÍCH KHÁCH SẠN
            </div>
            <div class="row">
                @foreach($room->amenities as $amenity)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="inner-item">
                            {{ $amenity->name }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Hết TIỆN ÍCH KHÁCH SẠN -->

    <!-- CHÍNH SÁCH KHÁCH SẠN -->
    <div class="container mt-60">
        <div class="box-policy">
            <div class="inner-title">
                CHÍNH SÁCH KHÁCH SẠN
            </div>
            <table>
                <tbody>
                <tr>
                    <td>Giờ nhận phòng</td>
                    <td>{{ $room->check_in_time }}</td>
                </tr>
                <tr>
                    <td>Giờ trả phòng</td>
                    <td>{{ $room->check_out_time }}</td>
                </tr>
                <tr>
                    <td>Chính sách trẻ em</td>
                    <td>
                        {!! BaseHelper::clean($room->children_policies) !!}
                    </td>
                </tr>
                <tr>
                    <td>Di chuyển</td>
                    <td>
                        {!! BaseHelper::clean($room->directions) !!}
                    </td>
                </tr>
                <tr>
                    <td>Hướng dẫn nhận phòng</td>
                    <td>
                        {!! BaseHelper::clean($room->check_in_instructions) !!}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Hết CHÍNH SÁCH KHÁCH SẠN -->

    <!-- TRẢI NGHIỆM KHÁCH HÀNG -->
    @if(!empty($testimonials))
        <div class="container mt-60">
            <div class="box-testimonials">
                <div class="inner-title">
                    TRẢI NGHIỆM KHÁCH HÀNG
                    <br>
                    VỀ {{ $room->name }}
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

<!-- Khách sạn tương tự -->
<div class="products-main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-head">
                    <div class="inner-left">
                        <div class="inner-title">
                            Khách sạn
                            <br>
                            Tương tự
                        </div>
                        <div class="inner-line"></div>
                    </div>
                    <div class="inner-right">
                        <a href="{{ route('public.rooms') }}" class="button button-main">
                            Xem tất cả
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="swiper productsMainJS">
        <div class="swiper-wrapper">
            @foreach($relatedRooms as $relatedRoom)
                <div class="swiper-slide">
                    <div class="product-item">
                        @if(get_percentage_discount($relatedRoom->price,$relatedRoom->price_old) > 0)
                            <div class="inner-discount">
                                <span>{{get_percentage_discount($relatedRoom->price,$relatedRoom->price_old)}}%</span>
                                <span>OFF</span>
                            </div>
                        @endif
                        <div class="inner-image">
                            <img src="{{ Theme::asset()->url('images/products/pro-1.png') }}" alt="">
                        </div>
                        <div class="inner-content">
                            <div class="inner-price">
                                @if(get_percentage_discount($relatedRoom->price,$relatedRoom->price_old) > 0)
                                    <div class="inner-price-old">{{number_format($relatedRoom->price_old)}} VNĐ</div>
                                    <div class="inner-price-new">{{number_format($relatedRoom->price)}} VNĐ</div>
                                @else
                                    <div class="inner-price-new">{{number_format($relatedRoom->price)}} VNĐ</div>
                                @endif
                            </div>
                            <div class="inner-title custom-inner-title">
                                <a href="{{$relatedRoom->url }}">
                                    {{$relatedRoom->name}}
                                </a>
                            </div>
                            <div class="inner-text">
                                {{$relatedRoom->number_orders ?? 500}}+ người đẫ đặt
                            </div>
                            <div class="inner-desc custom-inner-desc">
                                {!! BaseHelper::clean($room->content) !!}
                            </div>
                            <a href="{{$relatedRoom->url }}" class="button-round button-round-highlight">
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
<!-- Hết Khách sạn tương tự -->
