<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerUser(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        );
        try {
            $user = User::create($data);
            $user->assignRole('user');
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

    public function deleteUser($id)
    {
        try {
            User::whereId($id)->delete();
            $response = array(
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Terhapus',
                    'message' => 'Data berhasil dihapus',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $response = array(
                'response' => array(
                    'icon' => 'warning',
                    'title' => 'Not Found',
                    'message' => 'Data tidak ditemukan',
                ),
                'code' => 404
            );
        }

        return response()->json($response, $response['code']);
    }
}
