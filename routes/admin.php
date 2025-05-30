<?php

use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin/')->name('admin.')->group(function () {
    Route::resource('places', PlaceController::class);
});

