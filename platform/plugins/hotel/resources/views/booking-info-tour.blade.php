@if ($booking)
    <div class="row">
        <div class="col-md-6">
            <p><strong>{{ __('Time') }}</strong>: <i>{{ $booking->created_at }}</i></p>
            <p><strong>{{ __('Full Name') }}</strong>: <i>{{ $booking->address->first_name }} {{ $booking->address->last_name }}</i></p>
            <p><strong>{{ __('Email') }}</strong>: <i><a href="mailto:{{ $booking->address->email }}">{{ $booking->address->email }}</a></i></p>
            <p><strong>{{ __('Phone') }}</strong>: <i>@if ($booking->address->phone) <a href="tel:{{ $booking->address->phone }}">{{ $booking->address->phone }}</a> @else N/A @endif</i></p>
            @if ($booking->address->address)
                <p><strong>{{ __('Address') }}</strong>: <i>{{ $booking->address->id ? ($booking->address->address ? $booking->address->address . ', ': null) . ($booking->address->city ? $booking->address->city . ', ': null) . ($booking->address->state ? $booking->address->state . ', ' : null) . ($booking->address->country ? $booking->address->country . ', ' : null) . $booking->address->zip : null }}</i></p>
            @endif
        </div>
        <div class="col-md-6">
            <p><strong>{{ __('Tour') }}</strong>: <i>@if ($booking->tour->tour->id)<a href="{{ $booking->tour->tour->url }}" target="_blank">{{ $booking->tour->tour->name }}</a> @else N/A @endif</i></p>
            <p><strong>{{ __('Code') }}</strong>: @if ($booking->tour->tour->id) {{ $booking->tour->tour->code }} @else N/A @endif</p>
            @if ($booking->number_of_guests_adults || $booking->number_of_guests_children || $booking->number_of_guests_babies)
                <p><strong>{{ __('Number of guests') }}</strong>:
                    @if ($booking->number_of_guests_adults)<span>{{ $booking->number_of_guests_adults }} adults</span>@endif
                    @if ($booking->number_of_guests_children)<span>, {{ $booking->number_of_guests_children }} children</span>@endif
                    @if ($booking->number_of_guests_babies)<span>, {{ $booking->number_of_guests_babies }} babies</span>@endif
                </p>
            @endif
            @if ($booking->requests)
                <p><strong>{{ __('Requests') }}</strong>: <i class="text-warning">{{ $booking->requests }}</i></p>
            @endif
        </div>
    </div>
    <br>
    <p><strong>{{ __('Room') }}</strong>:</p>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-center">{{ __('Image') }}</th>
            <th>{{ __('Tour Name') }}</th>
            <th>{{ __('Tour Code') }}</th>
            <th class="text-center">{{ __('Price') }}</th>
            <th class="text-center">{{ __('Tax') }}</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center" style="width: 150px; vertical-align: middle">
                    <a href="{{ $booking->tour->tour->url }}" target="_blank">
                        <img src="{{ RvMedia::getImageUrl($booking->tour->tour->image, 'thumb', false, RvMedia::getDefaultImage()) }}" alt="{{ $booking->tour->tour->name }}" width="140">
                    </a>
                </td>
                <td style="vertical-align: middle"><a href="{{ $booking->tour->tour->url }}" target="_blank">{{ $booking->tour->tour->name }}</a></td>
                <td style="vertical-align: middle">{{ $booking->tour->tour->code }}</td>
                <td class="text-center" style="vertical-align: middle"><strong>{{ format_price($booking->tour->price) }}</strong></td>
                <td class="text-center" style="vertical-align: middle"><strong>{{ format_price($booking->tax_amount) }}</strong></td>
            </tr>
        </tbody>
    </table>
    <br>
    @if ($booking->services->count())
        <p><strong>{{ __('Services') }}</strong>:</p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th class="text-center">{{ __('Price') }}</th>
                <th class="text-center">{{ __('Total') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($booking->services->unique() as $service)
                <tr>
                    <td style="vertical-align: middle">
                        {{ $service->name }}
                    </td>
                    <td class="text-center" style="vertical-align: middle">{{ format_price($service->price) }} x {{ $booking->room->number_of_rooms }}</td>
                    <td class="text-center" style="vertical-align: middle">{{ format_price($service->price * $booking->room->number_of_rooms) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
    @endif
    <br>
    <p><strong>{{ __('Total Amount') }}</strong>: <span class="text-danger">{{ format_price($booking->amount) }}</span>
        (@if ($booking->number_of_guests_adults || $booking->number_of_guests_children || $booking->number_of_guests_babies)
            @if ($booking->number_of_guests_adults){{ $booking->number_of_guests_adults }} adults @endif
            @if ($booking->number_of_guests_children), {{ $booking->number_of_guests_children }} children @endif
            @if ($booking->number_of_guests_babies), {{ $booking->number_of_guests_babies }} babies @endif
        @endif)
    </p>
    @if ($booking->payment->id)
        @if (auth()->check())
            <p><strong>{{ __('Payment ID') }}</strong>: <a href="{{ route('payment.show', $booking->payment->id) }}" target="_blank">{{ $booking->payment->charge_id }} <i class="fas fa-external-link-alt"></i></a></p>
        @endif
        <p><strong>{{ __('Payment method') }}</strong>: {{ $booking->payment->payment_channel->label() }}</p>
        <p><strong>{{ __('Payment status') }}</strong>: {!! $booking->payment->status->toHtml() !!}</p>

        @if (($booking->payment->payment_channel == \Botble\Payment\Enums\PaymentMethodEnum::BANK_TRANSFER && $booking->payment->status == \Botble\Payment\Enums\PaymentStatusEnum::PENDING))
            <p><strong>{{ __('Payment info') }}</strong>: <span class="text-warning">{!! BaseHelper::clean(get_payment_setting('description', $booking->payment->payment_channel)) !!}</span></p>
        @endif
    @endif
@endif
