@extends('layout.Base')
@section('header')
    Daftar Data Pegawai
@endsection
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-table" role="tabpanel"
                        aria-labelledby="v-pills-table-tab">
                        <div class="table-responsive">
                            <table id="tabel-pegawai" class="table table-lg">
                                <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>JABATAN</th>
                                        <th>BAGIAN</th>
                                        <th style="width: 80px;">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $d)
                                        <tr class="text-uppercase">
                                            <th>
                                                <span style="font-size: 13">{{ $d->nama }}</span>
                                                <br>
                                                <small class="text-muted" style="font-size: 7">{{ $d->nip }}</small>
                                            </th>
                                            <th>{{ $d->jabatan }}</th>
                                            <th>{{ $d->bagian }}</th>
                                            <th>
                                                <button id="btn-ubah" data-id="{{ $d->id }}" type="button"
                                                    class="btn icon btn-primary">
                                                    <i class="fas fa-user-edit"></i>
                                                </button>
                                                <button id="btn-hapus" data-id="{{ $d->id }}" type="button"
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
                        <div class="col-md-12 col-12">
                            <div class="card-pad">
                                <form id="form-simpan" class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-3 mt-3">
                                                <label>NAMA LENGKAP</label>
                                            </div>
                                            <div class="col-md-9 form-group mt-3">
                                                <input type="text" class="form-control" name="nama"
                                                    placeholder="Nama lengkap">
                                                <small id="nama-alert"
                                                    class="text-danger text-capitalize mini-alert"></small>
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <label>NIP</label>
                                            </div>
                                            <div class="col-md-9 form-group mt-3">
                                                <input type="number" class="form-control" name="nip"
                                                    placeholder="Nomor induk pegawai">
                                                <small id="nip-alert"
                                                    class="text-danger text-capitalize mini-alert"></small>
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <label>JABATAN</label>
                                            </div>
                                            <div class="col-md-9 form-group mt-3">
                                                <input type="text" class="form-control" name="jabatan"
                                                    placeholder="Jabatan">
                                                <small id="jabatan-alert"
                                                    class="text-danger text-capitalize mini-alert"></small>
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <label>BAGIAN</label>
                                            </div>
                                            <div class="col-md-9 form-group mt-3">
                                                <select name="bagian" class="form-select">
                                                    <option selected disabled>--Pilih--</option>
                                                    <option value="protocol">Protocol</option>
                                                    <option value="dokpim">Dokpim</option>
                                                    <option value="kopim">Kopim</option>
                                                    <option value="lainya">Lainnya</option>
                                                </select>
                                                <small id="bagian-alert"
                                                    class="text-danger text-capitalize mini-alert"></small>
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <label>JENIS KELAMIN</label>
                                            </div>
                                            <div class="col-md-9 form-group mt-3">
                                                <select name="jk" class="form-select">
                                                    <option selected disabled>--Pilih--</option>
                                                    <option value="laki-laki">Laki-laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                                <small id="jk-alert"
                                                    class="text-danger text-capitalize mini-alert"></small>
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
            </div>
            <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-table-tab" data-bs-toggle="pill" href="#v-pills-table"
                        role="tab" aria-controls="v-pills-table" aria-selected="true">Tabel Data</a>
                    <a class="nav-link" id="v-pills-form-tab" data-bs-toggle="pill" href="#v-pills-form" role="tab"
                        aria-controls="v-pills-form" aria-selected="false">Profile</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#tabel-pegawai').DataTable();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('click', '#btn-simpan', function() {
            let url = `{{ config('app.url') }}/pegawai`;
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
            let url = `{{ config('app.url') }}/pegawai/${_id}`;

            $('.modal-title').html('UBAH DATA');

            $.get(url, function(result) {
                $('#form-ubah').html(`
                    <div class="card-pad">
                        <div class="row">
                            <div class="col-md-3 mt-3">
                                <label>NAMA LENGKAP</label>
                            </div>
                            <div class="col-md-9 form-group mt-3">
                                <input type="text" class="form-control" name="nama"
                                    placeholder="Nama lengkap" value="${result.data.nama}">
                                <small id="nama-alert2"
                                    class="text-danger text-capitalize mini-alert"></small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label>NIP</label>
                            </div>
                            <div class="col-md-9 form-group mt-3">
                                <input type="number" class="form-control" name="nip"
                                    placeholder="Nomor induk pegawai" value="${result.data.nip}">
                                <small id="nip-alert2"
                                    class="text-danger text-capitalize mini-alert"></small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label>JABATAN</label>
                            </div>
                            <div class="col-md-9 form-group mt-3">
                                <input type="text" class="form-control" name="jabatan"
                                    placeholder="Jabatan"  value="${result.data.jabatan}">
                                <small id="jabatan-alert2"
                                    class="text-danger text-capitalize mini-alert"></small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label>BAGIAN</label>
                            </div>
                            <div class="col-md-9 form-group mt-3">
                                <select id="bagian" name="bagian" class="form-select">
                                    <option selected disabled>--Pilih--</option>
                                    <option value="protocol">Protocol</option>
                                    <option value="dokpim">Dokpim</option>
                                    <option value="kopim">Kopim</option>
                                    <option value="lainya">Lainnya</option>
                                </select>
                                <small id="bagian-alert2"
                                    class="text-danger text-capitalize mini-alert"></small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label>JENIS KELAMIN</label>
                            </div>
                            <div class="col-md-9 form-group mt-3">
                                <select id="jk" name="jk" class="form-select">
                                    <option selected disabled>--Pilih--</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                <small id="jk-alert2"
                                    class="text-danger text-capitalize mini-alert"></small>
                            </div>
                        </div>    
                    </div>
                `);
                $('#bagian').val(result.data.bagian);
                $('#jk').val(result.data.jk);
                $('.modal-footer').html(`
                    <button data-id="${result.data.id}" id="btn-kirim" type="button" class="btn btn-primary">Kirim</button>
                    <button id="btn-close" type="button" class="btn btn-danger">Close</button>
                `);
                $('#myModal').modal('show');
            });
        });

        $(document).on('click', '#btn-kirim', function() {
            let _id = $(this).data('id');
            let url = `{{ config('app.url') }}/pegawai/${_id}`;
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
            let url = `{{ config('app.url') }}/pegawai/${_id}`;
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
