<?php

use App\Http\Controllers\Api\Admin\AddressesController;
use App\Http\Controllers\Api\Web\FlightsController;
use App\Http\Controllers\Api\Web\GlobalController;
use App\Http\Controllers\Api\Web\MailingBoxController;
use App\Http\Controllers\Api\Web\NotificationsController;
use App\Http\Controllers\Api\Web\ReservationsController;
use App\Http\Controllers\Api\Web\TicketsController;
use App\Http\Controllers\Api\Web\ToursController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'web'], function () {
    ########################################### address routes  ##############################################################
    Route::controller(AddressesController::class)->group(function () {
        Route::get('get-countries', 'getCountries');
        Route::get('get-cities/{country_id}', 'getCities');
    });

    ########################################### globale routes  ##############################################################
    Route::controller(GlobalController::class)->group(function () {
        Route::get('get-settings', 'getSettings');
        Route::get('get-categories', 'getCategories');
        Route::get('get-sliders', 'getSliders');
        Route::get('get-pages', 'getPages');
    });

    ########################################### tickets routes  ##############################################################
    Route::controller(TicketsController::class)->group(function () {
        Route::get('get-tickets', 'tickets');
    });

    ########################################### tours routes  ##############################################################
    Route::controller(ToursController::class)->group(function () {
        Route::get('get-tours', 'tours');
    });

    ########################################### flights routes  ##############################################################
    Route::controller(FlightsController::class)->group(function () {
        Route::get('get-flights', 'flights');
    });

    ########################################### reservations routes  ##############################################################
    Route::controller(ReservationsController::class)->group(function () {
        Route::get('get-reservations', 'reservations');
        Route::post('store-reservation', 'store');
    });

    ########################################### notifications routes  ##############################################################
    Route::controller(NotificationsController::class)->group(function () {
        Route::get('get-notificaions', 'notifications');
        Route::post('store-notificaion', 'store');
    });

    ########################################### mailing box routes  ##############################################################
    Route::controller(MailingBoxController::class)->group(function () {
        Route::get('get-mailing-list', 'mailingList');
        Route::post('store-mailing-email', 'store');
    });
});
