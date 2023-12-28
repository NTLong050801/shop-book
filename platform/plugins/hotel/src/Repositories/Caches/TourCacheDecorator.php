<?php

namespace Botble\Hotel\Repositories\Caches;

use Botble\Hotel\Repositories\Interfaces\TourInterface;
use Botble\Support\Repositories\Caches\CacheAbstractDecorator;

class TourCacheDecorator extends CacheAbstractDecorator implements TourInterface
{
    public function getTours(array $filters = [], array $params = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    public function getRelatedTours(int $roomId, int $limit = 4, array $params = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
