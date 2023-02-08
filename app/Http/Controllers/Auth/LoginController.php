<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $remember = false;
        if ($request->remember) {
            $remember = true;
        }

        Auth::setDefaultDriver('petugas');

        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            // dd(Auth::user());
            return redirect()->intended('/admin');
        } else if (Auth::guard('siswa')->attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->intended('/siswa');
        }

        return back()->with('loginError', 'Login Gagal, email atau password tidak diketahui!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // dd(Auth::logout());

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
