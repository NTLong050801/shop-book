<?php

namespace Botble\Hotel\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Amenity extends BaseModel
{
    protected $table = 'ht_amenities';

    protected $fillable = [
        'name',
        'icon',
        'order',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'status' => BaseStatusEnum::class,
        'name' => SafeContent::class,
        'icon' => SafeContent::class,
    ];

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'ht_rooms_amenities', 'amenity_id', 'room_id');
    }
}
