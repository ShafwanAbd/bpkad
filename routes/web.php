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
Route::middleware(['auth'])->group(function () {
    // Main
    Route::get('/dashboard', [CommonController::class, 'dashboard_index']);
    
    Route::get('/permohonan', [CommonController::class, 'permohonan_index']);
    Route::get('/permohonan/createlangsung', [CommonController::class, 'permohonan_create']);
    Route::post('/permohonan/createlangsung', [CommonController::class, 'permohonan_create_upload']);
    Route::get('/permohonan/createverifikator', [CommonController::class, 'permohonan_verifikator']);
    Route::post('/permohonan/createverifikator', [CommonController::class, 'permohonan_create_verifikator_upload']);
    Route::get('/permohonan/data/{id}', [CommonController::class, 'permohonan_detail']);
    Route::get('/permohonan/tandatangan/{id}', [CommonController::class, 'permohonan_tandatangan']);
    Route::post('/permohonan/koreksi/{id}', [CommonController::class, 'permohonan_koreksi']); 
    Route::get('/permohonan/revisi/{id}', [CommonController::class, 'permohonan_revisi']); 
    Route::post('/permohonan/revisi/create/{id}', [CommonController::class, 'permohonan_revisi_upload']);

    Route::get('/permohonan/verifikasi1/{id}', [CommonController::class, 'permohonan_verifikasi1']);
    Route::get('/permohonan/verifikasi2/{id}', [CommonController::class, 'permohonan_verifikasi2']);
    Route::get('/permohonan/verifikasi3/{id}', [CommonController::class, 'permohonan_verifikasi3']);
    Route::get('/permohonan/verifikasi4/{id}', [CommonController::class, 'permohonan_verifikasi4']);
    

    Route::get('/penandatanganan', [CommonController::class, 'dashboard_index']);


    Route::get('/tembusan', [CommonController::class, 'dashboard_index']);


    Route::get('/suratmasuk', [CommonController::class, 'suratmasuk_index']);
    Route::get('/suratmasuk/create', [CommonController::class, 'suratmasuk_create']);
    Route::post('/suratmasuk/create', [CommonController::class, 'suratmasuk_create_upload']);
    Route::get('/suratmasuk/data/{id}', [CommonController::class, 'suratmasuk_detail']);

    Route::get('/suratkeluar', [CommonController::class, 'dashboard_index']);

    
    Route::get('/disposisi', [CommonController::class, 'dashboard_index']);
    // General
    Route::get('/akun', [CommonController::class, 'akun_index']);
});


