<?php

namespace Botble\Hotel\Providers;

use Botble\Base\Supports\Helper;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Hotel\Models\Amenity;
use Botble\Hotel\Models\Booking;
use Botble\Hotel\Models\BookingAddress;
use Botble\Hotel\Models\BookingRoom;
use Botble\Hotel\Models\BookingTour;
use Botble\Hotel\Models\BookingVoucher;
use Botble\Hotel\Models\Currency;
use Botble\Hotel\Models\Customer;
use Botble\Hotel\Models\Feature;
use Botble\Hotel\Models\Food;
use Botble\Hotel\Models\FoodType;
use Botble\Hotel\Models\Place;
use Botble\Hotel\Models\Room;
use Botble\Hotel\Models\RoomCategory;
use Botble\Hotel\Models\RoomDate;
use Botble\Hotel\Models\RoomOption;
use Botble\Hotel\Models\RoomOptionCategory;
use Botble\Hotel\Models\Service;
use Botble\Hotel\Models\Tax;
use Botble\Hotel\Models\Tour;
use Botble\Hotel\Models\Voucher;
use Botble\Hotel\Repositories\Caches\AmenityCacheDecorator;
use Botble\Hotel\Repositories\Caches\BookingAddressCacheDecorator;
use Botble\Hotel\Repositories\Caches\BookingCacheDecorator;
use Botble\Hotel\Repositories\Caches\BookingRoomCacheDecorator;
use Botble\Hotel\Repositories\Caches\BookingTourCacheDecorator;
use Botble\Hotel\Repositories\Caches\BookingVoucherCacheDecorator;
use Botble\Hotel\Repositories\Caches\CurrencyCacheDecorator;
use Botble\Hotel\Repositories\Caches\CustomerCacheDecorator;
use Botble\Hotel\Repositories\Caches\FeatureCacheDecorator;
use Botble\Hotel\Repositories\Caches\FoodCacheDecorator;
use Botble\Hotel\Repositories\Caches\FoodTypeCacheDecorator;
use Botble\Hotel\Repositories\Caches\PlaceCacheDecorator;
use Botble\Hotel\Repositories\Caches\RoomCacheDecorator;
use Botble\Hotel\Repositories\Caches\RoomCategoryCacheDecorator;
use Botble\Hotel\Repositories\Caches\RoomDateCacheDecorator;
use Botble\Hotel\Repositories\Caches\RoomOptionCacheDecorator;
use Botble\Hotel\Repositories\Caches\RoomOptionCategoryCacheDecorator;
use Botble\Hotel\Repositories\Caches\ServiceCacheDecorator;
use Botble\Hotel\Repositories\Caches\TaxCacheDecorator;
use Botble\Hotel\Repositories\Caches\TourCacheDecorator;
use Botble\Hotel\Repositories\Caches\VoucherCacheDecorator;
use Botble\Hotel\Repositories\Eloquent\AmenityRepository;
use Botble\Hotel\Repositories\Eloquent\BookingAddressRepository;
use Botble\Hotel\Repositories\Eloquent\BookingRepository;
use Botble\Hotel\Repositories\Eloquent\BookingRoomRepository;
use Botble\Hotel\Repositories\Eloquent\BookingTourRepository;
use Botble\Hotel\Repositories\Eloquent\BookingVoucherRepository;
use Botble\Hotel\Repositories\Eloquent\CurrencyRepository;
use Botble\Hotel\Repositories\Eloquent\CustomerRepository;
use Botble\Hotel\Repositories\Eloquent\FeatureRepository;
use Botble\Hotel\Repositories\Eloquent\FoodRepository;
use Botble\Hotel\Repositories\Eloquent\FoodTypeRepository;
use Botble\Hotel\Repositories\Eloquent\PlaceRepository;
use Botble\Hotel\Repositories\Eloquent\RoomCategoryRepository;
use Botble\Hotel\Repositories\Eloquent\RoomDateRepository;
use Botble\Hotel\Repositories\Eloquent\RoomOptionCategoryRepository;
use Botble\Hotel\Repositories\Eloquent\RoomOptionRepository;
use Botble\Hotel\Repositories\Eloquent\RoomRepository;
use Botble\Hotel\Repositories\Eloquent\ServiceRepository;
use Botble\Hotel\Repositories\Eloquent\TaxRepository;
use Botble\Hotel\Repositories\Eloquent\TourRepository;
use Botble\Hotel\Repositories\Eloquent\VoucherRepository;
use Botble\Hotel\Repositories\Interfaces\AmenityInterface;
use Botble\Hotel\Repositories\Interfaces\BookingAddressInterface;
use Botble\Hotel\Repositories\Interfaces\BookingInterface;
use Botble\Hotel\Repositories\Interfaces\BookingRoomInterface;
use Botble\Hotel\Repositories\Interfaces\BookingTourInterface;
use Botble\Hotel\Repositories\Interfaces\BookingVoucherInterface;
use Botble\Hotel\Repositories\Interfaces\CurrencyInterface;
use Botble\Hotel\Repositories\Interfaces\CustomerInterface;
use Botble\Hotel\Repositories\Interfaces\FeatureInterface;
use Botble\Hotel\Repositories\Interfaces\FoodInterface;
use Botble\Hotel\Repositories\Interfaces\FoodTypeInterface;
use Botble\Hotel\Repositories\Interfaces\PlaceInterface;
use Botble\Hotel\Repositories\Interfaces\RoomCategoryInterface;
use Botble\Hotel\Repositories\Interfaces\RoomDateInterface;
use Botble\Hotel\Repositories\Interfaces\RoomInterface;
use Botble\Hotel\Repositories\Interfaces\RoomOptionCategoryInterface;
use Botble\Hotel\Repositories\Interfaces\RoomOptionInterface;
use Botble\Hotel\Repositories\Interfaces\ServiceInterface;
use Botble\Hotel\Repositories\Interfaces\TaxInterface;
use Botble\Hotel\Repositories\Interfaces\TourInterface;
use Botble\Hotel\Repositories\Interfaces\VoucherInterface;
use Botble\LanguageAdvanced\Supports\LanguageAdvancedManager;
use Botble\Base\Facades\EmailHandler;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Botble\Theme\Facades\SiteMapManager;
use Botble\Slug\Facades\SlugHelper;

class HotelServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register(): void
    {
        $this->app->bind(CurrencyInterface::class, function () {
            return new CurrencyCacheDecorator(
                new CurrencyRepository(new Currency())
            );
        });

        $this->app->bind(RoomInterface::class, function () {
            return new RoomCacheDecorator(
                new RoomRepository(new Room())
            );
        });

        $this->app->bind(RoomDateInterface::class, function () {
            return new RoomDateCacheDecorator(
                new RoomDateRepository(new RoomDate())
            );
        });

        $this->app->bind(AmenityInterface::class, function () {
            return new AmenityCacheDecorator(
                new AmenityRepository(new Amenity())
            );
        });

        $this->app->bind(FoodInterface::class, function () {
            return new FoodCacheDecorator(
                new FoodRepository(new Food())
            );
        });

        $this->app->bind(FoodTypeInterface::class, function () {
            return new FoodTypeCacheDecorator(
                new FoodTypeRepository(new FoodType())
            );
        });

        $this->app->bind(BookingInterface::class, function () {
            return new BookingCacheDecorator(
                new BookingRepository(new Booking())
            );
        });

        $this->app->bind(BookingAddressInterface::class, function () {
            return new BookingAddressCacheDecorator(
                new BookingAddressRepository(new BookingAddress())
            );
        });

        $this->app->bind(BookingRoomInterface::class, function () {
            return new BookingRoomCacheDecorator(
                new BookingRoomRepository(new BookingRoom())
            );
        });

        $this->app->bind(BookingTourInterface::class, function () {
            return new BookingTourCacheDecorator(
                new BookingTourRepository(new BookingTour())
            );
        });

        $this->app->bind(BookingVoucherInterface::class, function () {
            return new BookingVoucherCacheDecorator(
                new BookingVoucherRepository(new BookingVoucher())
            );
        });

        $this->app->bind(CustomerInterface::class, function () {
            return new CustomerCacheDecorator(
                new CustomerRepository(new Customer())
            );
        });

        $this->app->bind(RoomCategoryInterface::class, function () {
            return new RoomCategoryCacheDecorator(
                new RoomCategoryRepository(new RoomCategory())
            );
        });

        $this->app->bind(FeatureInterface::class, function () {
            return new FeatureCacheDecorator(
                new FeatureRepository(new Feature())
            );
        });

        $this->app->bind(ServiceInterface::class, function () {
            return new ServiceCacheDecorator(
                new ServiceRepository(new Service())
            );
        });

        $this->app->bind(PlaceInterface::class, function () {
            return new PlaceCacheDecorator(
                new PlaceRepository(new Place())
            );
        });

        $this->app->bind(TaxInterface::class, function () {
            return new TaxCacheDecorator(
                new TaxRepository(new Tax())
            );
        });

        $this->app->bind(RoomOptionInterface::class, function () {
            return new RoomOptionCacheDecorator(
                new RoomOptionRepository(new RoomOption())
            );
        });

        $this->app->bind(RoomOptionCategoryInterface::class, function () {
            return new RoomOptionCategoryCacheDecorator(
                new RoomOptionCategoryRepository(new RoomOptionCategory())
            );
        });

        $this->app->bind(VoucherInterface::class, function () {
            return new VoucherCacheDecorator(
                new VoucherRepository(new Voucher())
            );
        });

        $this->app->bind(TourInterface::class, function () {
            return new TourCacheDecorator(
                new TourRepository(new Tour())
            );
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot(): void
    {
        SlugHelper::registerModule(Room::class, 'Rooms');
        SlugHelper::setPrefix(Room::class, 'rooms');

        SlugHelper::registerModule(Tour::class, 'Tours');
        SlugHelper::setPrefix(Tour::class, 'tours');

        $this->setNamespace('plugins/hotel')
            ->loadAndPublishConfigurations(['permissions', 'hotel', 'email'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes()
            ->publishAssets();

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()
                ->registerItem([
                    'id' => 'cms-plugins-hotel',
                    'priority' => 5,
                    'parent_id' => null,
                    'name' => 'plugins/hotel::hotel.name',
                    'icon' => 'fas fa-hotel',
                    'url' => route('room.index'),
                    'permissions' => ['room.index'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-room',
                    'priority' => 1,
                    'parent_id' => 'cms-plugins-hotel',
                    'name' => 'plugins/hotel::room.name',
                    'icon' => null,
                    'url' => route('room.index'),
                    'permissions' => ['room.index'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-room-option-category',
                    'priority' => 1,
                    'parent_id' => 'cms-plugins-hotel',
                    'name' => 'plugins/hotel::room-option-category.name',
                    'icon' => null,
                    'url' => route('room-option-category.index'),
                    'permissions' => ['room-option-category.index'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-room-option',
                    'priority' => 1,
                    'parent_id' => 'cms-plugins-hotel',
                    'name' => 'plugins/hotel::room-option.name',
                    'icon' => null,
                    'url' => route('room-option.index'),
                    'permissions' => ['room-option.index'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-room-category',
                    'priority' => 2,
                    'parent_id' => 'cms-plugins-hotel',
                    'name' => 'plugins/hotel::room-category.name',
                    'icon' => null,
                    'url' => route('room-category.index'),
                    'permissions' => ['room-category.index'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-voucher',
                    'priority' => 1,
                    'parent_id' => 'cms-plugins-hotel',
                    'name' => 'plugins/hotel::voucher.name',
                    'icon' => null,
                    'url' => route('voucher.index'),
                    'permissions' => ['voucher.index'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-amenities',
                    'priority' => 3,
                    'parent_id' => 'cms-plugins-hotel',
                    'name' => 'plugins/hotel::amenity.name',
                    'icon' => null,
                    'url' => route('amenity.index'),
                    'permissions' => ['amenity.index'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-feature',
                    'priority' => 6,
                    'parent_id' => 'cms-plugins-hotel',
                    'name' => 'plugins/hotel::feature.menu',
                    'icon' => null,
                    'url' => route('feature.index'),
                    'permissions' => ['feature.index'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-place',
                    'priority' => 6,
                    'parent_id' => 'cms-plugins-hotel',
                    'name' => 'plugins/hotel::place.name',
                    'icon' => null,
                    'url' => route('place.index'),
                    'permissions' => ['place.index'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-tour',
                    'priority' => 6,
                    'parent_id' => null,
                    'name' => 'plugins/hotel::tour.name',
                    'icon' => 'fas fa-shuttle-van',
                    'url' => route('tour.index'),
                    'permissions' => ['tour.index'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-booking',
                    'priority' => 6,
                    'parent_id' => null,
                    'name' => 'plugins/hotel::booking.name',
                    'icon' => 'far fa-calendar-alt',
                    'url' => route('booking.index'),
                    'permissions' => ['booking.index'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-booking-room',
                    'priority' => 0,
                    'parent_id' => 'cms-plugins-booking',
                    'name' => 'plugins/hotel::booking.room',
                    'icon' => null,
                    'url' => route('booking.room.index'),
                    'permissions' => ['booking.room'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-booking-tour',
                    'priority' => 1,
                    'parent_id' => 'cms-plugins-booking',
                    'name' => 'plugins/hotel::booking.tour',
                    'icon' => null,
                    'url' => route('booking.tour.index'),
                    'permissions' => ['booking.tour'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-booking-voucher',
                    'priority' => 1,
                    'parent_id' => 'cms-plugins-booking',
                    'name' => 'plugins/hotel::booking.voucher',
                    'icon' => null,
                    'url' => route('booking.voucher.index'),
                    'permissions' => ['booking.voucher'],
                ])
                ->registerItem([
                    'id' => 'cms-plugins-customer',
                    'priority' => 7,
                    'parent_id' => 'cms-plugins-hotel',
                    'name' => 'plugins/hotel::customer.name',
                    'icon' => null,
                    'url' => route('customer.index'),
                    'permissions' => ['customer.index'],
                ]);

            EmailHandler::addTemplateSettings(HOTEL_MODULE_SCREEN_NAME, config('plugins.hotel.email'));
        });

        if (defined('LANGUAGE_MODULE_SCREEN_NAME') && defined('LANGUAGE_ADVANCED_MODULE_SCREEN_NAME')) {
            LanguageAdvancedManager::registerModule(Room::class, [
                'name',
                'description',
                'content',
            ]);

            LanguageAdvancedManager::registerModule(RoomCategory::class, [
                'name',
                'description',
            ]);

            LanguageAdvancedManager::registerModule(Amenity::class, [
                'name',
                'description',
            ]);

            LanguageAdvancedManager::registerModule(Food::class, [
                'name',
                'description',
            ]);

            LanguageAdvancedManager::registerModule(FoodType::class, [
                'name',
            ]);

            LanguageAdvancedManager::registerModule(Feature::class, [
                'name',
                'description',
            ]);

            LanguageAdvancedManager::registerModule(Service::class, [
                'name',
                'description',
            ]);

            LanguageAdvancedManager::registerModule(Place::class, [
                'name',
                'distance',
                'description',
                'content',
            ]);
        }

        SiteMapManager::registerKey(['rooms']);

        $this->app->register(EventServiceProvider::class);

        $this->app->booted(function () {
            $this->app->register(HookServiceProvider::class);

            if (defined('CUSTOM_FIELD_MODULE_SCREEN_NAME')) {
                \CustomField::registerModule(Room::class)
                    ->registerRule('basic', trans('plugins/hotel::room.name'), Room::class, function () {
                        return $this->app->make(RoomInterface::class)->pluck('name', 'id');
                    })
                    ->expandRule('other', trans('plugins/custom-field::rules.model_name'), 'model_name', function () {
                        return [
                            Room::class => trans('plugins/hotel::room.name'),
                        ];
                    });
            }
        });
    }
}
