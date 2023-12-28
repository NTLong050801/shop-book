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
                    <div class="inner-desc font-italic">
                        Vui lòng kiểm kiểm tra lại các thông tin trước khi đặt tour
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form method="post" action="{{ route('public.booking.checkout') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="type" value="{{ $type }}">
            <input type="hidden" name="amount" value="{{ $product->total }}">
            <input type="hidden" name="room_id" value="{{ $product->id }}">
            <input type="hidden" name="start_date" value="{{ $startDate->format('d-m-Y') }}">
            <input type="hidden" name="end_date" value="{{ $endDate->format('d-m-Y') }}">
            <input type="hidden" name="adults" value="{{ $adults }}">
            <input type="hidden" name="children" value="{{ $children }}">
            <input type="hidden" name="babies" value="{{ $babies }}">
            <input type="hidden" name="number_of_guests_adults" value="{{ $adults }}">
            <input type="hidden" name="number_of_guests_children" value="{{ $children }}">
            <input type="hidden" name="number_of_guests_babies" value="{{ $babies }}">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <!-- Thông Tin Khách Sạn -->
                    <div class="box-collapse show mb-30" box-collapse>
                        <div class="box-collapse__head booking-collapse__head">
                            <div class="inner-title text-capitalize">
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
                    </div>
                    <!-- Hết Thông Tin Khách Sạn -->

                    <!-- Thông Tin Khách Hàng -->
                    <div class="box-collapse show mb-30" box-collapse>
                        <div class="box-collapse__head booking-collapse__head">
                            <div class="inner-title text-capitalize">
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
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="inner-label">Mr.
                                                            <input type="radio" name="first_name" value="Mr." required>
                                                            <span class="inner-checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="inner-label">Ms.
                                                            <input type="radio" name="first_name" value="Ms." required>
                                                            <span class="inner-checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Họ & Tên
                                                <br>
                                                Khách Đại Diện*:
                                            </td>
                                            <td>
                                                <input type="text" name="last_name" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Điện Thoại*:
                                            </td>
                                            <td>
                                                <input type="text" name="phone" value="{{ old('phone') }}" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Email*:
                                            </td>
                                            <td>
                                                <input type="email" name="email" value="{{ old('email') }}" required>
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
                                                {{ $user->name }}
                                                <input type="hidden" name="customer_id" value="{{ $user->id }}" />
                                                <input type="hidden" name="first_name" value="{{ $user->first_name }}" />
                                                <input type="hidden" name="last_name" value="{{ $user->last_name }}" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Điện Thoại*:
                                            </td>
                                            <td>
                                                @if(is_null($user->phone))
                                                    <input type="text" name="phone" value="{{ old('phone') }}" required>
                                                @else
                                                    {{ $user->phone }}
                                                    <input type="hidden" name="phone" value="{{ $user->phone }}" />
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Email*:
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                                <input type="hidden" name="email" value="{{ $user->email }}" />
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>
                                            Yêu cầu đặc biệt:
                                        </td>
                                        <td>
                                            <textarea name="requests" rows="3" id="requests">{{ old('requests') }}</textarea>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="inner-note">
                                * Vui lòng điền vào các trường bát buộc
                            </div>
                        </div>
                    </div>
                    <!-- Hết Thông Tin Khách Hàng -->

                    <!-- Thông Tin Thanh Toán -->
                    <div class="box-collapse show mb-30" box-collapse>
                        <div class="box-collapse__head booking-collapse__head">
                            <div class="inner-title text-capitalize">
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
                                            {!! apply_filters(PAYMENT_FILTER_ADDITIONAL_PAYMENT_METHODS, null, [
                                               'amount' => $product->total,
                                               'currency' => strtoupper(get_application_currency()->title),
                                               'name' => $product->name,
                                               'selected' => PaymentMethods::getSelectedMethod(),
                                               'default' => PaymentMethods::getDefaultMethod(),
                                               'selecting' => PaymentMethods::getSelectingMethod(),
                                           ]) !!}

                                            {!! PaymentMethods::render() !!}
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
                        <div class="box-collapse__head booking-collapse__head">
                            <div class="inner-title text-capitalize">
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
                                            {{ $product->name }}
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
                        <div class="box-collapse__head booking-collapse__head">
                            <div class="inner-title text-capitalize">
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
                        </div>
                    </div>
                    <!-- Hết Thành tiền -->
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="text-right">
                        <button type="submit" class="button button-highlight">
                            Đặt Tour
                        </button>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">

                </div>
            </div>
        </form>
    </div>

</div>
