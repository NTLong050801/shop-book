<?php

namespace Botble\Hotel\Http\Controllers;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Hotel\Http\Requests\CalculateBookingAmountRequest;
use Botble\Hotel\Http\Requests\CheckoutRequest;
use Botble\Hotel\Http\Requests\InitBookingRequest;
use Botble\Hotel\Models\Place;
use Botble\Hotel\Models\Room;
use Botble\Hotel\Models\RoomOption;
use Botble\Hotel\Models\Tour;
use Botble\Hotel\Repositories\Interfaces\BookingAddressInterface;
use Botble\Hotel\Repositories\Interfaces\BookingInterface;
use Botble\Hotel\Repositories\Interfaces\BookingRoomInterface;
use Botble\Hotel\Repositories\Interfaces\BookingTourInterface;
use Botble\Hotel\Repositories\Interfaces\BookingVoucherInterface;
use Botble\Hotel\Repositories\Interfaces\CurrencyInterface;
use Botble\Hotel\Repositories\Interfaces\PlaceInterface;
use Botble\Hotel\Repositories\Interfaces\RoomInterface;
use Botble\Hotel\Repositories\Interfaces\RoomOptionInterface;
use Botble\Hotel\Repositories\Interfaces\ServiceInterface;
use Botble\Hotel\Repositories\Interfaces\TourInterface;
use Botble\Hotel\Repositories\Interfaces\VoucherInterface;
use Botble\Hotel\Services\BookingService;
use Botble\Payment\Enums\PaymentMethodEnum;
use Botble\Payment\Supports\PaymentHelper;
use Botble\Payment\Services\Gateways\BankTransferPaymentService;
use Botble\Payment\Services\Gateways\CodPaymentService;
use Botble\SeoHelper\SeoOpenGraph;
use Carbon\Carbon;
use Collective\Html\HtmlFacade as Html;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Botble\Media\Facades\RvMedia;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\Slug\Facades\SlugHelper;
use Botble\Theme\Facades\Theme;

class PublicController extends Controller
{
    public function getRooms(
        Request          $request,
        RoomInterface    $roomRepository,
        PlaceInterface   $placeRepository,
        BaseHttpResponse $response
    )
    {
        $amenitiesID = $request->input('amenities');
        $placesId = $request->input('places');
        $categoriesId = $request->input('categories');
        $min = $request->input('min-value');
        $max = $request->input('max-value');
        $sortOrder = $request->input('sort_order');
        if (is_array($placesId)) {
            $placesId = array_filter($placesId, function ($value) {
                return !is_null($value);
            });
        }
        $filters = [
            'amenity_id' => $amenitiesID,
            'places_id' => $placesId,
            'categories_id' => $categoriesId,
            'price' => [
                'min' => $min,
                'max' => $max,
            ]
        ];

        $params = [
            'paginate' => [
                'per_page' => 10,
                'current_paged' => (int)$request->input('page', 1),
            ],
            'with' => [
                'vouchers',
            ],
        ];

        switch ($sortOrder) {
            case('price_asc'):
                $params['order_by'] = [
                    'price' => 'ASC',
                ];
                break;
            case('name_asc'):
                $params['order_by'] = [
                    'name' => 'ASC',
                ];
                break;
            case('name_desc'):
                $params['order_by'] = [
                    'name' => 'DESC',
                ];
                break;
            default:
                $params['order_by'] = [
                    'price' => 'DESC',
                ];
        }

        $allRooms = $roomRepository->getRooms($filters, $params);
        if (!empty($placesId)) {
            $places = implode(', ', array_column($placeRepository
                ->allBy([['id', 'IN', $placesId]], [], ['name'])->toArray(), 'name'));
            SeoHelper::setTitle(__('Khách sạn tại :place', ['place' => $places]));
            SeoHelper::setDescription(__('Tìm thấy :total khách sạn ở :place', ['total' => $allRooms->total(), 'place' => $places]));

        } else {
            SeoHelper::setTitle(__('Khách sạn'));
            SeoHelper::setDescription(__('Tìm thấy :total khách sạn', ['total' => $allRooms->total()]));
        }
        $minPrice = Room::min('price') ?? 0;
        $maxPrice = Room::max('price') ?? 2000000;
        $recentlyRooms = [];
        if (count(session('recently_viewed_rooms_id', [])) > 0) {
            $recentlyRooms = $roomRepository->allBy([
                ['id', 'IN', session('recently_viewed_rooms_id')]
            ], [], ['*']);
        }
        return Theme::scope('hotel.rooms', compact('allRooms', 'minPrice', 'maxPrice', 'recentlyRooms'))->render();
    }

