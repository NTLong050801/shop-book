<?php

namespace Theme\Vintravel\Http\Controllers;

use Botble\Theme\Http\Controllers\PublicController;

class VintravelController extends PublicController
{
    public function getIndex()
    {
        return parent::getIndex();
    }

    public function getView(?string $key = null)
    {
        return parent::getView($key);
    }

    public function getSiteMapIndex(string $key = null, string $extension = 'xml')
    {
        return parent::getSiteMapIndex();
    }
}
