<?php

namespace Botble\Hotel\Models;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\Testimonial\Models\Testimonial;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

class Room extends BaseModel
{
    protected $table = 'ht_rooms';

    protected $fillable = [
        'name',
        'description',
        'content',
        'phone',
        'is_featured',
        'images',
        'price',
        'price_old',
        'currency_id',
        'number_of_rooms',
        'number_of_beds',
        'size',
        'max_adults',
        'max_children',
        'max_babies',
        'number_orders',
        'place_id',
        'room_category_id',
        'tax_id',
        'order',
        'status',
        'rating',
        'address',
        'map',
        'check_in_time',
        'check_out_time',
        'children_policies',
        'directions',
        'check_in_instructions',
    ];

    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function getImagesAttribute($value)
    {
        if ($value === '[null]') {
            return [];
        }

        $images = json_decode((string)$value, true);

        if (is_array($images)) {
            $images = array_filter($images);
        }

        return $images ?: [];
    }

    public function getImageAttribute(): ?string
    {
        return Arr::first($this->images) ?? null;
    }

    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class, 'ht_rooms_amenities', 'room_id', 'amenity_id');
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'ht_rooms_features', 'room_id', 'feature_id');
    }

    public function testimonials(): BelongsToMany
    {
        return $this->belongsToMany(Testimonial::class, 'ht_rooms_testimonials', 'room_id', 'testimonial_id');
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id')->withDefault();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(RoomCategory::class, 'room_category_id')->withDefault();
    }

    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class, 'place_id')->withDefault();
    }

    public function optionCategories(): HasMany
    {
        return $this->hasMany(RoomOptionCategory::class, 'room_id');
    }

    public function vouchers(): HasMany
    {
        return $this->hasMany(Voucher::class, 'room_id');
    }

    public function activeRoomDates(): HasMany
    {
        return $this->hasMany(RoomDate::class, 'room_id');
    }

    public function activeBookingRooms(): HasMany
    {
        return $this
            ->hasMany(BookingRoom::class, 'room_id')
            ->active();
    }

    public function tax(): BelongsTo
    {
        return $this->belongsTo(Tax::class, 'tax_id')->withDefault();
    }
}
