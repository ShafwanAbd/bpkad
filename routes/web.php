<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// NEED LOGIN ACCESS

Route::get('/dashboard', [CommonController::class, 'dashboard_index']);


