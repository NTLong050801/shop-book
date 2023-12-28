<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Hotel\Models\Currency;

class CurrencySeeder extends BaseSeeder
{
    public function run(): void
    {
        Currency::query()->truncate();

        $currencies = [
            [
                'title' => 'VND',
                'symbol' => '₫',
                'is_prefix_symbol' => false,
                'order' => 0,
                'decimals' => 0,
                'is_default' => 1,
                'exchange_rate' => 1,
            ],
        ];

        foreach ($currencies as $currency) {
            Currency::query()->create($currency);
        }
    }
}
