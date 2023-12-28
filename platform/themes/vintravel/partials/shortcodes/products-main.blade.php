{{--bg-light--}}
<div class="products-main {{ $class }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-head">
                    <div class="inner-left">
                        <div class="inner-title">
                            {!! $title !!}
                        </div>
                        <div class="inner-line"></div>
                    </div>
                    <div class="inner-right">
                        <a href="{{ $route }}" class="button button-main">
                            Xem tất cả
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="swiper productsMainJS">
        <div class="swiper-wrapper">
            @foreach($list as $item)
                @switch($type)
                    @case('tours')
                        <div class="swiper-slide">
                            <div class="product-item">
                                @if(get_percentage_discount($item->price,$item->price_old) > 0)
                                    <div class="inner-discount">
                                        <span>{{get_percentage_discount($item->price,$item->price_old)}}%</span>
                                        <span>OFF</span>
                                    </div>
                                @endif
                                <div class="inner-image">
                                    {{ RvMedia::image($item->image, $item->name, $type) }}
                                </div>
                                <div class="inner-content">
                                    <div class="inner-price">
                                        @if(get_percentage_discount($item->price,$item->price_old) > 0)
                                            <div class="inner-price-old">{{ number_format($item->price_old) }} VNĐ</div>
                                            <div class="inner-price-new">{{ number_format($item->price) }} VNĐ</div>
                                        @else
                                            <div class="inner-price-new">{{ number_format($item->price) }} VNĐ</div>
                                        @endif
                                    </div>
                                    <div class="inner-title homepage-inner-title">
                                        <a href="{{ $item->url }}">
                                            {{ $item->name }}
                                        </a>
                                    </div>
                                    <div class="inner-text">
                                        {{$item->number_orders ?? 500}}+ người đẫ đặt
                                    </div>
                                    <div class="inner-desc homepage-inner-desc">
                                        @foreach(explode("\n", $item->more_content) as $itemContent)
                                            • {{ $itemContent }}
                                            <br>
                                        @endforeach
                                    </div>
                                    <a href="{{ $item->url }}" class="button-round button-round-highlight">
                                        Xem chi tiết
                                    </a>
                                </div>
                            </div>
                        </div>
                        @break

                    @default
                        <div class="swiper-slide">
                            <div class="product-item">
                                @if(get_percentage_discount($item->price,$item->price_old) > 0)
                                    <div class="inner-discount">
                                        <span>{{get_percentage_discount($item->price,$item->price_old)}}%</span>
                                        <span>OFF</span>
                                    </div>
                                @endif
                                <div class="inner-image">
                                    {{ RvMedia::image($item->image, $item->name, 'room') }}
                                </div>
                                <div class="inner-content">
                                    <div class="inner-price">
                                        @if(get_percentage_discount($item->price,$item->price_old) > 0)
                                            <div class="inner-price-old">{{ number_format($item->price_old) }} VNĐ</div>
                                            <div class="inner-price-new">{{ number_format($item->price) }} VNĐ</div>
                                        @else
                                            <div class="inner-price-new">{{ number_format($item->price) }} VNĐ</div>
                                        @endif
                                    </div>
                                    <div class="inner-title custom-inner-title">
                                        <a href="{{ $item->url }}">
                                            {{ $item->name }}
                                        </a>
                                    </div>
                                    <div class="inner-text">
                                        {{$item->number_orders ?? 500}}+ người đẫ đặt
                                    </div>
                                    <div class="inner-desc custom-inner-desc">
                                        @foreach(explode("\n", $item->vouchers()->orderBy('price')->first()?->content) as $itemContent)
                                            • {{ $itemContent }}
                                            <br>
                                        @endforeach
                                    </div>
                                    <a href="{{ $item->url }}" class="button-round button-round-highlight">
                                        Xem chi tiết
                                    </a>
                                </div>
                            </div>
                        </div>
                @endswitch
            @endforeach
        </div>
        <div class="swiper-button-next swiper-button-circle"></div>
        <div class="swiper-button-prev swiper-button-circle"></div>
    </div>
</div>
