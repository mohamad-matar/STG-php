<?php

use App\Http\Controllers\LangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Tourists\HomeController;

use Illuminate\Support\Facades\Route;



require __DIR__ . '/admin.php';
require __DIR__ . '/provider.php';
require __DIR__ . '/auth.php';


Route::get('/', [HomeController::class,  'index'])->name('home.index');
Route::get('/language', [LangController::class,  'lang']);
