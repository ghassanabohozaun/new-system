<?php
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
        Route::get('/home', function () {
            return view('home');
        })
            ->where(['any' => '.*'])
            ->name('home');

        ###################################### routes  ##################################################################
    },
);
