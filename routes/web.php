<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Detail_TindakanController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\TindakanController;
use Illuminate\Support\Facades\Route;



// Halaman utama dashboard
Route::get('/', [DashboardController::class, 'index']);

// Halaman tambah statis
Route::get('/tambah', function () {
    return view('tambah');
});

// Resource controller otomatis (CRUD lengkap)
Route::resource('dokter', DokterController::class);
Route::resource('pasien', PasienController::class);
Route::resource('tindakan', TindakanController::class);
Route::resource('kunjungan', KunjunganController::class);
Route::resource('detail_tindakan', Detail_TindakanController::class);

// Jika butuh POST terpisah untuk custom store (opsional)
Route::post('/kunjungan', [KunjunganController::class, 'store']);
Route::post('/detail_tindakan', [Detail_TindakanController::class, 'store']);
