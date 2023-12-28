<?php

use Botble\Base\Facades\BaseHelper;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Botble\Partner\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'partners', 'as' => 'partner.'], function () {
            Route::resource('', 'PartnerController')->parameters(['' => 'partner']);
        });
        Route::group(['prefix' => 'partner-categories', 'as' => 'partner-category.'], function () {
            Route::resource('', 'PartnerCategoryController')->parameters(['' => 'partner-category']);
        });
    });

});
