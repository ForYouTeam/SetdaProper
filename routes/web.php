<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.Base');
})->name('dashboard.index');

Route::get('pegawai', function () {
    return view('page.Pegawai');
})->name('pegawai.index');

Route::get('kegiatan', function () {
    return view('page.kegiatan');
})->name('kegiatan.index');
