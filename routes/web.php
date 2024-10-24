<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', function () {
    return view('welcome');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// NEED LOGIN ACCESS
// Main
Route::get('/dashboard', [CommonController::class, 'dashboard_index']);

Route::get('/permohonan', [CommonController::class, 'permohonan_index']);
Route::get('/permohonan/createlangsung', [CommonController::class, 'permohonan_create']);
Route::post('/permohonan/createlangsung', [CommonController::class, 'permohonan_create_upload']);
Route::get('/permohonan/createverifikator', [CommonController::class, 'permohonan_verifikator']);



Route::get('/penandatanganan', [CommonController::class, 'dashboard_index']);
Route::get('/tembusan', [CommonController::class, 'dashboard_index']);
Route::get('/suratmasuk', [CommonController::class, 'dashboard_index']);
Route::get('/suratkeluar', [CommonController::class, 'dashboard_index']);
Route::get('/disposisi', [CommonController::class, 'dashboard_index']);
// General
Route::get('/akun', [CommonController::class, 'akun_index']);


