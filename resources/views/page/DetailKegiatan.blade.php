<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DETAIL KEGIATAN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500&display=swap");

        body {
            font-family: "Montserrat", sans-serif;
            background: rgb(204, 204, 204);
        }

        page {
            background: white;
            display: block;
            margin: 10px auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        page[size="A4"] {
            width: 700px;
            height: 1200px;
        }

        @media print {

            body,
            page {
                margin: 0;
                box-shadow: 0;
            }
        }

        .card-pad {
            padding: 12% 8% 0%;
        }

        .text-title {
            font-weight: 800;
            margin-bottom: -2px;
            font-size: 18pt;
        }

        .list-data {
            font-size: 8pt;
            color: rgb(107, 107, 107);
            font-weight: 500;
        }

        .ket-data {
            border: 1px solid rgb(155, 155, 155);
            border-radius: 8px;
            height: fit-content;
            margin-top: 10px;
            padding: 10px 10px 20px;
        }
    </style>
</head>

<body>
    <page size="A4">
        <div class="container">
            <div class="row card-pad">
                <div class="col-md-12 text-center">
                    <h6 class="text-title">DETAIL KEGIATAN</h6>
                    <small>Jadwal Kegiatan Hari Ini Kantor SETDA</small>
                </div>
            </div>
            <div class="row card-pad">
                <div class="col-md-12 mb-4">
                    <span class="list-data">NAMA KEGIATAN</span>
                    <h6>{{ $data->nama_kegiatan }}</h6>
                </div>
                <div class="col-md-6 mt-2">
                    <span class="list-data">TGL MULAI</span>
                    <h6>
                        <i class="fa-regular fa-calendar-check"></i> {{ date('d F Y', strtotime($data->tgl_mulai)) }}
                        |
                        {{ date('H:i', strtotime($data->tgl_mulai)) }}
                        Wita
                    </h6>
                </div>
                <div class="col-md-6 mt-2">
                    <span class="list-data">TGL BERAKHIR</span>
                    <h6>
                        <i class="fa-regular fa-calendar-check"></i>
                        {{ date('d F Y', strtotime($data->tgl_berakhir)) }} |
                        {{ date('H:i', strtotime($data->tgl_berakhir)) }}
                        Wita
                    </h6>
                </div>
                <div class="col-md-6 mt-2">
                    <span class="list-data">PAKAIAN</span>
                    <h6>{{ $data->pakaian }}</h6>
                </div>
                <div class="col-md-6 mt-2">
                    <span class="list-data">TEMPAT</span>
                    <h6>{{ $data->tempat }}</h6>
                </div>
                <div class="col-md-6 mt-2">
                    <span class="list-data">PENYELENGGARA</span>
                    <h6>{{ $data->penyelenggara }}</h6>
                </div>
                <div class="col-md-6 mt-2">
                    <span class="list-data">PEJABAT MENGHADIRI</span>
                    <div class="mt-2">
                        <h6>{{ $data->penjabat_menghadiri }}</h6>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <hr>
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <span class="list-data">PROTOKOL</span>
                            <br>
                            <small>{{ $data->protokolRole->nama }}</small>
                        </div>
                        <div class="col-md-4 mt-2">
                            <span class="list-data">KOPIM</span>
                            <br>
                            <small>{{ $data->kopimRole->nama }}</small>
                        </div>
                        <div class="col-md-4 mt-2">
                            <span class="list-data">DOKPIM</span>
                            <br>
                            <small>{{ $data->dokpimRole->nama }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <span class="list-data">KETERANGAN</span>
                    <div class="ket-data">
                        <small>{{ $data->keterangan }}</small>
                    </div>
                    <small class="mt-4">Tekan tombol cetak dibawah jika ingin mencetak file ini</small>
                </div>
                <div class="col-md-12 mt-4">
                    <button type="button" onclick="window.print()" class="btn btn-sm btn-danger">Cetak <i
                            class="fa-solid fa-print ml-2"></i></button>
                </div>
            </div>
        </div>
    </page>
</body>

</html>