    public function getRoom(Request $request, string $key, RoomInterface $roomRepository)
    {
        $slug = SlugHelper::getSlug($key, SlugHelper::getPrefix(Room::class));
        if (!$slug) {
            abort(404);
        }

        $room = $roomRepository->getFirstBy(
            ['id' => $slug->reference_id],
            ['*'],
            ['amenities', 'features', 'category', 'place', 'optionCategories', 'vouchers', 'testimonials']
        );
        if (!$room) {
            abort(404);
        }

        $this->updateRecentlyViewed('recently_viewed_rooms_id', $room->id);

        SeoHelper::setTitle($room->name)->setDescription(Str::words($room->description, 120));

        $meta = new SeoOpenGraph();
        if ($room->image) {
            $meta->setImage(RvMedia::getImageUrl($room->image));
        }
        $meta->setDescription($room->description);
        $meta->setUrl($room->url);
        $meta->setTitle($room->name);
        $meta->setType('article');

        SeoHelper::setSeoOpenGraph($meta);

        if (function_exists('admin_bar')) {
            admin_bar()->registerLink(__('Edit this room'), route('room.edit', $room->id));
        }

        $dateParts = explode(" - ", $request->input('date'));
        if (isset($dateParts[0]) && isset($dateParts[1])) {
            $startDate = Carbon::createFromFormat('d/m/Y', $dateParts[0])->startOfDay();
            $endDate = Carbon::createFromFormat('d/m/Y', $dateParts[1])->endOfDay();
        } else {
            $startDate = Carbon::now();
            $endDate = Carbon::now()->addDay();
        }
        $nights = $endDate->diffInDays($startDate);

        $relatedRooms = $roomRepository->getRelatedRooms(
            $room->id,
            (int)theme_option('number_of_related_rooms', 2),
            [
                'with' => [
                    'amenities',
                    'slugable',
                ],
            ]
        );

        $testimonials = $room->testimonials()->get();

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, ROOM_MODULE_SCREEN_NAME, $room);

