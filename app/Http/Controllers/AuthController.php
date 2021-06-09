<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginAct(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if ($request->level=='admin' && Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } elseif ($request->level=='teacher' && Auth::guard('teacher')->attempt($credentials)) {
            return redirect('my-schedule');
        }

        return redirect('login')->with('message', 'Email Atau Password Salah');
    }

    public function logout()
    {
        Auth::logout();
        Auth::guard('teacher')->logout();
        return redirect('login');
    }
}
