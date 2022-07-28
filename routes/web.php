<?php

use App\Http\Controllers\cms\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.Base');
})->name('dashboard.index');

Route::prefix('pegawai')->controller(PegawaiController::class)->group(function () {
    Route::get('/', 'getAll')->name('pegawai.getAll');
    Route::post('/', 'createPegawai');
    Route::get('/{id}', 'getPegawai');
    Route::patch('/{id}', 'updatePegawai');
    Route::delete('/{id}', 'deletePegawai');
});

Route::get('kegiatan', function () {
    return view('page.kegiatan');
})->name('kegiatan.index');
