<?php

namespace Botble\Hotel\Models;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\Hotel\Enums\BookingStatusEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingTour extends BaseModel
{
    protected $table = 'ht_booking_tours';

    protected $fillable = [
        'booking_id',
        'tour_id',
        'price',
        'price_child',
        'price_baby',
        'currency_id',
    ];

    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id')->withDefault();
    }

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'booking_id')->withDefault();
    }

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class, 'tour_id')->withDefault();
    }

    public function scopeActive($query)
    {
        return $query
            ->join('ht_bookings', 'ht_bookings.id', '=', $this->table . '.booking_id')
            ->whereNotIn('ht_bookings.status', [BookingStatusEnum::CANCELLED]);
    }
}
