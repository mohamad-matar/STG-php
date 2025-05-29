<?php
use Illuminate\Support\Facades\Route;

Route::get('/dashboard-provider', function () {
    return view('provider.dashboard');
})->middleware(['auth', 'verified', 'user-type:provider'])->name('dashboard-provider');
