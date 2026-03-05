<?php

use App\Http\Controllers\Api\Admin\AddressesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'web'], function () {

    ########################################### address routes  ##############################################################
    Route::controller(AddressesController::class)->group(function () {
        Route::get('get-countries', 'getCountries');
        Route::get('get-cities/{country_id}', 'getCities');
    });

});
