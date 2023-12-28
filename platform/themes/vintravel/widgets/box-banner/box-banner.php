<?php

use Botble\Theme\Facades\Theme;
use Botble\Widget\AbstractWidget;
use Illuminate\Support\Collection;

class BoxBannerWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('packages/widget::widget.box_banner'),
            'images' => null,
            'url' => '#',
            'description' => __('packages/widget::widget.box_banner_description'),
        ]);
    }

    protected function data(): array|Collection
    {
        return [];
    }
}
