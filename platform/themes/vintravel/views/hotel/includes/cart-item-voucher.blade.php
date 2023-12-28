<div class="col-8">
    <div class="product-item-horizontal">
        <div class="inner-main">
            <div class="inner-left w-100">
                <div class="inner-image">
                    <a href="{{ $product->room->url }}">
                        {{ RvMedia::image($product->room->image, $product->room->name, 'room') }}
                    </a>
                </div>
                <div class="inner-content">
                    <div class="inner-title">
                        <a href="{{ $product->room->url }}">
                            {{ $product->room->name }}
                        </a>
                    </div>
                    <div class="box-stars">
                        @for($i=1; $i<=5; $i++)
                            @if($i>$product->room->rating)
                                <i class="fa-regular fa-star"></i>
                            @else
                                <i class="fa-solid fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    @if(!empty($product->room->address))
                        <div class="inner-address">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>{{ $product->room->address }}</span>
                        </div>
                    @endif
                    <div class="inner-tags">
                        @foreach($product->room->features as $feature)
                            <a href="#">
                                {{ $feature->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-4">
    <div class="form-total-price">
        <div class="inner-list">
            <div class="inner-item">
                <div class="inner-text">
                    <div class="inner-name">{{ $adults }} người lớn</div>
                </div>
                <div class="inner-price">
                    {{ number_format($product->base_price) }} VND
                </div>
            </div>
            @if($children>0 || $babies>0)
                <div class="inner-item">
                    <div class="inner-text">
                        <div class="inner-name">{{ $children }} trẻ em + {{ $babies }} em bé</div>
                    </div>
                    <div class="inner-price">
                        {{ number_format($product->additional_price) }} VND
                    </div>
                </div>
            @endif

        </div>
        <div class="inner-total">
            <span>Tổng tiền</span>
            <span>{{ number_format($product->total) }} VND</span>
        </div>
    </div>
    <div class="inner-note">
        * Giá đã bao gồm thuế và phí dịch vụ
    </div>
    <a href="{{ route('public.booking.form', $token) }}" class="button button-highlight">
        Đặt Voucher
    </a>
</div>
