<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\KegiatanModel;
use App\Models\PegawaiModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $date = Carbon::now();
        $data = array(
            'pegawai' => PegawaiModel::count(),
            'jadwalbulanini' => KegiatanModel::whereMonth('tgl_mulai', $date->format('m'))->count(),
            'jadwalbulandepan' => KegiatanModel::whereMonth('tgl_mulai', $date->addMonth(1)->format('m'))->count(),
            'kegiatan' => KegiatanModel::whereDate('tgl_mulai', date('Y-m-d'))->get(),
            'user' => User::whereHas(
                'roles',
                function ($q) {
                    $q->where('name', 'user');
                }
            )->get(),
        );
        return view('page.Dashboard')->with('data', $data);
    }
}
