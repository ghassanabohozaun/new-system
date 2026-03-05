<?php

use App\Http\Controllers\Api\Admin\AddressesController;
use App\Http\Controllers\Api\Admin\Auth\LoginController;
use App\Http\Controllers\Api\Admin\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:admin-api');

    ########################################### address routes  ##############################################################
    Route::controller(AddressesController::class)->group(function () {
        Route::get('get-countries', 'getCountries');
        Route::get('get-cities/{country_id}', 'getCities');
    });

    

    ########################################### auth admin api routes ##################################################################
    Route::group(['middleware' => 'auth:admin-api'], function () {
        Route::get('testAuth', function () {
            return 'Admin Authenticated';
        });
    });
});
