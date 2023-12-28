<?php

namespace Botble\Hotel\Models;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Voucher extends BaseModel
{
    protected $table = 'ht_vouchers';

    protected $fillable = [
        'room_id',
        'tag',
        'name',
        'content',
        'status',
        'price',
        'price_old',
        'price_child',
        'price_baby',
        'number_orders',
        'vouchers_end_days',
        'order',
    ];

    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id')->withDefault();
    }

    public function getVoucherBasePrice(int $adults = 1): float|int
    {
        return $this->price * $adults;
    }

    public function getVoucherAdditionalPrice(int $children = 0, int $babies = 0): float|int
    {
        return $this->price_child * $children + $this->price_baby * $babies;
    }

    public function getVoucherTotalPrice(int $adults = 2, int $children = 0, int $babies = 0, int $nights = 1): float|int
    {
        return $this->price_child * $children * $nights + $this->price * $adults * $nights + $this->price_baby * $babies * $nights;
    }

    public function getBookingBasePrice(int $price, int $adults = 1): float|int
    {
        return $price * $adults;
    }

    public function getBookingAdditionalPrice(int $priceChild, int $priceBaby, int $children = 0, int $babies = 0): float|int
    {
        return $priceChild * $children + $priceBaby * $babies;
    }

    public function getBookingTotalPrice(int $price, int $priceChild, int $priceBaby, int $adults = 2, int $children = 0, int $babies = 0): float|int
    {
        return $priceChild * $children + $price * $adults + $priceBaby * $babies;
    }
}
