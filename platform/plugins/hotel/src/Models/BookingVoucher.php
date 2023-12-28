<?php

namespace Botble\Hotel\Models;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\Hotel\Enums\BookingStatusEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingVoucher extends BaseModel
{
    protected $table = 'ht_booking_vouchers';

    protected $fillable = [
        'booking_id',
        'voucher_id',
        'price',
        'price_child',
        'price_baby',
        'currency_id',
        'start_date',
        'end_date',
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

    public function voucher(): BelongsTo
    {
        return $this->belongsTo(Voucher::class, 'voucher_id')->withDefault();
    }

    public function scopeActive($query)
    {
        return $query
            ->join('ht_bookings', 'ht_bookings.id', '=', $this->table . '.booking_id')
            ->whereNotIn('ht_bookings.status', [BookingStatusEnum::CANCELLED]);
    }
}
