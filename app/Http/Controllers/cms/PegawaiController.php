<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\PegawaiRequest;
use App\Http\Requests\PegawaiRequestUpdate;
use App\Models\PegawaiModel;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function getAll()
    {
        $data = PegawaiModel::all();
        return view('page.Pegawai')->with('data', $data);
    }

    public function createPegawai(PegawaiRequest $request)
    {
        try {
            $data = $request->only([
                'nama', 'nip', 'jabatan', 'bagian', 'jk'
            ]);

            PegawaiModel::create($data);
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

    public function getPegawai($id)
    {
        try {
            $pegawai = PegawaiModel::whereId($id)->first();
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

    public function updatePegawai($id, PegawaiRequestUpdate $request)
    {
        try {
            $data = $request->only([
                'nama', 'nip', 'jabatan', 'bagian', 'jk'
            ]);

            $findPegawai = PegawaiModel::whereId($id);
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

    public function deletePegawai($id)
    {
        try {
            $findPegawai = PegawaiModel::whereId($id);
            if ($findPegawai->first()) {
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
