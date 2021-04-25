<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Auth;

class StudentAuthController extends Controller
{
    public function index()
    {
        return view('student.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('student')->attempt($credentials)) {
            return redirect('student-dashboard');
        }
        return redirect('student-login')->with('message', 'Credentials not matced in our records!');
    }
}
