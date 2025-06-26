<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TripController;
use App\Http\Controllers\PlaceShowController;
use App\Http\Controllers\Provider\ProviderController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'user-type:admin'])
    ->prefix('admin/')->name('admin.')->group(function () {
        Route::resource('places', PlaceController::class);
        Route::resource('placeshows', PlaceShowController::class)->only('store', 'update', 'destroy');
        Route::resource('services', ServiceController::class)->except('show');
        Route::resource('categories', CategoryController::class)->except('show');
        Route::get('providers/index', [ProviderController::class, 'index'])->name('providers.index');
        Route::patch('providers/accept/{provider}', [ProviderController::class, 'accept'])->name('providers.accept');

        Route::resource('trips', TripController::class)->only('index', 'show');
        Route::resource('comments', CommentController::class)->only('index');

        Route::resource('settings', SettingController::class)->only('index', 'update');
    });
