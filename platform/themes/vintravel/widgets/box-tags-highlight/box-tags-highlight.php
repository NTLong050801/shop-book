<?php

use Botble\Widget\AbstractWidget;
use Illuminate\Support\Collection;

class BoxTagsHighlightWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name'        => __('packages/widget::widget.box_tags_highlight'),
            'description' => __('packages/widget::widget.box_tags_highlight_description'),
            'number_display' => 10,
        ]);
    }
    protected function data(): array|Collection
    {
        return [
            'tags' =>  get_popular_tags($this->getConfig()['number_display']),
        ];
    }
}
