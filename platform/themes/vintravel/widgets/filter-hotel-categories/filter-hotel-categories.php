<?php

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Hotel\Repositories\Interfaces\RoomCategoryInterface;
use Botble\Widget\AbstractWidget;
use Illuminate\Support\Collection;

class FilterHotelCategoriesWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('packages/widget::widget.filter_hotel_categories'),
            'title' => 'Loại hình chỗ ở',
            'description' => __('packages/widget::widget.description_filter_hotel_categories'),
        ]);
    }

    protected function data(): array|Collection
    {
        return [
            'categories' => app(RoomCategoryInterface::class)->allBy([
                'status' => BaseStatusEnum::PUBLISHED,
            ], [
                'rooms',
            ]),
        ];
    }
}
