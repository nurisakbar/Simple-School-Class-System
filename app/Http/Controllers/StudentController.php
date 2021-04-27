<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentCreate;
use App\Models\StudentClass;
use Auth;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['dashboard']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = Student::all();
        return view('student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['class']          = StudentClass::pluck('name', 'id');
        return view('student.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentCreate $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        Student::create($input);
        return redirect('student')->with('message', 'A Student has been created successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $data['student']  = $student;

        return view('student.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $data['class']    = StudentClass::pluck('name', 'id');
        $data['student']  = $student;

        return view('student.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student = $student;
        $input = $request->all();
        if ($request->password != null) {
            $input['password'] = Hash::make($request->password);
        } else {
            $input['password'] = $student->password;
        }

        $student->update($input);
        return redirect('student')->with('message', 'A Student With Name '.$student->name.' Has Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student = $student;
        $student->delete();
        return redirect('student')->with('message', 'Student With Name '.$student->name.' Has Deleted');
    }

    public function dashboard()
    {
        $student            = Auth::guard('student')->user();
        $data['student']    = $student;
        $data['schedules']  = Schedule::with('course', 'teacher')->leftJoin('marks', function ($leftJoin) use ($student) {
            $leftJoin->on('marks.schedule_id', '=', 'schedules.id')->where('schedules.student_class_id', $student->student_class_id)->where('marks.student_id', $student->id);
        })->get();
        return view('student.dashboard', $data);
    }
}
