<?php

use App\Http\Controllers\LangController;
use App\Http\Controllers\Tourists\PlaceController;
use App\Http\Controllers\Tourists\HomeController;
use App\Http\Controllers\Tourists\ProviderController;
use App\Http\Controllers\Tourists\TripController;
use Illuminate\Support\Facades\Route;



require __DIR__ . '/admin.php';
require __DIR__ . '/provider.php';
require __DIR__ . '/auth.php';


Route::get('/dashboard', function () {
    return view('layouts-dashboard.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [HomeController::class,  'index'])->name('home.index');
Route::get('/language', [LangController::class,  'lang']);


Route::prefix('home/')->name('home.')->group(
    function () {

        Route::get('places', [PlaceController::class,  'index'])->name('places.index');
        Route::get('places/{place}', [PlaceController::class,  'show'])->name('places.show');

        Route::get('providers', [ProviderController::class,  'index'])->name('providers.index');
        Route::get('providers/{provider}', [ProviderController::class, 'show'])->name('providers.show');

        Route::get('branches/{branch}', [ProviderController::class, 'branchShow'])->name('branches.show');


        Route::get('trips', [TripController::class, 'index'])->name('trips.index');
        Route::get('trips/{trip}', [TripController::class, 'show'])->name('trips.show');
    }
);

Route::prefix('tourist/')->name('tourist.')->middleware(['auth'])->group(function () {
    Route::get('trips', [TripController::class, 'index'])->name('trips.index');
    Route::post('trips/join/{trip}', [TripController::class, 'join'])->name('trips.join');
    Route::post('trips/{trip}', [TripController::class, 'eval'])->name('trips.eval');
});
