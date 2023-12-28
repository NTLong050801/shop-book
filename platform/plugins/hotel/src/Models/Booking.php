<?php

namespace Botble\Hotel\Models;

use Botble\Base\Models\BaseModel;
use Botble\Hotel\Enums\BookingStatusEnum;
use Botble\Member\Models\Member;
use Botble\Payment\Models\Payment;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends BaseModel
{
    protected $table = 'ht_bookings';

    protected $fillable = [
        'type',
        'status',
        'amount',
        'currency_id',
        'requests',
        'arrival_time',
        'number_of_guests_adults',
        'number_of_guests_children',
        'number_of_guests_babies',
        'payment_id',
        'customer_id',
        'transaction_id',
        'tax_amount',
    ];

    protected $casts = [
        'status' => BookingStatusEnum::class,
    ];

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id')->withDefault();
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'ht_booking_services', 'booking_id', 'service_id');
    }

    public function address(): HasOne
    {
        return $this->hasOne(BookingAddress::class, 'booking_id')->withDefault();
    }

    public function room(): HasOne
    {
        return $this->hasOne(BookingRoom::class, 'booking_id')->withDefault();
    }

    public function tour(): HasOne
    {
        return $this->hasOne(BookingTour::class, 'booking_id')->withDefault();
    }

    public function voucher(): HasOne
    {
        return $this->hasOne(BookingVoucher::class, 'booking_id')->withDefault();
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class, 'payment_id')->withDefault();
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'customer_id')->withDefault();
    }

    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function (Booking $booking) {
            $booking->address()->delete();
            $booking->services()->detach();
        });
    }
}
