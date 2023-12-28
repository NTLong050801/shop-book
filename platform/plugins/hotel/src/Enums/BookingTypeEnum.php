<?php

namespace Botble\Hotel\Enums;

use Botble\Base\Supports\Enum;

/**
 * @method static BookingTypeEnum VOUCHER()
 * @method static BookingTypeEnum TOUR()
 * @method static BookingTypeEnum ROOM()
 */
class BookingTypeEnum extends Enum
{
    public const VOUCHER = 'voucher';
    public const TOUR = 'tour';
    public const ROOM = 'room';

    public static $langPath = 'plugins/hotel::booking.types';
}
