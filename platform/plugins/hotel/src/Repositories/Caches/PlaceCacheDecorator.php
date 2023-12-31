<?php

namespace Botble\Hotel\Repositories\Caches;

use Botble\Support\Repositories\Caches\CacheAbstractDecorator;
use Botble\Hotel\Repositories\Interfaces\PlaceInterface;

class PlaceCacheDecorator extends CacheAbstractDecorator implements PlaceInterface
{
    public function getPlaces(array $filters = [], array $params = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    public function getRelatedPlaces(int $placeId, $limit = 3)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
