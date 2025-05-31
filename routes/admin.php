<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'user-type:admin'])
    ->prefix('admin/')->name('admin.')->group(function () {
        Route::resource('places', PlaceController::class);
        Route::resource('services', ServiceController::class)->except('show');
        Route::resource('categories', CategoryController::class)->except('show');
    });
