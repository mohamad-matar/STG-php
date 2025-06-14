<?php

use App\Http\Controllers\LangController;
use App\Http\Controllers\Tourists\HomeController;
use App\Http\Controllers\Tourists\ProviderController;
use Illuminate\Support\Facades\Route;



require __DIR__ . '/admin.php';
require __DIR__ . '/provider.php';
require __DIR__ . '/auth.php';


Route::get('/', [HomeController::class,  'index'])->name('home.index');
Route::get('/language', [LangController::class,  'lang']);

Route::get('/dashboard', function () {
    return view('layouts-dashboard.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('home/')->name('home.')->group(
    function () {

        Route::get('placeSearch', [HomeController::class, 'placeSearch'])->name('placeSearch');
        Route::get('showPlace/{place_id}', [HomeController::class, 'showPlace'])->name('showPlace');
        
        Route::get('providers', [ProviderController::class,  'index'])->name('providers.index');
        Route::get('providers/{provider}', [ProviderController::class, 'show'])->name('providers.show');

    }
);
