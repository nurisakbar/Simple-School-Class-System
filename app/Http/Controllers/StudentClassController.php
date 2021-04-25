<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function index()
    {
        $data['classes'] = StudentClass::all();
        return view('student-class.index', $data);
    }

    public function show($id)
    {
        $data['class'] = StudentClass::find($id);
        return view('student-class.show', $data);
    }
}
