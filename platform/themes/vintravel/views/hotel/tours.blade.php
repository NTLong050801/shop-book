<div class="search-result">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-head">
                    <div class="inner-left">
                        <div class="inner-title">
                            {{ \SeoHelper::getTitle() }}
                        </div>
                        <div class="inner-line"></div>
                    </div>
                    <div class="inner-desc font-italic">
                        {{ \SeoHelper::getDescription() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <!-- Hỗ trợ 24/7 -->
                <div class="box-help">
                    <div class="inner-label">Hỗ trợ 24/7</div>
                    <div class="inner-list">
                        <div class="inner-item">
                            <i class="fa-solid fa-phone"></i>
                            <span>092 169 7777 | 092 183 6789</span>
                        </div>
                        <div class="inner-item">
                            <i class="fa-solid fa-envelope"></i>
                            <span>cskh@vintraveljsc.com</span>
                        </div>
                    </div>
                </div>
                <!-- Hết Hỗ trợ 24/7 -->

                <!-- Chọn lọc theo -->
                <form class="form-search-filters" action="{{route(request()->route()->getName())}}" method="get">
                    <input type="hidden" name="sort_order" value="{{request()->input('sort_order') ?? 'price_desc'}}">
                    <input type="hidden" name="adults" value="{{ request()->get('adults')}}">
                    <input type="hidden" name="children" value="{{ request()->get('children')}}">
                    <input type="hidden" name="babies" value="{{ request()->get('babies')}}">
                    <input type="hidden" name="date" value="{{ request()->get('date')}}">
                    <div class="box-filter-advanced" box-filter-advanced>
                        <div class="inner-button-close" btn-close-filter-advanced>
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                        <div class="inner-title">
                            Chọn lọc theo:
                        </div>
                        <div class="inner-list-box">

                            <div class="inner-box">
                                <div class="inner-sub-title">
                                    Ngân sách của bạn (mỗi đêm)
                                </div>
                                <div class="double-range">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="slider-range"
                                                 data-min-price="{{$minPrice}}" data-max-price="{{$maxPrice}}"
                                                 data-request-min="{{request()->input('min-value')}}" data-request-max="{{request()->input('max-value')}}"
                                            ></div>
                                        </div>
                                    </div>
                                    <div class="row slider-labels">
                                        <div class="col-xs-6 caption">
                                            <span id="slider-range-value1"></span>
                                        </div>
                                        <div class="col-xs-6 text-right caption">
                                            <span id="slider-range-value2"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="hidden" name="min-value" value="">
                                            <input type="hidden" name="max-value" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! dynamic_sidebar('tour_sidebar') !!}

                        </div>
                    </div>
                </form>
                <!-- Hết Chọn lọc theo -->
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="filter-list">
                    <div class="btn-filter-advanced" btn-filter-advanced>
                        <i class="fa-solid fa-filter"></i>
                        <span>Lọc nâng cao</span>
                    </div>
                    <form action="{{route(request()->route()->getName())}}" method="get">
                        @foreach( request()->all() as $key => $value)
                            @if(is_array($value))
                                @foreach($value as $item)
                                    <input type="hidden" name="{{$key}}[]" value="{{$item}}">
                                @endforeach
                            @else
                                @if($key !== 'sort_order')
                                    <input type="hidden" name="{{$key}}" value="{{$value}}">
                                @endif
                            @endif
                        @endforeach
                        <input type="hidden" name="sort_order" id="sort_order_value" value="price_desc">
                        <div class="box-filter">
                            <div class="inner-label">
                                Sắp xếp theo
                            </div>
                            <select id="sort_order">
                                <option value="price_desc" {{request()->input('sort_order')=="price_desc"?'selected':''}}>Giá từ cao đến thấp</option>
                                <option value="price_asc" {{request()->input('sort_order')=="price_asc"?'selected':''}}>Giá từ thấp đến cao</option>
                                <option value="name_asc" {{request()->input('sort_order')=="name_asc"?'selected':''}}>Tên từ A đến Z</option>
                                <option value="name_desc" {{request()->input('sort_order')=="name_desc"?'selected':''}}>Tên từ Z đến A</option>
                            </select>
                        </div>

                    </form>
                </div>

                <div class="products-view-list">
                    @foreach($allTours as $tour)
                        <div class="product-item-horizontal">
                            <div class="inner-main">
                                <div class="inner-left">
                                    @if(get_percentage_discount($tour->price,$tour->price_old) > 0)
                                        <div class="inner-discount">
                                            <span>{{get_percentage_discount($tour->price,$tour->price_old)}}%</span>
                                            <span>OFF</span>
                                        </div>
                                    @endif
                                    <div class="inner-image">
                                        <a href="{{ $tour->url }}">
                                            @if(($tour->tag))
                                                <div class="inner-tag">
                                                    {{ $tour->tag }}
                                                </div>
                                            @endif
                                            {{ RvMedia::image($tour->image, $tour->name, 'room') }}
                                        </a>
                                    </div>
                                    <div class="inner-content">
                                        <div class="inner-title">
                                            <a href="{{ $tour->url }}">
                                                {{ $tour->name }}
                                            </a>
                                        </div>
                                        @if(!empty($tour->address))
                                            <div class="inner-address">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <span>{{ $tour->address }}</span>
                                            </div>
                                        @endif
                                        <div class="inner-tags">
                                            @foreach($tour->features as $feature)
                                                <a href="#">
                                                    {{ $feature->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="inner-right">
                                    <div class="inner-price">
                                        <span>{{ number_format($tour->price) }}</span>
                                        <span>VND/người</span>
                                    </div>
                                    <a href="{{ $tour->url }}" class="button-round button-round-main">
                                        Xem chi tiết
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                @if(!empty($recentlyTours))
                    <!-- Các chỗ nghỉ còn trống bạn đã xem gần đây -->
                    <div class="products-main products-position-origin products-box bg-light p-2">
                        <div class="box-head">
                            <div class="inner-left">
                                <div class="inner-title-2">
                                    Các chỗ nghỉ còn trống bạn đã xem gần đây
                                </div>
                            </div>
                            <div class="inner-right">
                                <a href="trang-tin-tuc.html" class="button button-main">
                                    Xem tất cả
                                </a>
                            </div>
                        </div>

                        <div class="swiper articleMainJS">
                            <div class="swiper-wrapper">
                                @foreach($recentlyTours as $tour)
                                    <div class="swiper-slide">
                                        <div class="product-item">
                                            @if(get_percentage_discount($tour->price,$tour->price_old) > 0)
                                                <div class="inner-discount">
                                                    <span>{{get_percentage_discount($tour->price,$tour->price_old)}}%</span>
                                                    <span>OFF</span>
                                                </div>
                                            @endif

                                            <div class="inner-image">
                                                {{ RvMedia::image($tour->image, $tour->name) }}
                                            </div>
                                            <div class="inner-content">
                                                <div class="inner-price">
                                                    @if(get_percentage_discount($tour->price,$tour->price_old) > 0)
                                                        <div class="inner-price-old">{{number_format($tour->price_old)}} VNĐ</div>
                                                        <div class="inner-price-new">{{number_format($tour->price)}} VNĐ</div>
                                                    @else
                                                        <div class="inner-price-new">{{number_format($tour->price)}} VNĐ</div>
                                                    @endif
                                                </div>
                                                <div class="inner-title custom-inner-title">
                                                    <a href="{{$tour->url}}">
                                                        {{$tour->name}}
                                                    </a>
                                                </div>
                                                <div class="inner-text">
                                                    {{$tour->number_orders ?? 500}}+ người đẫ đặt
                                                </div>
                                                <div class="inner-desc custom-inner-desc">
                                                    @foreach(explode("\n", $tour->more_content) as $itemContent)
                                                        • {{ $itemContent }}
                                                        <br>
                                                    @endforeach
                                                </div>
                                                <a href="{{$tour->url}}" class="button-round button-round-highlight">
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
                    <!-- Hết Các chỗ nghỉ còn trống bạn đã xem gần đây -->
                @endif
            </div>
        </div>
    </div>
</div>
