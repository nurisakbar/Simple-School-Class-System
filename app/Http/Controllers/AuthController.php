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
        //


        $credentials = $request->only('email', 'password');
        if ($request->level=='admin' && Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } elseif ($request->level=='teacher' && Auth::guard('teacher')->attempt($credentials)) {
            return redirect('my-schedule');
        } elseif ($request->level=='student' && Auth::guard('student')->attempt(['student_id_second'=>$request->email,'password'=>$request->password])) {
            return redirect('student-dashboard');
        }

        return redirect('login')->with('message', 'Email Atau Password Salah');
    }

    public function logout()
    {
        Auth::logout();
        Auth::guard('teacher')->logout();
        Auth::guard('student')->logout();
        return redirect('login');
    }
}