        $images = [];
        foreach ($room->images as $image) {
            $images[] = RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage());
        }

        Theme::asset()->add('ckeditor-content-styles', 'vendor/core/core/base/libraries/ckeditor/content-styles.css');

        $room->content = Html::tag('div', (string)$room->content, ['class' => 'ck-content'])->toHtml();

        return Theme::scope('hotel.room', compact('room', 'images', 'relatedRooms', 'testimonials', 'startDate', 'endDate', 'nights'))->render();
    }

    public function getPlace(string $key, PlaceInterface $placeRepository)
    {
        $slug = SlugHelper::getSlug($key, SlugHelper::getPrefix(Place::class));

        if (!$slug) {
            abort(404);
        }

        $place = $placeRepository->getFirstBy(
            ['id' => $slug->reference_id],
            ['*'],
        );

        if (!$place) {
            abort(404);
        }

        SeoHelper::setTitle($place->name)->setDescription(Str::words($place->description, 120));

        $meta = new SeoOpenGraph();
        if ($place->image) {
            $meta->setImage(RvMedia::getImageUrl($place->image));
        }
        $meta->setDescription($place->description);
        $meta->setUrl($place->url);
        $meta->setTitle($place->name);
        $meta->setType('article');

        SeoHelper::setSeoOpenGraph($meta);

        Theme::breadcrumb()
            ->add(__('Home'), route('public.index'))
            ->add($place->name, $place->url);

        $relatedPlaces = $placeRepository->getRelatedPlaces($place->id, 3);

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, PLACE_MODULE_SCREEN_NAME, $place);

        Theme::asset()->add('ckeditor-content-styles', 'vendor/core/core/base/libraries/ckeditor/content-styles.css');

        $place->content = Html::tag('div', (string)$place->content, ['class' => 'ck-content'])->toHtml();

        return Theme::scope('hotel.place', compact('place', 'relatedPlaces'))->render();
    }

    public function getTours(Request $request, TourInterface $tourRepository, PlaceInterface $placeRepository, BaseHttpResponse $response)
    {
        $placesId = $request->input('places');
        $min = $request->input('min-value');
        $max = $request->input('max-value');
        $sortOrder = $request->input('sort_order');
        if (is_array($placesId)) {
            $placesId = array_filter($placesId, function ($value) {
                return !is_null($value);
            });
        }
        $filters = [
            'price' => [
                'min' => $min,
                'max' => $max,
            ],
            'places_id' => $placesId,
        ];
        $params = [
            'paginate' => [
                'per_page' => 10,
                'current_paged' => (int)$request->input('page', 1),
            ],
            'with' => [
            ],
        ];

        switch ($sortOrder) {
            case('price_asc'):
                $params['order_by'] = [
                    'price' => 'ASC',
                ];
                break;
            case('name_asc'):
                $params['order_by'] = [
                    'name' => 'ASC',
                ];
                break;
            case('name_desc'):
                $params['order_by'] = [
                    'name' => 'DESC',
                ];
                break;
            default:
                $params['order_by'] = [
                    'price' => 'DESC',
                ];
        }

        $allTours = $tourRepository->getTours($filters, $params);
        if (!empty($placesId)) {
            $places = implode(', ', array_column($placeRepository
                ->allBy([['id', 'IN', $placesId]], [], ['name'])->toArray(), 'name'));
            SeoHelper::setTitle(__('Tour tại :place', ['place' => $places]));
            SeoHelper::setDescription(__('Tìm thấy :total tour ở :place', ['total' => $allTours->total(), 'place' => $places]));
        } else {
            SeoHelper::setTitle(__('Tour'));
            SeoHelper::setDescription(__('Tìm thấy :total tour', ['total' => $allTours->total()]));
        }

        $minPrice = Tour::min('price') ?? 0;
        $maxPrice = Tour::max('price') ?? 2000000;
        $recentlyTours = [];
        if (count(session('recently_viewed_tours_id', [])) > 0) {
            $recentlyTours = $tourRepository->allBy([
                ['id', 'IN', session('recently_viewed_tours_id')]
            ], [], ['*']);
        }
        return Theme::scope('hotel.tours', compact('allTours', 'minPrice', 'maxPrice', 'recentlyTours'))->render();
    }

    public function getTour(string $key, TourInterface $tourRepository)
    {
        $slug = SlugHelper::getSlug($key, SlugHelper::getPrefix(Tour::class));
        if (!$slug) {
            abort(404);
        }

        $tour = $tourRepository->getFirstBy(
            ['id' => $slug->reference_id],
            ['*'],
        );
        if (!$tour) {
            abort(404);
        }
        $this->updateRecentlyViewed('recently_viewed_tours_id', $tour->id);
        SeoHelper::setTitle($tour->name)->setDescription(Str::words($tour->description, 120));

        $meta = new SeoOpenGraph();
        if ($tour->image) {
            $meta->setImage(RvMedia::getImageUrl($tour->image));
        }
        $meta->setDescription($tour->description);
        $meta->setUrl($tour->url);
        $meta->setTitle($tour->name);
        $meta->setType('article');

        SeoHelper::setSeoOpenGraph($meta);

        if (function_exists('admin_bar')) {
            admin_bar()->registerLink(__('Edit this tour'), route('tour.edit', $tour->id));
        }

        $startDate = Carbon::now()->format('d-m-Y');
        $endDate = Carbon::now()->addDay()->format('d-m-Y');

        $condition = [
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];

        $relatedTours = $tourRepository->getRelatedTours(
            $tour->id,
            (int)theme_option('number_of_related_rooms', 2),
            [
                'with' => [
                    'slugable',
                ],
            ]
        );

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, ROOM_MODULE_SCREEN_NAME, $tour);

        $images = [];
        foreach ($tour->images as $image) {
            $images[] = RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage());
        }

        $testimonials = $tour->testimonials()->get();

        Theme::asset()->add('ckeditor-content-styles', 'vendor/core/core/base/libraries/ckeditor/content-styles.css');

        $tour->content = Html::tag('div', (string)$tour->content, ['class' => 'ck-content'])->toHtml();

        return Theme::scope('hotel.tour', compact('tour', 'images', 'relatedTours', 'testimonials'))->render();
    }

    public function postBooking(
        InitBookingRequest  $request,
        RoomOptionInterface $roomOptionRepository,
        TourInterface       $tourRepository,
        VoucherInterface    $voucherRepository,
        BaseHttpResponse    $response
    )
    {
        $adults = !empty($request->input('adults')) ? $request->input('adults') : 0;
        $children = !empty($request->input('children')) ? $request->input('children') : 0;
        $babies = !empty($request->input('babies')) ? $request->input('babies') : 0;

        $request->merge([
            'adults' => $adults,
            'children' => $children,
            'babies' => $babies,
        ]);

        $product = null;
        if ($request->input('type') == 'room') {
            $product = $roomOptionRepository->getFirstBy(
                ['id' => $request->input('room_id')],
                ['*'],
                []
            );
        }
        if ($request->input('type') == 'tour') {
            $product = $tourRepository->getFirstBy(
                ['id' => $request->input('room_id')],
                ['*'],
                []
            );
        }
        if ($request->input('type') == 'voucher') {
            $product = $voucherRepository->getFirstBy(
                ['id' => $request->input('room_id')],
                ['*'],
                []
            );
        }
        if (empty($product)) {
            abort(404);
        }

        $token = md5(Str::random(40));

        $cartToken = session('cart_token', []);
        $cartToken[] = $token;
        session([
            $token => $request->except(['_token']),
            'checkout_token' => $token,
            'cart_token' => $cartToken,
        ]);

        return $response->setNextUrl(route('public.booking.form', $token));
    }

    public function getBookingCart(
        RoomOptionInterface $roomOptionRepository,
        TourInterface       $tourRepository,
        VoucherInterface    $voucherRepository,
        ServiceInterface    $serviceRepository,
        BaseHttpResponse    $response
    )
    {
        $cartToken = session('cart_token', []);

        $cartTokenActive = [];
        $items = [];
        foreach ($cartToken as $token) {
            if (session()->has($token)) {
                $sessionData = session($token);
                if (empty($sessionData)) {
                    break;
                }

                Carbon::setLocale('vi');

                $type = $sessionData['type'];
                $dateParts = explode(" - ", $sessionData['date']);
                $startDate = Carbon::createFromFormat('d/m/Y', $dateParts[0])->startOfDay();
                if (isset($dateParts[1])) {
                    $endDate = Carbon::createFromFormat('d/m/Y', $dateParts[1])->endOfDay();
                } else {
                    $endDate = $startDate;
                }
                $nights = $endDate->diffInDays($startDate);
                $adults = Arr::get($sessionData, 'adults');
                $children = Arr::get($sessionData, 'children');
                $babies = Arr::get($sessionData, 'babies');

                $product = null;

                if ($sessionData['type'] == 'room') {
                    $product = $roomOptionRepository->getFirstBy(
                        ['id' => Arr::get($sessionData, 'room_id')],
                        ['*'],
                        ['room', 'roomOptionCategory']
                    );

                    $children = $children ?? 0;
                    $product->total = $product->getRoomTotalPrice($nights, $adults, $children, $babies);
                    $product->base_price = $product->getRoomBasePrice($nights, $adults);
                    $product->additional_price = $product->getRoomAdditionalPrice($nights, $children, $babies);
                }
                if ($sessionData['type'] == 'tour') {
                    $product = $tourRepository->getFirstBy(
                        ['id' => Arr::get($sessionData, 'room_id')],
                        ['*'],
                        []
                    );

                    $product->total = $product->getTourTotalPrice($adults, $children, $babies);
                    $product->base_price = $product->getTourBasePrice($adults);
                    $product->additional_price = $product->getTourAdditionalPrice($children, $babies);
                }
                if ($sessionData['type'] == 'voucher') {
                    $product = $voucherRepository->getFirstBy(
                        ['id' => Arr::get($sessionData, 'room_id')],
                        ['*'],
                        ['room']
                    );

                    $product->total = $product->getVoucherTotalPrice($adults, $children, $babies, $nights);
                    $product->base_price = $product->getVoucherBasePrice($adults);
                    $product->additional_price = $product->getVoucherAdditionalPrice($children, $babies);
                }

                if (empty($product)) {
                    break;
                }

                $items[] = compact(
                    'product',
                    'type',
                    'startDate',
                    'endDate',
                    'nights',
                    'adults',
                    'children',
                    'babies',
                    'token'
                );
                $cartTokenActive[] = $token;
            }
        }
        session(['cart_token' => $cartTokenActive]);

        return Theme::scope('hotel.cart', compact('items'))->render();
    }

    public function getBooking(
        string              $token,
        RoomOptionInterface $roomOptionRepository,
        TourInterface       $tourRepository,
        VoucherInterface    $voucherRepository,
        ServiceInterface    $serviceRepository,
        BaseHttpResponse    $response
    )
    {
        if (session()->has($token)) {
            $sessionData = session($token);
        }

        if (empty($sessionData)) {
            abort(404);
        }

        Carbon::setLocale('vi');

        $type = $sessionData['type'];
        $dateParts = explode(" - ", $sessionData['date']);
        $startDate = Carbon::createFromFormat('d/m/Y', $dateParts[0])->startOfDay();
        if (isset($dateParts[1])) {
            $endDate = Carbon::createFromFormat('d/m/Y', $dateParts[1])->endOfDay();
        } else {
            $endDate = $startDate;
        }
        $nights = $endDate->diffInDays($startDate);
        $adults = Arr::get($sessionData, 'adults');
        $children = Arr::get($sessionData, 'children');
        $babies = Arr::get($sessionData, 'babies');

        $product = null;
        $view = null;

        if ($sessionData['type'] == 'room') {
            $product = $roomOptionRepository->getFirstBy(
                ['id' => Arr::get($sessionData, 'room_id')],
                ['*'],
                ['room', 'roomOptionCategory']
            );

            $children = $children ?? 0;

            $product->total = $product->getRoomTotalPrice($nights, $adults, $children, $babies);
            $product->base_price = $product->getRoomBasePrice($nights, $adults);
            $product->additional_price = $product->getRoomAdditionalPrice($nights, $children, $babies);

            $view = 'hotel.booking';
        }
        if ($sessionData['type'] == 'tour') {
            $product = $tourRepository->getFirstBy(
                ['id' => Arr::get($sessionData, 'room_id')],
                ['*'],
                []
            );

            $product->total = $product->getTourTotalPrice($adults, $children, $babies);
            $product->base_price = $product->getTourBasePrice($adults);
            $product->additional_price = $product->getTourAdditionalPrice($children, $babies);

            $view = 'hotel.booking-tour';
        }
        if ($sessionData['type'] == 'voucher') {
            $product = $voucherRepository->getFirstBy(
                ['id' => Arr::get($sessionData, 'room_id')],
                ['*'],
                ['room']
            );

            $product->total = $product->getVoucherTotalPrice($adults, $children, $babies, $nights);
            $product->base_price = $product->getVoucherBasePrice($adults);
            $product->additional_price = $product->getVoucherAdditionalPrice($children, $babies);

            $view = 'hotel.booking-voucher';
        }

        if (empty($product)) {
            abort(404);
        }

        $user = auth('member')->user();

        return Theme::scope(
            $view,
            compact(
                'product',
                'type',
                'startDate',
                'endDate',
                'nights',
                'adults',
                'children',
                'babies',
                'user',
                'token'
            )
        )->render();
    }

    public function postCheckout(
        CheckoutRequest         $request,
        BookingInterface        $bookingRepository,
        RoomOptionInterface     $roomOptionRepository,
        TourInterface           $tourRepository,
        VoucherInterface        $voucherRepository,
        BookingAddressInterface $bookingAddressRepository,
        BookingRoomInterface    $bookingRoomRepository,
        BookingTourInterface    $bookingTourRepository,
        BookingVoucherInterface $bookingVoucherRepository,
        ServiceInterface        $serviceRepository,
        BookingService          $bookingService,
        BaseHttpResponse        $response
    )
    {
        $booking = $bookingRepository->getModel();
        $booking->fill($request->input());

        $adults = $request->input('adults');
        $children = $request->input('children');
        $babies = $request->input('babies');
        $startDate = Carbon::createFromFormat('d-m-Y', $request->input('start_date'));
        $endDate = Carbon::createFromFormat('d-m-Y', $request->input('end_date'));
        $nights = $endDate->diffInDays($startDate);

        $product = null;
        switch ($request->input('type')) {
            case 'room':
                $product = $roomOptionRepository->findOrFail($request->input('room_id'));
                $product->total_price = $product->getRoomTotalPrice($nights, $adults, $children, $babies);
                $booking->transaction_id = 'K' . $bookingRepository->generateBookingCode();
                break;
            case 'tour':
                $product = $tourRepository->findOrFail($request->input('room_id'));
                $product->total_price = $product->getTourTotalPrice($adults, $children, $babies);
                $booking->transaction_id = 'T' . $bookingRepository->generateBookingCode();
                break;
            case 'voucher':
                $product = $voucherRepository->findOrFail($request->input('room_id'));
                $product->total_price = $product->getVoucherTotalPrice($adults, $children, $babies, $nights);
                $booking->transaction_id = 'V' . $bookingRepository->generateBookingCode();
                break;
        }

        $booking->amount = $product->total_price ?? 0;
        $booking->tax_amount = 0;

        $serviceIds = $request->input('services');

        if ($serviceIds) {
            $services = $serviceRepository->getModel()
                ->whereIn('id', $serviceIds)
                ->get();

            foreach ($services as $service) {
                $booking->amount += $service->price;
            }
        }

        $booking = $bookingRepository->createOrUpdate($booking);

        if ($serviceIds) {
            $booking->services()->attach($serviceIds);
        }

        session()->put('booking_transaction_id', $booking->transaction_id);

        switch ($request->input('type')) {
            case 'room':
                $bookingRoomRepository->createOrUpdate([
                    'room_id' => $product->id,
                    'room_option_category_id' => $product->room_option_category_id,
                    'booking_id' => $booking->id,
                    'price' => $product->price,
                    'price_child' => $product->price_child,
                    'price_baby' => $product->price_baby,
                    'start_date' => $startDate->format('Y-m-d'),
                    'end_date' => $endDate->format('Y-m-d'),
                ]);
                break;
            case 'tour':
                $bookingTourRepository->createOrUpdate([
                    'tour_id' => $product->id,
                    'booking_id' => $booking->id,
                    'price' => $product->price,
                    'price_child' => $product->price_child,
                    'price_baby' => $product->price_baby,
                ]);
                break;
            case 'voucher':
                $bookingVoucherRepository->createOrUpdate([
                    'voucher_id' => $product->id,
                    'booking_id' => $booking->id,
                    'price' => $product->price,
                    'price_child' => $product->price_child,
                    'price_baby' => $product->price_baby,
                    'start_date' => $startDate->format('Y-m-d'),
                    'end_date' => $endDate->format('Y-m-d'),
                ]);
                break;
        }

        $bookingAddress = $bookingAddressRepository->getModel();
        $bookingAddress->fill($request->input());
        $bookingAddress->booking_id = $booking->id;
        $bookingAddressRepository->createOrUpdate($bookingAddress);

        $request->merge([
            'order_id' => $booking->id,
        ]);

        $data = [
            'error' => false,
            'message' => false,
            'amount' => $booking->amount,
            'currency' => strtoupper(get_application_currency()->title),
            'type' => $request->input('payment_method'),
            'charge_id' => null,
        ];

        session()->put('selected_payment_method', $data['type']);

        $paymentData = apply_filters(PAYMENT_FILTER_PAYMENT_DATA, [], $request);

        switch ($request->input('payment_method')) {
            case PaymentMethodEnum::COD:
                $codPaymentService = app(CodPaymentService::class);
                $data['charge_id'] = $codPaymentService->execute($paymentData);
                $data['message'] = trans('plugins/payment::payment.payment_pending');

                break;

            case PaymentMethodEnum::BANK_TRANSFER:
                $bankTransferPaymentService = app(BankTransferPaymentService::class);
                $data['charge_id'] = $bankTransferPaymentService->execute($paymentData);
                $data['message'] = trans('plugins/payment::payment.payment_pending');

                break;

            default:
                $data = apply_filters(PAYMENT_FILTER_AFTER_POST_CHECKOUT, $data, $request);

                break;
        }

        if ($checkoutUrl = Arr::get($data, 'checkoutUrl')) {
            return $response
                ->setError($data['error'])
                ->setNextUrl($checkoutUrl)
                ->withInput()
                ->setMessage($data['message']);
        }

        if ($data['error'] || !$data['charge_id']) {
            return $response
                ->setError()
                ->setNextUrl(PaymentHelper::getCancelURL())
                ->withInput()
                ->setMessage($data['message'] ?: __('Checkout error!'));
        }

        $bookingService->processBooking($booking->id, $data['charge_id']);

        $redirectUrl = PaymentHelper::getRedirectURL();

        if ($request->input('token')) {
            session()->forget($request->input('token'));
            session()->forget('checkout_token');
        }
        return $response
            ->setNextUrl($redirectUrl)
            ->setMessage(__('Booking successfully!'));
    }

    public function checkoutSuccess(
        string              $transactionId,
        BookingInterface    $bookingRepository,
        RoomOptionInterface $roomRepository,
        TourInterface       $tourRepository,
        VoucherInterface    $voucherRepository
    )
    {
        $booking = $bookingRepository->getFirstBy(['transaction_id' => $transactionId], [], ['room', 'address']);

        if (!$booking) {
            abort(404);
        }

        SeoHelper::setTitle(__('Booking Information'));

        $view = null;
        $bookingInfo = null;

        $adults = $booking->number_of_guests_adults;
        $children = $booking->number_of_guests_children;
        $babies = $booking->number_of_guests_babies;

        $startDate = null;
        $endDate = null;
        $nights = 0;

        switch ($booking->type) {
            case 'room':
                $room = $roomRepository->getFirstBy(
                    ['id' => $booking->room->room_id],
                    ['*'],
                    ['room', 'roomOptionCategory']
                );
                $startDate = Carbon::createFromFormat('Y-m-d', $booking->room->start_date);
                $endDate = Carbon::createFromFormat('Y-m-d', $booking->room->end_date);
                $nights = $endDate->diffInDays($startDate);

                $room->total = $room->getBookingTotalPrice($booking->room->price ?? 0, $booking->room->price_child ?? 0, $booking->room->price_baby ?? 0, $nights, $adults, $children, $babies);
                $room->base_price = $room->getBookingBasePrice($booking->room->price ?? 0, $nights, $adults);
                $room->additional_price = $room->getBookingAdditionalPrice($booking->room->price_child ?? 0, $booking->room->price_baby ?? 0, $nights, $children, $babies);

                $view = 'hotel.booking-information';
                $bookingInfo = $room;
                break;
            case 'tour':
                $tour = $tourRepository->getFirstBy(
                    ['id' => $booking->tour->tour_id],
                    ['*'],
                    []
                );

                $tour->total = $tour->getBookingTotalPrice($booking->tour->price ?? 0, $booking->tour->price_child ?? 0, $booking->tour->price_baby ?? 0, $adults, $children, $babies);
                $tour->base_price = $tour->getBookingBasePrice($booking->tour->price ?? 0, $adults);
                $tour->additional_price = $tour->getBookingAdditionalPrice($booking->tour->price_child ?? 0, $booking->tour->price_baby ?? 0, $children, $babies);

                $view = 'hotel.booking-information-tour';
                $bookingInfo = $tour;
                break;
            case 'voucher':
                $voucher = $voucherRepository->getFirstBy(
                    ['id' => $booking->voucher->voucher_id],
                    ['*']
                );

                $voucher->total = $voucher->getBookingTotalPrice($booking->voucher->price ?? 0, $booking->voucher->price_child ?? 0, $booking->voucher->price_baby ?? 0, $adults, $children, $babies);
                $voucher->base_price = $voucher->getBookingBasePrice($booking->voucher->price ?? 0, $adults);
                $voucher->additional_price = $voucher->getBookingAdditionalPrice($booking->voucher->price_child ?? 0, $booking->voucher->price_baby ?? 0, $children, $babies);
                $startDate = Carbon::parse($booking->voucher->start_date)->format('d-m-Y');
                $endDate = Carbon::parse($booking->voucher->end_date)->format('d-m-Y');
                $view = 'hotel.booking-information-voucher';
                $bookingInfo = $voucher;
                break;
        }

        $user = auth('member')->user();

        return Theme::scope($view, compact('booking', 'bookingInfo', 'adults', 'children', 'babies', 'startDate', 'endDate', 'nights', 'user'))->render();
    }

    public function ajaxCalculateBookingAmount(
        CalculateBookingAmountRequest $request,
        BaseHttpResponse              $response,
        RoomInterface                 $roomRepository,
        ServiceInterface              $serviceRepository
    )
    {
        $request->validate([
            'start_date' => 'required:date_format:d-m-Y',
            'end_date' => 'required:date_format:d-m-Y',
            'room_id' => 'required',
        ]);

        $startDate = Carbon::createFromFormat('d-m-Y', $request->input('start_date'));
        $endDate = Carbon::createFromFormat('d-m-Y', $request->input('end_date'));
        $nights = $endDate->diffInDays($startDate);

        $room = $roomRepository->findOrFail($request->input('room_id'));

        $room->total_price = $room->getRoomTotalPrice($startDate, $endDate, $nights);

        $taxAmount = $room->tax->percentage * $room->total_price / 100;

        $amount = $room->total_price + $taxAmount;

        $serviceIds = $request->input('services');

        if ($serviceIds) {
            $services = $serviceRepository->getModel()
                ->whereIn('id', $serviceIds)
                ->get();

            foreach ($services as $service) {
                $amount += $service->price;
            }
        }

        return $response->setData([
            'amount' => format_price($amount),
            'amount_raw' => $amount,
        ]);
    }

    public function changeCurrency(
        Request           $request,
        CurrencyInterface $currencyRepository,
        BaseHttpResponse  $response,
                          $title = null
    )
    {
        if (empty($title)) {
            $title = $request->input('currency');
        }

        if (!$title) {
            return $response;
        }

        $currency = $currencyRepository->getFirstBy(['title' => $title]);

        if ($currency) {
            cms_currency()->setApplicationCurrency($currency);
        }

        return $response;
    }

    function updateRecentlyViewed($sessionKey, $itemId)
    {
        $recentlyViewedItems = session()->get($sessionKey, []);
        $existingItemIndex = array_search($itemId, $recentlyViewedItems);

        if ($existingItemIndex !== false) {
            unset($recentlyViewedItems[$existingItemIndex]);
        }

        array_unshift($recentlyViewedItems, $itemId);

        $maxListSize = 10;
        $recentlyViewedItems = array_slice($recentlyViewedItems, 0, $maxListSize);

        session()->put($sessionKey, $recentlyViewedItems);
    }

    public function ajaxGetTotalPrice(
        Request             $request,
        RoomOptionInterface $roomRepository,
        TourInterface       $tourRepository,
        VoucherInterface    $voucherRepository,
    )
    {
        $request->validate([
            'type' => ['required'],
            'date' => ['required'],
            "adults" => ['integer', 'required'],
            "children" => ['integer', 'required'],
            "babies" => ['integer', 'required'],
        ]);
        Carbon::setLocale('vi');
        $type = $request->input('type');

        $dateParts = explode(" - ", $request->input('date'));
        $startDate = Carbon::createFromFormat('d/m/Y', $dateParts[0])->startOfDay();
        if (isset($dateParts[1])) {
            $endDate = Carbon::createFromFormat('d/m/Y', $dateParts[1])->endOfDay();
        } else {
            $endDate = $startDate;
        }
        $nights = $endDate->diffInDays($startDate);
        $nights = !empty($nights) ? $nights : 1;
        $adults = $request->input('adults');
        $children = $request->input('children');
        $babies = $request->input('babies');
        $total = null;
        if ($type == 'room') {
            $room = $roomRepository->getFirstBy(
                ['id' => $request->input('room_id')],
                ['*'],
                ['room', 'roomOptionCategory']
            );
            $children = $children ?? 0;
            $total = $room->getRoomTotalPrice($nights, $adults, $children, $babies);
        }
        if ($type == 'tour') {
            $room = $tourRepository->getFirstBy(
                ['id' => $request->input('room_id')],
                ['*'],
                []
            );
            $total = $room->getTourTotalPrice($adults, $children, $babies);
        }
        if ($type == 'voucher') {
            $room = $voucherRepository->getFirstBy(
                ['id' => $request->input('room_id')],
                ['*'],
                ['room']
            );
            $total = $room->getVoucherTotalPrice($adults, $children, $babies, $nights);
        }

        return response()->json([
            'total' => number_format($total),
        ]);
    }

    public function getFeaturedPosts(){
        $posts = Post::where('is_featured',true)->paginate(9);
        $title = "Bài viết nổi bật";
        return Theme::scope('category',compact('title','posts'))->render();
    }

    public function getRecentPosts(){
        $posts = Post::orderBy('id','DESC')->paginate(9);
        $title = "Bài viết mới nhất";
        return Theme::scope('category',compact('title','posts'))->render();
    }
}
