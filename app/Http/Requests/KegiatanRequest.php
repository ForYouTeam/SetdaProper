<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class KegiatanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_kegiatan' => 'required|min:2|max:255',
            'tgl_mulai' => 'required|min:2|max:255|date',
            'tgl_berakhir' => 'required|min:2|max:255|date',
            'pakaian' => 'required|min:2|max:255',
            'penjabat_menghadiri' => 'required|min:2|max:255',
            'protokol' => 'required|integer',
            'kopim' => 'required|integer',
            'dokpim' => 'required|integer',
            'keterangan' => 'required|min:2',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'response' => array(
                'icon' => 'error',
                'title' => 'Validasi Gagal',
                'message' => 'Data yang di input tidak tervalidasi',
            ),
            'errors' => array(
                'length' => count($validator->errors()),
                'data' => $validator->errors()
            ),
        ], 422));
    }
}
