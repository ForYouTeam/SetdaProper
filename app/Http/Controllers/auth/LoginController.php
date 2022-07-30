<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return back();
        } else {
            return view('auth.Login');
        }
    }

    public function loginProcess(LoginRequest $request)
    {
        $credentials = $request->only([
            'username', 'password'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect(route('dashboard.index'));
        }

        return redirect()->back()->with('status', 'Username dan password tidak ditemukan');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
