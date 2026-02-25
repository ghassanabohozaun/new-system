<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\Password\ForgetPasswordController;
use App\Http\Controllers\Dashboard\Auth\Password\ResetPasswordController;
use App\Http\Controllers\Dashboard\CountriesController;
use App\Http\Controllers\Dashboard\{AdminsController, CitiesController, DashboardController, DepartmentsController, GovernoratiesController, ProfileController, RolesController, SettingsController, TasksController};
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        ########################################### Auth (Guest) ###########################################################
        Route::get('login', [AuthController::class, 'getLogin'])->name('get.login');
        Route::post('login', [AuthController::class, 'postLogin'])->name('post.login');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        ########################################### reset password  ######################################################################
        Route::group(['prefix' => 'password', 'as' => 'password.'], function () {
            Route::controller(ForgetPasswordController::class)->group(function () {
                Route::get('email', 'showEmailForm')->name('get.email');
                Route::post('email', 'sendOTP')->name('post.email');
                Route::get('verify/{email?}', 'showVerifyOTPForm')->name('verify');
                Route::post('verify', 'verifyOTP')->name('post.verify');
            });

            Route::controller(ResetPasswordController::class)->group(function () {
                Route::get('reset/{email?}', 'showResetFrom')->name('reset');
                Route::post('reset', 'resetPasword')->name('post.reset');
            });
        });

        ########################################### protected routes  #####################################################################
        Route::group(['middleware' => ['auth:admin', \App\Http\Middleware\CheckLockScreen::class]], function () {
            ########################################### Auth Protected #######################################################
            Route::get('lock-screen', [AuthController::class, 'lockScreen'])->name('lock.screen');
            Route::post('unlock-screen', [AuthController::class, 'unlock'])->name('unlock.screen');

            ########################################### home  ##########################################################################
            Route::get('/home', [DashboardController::class, 'index'])->name('index');

            ########################################### profile  routes ##########################################################################
            Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
            Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change.password');

            ########################################### settings routes  ######################################################################
            Route::group(['middleware' => 'can:settings'], function () {
                Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
                Route::put('/settings/{id?}', [SettingsController::class, 'update'])->name('settings.update');
            });

            ########################################### roles routes ######################################################################
            Route::group(['middleware' => 'can:roles'], function () {
                Route::resource('roles', RolesController::class)->except(['destroy']);
                Route::post('/roles/destroy', [RolesController::class, 'destroy'])->name('roles.destroy');
            });

            ########################################### admins routes  #####################################################################
            Route::group(['middleware' => 'can:admins'], function () {
                Route::resource('admins', AdminsController::class)->except(['destroy']);
                Route::post('/admins/destroy', [AdminsController::class, 'destroy'])->name('admins.destroy');
                Route::post('/admins/status', [AdminsController::class, 'changeStatus'])->name('admins.change.status');
            });

            ########################################### tasks routes ######################################################################
            Route::group(['middleware' => 'can:tasks'], function () {
                Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');
            });
            ########################################### addresses routes  ######################################################################
            Route::group(['as' => 'addresses.', 'middleware' => 'can:addresses'], function () {

               // countries routes
                Route::resource('countries', CountriesController::class)->except(['destroy']);
                Route::post('/countries/destroy', [CountriesController::class, 'destroy'])->name('countries.destroy');
                Route::post('/countries/status', [CountriesController::class, 'changeStatus'])->name('countries.change.status');
                Route::get('/country/{country_id?}/cities', [CountriesController::class, 'getAllCitiesByCountry'])->name('countries.get.cities.by.country.id');
                Route::get('/countries/autocomplete/country', [CountriesController::class, 'autocompleteCountry'])->name('countries.autocomplete.country');

        
                // cities routes
                Route::resource('cities', CitiesController::class)->except(['destroy']);
                Route::post('/cities/destroy', [CitiesController::class, 'destroy'])->name('cities.destroy');
            });

            ########################################### employee routes  ######################################################################
            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/livewire/update', $handle);
            });
            ########################################### departments routes  ######################################################################
            Route::group(['middleware' => 'can:departments'], function () {
                Route::resource('departments', DepartmentsController::class)->except(['destroy']);
                Route::post('/departments/destroy', [DepartmentsController::class, 'destroy'])->name('departments.destroy');
                Route::post('/departments/status', [DepartmentsController::class, 'changeStatus'])->name('departments.change.status');
            });
        });
    },
);
