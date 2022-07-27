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
                                    <tr class="text-uppercase">
                                        <th>
                                            <span style="font-size: 13">IRWANDI</span>
                                            <br>
                                            <small class="text-muted" style="font-size: 7">5520117043</small>
                                        </th>
                                        <th>JABATAN</th>
                                        <th>BAGIAN</th>
                                        <th>
                                            <button type="button" class="btn icon btn-primary">
                                                <i class="fas fa-user-edit"></i>
                                            </button>
                                            <button type="button" class="btn icon btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </th>
                                    </tr>
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
                                                <small id="nama-alert" class="text-danger"></small>
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <label>NIP</label>
                                            </div>
                                            <div class="col-md-9 form-group mt-3">
                                                <input type="number" class="form-control" name="nip"
                                                    placeholder="Nomor induk pegawai">
                                                <small id="nip-alert" class="text-danger"></small>
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <label>JABATAN</label>
                                            </div>
                                            <div class="col-md-9 form-group mt-3">
                                                <input type="text" class="form-control" name="jabatan"
                                                    placeholder="Jabatan">
                                                <small id="jabatan-alert" class="text-danger"></small>
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
                                                <small id="bagian-alert" class="text-danger"></small>
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
                                                <small id="jk-alert" class="text-danger"></small>
                                            </div>

                                            <div class="col-sm-12 d-flex justify-content-end mt-2">
                                                <button id="btn-simpan" type="submit"
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
    </script>
@endsection
