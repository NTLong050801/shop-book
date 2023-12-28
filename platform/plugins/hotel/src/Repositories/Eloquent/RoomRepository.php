<?php

namespace Botble\Hotel\Repositories\Eloquent;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Hotel\Repositories\Interfaces\RoomInterface;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;

class RoomRepository extends RepositoriesAbstract implements RoomInterface
{
    public function getRooms(array $filters = [], array $params = [])
    {
        $filters = array_merge([
            'keyword' => null,
            'room_category_id' => null,
        ], $filters);

        $params = array_merge([
            'condition' => [],
            'order_by' => [
                'created_at' => 'DESC',
                'order' => 'ASC',
            ],
            'take' => null,
            'paginate' => [
                'per_page' => 10,
                'current_paged' => 1,
            ],
            'with' => [
                'features',
                'amenities',
                'category',
                'slugable',
            ],
        ], $params);

        $this->model = $this->originalModel;

        if (!empty($filters['keyword'])) {
            $this->model = $this->model
                ->where('name', 'LIKE', '%' . $filters['keyword'] . '%');
        }

        if (!empty($filters['room_category_id'] )) {
            $this->model = $this->model->where('room_category_id', $filters['room_category_id']);
        }

        if (!empty($filters['place_id'])) {
            $this->model = $this->model->where('place_id', $filters['place_id']);
        }

        if (!empty($filters['price'])) {
            if ($filters['price']['min'] !== null){
                $this->model = $this->model->where('price', '>=', $filters['price']['min']);
            }
            if ($filters['price']['max'] !== null){
                $this->model = $this->model->where('price', '<=', $filters['price']['max']);
            }
        }

        if (!empty($filters['places_id'])) {
            $this->model = $this->model->whereIn('place_id', $filters['places_id']);
        }

        if (!empty($filters['categories_id'])) {
            $this->model = $this->model->whereIn('room_category_id', $filters['categories_id']);
        }


        if (!empty($filters['amenity_id'])) {
            $this->model = $this->model->whereHas('amenities', function ($query) use ($filters) {
                $query->whereIn('amenity_id', $filters['amenity_id']);
            });
        }

        $this->model->where('status', BaseStatusEnum::PUBLISHED);

        return $this->advancedGet($params)->withQueryString();
    }

    public function getRelatedRooms(int $roomId, int $limit = 4, array $params = [])
    {
        $this->model = $this->originalModel;
        $this->model = $this->model
            ->where('id', '<>', $roomId);

        $params = array_merge([
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
                'amenities',
                'slugable',
            ],
        ], $params);

        return $this->advancedGet($params);
    }
}
