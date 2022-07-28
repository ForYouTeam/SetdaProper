@extends('layout.Base')
@section('header')
    Selamat Datang
@endsection
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total Pegawai SETDA</h6>
                                        <h6 class="font-extrabold mb-0">{{ $data['pegawai'] }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Agenda Bulan {{ date('F 2022') }}</h6>
                                        <h6 class="font-extrabold mb-0">{{ $data['jadwalbulanini'] }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Agenda Bulan Depan</h6>
                                        <h6 class="font-extrabold mb-0">{{ $data['jadwalbulandepan'] }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Agenda Hari Ini</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg">
                                <thead>
                                    <tr>
                                        <th>NAMA KEGIATAN</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['kegiatan'] as $d)
                                        <tr>
                                            <td class="col-4">
                                                <span class="text-uppercase">{{ $d->nama_kegiatan }}</span>
                                                <br>
                                                <small>{{ date('d F', strtotime($d->tgl_mulai)) }} -
                                                    {{ date('d F Y', strtotime($d->tgl_berakhir)) }}</small>
                                                <br>
                                                <small>{{ date('H:i', strtotime($d->tgl_mulai)) }} -
                                                    {{ date('H:i', strtotime($d->tgl_berakhir)) }}</small>
                                            </td>
                                            <td class="col-auto">
                                                <span class="text-primary">Keterangan: </span>{{ $d->keterangan }} <br>
                                                <span class="text-primary">Pakaian yang digunakan:
                                                </span>{{ $d->pakaian }} <br>
                                                <span class="text-primary">Pejabat menghadiri:
                                                </span>{{ $d->penjabat_menghadiri }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="assets/images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">John Duck</h5>
                                <h6 class="text-muted mb-0">@johnducky</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
