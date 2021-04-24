<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Room;
use App\Models\Course;
use App\Models\StudentClass;
use App\Http\Requests\TeacherCreate;
use Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $teachingTime;

    public function __construct()
    {
        $this->teachingTime = ['08:00 - 10:00','10:00 - 12:00','13:00 - 15:00'];
    }
    
    public function index()
    {
        $data['teachers'] = Teacher::all();
        return view('teacher.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherCreate $request)
    {
        Teacher::create($request->all());
        return redirect('teacher');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        $data['teachingTime']   = $this->teachingTime;
        $data['rooms']          = Room::pluck('name', 'id');
        $data['courses']        = Course::pluck('name', 'id');
        $data['class']          = StudentClass::pluck('name', 'id');
        $data['teacher']        = $teacher;
        return view('teacher.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }


    public function dashboard()
    {
        return view('teacher.dashboard');
    }

    public function teacherSchedule()
    {
        $data['teachingTime']   = $this->teachingTime;
        $data['rooms']          = Room::pluck('name', 'id');
        $data['courses']        = Course::pluck('name', 'id');
        $data['class']          = StudentClass::pluck('name', 'id');
        $data['teacher']        = Teacher::find(Auth::guard('teacher')->user()->id);
        return view('teacher.show', $data);
    }
}
