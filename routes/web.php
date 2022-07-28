<?php

use App\Http\Controllers\cms\KegiatanController;
use App\Http\Controllers\cms\PegawaiController;
use App\Models\KegiatanModel;
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

Route::prefix('kegiatan')->controller(KegiatanController::class)->group(function () {
    Route::get('/', 'getAll')->name('kegiatan.getAll');
    Route::post('/', 'createkegiatan');
    Route::get('/{id}', 'getkegiatan');
    Route::patch('/{id}', 'updatekegiatan');
    Route::delete('/{id}', 'deletekegiatan');
});

Route::get('detailkegiatan/{id}', function ($id) {
    $data = KegiatanModel::whereId($id)->with('protokolRole', 'kopimRole', 'dokpimRole')->first();
    // return response()->json($data);
    return view('page.DetailKegiatan')->with('data', $data);
});
