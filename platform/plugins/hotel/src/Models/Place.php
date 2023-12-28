<?php

namespace Botble\Hotel\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Place extends BaseModel
{
    protected $table = 'ht_places';

    protected $fillable = [
        'name',
        'distance',
        'description',
        'content',
        'image',
        'status',
        'order',
        'is_featured',
    ];

    protected $casts = [
        'status' => BaseStatusEnum::class,
        'name' => SafeContent::class,
        'distance' => SafeContent::class,
        'description' => SafeContent::class,
        'content' => SafeContent::class,
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }
}
