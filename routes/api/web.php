<?php

use App\Http\Controllers\Api\Admin\AddressesController;
use App\Http\Controllers\Api\Web\GlobalController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'web'], function () {
    ########################################### address routes  ##############################################################
    Route::controller(AddressesController::class)->group(function () {
        Route::get('get-countries', 'getCountries');
        Route::get('get-cities/{country_id}', 'getCities');
    });

    Route::controller(GlobalController::class)->group(function () {
        Route::get('get-settings', 'getSettings');
        Route::get('get-categories', 'getCategories');
        Route::get('get-sliders', 'getSliders');
        Route::get('get-pages' , 'getPages');

    });
});
