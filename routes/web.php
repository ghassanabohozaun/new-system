<?php
use App\Http\Controllers\Api\Web\AddressesController;
use App\Http\Controllers\Website\FlightsController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ReservationsController;
use App\Http\Controllers\Website\TicketsController;
use App\Http\Controllers\Website\ToursController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'as' => 'website.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        ########################################### home routes ##################################################################
        /// any
        Route::get('', [HomeController::class, 'index'])
            ->where(['any' => '.*'])
            ->name('index');
        Route::get('/home', [HomeController::class, 'index'])->name('index');

        Route::get('/about', [HomeController::class, 'about'])->name('about');
        Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

        ######################################  flights routes  ##################################################################
        Route::controller(FlightsController::class)->group(function () {
            Route::get('/flights/{category_slug?}', 'getFlightsByCategory')->name('flights.get.by.category');
        });

        ###################################### tours routes  ##################################################################
        Route::controller(ToursController::class)->group(function () {
            Route::get('/tours', 'index')->name('tours.index');
        });

        ###################################### tickets routes  ##################################################################
        Route::controller(TicketsController::class)->group(function () {
            Route::get('/tickets', 'index')->name('tickets.index');
        });

        ###################################### resevations routes  ##################################################################
        Route::controller(ReservationsController::class)->group(function () {
            Route::get('/reservation-store', 'store')->name('reservation.store');
        });
    },
);
