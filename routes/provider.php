<?php

use App\Http\Controllers\PlaceController;
use App\Http\Controllers\Provider\ProviderController;
use App\Http\Controllers\Provider\ProviderShowController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'user-type:provider'])->prefix('provider/')->name('provider.')->group(function() {
    Route::get('edit', [ProviderController::class, 'edit'])->name('edit');
    Route::put('update', [ProviderController::class, 'update'])->name('update');
    Route::get('show/{provider}', [ProviderController::class , 'show'])->name('show');
    Route::resource('provider-shows', ProviderShowController::class)->only('store', 'update', 'destroy');

    Route::get('places', [PlaceController::class , 'create'])->name('places.create');
    Route::post('places', [PlaceController::class, 'store'])->name('places.store');;
});
