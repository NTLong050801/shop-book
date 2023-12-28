<div class="col-8">
    <div class="product-item-horizontal">
        <div class="inner-main">
            <div class="inner-left w-100">
                <div class="inner-image">
                    <a href="{{ $product->url }}">
                        {{ RvMedia::image($product->image, $product->name, 'tour') }}
                    </a>
                </div>
                <div class="inner-content">
                    <div class="inner-title">
                        <a href="{{ $product->url }}">
                            {{ $product->name }}
                        </a>
                    </div>
                    @if(!empty($product->address))
                        <div class="inner-address">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>{{ $product->address }}</span>
                        </div>
                    @endif
                    <div class="inner-tags">
                        @foreach($product->features as $feature)
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
        Đặt Tour
    </a>
</div>
