<div class="checkout-detail">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-head">
                    <div class="inner-left">
                        <div class="inner-title">
                            Danh sách yêu thích
                        </div>
                        <div class="inner-line"></div>
                    </div>
                    <div class="inner-desc font-italic">
                        Chọn một trong các đơn hàng cũ để hoàn thành đơn hàng nhanh hơn
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @foreach($items as $item)
                <?php extract($item) ?>

            <div class="box-collapse show mb-30" box-collapse>
                <div class="box-collapse__head">
                    <div class="inner-title">
                        <span>Thông Tin đặt hàng</span>
                    </div>
                    <button class="inner-button" btn-view-more>
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                </div>
                <div class="box-collapse__body">
                    <div class="row">
                        @include(Theme::getThemeNamespace() . '::views.hotel.includes.cart-item-'.$type)
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
