<?php

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Hotel\Repositories\Interfaces\AmenityInterface;
use Botble\Widget\AbstractWidget;
use Illuminate\Support\Collection;

class FilterHotelAmenitiesWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => trans('packages/widget::widget.filter_hotel_amenities'),
            'title' => 'Các bộ lọc phổ biến',
            'description' => __('packages/widget::widget.widget_description_filter_amenities'),
        ]);
    }

    protected function data(): array|Collection
    {
        return [
            'amenities' => app(AmenityInterface::class)->allBy([
                'status' => BaseStatusEnum::PUBLISHED,
            ], [
                'rooms',
            ]),
        ];
    }
}
