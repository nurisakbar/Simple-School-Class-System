<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Auth;

class TeacherAuthController extends Controller
{
    public function index()
    {
        return view('teacher.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('teacher')->attempt($credentials)) {
            return redirect('teacher-dashboard');
        }
        return redirect('teacher-login')->with('message', 'Credentials not matced in our records!');
    }
}
