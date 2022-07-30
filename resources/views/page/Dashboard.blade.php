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
                                    @if (count($data['kegiatan']) < 1)
                                        <tr>
                                            <td>Data Kosong</td>
                                            <td>Data Kosong</td>
                                        </tr>
                                    @endif
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
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                                @hasrole('super-admin')
                                    <button type="button" id="tambah-user" class="btn btn-primary btn-sm"
                                        style="margin-right: 10px;">Tambah User</button>
                                @endhasrole
                                <a href="{{ route('logout') }}" class="text-muted"><i class="fas fa-power-off"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @if (count($data['user']) >= 1)
                    <div class="card">
                        <div class="card-header">
                            <h4>List User</h4>
                        </div>
                        <div class="card-content pb-4">
                            @foreach ($data['user'] as $d)
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        @role('super-admin')
                                            <a id="btn-hapus" data-id="{{ $d->id }}" href="#"
                                                class="text-danger"><i class="far fa-minus-square"></i></a>
                                        @endrole
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">{{ $d->name }}</h5>
                                        <h6 class="text-muted mb-0">{{ $d->username }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('click', '#tambah-user', function() {
            $('.modal-title').html('Tambah User Baru');
            $('#form-ubah').html(`
                <div class="card-pad">
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <label>NAMA LENGKAP</label>
                        </div>
                        <div class="col-md-9 form-group mt-3">
                            <input type="text" class="form-control" name="name"
                                placeholder="Nama lengkap">
                            <small id="name-alert"
                                class="text-danger text-capitalize mini-alert"></small>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <label>USERNAME</label>
                        </div>
                        <div class="col-md-9 form-group mt-3">
                            <input type="text" class="form-control" name="username"
                                placeholder="Username">
                            <small id="username-alert"
                                class="text-danger text-capitalize mini-alert"></small>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <label>PASSWORD</label>
                        </div>
                        <div class="col-md-9 form-group mt-3">
                            <input type="password" class="form-control" name="password"
                                placeholder="Password">
                            <small id="password-alert"
                                class="text-danger text-capitalize mini-alert"></small>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <label>KONFIRMASI PASSWORD</label>
                        </div>
                        <div class="col-md-9 form-group mt-3">
                            <input type="text" class="form-control" name="password_confirmation"
                                placeholder="Konfirmasi Password">
                        </div>    
                    </div>
                </div>
            `);
            $('.modal-footer').html(`
            <button id="btn-kirim" type="button" class="btn btn-primary">Kirim</button>
            <button id="btn-close" type="button" class="btn btn-danger">Close</button>
            `);
            $('#myModal').modal('show');
        });

        $(document).on('click', '#btn-kirim', function() {
            let url = `{{ config('app.url') }}/user/create`;
            let data = $('#form-ubah').serialize();

            Swal.showLoading();
            $.ajax({
                url: url,
                type: "POST",
                data: data,
                success: (result) => {
                    Swal.hideLoading();
                    Swal.fire({
                        title: result.response.title,
                        text: result.response.message,
                        icon: result.response.icon,
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Oke'
                    }).then((result) => {
                        location.reload();
                    });
                },
                error: (err) => {
                    Swal.hideLoading();
                    let data = err.responseJSON
                    let errorRes = data.errors
                    Swal.fire({
                        icon: data.response.icon,
                        title: data.response.title,
                        text: data.response.message,
                    });
                    if (errorRes.length >= 1) {
                        $('.miniAlert').html('');
                        $.each(errorRes.data, function(i, value) {
                            $(`#${i}-alert`).html(value);
                        });
                    }
                }
            });
        });

        $(document).on('click', '#btn-hapus', function() {
            let _id = $(this).data('id');
            let url = `{{ config('app.url') }}/user/delete/${_id}`;
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Data ini mungkin terhubung ke tabel yang lain!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Hapus'
            }).then((res) => {
                if (res.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'delete',
                        success: function(result) {
                            Swal.fire({
                                title: result.response.title,
                                text: result.response.message,
                                icon: result.response.icon,
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Oke'
                            }).then((result) => {
                                location.reload();
                            });
                        },
                        error: function(result) {
                            let data = result.responseJSON
                            Swal.fire({
                                icon: data.response.icon,
                                title: data.response.title,
                                text: data.response.message,
                            });
                        }
                    });
                }
            })
        });
    </script>
@endsection
