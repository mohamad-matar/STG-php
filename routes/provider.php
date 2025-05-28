<?php
use Illuminate\Support\Facades\Route;

Route::get('/provider-dashboard', function () {
    return view('provider.dashboard');
})->middleware(['auth', 'verified', 'user-type:provider'])->name('provider-dashboard');
