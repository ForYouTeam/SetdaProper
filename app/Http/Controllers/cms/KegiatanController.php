<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\KegiatanRequest;
use App\Interfaces\CalendarServiceInterfaces;
use App\Models\KegiatanModel;
use App\Models\PegawaiModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function __construct(CalendarServiceInterfaces $calendarRepo)
    {
        $this->calendarRepo = $calendarRepo;
    }

    public function getAll()
    {
        $data = array(
            'kegiatan' => KegiatanModel::all(),
            'pegawai' => PegawaiModel::all()
        );
        return view('page.Kegiatan')->with('data', $data);
    }

    public function createKegiatan(KegiatanRequest $request)
    {
        $data = $request->only([
            'nama_kegiatan', 'tgl_mulai',
            'tgl_berakhir', 'pakaian', 'tempat',
            'penyelenggara', 'penjabat_menghadiri',
            'protokol', 'kopim', 'dokpim', 'keterangan',
        ]);

        try {
            $idCalendar = $this->calendarRepo->createService($data);
            $data['calendar_id'] = $idCalendar->googleEvent->id;

            KegiatanModel::create($data);
            $response = array(
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $response = array(
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return response()->json($response, $response['code']);
    }

    public function getKegiatan($id)
    {
        try {
            $pegawai = KegiatanModel::whereId($id)->first();
            $pegawai->tgl_mulai = date('Y-m-d\\TH:i', strtotime($pegawai->tgl_mulai));
            $pegawai->tgl_berakhir = date('Y-m-d\\TH:i', strtotime($pegawai->tgl_berakhir));
            if ($pegawai) {
                $response = array(
                    'data' => $pegawai,
                    'message' => 'Success',
                    'code' => 201
                );
            } else {
                $response = array(
                    'data' => null,
                    'message' => 'Not found',
                    'code' => 404
                );
            }
        } catch (\Throwable $th) {
            $response = array(
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return response()->json($response, $response['code']);
    }

    public function updateKegiatan($id, KegiatanRequest $request)
    {
        $data = $request->only([
            'calendar_id', 'nama_kegiatan', 'tgl_mulai',
            'tgl_berakhir', 'pakaian', 'tempat',
            'penyelenggara', 'penjabat_menghadiri',
            'protokol', 'kopim', 'dokpim', 'keterangan',
        ]);

        try {
            $this->calendarRepo->updateService($request->calendar_id, $data);

            $findPegawai = KegiatanModel::whereId($id);
            if ($findPegawai->first()) {
                $findPegawai->update($data);
                $response = array(
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil disimpan',
                    ),
                    'code' => 201
                );
            } else {
                $response = array(
                    'response' => array(
                        'icon' => 'warning',
                        'title' => 'Not Found',
                        'message' => 'Data tidak ditemukan',
                    ),
                    'code' => 404
                );
            }
        } catch (\Throwable $th) {
            $response = array(
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return response()->json($response, $response['code']);
    }

    public function deleteKegiatan($id)
    {
        try {
            $findPegawai = KegiatanModel::whereId($id);
            if ($findPegawai->first()) {
                $this->calendarRepo->deleteService($findPegawai->value('calendar_id'));
                $response = array(
                    'data' => $findPegawai->delete(),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Terhapus',
                        'message' => 'Data berhasil dihapus',
                    ),
                    'code' => 201
                );
            } else {
                $response = array(
                    'data' => null,
                    'response' => array(
                        'icon' => 'warning',
                        'title' => 'Not Found',
                        'message' => 'Data tidak ditemukan',
                    ),
                    'code' => 404
                );
            }
        } catch (\Throwable $th) {
            $response = array(
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return response()->json($response, $response['code']);
    }
}
