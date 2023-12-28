<div class="checkout-detail">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-head">
                    <div class="inner-left">
                        <div class="inner-title">
                            THÔNG TIN ĐẶT TOUR
                        </div>
                        <div class="inner-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12">
                <!-- Thông Tin Khách Sạn -->
                <div class="box-collapse show mb-30" box-collapse>
                    <div class="box-collapse__head">
                        <div class="inner-title">
                            <span>Thông Tin Tour</span>
                        </div>
                        <button class="inner-button" btn-view-more>
                            <i class="fa-solid fa-angle-down"></i>
                        </button>
                    </div>
                    <div class="box-collapse__body">
                        <div class="product-item-horizontal">
                            <div class="inner-main">
                                <div class="inner-left w-100">
                                    <div class="inner-image">
                                        <a href="{{ $bookingInfo->url }}">
                                            {{ RvMedia::image($bookingInfo->image, $bookingInfo->name, 'tour') }}
                                        </a>
                                    </div>
                                    <div class="inner-content">
                                        <div class="inner-title">
                                            <a href="{{ $bookingInfo->url }}">
                                                {{ $bookingInfo->name }}
                                            </a>
                                        </div>
                                        @if(!empty($bookingInfo->address))
                                            <div class="inner-address">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <span>{{ $bookingInfo->address }}</span>
                                            </div>
                                        @endif
                                        <div class="inner-tags">
                                            @foreach($bookingInfo->features as $feature)
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
                </div>
                <!-- Hết Thông Tin Khách Sạn -->

                <!-- Thông Tin Khách Hàng -->
                <div class="box-collapse show mb-30" box-collapse>
                    <div class="box-collapse__head">
                        <div class="inner-title">
                            <span>Thông Tin Khách Hàng</span>
                        </div>
                        <button class="inner-button" btn-view-more>
                            <i class="fa-solid fa-angle-down"></i>
                        </button>
                    </div>
                    <div class="box-collapse__body">
                        <div class="form-checkout">
                            <table>
                                <tbody>
                                @if(is_null($user))
                                    <tr>
                                        <td>
                                            Danh Xưng*:
                                        </td>
                                        <td>
                                            {{ $booking->address->first_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Họ & Tên
                                            <br>
                                            Khách Đại Diện*:
                                        </td>
                                        <td>
                                            {{ $booking->address->last_name }}
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>
                                            Họ & Tên
                                            <br>
                                            Khách Đại Diện*:
                                        </td>
                                        <td>
                                            {{ $booking->address->first_name }} {{ $booking->address->last_name }}
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>
                                        Điện Thoại*:
                                    </td>
                                    <td>
                                        @if ($booking->address->phone)
                                            <a href="tel:{{ $booking->address->phone }}">{{ $booking->address->phone }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Email*:
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $booking->address->email }}">{{ $booking->address->email }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Yêu cầu đặc biệt:
                                    </td>
                                    <td>
                                        {{ $booking->requests }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Hết Thông Tin Khách Hàng -->

                <!-- Thông Tin Thanh Toán -->
                <div class="box-collapse show mb-30" box-collapse>
                    <div class="box-collapse__head">
                        <div class="inner-title">
                            <span>Thông Tin Thanh Toán</span>
                        </div>
                        <button class="inner-button" btn-view-more>
                            <i class="fa-solid fa-angle-down"></i>
                        </button>
                    </div>
                    <div class="box-collapse__body">
                        <div class="form-checkout">
                            <table>
                                <tbody>
                                <tr>
                                    <td>
                                        Phương thức
                                        <br>
                                        thanh toán:
                                    </td>
                                    <td>
                                        {{ $booking->payment->payment_channel->label() }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Hết Thông Tin Thanh Toán -->
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12">
                <!-- Thông Hành trình -->
                <div class="box-collapse show mb-30" box-collapse>
                    <div class="box-collapse__head">
                        <div class="inner-title">
                            <span>Hành trình</span>
                        </div>
                        <button class="inner-button" btn-view-more>
                            <i class="fa-solid fa-angle-down"></i>
                        </button>
                    </div>
                    <div class="box-collapse__body">
                        <div class="form-checkout">
                            <table>
                                <tbody>
                                <tr>
                                    <td>
                                        Số lượng khách:
                                    </td>
                                    <td>
                                        {{ $adults }} người lớn | {{ $children }} trẻ em | {{ $babies }} em bé
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tour:
                                    </td>
                                    <td>
                                        {{ $bookingInfo->name }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Hết Hành trình -->

                <!-- Thông Thành tiền -->
                <div class="box-collapse show mb-30" box-collapse>
                    <div class="box-collapse__head">
                        <div class="inner-title">
                            <span>Thành tiền</span>
                        </div>
                        <button class="inner-button" btn-view-more>
                            <i class="fa-solid fa-angle-down"></i>
                        </button>
                    </div>
                    <div class="box-collapse__body">
                        <div class="form-total-price">
                            <div class="inner-list">
                                <div class="inner-item">
                                    <div class="inner-text">
                                        <div class="inner-name">{{ $adults }} người lớn</div>
                                    </div>
                                    <div class="inner-price">
                                        {{ number_format($bookingInfo->base_price) }} VND
                                    </div>
                                </div>
                                @if($children>0 || $babies>0)
                                    <div class="inner-item">
                                        <div class="inner-text">
                                            <div class="inner-name">Phụ thu trẻ em</div>
                                            <div class="inner-quantity">{{ $children }} người + {{ $babies }} trẻ em</div>
                                        </div>
                                        <div class="inner-price">
                                            {{ number_format($bookingInfo->additional_price) }} VND
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <div class="inner-total">
                                <span>Tổng tiền</span>
                                <span>{{ number_format($bookingInfo->total) }} VND</span>
                            </div>
                        </div>
                        <div class="inner-note">
                            * Giá đã bao gồm thuế và phí dịch vụ
                        </div>
                    </div>
                </div>
                <!-- Hết Thành tiền -->
            </div>
        </div>
    </div>

</div>
<div class="modal" id="booking_success_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <div>
                        <i class="fa-regular fa-circle-check custom-fa-circle-check fa-border-style" style="color: lightgreen;"></i>
                    </div>
                    <br>
                    <div>
                        <h3>Đặt tour thành công</h3>
                    </div>
                    <div>
                        <p>Mã đặt tour của bạn là: <span class="booking-code-color">{{$booking->transaction_id}}</span></p>
                        <p>Vintravel sẽ liên hệ lại trong thời gian sớm nhất</p>
                        <p>Xin cảm ơn!</p>
                    </div>
                    <button type="button" class="btn text-white booking-modal-button" data-dismiss="modal" style="background: var(--color-main); width: 150px">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
