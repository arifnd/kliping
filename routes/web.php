<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(Controllers\LoginController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'auth')->name('auth');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', Controllers\HomeController::class)->name('home');

    Route::controller(Controllers\ProfileController::class)->group(function() {
        Route::post('/profile', 'edit')->name('profile.edit');
        Route::post('/profile', 'update')->name('profile.update');;
    });

    Route::controller(Controllers\TypeController::class)->group(function() {
        Route::get('/types', 'index')->name('types.index');
        Route::get('/types/create', 'create')->name('type.create');
        Route::post('/types/store', 'store')->name('type.store');
        Route::get('/types/edit/{type}', 'edit')->name('type.edit');
        Route::post('/types/update/{type}', 'update')->name('type.update');
        Route::get('/types/destroy/{type}', 'destroy')->name('type.destroy');
    });

    Route::controller(Controllers\DeviceController::class)->group(function() {
        Route::get('/devices', 'index')->name('devices.index');
        Route::get('/devices/create', 'create')->name('device.create');
        Route::post('/devices/store', 'store')->name('device.store');
        Route::get('/devices/edit/{device}', 'edit')->name('device.edit');
        Route::post('/devices/update/{device}', 'update')->name('device.update');
        Route::get('/devices/destroy/{device}', 'destroy')->name('device.destroy');
    });

    Route::controller(Controllers\SourceController::class)->group(function() {
        Route::get('/sources', 'index')->name('sources.index');
        Route::get('/sources/create', 'create')->name('source.create');
        Route::post('/sources/store', 'store')->name('source.store');
        Route::get('/sources/edit/{source}', 'edit')->name('source.edit');
        Route::post('/sources/update/{source}', 'update')->name('source.update');
        Route::get('/sources/destroy/{source}', 'destroy')->name('source.destroy');
    });

    Route::controller(Controllers\NewsController::class)->group(function() {
        Route::get('/news', 'index')->name('news.index');
        Route::get('/news/create', 'create')->name('news.create');
        Route::post('/news/store', 'store')->name('news.store');
        Route::get('/news/edit/{news}', 'edit')->name('news.edit');
        Route::post('/news/update/{news}', 'update')->name('news.update');
        Route::get('/news/destroy/{news}', 'destroy')->name('news.destroy');
    });
});
