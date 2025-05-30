<?php

use App\Http\Controllers\Provider\ProviderController;
use Illuminate\Support\Facades\Route;

Route::prefix('provider/')->name('provider.')->group(function() {
    Route::get('edit', [ProviderController::class, 'edit'])->name('edit');
    Route::put('update', [ProviderController::class , 'update'])->name('update');
});