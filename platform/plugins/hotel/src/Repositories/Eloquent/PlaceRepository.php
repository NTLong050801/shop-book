<?php

namespace Botble\Hotel\Repositories\Eloquent;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Hotel\Repositories\Interfaces\PlaceInterface;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;

class PlaceRepository extends RepositoriesAbstract implements PlaceInterface
{
    public function getPlaces(array $filters = [], array $params = [])
    {
        $params = array_merge([
            'condition' => [],
            'order_by' => [
                'created_at' => 'DESC',
                'order' => 'ASC',
            ],
        ], $params);

        $this->model = $this->originalModel;

        $this->model->where('status', BaseStatusEnum::PUBLISHED);

        return $this->advancedGet($params);
    }

    public function getRelatedPlaces(int $placeId, $limit = 3)
    {
        $this->model = $this->originalModel;
        $this->model = $this->model
            ->where('id', '<>', $placeId);

        $params = [
            'condition' => [],
            'order_by' => [
                'created_at' => 'DESC',
            ],
            'take' => $limit,
            'paginate' => [
                'per_page' => 12,
                'current_paged' => 1,
            ],
            'with' => [
                'slugable',
            ],
        ];

        return $this->advancedGet($params);
    }
}
