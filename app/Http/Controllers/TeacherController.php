<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Room;
use App\Models\Course;
use App\Models\StudentClass;
use App\Http\Requests\TeacherCreate;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AcademicYear;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $teachingTime;

    public $day;

    public function __construct()
    {
        $this->middleware('auth', ['except'=>['teacherSchedule','homeRoomTeacher','update']]);
        $this->teachingTime = ['08:00 - 10:00','10:00 - 12:00','13:00 - 15:00'];
        //$this->day = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        $this->day = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
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
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        Teacher::create($input);
        return redirect('teacher')->with('A Teacher has been created successfull!');
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
        $data['days']           = $this->day;
        $data['rooms']          = Room::pluck('name', 'id');
        $data['courses']        = Course::pluck('name', 'id');
        $data['class']          = StudentClass::pluck('name', 'id');
        $data['teacher']        = $teacher;
        $data['academicYear']  =AcademicYear::where('active', 'y')->first();
        return view('teacher.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $data['teacher'] = $teacher;
        return view('teacher.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $teacher = $teacher;

        $input = $request->all();
        if ($request->password != null) {
            $input['password'] = Hash::make($request->password);
        } else {
            $input['password'] = $teacher->password;
        }
        if ($request->has('photo')) {
            $file       = $request->file('photo');
            $nama_file  = str_replace(' ', '_', $file->getClientOriginalName());
            $file->move('teacher_photo', $nama_file);
            $input['photo'] = $nama_file;
        }

        $teacher->update($input);
        if ($request->has('redirect')=='my-schedule') {
            return redirect('my-schedule')->with('message', 'Upload Foto Berhasil');
        }
        return redirect('teacher')->with('message', 'A Teacher With Name '.$teacher->name.' Has Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher = $teacher;
        $teacher->delete();
        return redirect('teacher')->with('message', 'teacher With Name '.$teacher->name.' Has Deleted');
    }


    public function dashboard()
    {
        return view('teacher.dashboard');
    }

    public function teacherSchedule(Request $request)
    {
        $data['days']           = $this->day;
        $data['teachingTime']   = $this->teachingTime;
        $data['rooms']          = Room::pluck('name', 'id');
        
        $data['courses']        = Course::pluck('name', 'id');
        $data['class']          = StudentClass::pluck('name', 'id');
        $data['teacher']        = Teacher::find(Auth::guard('teacher')->user()->id);
        $data['academicYear']   = AcademicYear::where('active', 'y')->first();
        $data['curiculums']     = $data['teacher']->curiculum;
        return view('teacher.show', $data);
    }

    public function detail($id)
    {
        $data['teacher'] = Teacher::find($id);

        return view('teacher.detail', $data);
    }

    public function homeRoomTeacher()
    {
        $data['teacher']        = Teacher::find(Auth::guard('teacher')->user()->id);
        $data['students']       = $data['teacher']->studentClass->student;
        return view('teacher.home-room-teacher', $data);
    }
}
