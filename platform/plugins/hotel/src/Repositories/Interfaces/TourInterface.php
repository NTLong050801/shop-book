<?php

namespace Botble\Hotel\Repositories\Interfaces;

use Botble\Support\Repositories\Interfaces\RepositoryInterface;

interface TourInterface extends RepositoryInterface
{
    public function getTours(array $filters = [], array $params = []);

    public function getRelatedTours(int $tourId, int $limit = 4, array $params = []);
}
