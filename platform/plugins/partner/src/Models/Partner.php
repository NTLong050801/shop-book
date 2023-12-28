<?php

namespace Botble\Partner\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Botble\Base\Models\BaseQueryBuilder<static> query()
 */
class Partner extends BaseModel
{
    protected $table = 'partners';

    protected $fillable = [
        'name',
        'logo',
        'partner_category_id',
        'order',
        'status',
    ];

    protected $casts = [
        'status' => BaseStatusEnum::class,
        'name' => SafeContent::class,
    ];
    public function partnerCategory(): BelongsTo
    {
        return $this->belongsTo(PartnerCategory::class,'partner_category_id');
    }
}
