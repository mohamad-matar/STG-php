<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin-dashboard', function () {
return view('admin.dashboard');
})->middleware(['auth', 'verified' , 'user-type:admin'])->name('admin-dashboard');