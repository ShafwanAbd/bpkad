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
    Route::get('/', [CommonController::class, 'dashboard_index']);
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

    Route::get('/tembusan', [CommonController::class, 'tembusan_index']);
    Route::get('/tembusan/data/{id}', [CommonController::class, 'tembusan_detail']);

    Route::get('/suratmasuk', [CommonController::class, 'suratmasuk_index']);
    Route::get('/suratmasuk/create', [CommonController::class, 'suratmasuk_create']);
    Route::post('/suratmasuk/create', [CommonController::class, 'suratmasuk_create_upload']);
    Route::get('/suratmasuk/data/{id}', [CommonController::class, 'suratmasuk_detail']);
    Route::get('/tambahkantor', [CommonController::class, 'tambahkantor']);
    Route::post('/tambahkantor', [CommonController::class, 'tambahkantor_upload']);
 
    Route::get('/disposisi', [CommonController::class, 'disposisi_index']);    
    Route::get('/disposisi/data/{id}', [CommonController::class, 'disposisi_detail']);
    Route::get('/suratmasuk/createdisposisi/{id}', [CommonController::class, 'suratmasuk_create_disposisi']);
    Route::post('/suratmasuk/createdisposisi/{id}', [CommonController::class, 'suratmasuk_create_disposisi_upload']);
    Route::get('/suratmasuk/createterusan/{id}', [CommonController::class, 'suratmasuk_create_terusan']);
    Route::get('/suratmasuk/disposisidone/{id}', [CommonController::class, 'suratmasuk_disposisi_done']);

    Route::get('/suratkeluar', [CommonController::class, 'suratkeluar_index']); 
    Route::get('/suratkeluar/create', [CommonController::class, 'suratkeluar_create']); 
    Route::post('/suratkeluar/create', [CommonController::class, 'suratkeluar_create_upload']); 
    Route::get('/suratkeluar/data/{id}', [CommonController::class, 'suratkeluar_detail']);

    // General
    Route::get('/akun', [CommonController::class, 'akun_index']);
    Route::get('/kelolaakun', [CommonController::class, 'kelolaakun_index']);
    Route::get('/kelolaakun/data/{id}', [CommonController::class, 'kelolaakun_detail']);
    Route::post('/kelolaakun/data/{id}', [CommonController::class, 'kelolaakun_detail_upload']);
    Route::get('/kelolaakun/create', [CommonController::class, 'kelolaakun_create']);
    Route::post('/kelolaakun/create', [CommonController::class, 'kelolaakun_create_upload']);
    Route::get('/kelolaakun/delete/{id}', [CommonController::class, 'kelolaakun_delete']);

    Route::get('/kelolakantor', [CommonController::class, 'kelolakantor_index']);
    Route::get('/kelolakantor/data/{id}', [CommonController::class, 'kelolakantor_detail']);
    Route::post('/kelolakantor/data/{id}', [CommonController::class, 'kelolakantor_detail_upload']);
    Route::get('/kelolakantor/create', [CommonController::class, 'kelolakantor_create']);
    Route::post('/kelolakantor/create', [CommonController::class, 'kelolakantor_create_upload']);
    Route::get('/kelolakantor/delete/{id}', [CommonController::class, 'kelolakantor_delete']);
});


