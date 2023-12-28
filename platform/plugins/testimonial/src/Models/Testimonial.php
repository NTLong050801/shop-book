<?php

namespace Botble\Testimonial\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\Hotel\Models\Room;
use Botble\Hotel\Models\Tour;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Testimonial extends BaseModel
{
    protected $table = 'testimonials';

    protected $fillable = [
        'name',
        'company',
        'content',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => BaseStatusEnum::class,
        'content' => SafeContent::class,
        'company' => SafeContent::class,
        'name' => SafeContent::class,
    ];

    function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'ht_rooms_testimonials', 'testimonial_id', 'room_id');
    }

    function tours(): BelongsToMany
    {
        return $this->belongsToMany(Tour::class, 'ht_tours_testimonials', 'testimonial_id', 'tour_id');
    }
}
