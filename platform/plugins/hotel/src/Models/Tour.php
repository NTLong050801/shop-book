<?php

namespace Botble\Hotel\Models;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\Testimonial\Models\Testimonial;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

class Tour extends BaseModel
{
    protected $table = 'ht_tours';

    protected $fillable = [
        'code',
        'name',
        'description',
        'content',
        'more_content',
        'is_featured',
        'images',
        'tag',
        'place_id',
        'status',
        'order',
        'address',
        'trip',
        'duration',
        'schedule',
        'vehicle',
        'departure_location',
        'price',
        'price_old',
        'price_child',
        'price_baby',
        'number_orders',
        'plan',
        'weekdays',
        'services_include',
        'services_exclude',
        'registration_conditions',
        'cancel_conditions',
        'checkout_description',
    ];

    protected $casts = [
        'status' => BaseStatusEnum::class,
        'weekdays' => 'array',
        'plan' => 'array',
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

    public function getPlanAttribute($value)
    {
        if ($value === '[null]') {
            return [];
        }

        $content = json_decode((string)$value, true);

        if (is_array($content)) {
            $content = array_filter($content);
        }

        return $content ?: [];
    }

    public function getImageAttribute(): ?string
    {
        return Arr::first($this->images) ?? null;
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'ht_tours_features', 'tour_id', 'feature_id');
    }

    public function testimonials(): BelongsToMany
    {
        return $this->belongsToMany(Testimonial::class, 'ht_tours_testimonials', 'tour_id', 'testimonial_id');
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id')->withDefault();
    }

    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class, 'place_id')->withDefault();
    }

    public function getTourBasePrice(int $adults = 1): float|int
    {
        return $this->price * $adults;
    }

    public function getTourAdditionalPrice(int $children = 0, int $babies = 0): float|int
    {
        return $this->price_child * $children + $this->price_baby * $babies;
    }

    public function getTourTotalPrice(int $adults = 1, int $children = 0, int $babies = 0): float|int
    {
        return $this->price_child * $children + $this->price * $adults + $this->price_baby * $babies;
    }

    public function getBookingBasePrice(int $price, int $adults = 1): float|int
    {
        return $price * $adults;
    }

    public function getBookingAdditionalPrice(int $priceChild, int $priceBaby, int $children = 0, int $babies = 0): float|int
    {
        return $priceChild * $children + $priceBaby * $babies;
    }

    public function getBookingTotalPrice(int $price, int $priceChild, int $priceBaby, int $adults = 1, int $children = 0, int $babies = 0): float|int
    {
        return $priceChild * $children + $price * $adults + $priceBaby * $babies;
    }
}
