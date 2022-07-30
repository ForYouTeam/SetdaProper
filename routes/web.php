<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\cms\DashboardController;
use App\Http\Controllers\cms\KegiatanController;
use App\Http\Controllers\cms\PegawaiController;
use App\Models\KegiatanModel;
use Illuminate\Support\Facades\Route;

Route::prefix('login')->controller(LoginController::class)->group(function () {
    Route::get('login_page', 'login')->name('login');
    Route::get('process', 'loginProcess')->name('login.process');
    Route::get('logout_page', 'logout')->name('logout');
});

Route::middleware(['auth', 'role:super-admin'])->group(function () {
    Route::prefix('pegawai')->controller(PegawaiController::class)->group(function () {
        Route::get('/', 'getAll')->name('pegawai.getAll');
        Route::post('/', 'createPegawai');
        Route::get('/{id}', 'getPegawai');
        Route::patch('/{id}', 'updatePegawai');
        Route::delete('/{id}', 'deletePegawai');
    });

    Route::prefix('user')->controller(RegisterController::class)->group(function () {
        Route::post('/create', 'registerUser');
        Route::delete('/delete/{id}', 'deleteUser');
    });
});

Route::middleware(['auth', 'role:super-admin|user'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard.index');
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
});
