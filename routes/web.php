<?php
use App\Http\Controllers\Api\Web\AddressesController;
use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'as' => 'website.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {

        ###################################### home  ##################################################################
        /// any
        // Route::get('', [HomeController::class, 'index'])
        //     ->where(['any' => '.*'])
        //     ->name('index');
        // Route::get('/index', [HomeController::class, 'index'])->name('index');
        // Route::get('/home', [HomeController::class, 'index'])->name('index');
        ###################################### routes  ##################################################################
    },
);
