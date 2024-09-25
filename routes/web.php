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
Route::get('/permohonan', [CommonController::class, 'permohonan_index']);
Route::get('/penandatanganan', [CommonController::class, 'dashboard_index']);
Route::get('/tembusan', [CommonController::class, 'dashboard_index']);
Route::get('/suratmasuk', [CommonController::class, 'dashboard_index']);
Route::get('/suratkeluar', [CommonController::class, 'dashboard_index']);
Route::get('/disposisi', [CommonController::class, 'dashboard_index']);

Route::get('/akun', [CommonController::class, 'dashboard_index']);


