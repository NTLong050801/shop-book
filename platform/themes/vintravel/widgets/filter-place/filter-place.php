<?php

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Hotel\Repositories\Interfaces\PlaceInterface;
use Botble\Widget\AbstractWidget;
use Illuminate\Support\Collection;

class FilterPlaceWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('packages/widget::widget.filter_place'),
            'title' => 'Khu vực',
            'description' => __('packages/widget::widget.description_filter_place'),
            'type' => '',
        ]);
    }

    protected function data(): array|Collection
    {
        return [
            'places' => app(PlaceInterface::class)->allBy([
                'status' => BaseStatusEnum::PUBLISHED,
            ], [
                'rooms',
                'tours',
            ]),
        ];
    }
}
