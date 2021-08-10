<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\TestScores;
use App\Models\Curiculum;

class TestScoreController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    
    public function index($id)
    {
        $data['curiculum']          = Curiculum::where('course_id', $id)
                                        ->where('teacher_id', $_GET['teacher_id'])
                                        ->first();
        return view('test-score.index', $data);
    }

    public function create()
    {
        $course_id          = $_GET['course_id'];
        $teacher_id         = $_GET['teacher_id'];
        $student_id         = $_GET['student_id'];
        $data['predicate']  = ['A'=>'A','B'=>'B','C'=>'C'];
        $data['semester']  = ['1'=>'Semester 1','2'=>'Semester 2'];
        $data['curiculum']          = Curiculum::where('course_id', $course_id)
                                        ->where('teacher_id', $_GET['teacher_id'])
                                        ->first();
        $data['students']   = $data['curiculum']->students->pluck('name', 'student_id');
        $data['student']    = Student::where('student_id', $student_id)->first();
        $data['score']      = TestScores::where('student_id', $data['student']->student_id)
                                ->where('course_id', $course_id)
                                ->where('teacher_id', $teacher_id)
                                ->first();
        return view('test-score.create', $data);
    }

    public function store(Request $request)
    {
        $ifExist = [
            'semester'      =>  $request->semester,
            'teacher_id'    =>  $request->teacher_id,
            'student_id'    =>  $request->student_id,
            'course_id'     =>  $request->course_id
        ];
        
        TestScores::updateOrCreate($ifExist, $request->all());
        return redirect('/score/create?course_id='.$request->course_id.'&student_id='.$request->student_id.'&semester='.$request->semester.'&teacher_id='.$request->teacher_id)->with('message', 'Nilai Sudah Disimpan');
    }
}
