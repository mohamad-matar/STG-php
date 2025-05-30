<?php

use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin/')->name('admin.')->group(function () {
    Route::resource('places', PlaceController::class);
    Route::resource('services', ServiceController::class)->except('show');
});

