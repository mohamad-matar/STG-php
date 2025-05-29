<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard-admin', function () {
return view('admin.dashboard');
})->middleware(['auth', 'verified' , 'user-type:admin'])->name('dashboard-admin');