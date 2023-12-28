<?php

namespace Botble\Hotel\Repositories\Caches;

use Botble\Hotel\Repositories\Interfaces\BookingTourInterface;
use Botble\Support\Repositories\Caches\CacheAbstractDecorator;

class BookingTourCacheDecorator extends CacheAbstractDecorator implements BookingTourInterface
{
}
