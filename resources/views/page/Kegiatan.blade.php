@extends('layout.Base')
@section('header')
    Kegiatan & Service Kalender
@endsection
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade" id="v-pills-table" role="tabpanel" aria-labelledby="v-pills-table-tab">
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
                                    <tr class="text-uppercase">
                                        <th>
                                            <span style="font-size: 13">upacara hut daerah</span>
                                            <br>
                                            <small class="text-muted" style="font-size: 7">
                                                <a class="badge bg-info" href="#"><i class="far fa-hand-pointer"></i>
                                                    detail !</a>
                                            </small>
                                        </th>
                                        <th>
                                            <span style="font-size: 13">senin , 22 juli 2022</span>
                                            <br>
                                            <small class="text-muted" style="font-size: 7">11:00</small>
                                        </th>
                                        <th>
                                            <span style="font-size: 13">senin , 22 juli 2022</span>
                                            <br>
                                            <small class="text-muted" style="font-size: 7">13:00</small>
                                        </th>
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
                    <div class="tab-pane fade show active" id="v-pills-form" role="tabpanel"
                        aria-labelledby="v-pills-form-tab">
                        <div class="card-pad">
                            <form id="form-simpan" class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-vertical">NAMA KEGIATAN</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="nama_kegiatan" placeholder="Nama kegiatan">
                                                <small id="nama_kegiatan-alert" class="text-danger"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label>TGL MULAI KEGIATAN</label>
                                                <input type="datetime-local" class="form-control" name="tgl_mulai"
                                                    value="{{ date('Y-m-d\\TH:i') }}">
                                                <small id="tgl_mulai-alert" class="text-danger"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label>TGL BERAKHIR KEGIATAN</label>
                                                <input type="datetime-local" class="form-control" name="tgl_berakhir"
                                                    value="{{ date('Y-m-d\\TH:i') }}">
                                                <small id="tgl_berakhir-alert" class="text-danger"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">PAKAIAN</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="pakaian" placeholder="Pakaian">
                                                <small id="pakaian-alert" class="text-danger"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">TEMPAT KEGIATAN</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="tempat" placeholder="Tempat kegiatan berlangsung">
                                                <small id="tempat-alert" class="text-danger"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">PENYELENGGARA KEGIATAN</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="penyelenggara" placeholder="Penyelenggara berlangsung">
                                                <small id="penyelenggara-alert" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-vertical">PEJABAT MENGHADIRI</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="pejabat_menghadiri" placeholder="Pejabat menghadiri">
                                                <small id="pejabat_menghadiri-alert" class="text-danger"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">PEJABAT MENGHADIRI</label>
                                                <input type="text" id="first-name-vertical" class="form-control"
                                                    name="pejabat_menghadiri" placeholder="Pejabat menghadiri">
                                                <small id="pejabat_menghadiri-alert" class="text-danger"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">PETUGAS PROTOKOL</label>
                                                <select name="protokol" class="form-select">
                                                    <option selected disabled>--Pilih--</option>
                                                </select>
                                                <small id="protokol-alert" class="text-danger"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">PETUGAS KOPIM</label>
                                                <select name="kopim" class="form-select">
                                                    <option selected disabled>--Pilih--</option>
                                                </select>
                                                <small id="kopim-alert" class="text-danger"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">PETUGAS DOKPIM</label>
                                                <select name="dokpim" class="form-select">
                                                    <option selected disabled>--Pilih--</option>
                                                </select>
                                                <small id="dokpim-alert" class="text-danger"></small>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label for="first-name-vertical">KETERANGAN</label>
                                                <textarea name="keterangan" class="form-control" rows="3"></textarea>
                                                <small id="dopim-alert" class="text-danger"></small>
                                            </div>
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
            <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" id="v-pills-table-tab" data-bs-toggle="pill" href="#v-pills-table"
                        role="tab" aria-controls="v-pills-table" aria-selected="true">Tabel Data</a>
                    <a class="nav-link active" id="v-pills-form-tab" data-bs-toggle="pill" href="#v-pills-form"
                        role="tab" aria-controls="v-pills-form" aria-selected="false">Profile</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#tabel-kegiatan').DataTable();
        });
    </script>
@endsection
