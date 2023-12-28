<?php

use Botble\Base\Facades\BaseHelper;
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Botble\Member\Http\Controllers',
    'prefix' => BaseHelper::getAdminPrefix(),
    'middleware' => ['web', 'core', 'auth'],
], function () {
    Route::group(['prefix' => 'members', 'as' => 'member.'], function () {
        Route::resource('', 'MemberController')->parameters(['' => 'member']);
    });
});
