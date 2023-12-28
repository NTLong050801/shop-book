<?php

use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Widget\AbstractWidget;
use Illuminate\Support\Collection;

class ArticlesViewListWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('packages/widget::widget.articles_view_list'),
            'description' => __('packages/widget::widget.articles_view_list_description'),
            'number_display' => 5,
        ]);
    }
    protected function data(): array|Collection
    {
        return [
            'posts' => get_popular_posts($this->getConfig()['number_display']),
        ];
    }
}
