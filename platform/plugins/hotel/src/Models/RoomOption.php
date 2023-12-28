<?php

namespace Botble\Hotel\Models;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class RoomOption extends BaseModel
{
    protected $table = 'ht_room_options';

    protected $fillable = [
        'room_option_category_id',
        'name',
        'content',
        'status',
        'is_outstanding_room_option',
        'price',
        'price_child',
        'price_baby',
        'price_description',
        'order',
    ];

    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::created(function ($model) {
            $model->updateRoomPrice();
        });

        static::updated(function ($model) {
            if ($model->isDirty('price') || $model->isDirty('room_option_category_id')) {
                $model->updateRoomPrice();
            }
        });

        static::deleting(function ($model) {
            $model->updateRoomPrice($model->id);
        });
    }

    protected function updateRoomPrice(int $id = null): void
    {
        $room = $this->room;
        $minPrice = $this->getMinPriceForRoom($room->id, $id) ?? 0;
        $room->update(['price' => $minPrice]);
    }

    protected function getMinPriceForRoom(int $roomId, int $id = null)
    {
        $query = $this->whereHas('roomOptionCategory', function ($query) use ($roomId) {
            $query->where('room_id', $roomId);
        });
        if (!empty($id)) {
            $query->where('id', '!=', $id);
        }
        return $query->min('price');
    }


    public function roomOptionCategory(): BelongsTo
    {
        return $this->belongsTo(RoomOptionCategory::class, 'room_option_category_id')->withDefault();
    }

    public function room(): HasOneThrough
    {
        return $this->hasOneThrough(Room::class, RoomOptionCategory::class, 'id', 'id', 'room_option_category_id', 'room_id');
    }

    public function getRoomBasePrice(int $nights = 1, int $adults = 2): float|int
    {
        return $this->price * ceil($adults / 2) * $nights;
    }

    public function getRoomAdditionalPrice(int $nights = 1, int $children = 0, int $babies = 0): float|int
    {
        return $this->price_child * $children * $nights + $this->price_baby * $babies * $nights;
    }

    public function getRoomTotalPrice(int $nights = 1, int $adults = 2, int $children = 0, int $babies = 0): float|int
    {
        return $this->price_child * $children * $nights + $this->price * ceil($adults / 2) * $nights + $this->price_baby * $babies * $nights;
    }

    public function getBookingBasePrice(int $price, int $nights = 1, int $adults = 2): float|int
    {
        return $price * ceil($adults / 2) * $nights;
    }

    public function getBookingAdditionalPrice(int $priceChild, int $priceBaby, int $nights = 1, int $children = 0, int $babies = 0): float|int
    {
        return $priceChild * $children * $nights + $priceBaby * $babies * $nights;
    }

    public function getBookingTotalPrice(int $price, int $priceChild, int $priceBaby, int $nights = 1, int $adults = 2, int $children = 0, int $babies = 0): float|int
    {
        return $priceBaby * $babies * $nights + $priceChild * $children * $nights + $price * ceil($adults / 2) * $nights;
    }
}
