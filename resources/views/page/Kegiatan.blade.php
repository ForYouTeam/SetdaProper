@extends('layout.Base')
@section('header')
    Kegiatan & Service Kalender
@endsection
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-table" role="tabpanel"
                        aria-labelledby="v-pills-table-tab">
                        <div class="table-responsive">
                            <table id="tabel-kegiatan" class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>NAMA KEGIATAN</th>
                                        <th>TGL MULAI</th>
                                        <th>TGL BERAKHIR</th>
                                        <th style="width: 80px;">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data['kegiatan'] as $d)
                                        <tr class="text-uppercase">
                                            <th>
                                                <span style="font-size: 13">{{ $d->nama_kegiatan }}</span>
                                                <br>
                                                <small class="text-muted" style="font-size: 7">
                                                    <a class="badge bg-info" href="{{config('app.url')}}/detailkegiatan/{{$d->id}}" onclick="window.open(this.href, 'mywin',
                                                        'left=20,top=20,width=700,height=1200,toolbar=1,resizable=0'); return false;"><i
                                                            class="far fa-hand-pointer"></i>
                                                        detail !</a>
                                                </small>
                                            </th>
                                            <th>
                                                <span
                                                    style="font-size: 13">{{ date('d F Y', strtotime($d->tgl_mulai)) }}</span>
                                                <br>
                                                <small class="text-muted"
                                                    style="font-size: 7">{{ date('H:i', strtotime($d->tgl_mulai)) }}</small>
                                            </th>
                                            <th>
                                                <span
                                                    style="font-size: 13">{{ date('d F Y', strtotime($d->tgl_tgl_berakhir)) }}</span>
                                                <br>
                                                <small class="text-muted"
                                                    style="font-size: 7">{{ date('H:i', strtotime($d->tgl_berakhir)) }}</small>
                                            </th>
                                            <th>
                                                <button data-id="{{ $d->id }}" id="btn-ubah" type="button"
                                                    class="btn icon btn-primary">
                                                    <i class="fas fa-user-edit"></i>
                                                </button>
                                                <button data-id="{{ $d->id }}" id="btn-hapus" type="button"
                                                    class="btn icon btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-form" role="tabpanel" aria-labelledby="v-pills-form-tab">
                        <div class="card-pad">
                            <form id="form-simpan" class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-vertical">NAMA KEGIATAN</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="nama_kegiatan" placeholder="Nama kegiatan">
                                                <small id="nama_kegiatan-alert" class="text-danger mini-alert"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label>TGL MULAI KEGIATAN</label>
                                                <input type="datetime-local" class="form-control" name="tgl_mulai"
                                                    value="{{ date('Y-m-d\\TH:i') }}">
                                                <small id="tgl_mulai-alert" class="text-danger mini-alert"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label>TGL BERAKHIR KEGIATAN</label>
                                                <input type="datetime-local" class="form-control" name="tgl_berakhir"
                                                    value="{{ date('Y-m-d\\TH:i') }}">
                                                <small id="tgl_berakhir-alert" class="text-danger mini-alert"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">PAKAIAN</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="pakaian" placeholder="Pakaian">
                                                <small id="pakaian-alert" class="text-danger mini-alert"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">TEMPAT KEGIATAN</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="tempat" placeholder="Tempat kegiatan berlangsung">
                                                <small id="tempat-alert" class="text-danger mini-alert"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">PENYELENGGARA KEGIATAN</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="penyelenggara" placeholder="Penyelenggara berlangsung">
                                                <small id="penyelenggara-alert" class="text-danger mini-alert"></small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-vertical">PEJABAT MENGHADIRI</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="penjabat_menghadiri" placeholder="Penjabat menghadiri">
                                                <small id="penjabat_menghadiri-alert"
                                                    class="text-danger mini-alert"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">PETUGAS PROTOKOL</label>
                                                <select name="protokol" class="form-select">
                                                    <option selected disabled>--Pilih--</option>
                                                    @foreach ($data['pegawai'] as $d)
                                                        <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <small id="protokol-alert" class="text-danger mini-alert"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">PETUGAS KOPIM</label>
                                                <select name="kopim" class="form-select">
                                                    <option selected disabled>--Pilih--</option>
                                                    @foreach ($data['pegawai'] as $d)
                                                        <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <small id="kopim-alert" class="text-danger mini-alert"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">PETUGAS DOKPIM</label>
                                                <select name="dokpim" class="form-select">
                                                    <option selected disabled>--Pilih--</option>
                                                    @foreach ($data['pegawai'] as $d)
                                                        <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <small id="dokpim-alert" class="text-danger mini-alert"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">KETERANGAN</label>
                                                <textarea name="keterangan" class="form-control" rows="5"></textarea>
                                                <small id="dopim-alert" class="text-danger mini-alert"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end mt-2">
                                            <button id="btn-simpan" type="button"
                                                class="btn btn-secondary me-1 mb-1">KIRIM <i
                                                    class="fas fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-table-tab" data-bs-toggle="pill" href="#v-pills-table"
                        role="tab" aria-controls="v-pills-table" aria-selected="true">Tabel Data</a>
                    <a class="nav-link" id="v-pills-form-tab" data-bs-toggle="pill" href="#v-pills-form" role="tab"
                        aria-controls="v-pills-form" aria-selected="false">Formulir</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#tabel-kegiatan').DataTable();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('click', '#btn-simpan', function() {
            let url = `{{ config('app.url') }}/kegiatan`;
            let form = document.getElementById('form-simpan');
            let data = new FormData(form);

            $.ajax({
                url: url,
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: (result) => {
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
                    let data = err.responseJSON
                    let errorRes = data.errors
                    console.log(errorRes);
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

        $(document).on('click', '#btn-ubah', function() {
            let _id = $(this).data('id');
            let url = `{{ config('app.url') }}/kegiatan/${_id}`;

            $('.modal-title').html('UBAH DATA');

            $.get(url, function(result) {
                $('#form-ubah').html(`
                    <div class="card-pad">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="first-name-vertical">NAMA KEGIATAN</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="nama_kegiatan" placeholder="Nama kegiatan" value="${result.data.nama_kegiatan}">
                                    <small id="nama_kegiatan-alert2" class="text-danger mini-alert"></small>
                                </div>
                                <div class="form-group mt-4">
                                    <label>TGL MULAI KEGIATAN</label>
                                    <input type="datetime-local" class="form-control" name="tgl_mulai"
                                        value="${result.data.tgl_mulai}">
                                    <small id="tgl_mulai-alert2" class="text-danger mini-alert"></small>
                                </div>
                                <div class="form-group mt-4">
                                    <label>TGL BERAKHIR KEGIATAN</label>
                                    <input type="datetime-local" class="form-control" name="tgl_berakhir"
                                        value="${result.data.tgl_berakhir}">
                                    <small id="tgl_berakhir-alert2" class="text-danger mini-alert"></small>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="first-name-vertical">PAKAIAN</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="pakaian" placeholder="Pakaian" value="${result.data.pakaian}">
                                    <small id="pakaian-alert2" class="text-danger mini-alert"></small>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="first-name-vertical">TEMPAT KEGIATAN</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="tempat" placeholder="Tempat kegiatan berlangsung" value="${result.data.tempat}">
                                    <small id="tempat-alert2" class="text-danger mini-alert"></small>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="first-name-vertical">PENYELENGGARA KEGIATAN</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="penyelenggara" placeholder="Penyelenggara berlangsung" value="${result.data.penyelenggara}">
                                    <small id="penyelenggara-alert2" class="text-danger mini-alert"></small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="first-name-vertical">PEJABAT MENGHADIRI</label>
                                    <input type="text" id="first-name-vertical" class="form-control"
                                        name="penjabat_menghadiri" placeholder="Penjabat menghadiri" value="${result.data.penjabat_menghadiri}">
                                    <small id="penjabat_menghadiri-alert2" class="text-danger mini-alert"></small>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="first-name-vertical">PETUGAS PROTOKOL</label>
                                    <select id="protokol" name="protokol" class="form-select">
                                        <option selected disabled>--Pilih--</option>
                                        @foreach ($data['pegawai'] as $d)
                                            <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                        @endforeach
                                    </select>
                                    <small id="protokol-alert2" class="text-danger mini-alert"></small>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="first-name-vertical">PETUGAS KOPIM</label>
                                    <select id="kopim" name="kopim" class="form-select">
                                        <option selected disabled>--Pilih--</option>
                                        @foreach ($data['pegawai'] as $d)
                                            <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                        @endforeach
                                    </select>
                                    <small id="kopim-alert2" class="text-danger mini-alert"></small>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="first-name-vertical">PETUGAS DOKPIM</label>
                                    <select id="dokpim" name="dokpim" class="form-select">
                                        <option selected disabled>--Pilih--</option>
                                        @foreach ($data['pegawai'] as $d)
                                            <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                        @endforeach
                                    </select>
                                    <small id="dokpim-alert2" class="text-danger mini-alert"></small>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="first-name-vertical">KETERANGAN</label>
                                    <textarea name="keterangan" class="form-control" rows="3">${result.data.keterangan}</textarea>
                                    <small id="keterangan-alert2" class="text-danger mini-alert"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
                $('.modal-footer').html(`
                    <button data-id="${result.data.id}" id="btn-kirim" type="button" class="btn btn-primary">Kirim</button>
                    <button id="btn-close" type="button" class="btn btn-danger">Close</button>
                `);
                $('#protokol').val(result.data.protokol);
                $('#dokpim').val(result.data.dokpim);
                $('#kopim').val(result.data.kopim);
                $('#myModal').modal('show');
            });
        });

        $(document).on('click', '#btn-kirim', function() {
            let _id = $(this).data('id');
            let url = `{{ config('app.url') }}/kegiatan/${_id}`;
            let data = $('#form-ubah').serialize();
            $('#btn-kirim').prop('disabled', true);
            $('#myModal').modal('hide');
            $.ajax({
                url: url,
                method: "PATCH",
                data: data,
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
                    $('#btn-edit').prop('disabled', false);
                    let data = result.responseJSON
                    let errorRes = data.errors
                    Swal.fire({
                        icon: data.response.icon,
                        title: data.response.title,
                        text: data.response.message,
                    }).then(() => {
                        $('#btn-kirim').prop('disabled', false);
                        $('#myModal').modal('show');
                        if (errorRes.length >= 1) {
                            $('.miniAlert').html('');
                            $.each(errorRes.data, function(i, value) {
                                $(`#${i}-alert2`).html(value);
                            });
                        }
                    });
                }
            });
        });

        $(document).on('click', '#btn-hapus', function() {
            let _id = $(this).data('id');
            let url = `{{ config('app.url') }}/kegiatan/${_id}`;
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
