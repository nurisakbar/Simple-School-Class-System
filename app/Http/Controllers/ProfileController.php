<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $data['user'] = Auth::user();
            $data['role'] = 'user';
        } elseif (Auth::guard('teacher')->check()) {
            $data['user'] = Auth::guard('teacher')->user();
            $data['role'] = 'teacher';
        } else {
            $data['user'] = Auth::guard('student')->user();
            $data['role'] = 'student';
        }
        return view('profile', $data);
    }

    public function update(Request $request)
    {
        if ($request->role=='user') {
            $user = User::find($request->id);
            if ($request->password=='') {
                $user->update($request->except('password'));
            } else {
                $input['password'] = Hash::make($request->password);
                $user->update($input);
            }
        } elseif ($request->role=='teacher') {
            $teacher = Teacher::find($request->id);
            if ($request->password=='') {
                $teacher->update($request->except('password'));
            } else {
                $input['password'] = Hash::make($request->password);
                $teacher->update($input);
            }
        } else {
            $student = Student::find($request->id);
            if ($request->password=='') {
                $student->update($request->except('password'));
            } else {
                $input['password'] = Hash::make($request->password);
                $student->update($input);
            }
        }
        return redirect('profile')->with('message', 'Profile Updated');
    }
}
