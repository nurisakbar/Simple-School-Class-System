<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\TestScores;

class TestScoreController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    
    public function index($id)
    {
        $schedule         = Schedule::findOrFail($id);
        $data['schedule'] = $schedule;
        $data['students'] = Schedule::select('students.name', 'students.student_id', 'test_scores.knowledge_value', 'test_scores.skill_value', 'test_scores.semester')->leftJoin('students', 'students.student_class_id', 'schedules.student_class_id')
        ->leftJoin('test_scores', function ($join) {
            $join->on('schedules.id', '=', 'test_scores.schedule_id')->on('students.id', 'test_scores.student_id')->where('test_scores.semester', 1);
        })->where('schedules.id', $id)->get();
        return view('test-score.index', $data);
    }

    public function create()
    {
        $id                 = $_GET['schedule_id'];
        $student_id         = $_GET['student_id'];
        $data['predicate']  = ['A'=>'A','B'=>'B','C'=>'C'];
        $data['semester']  = ['1'=>'Semester 1','2'=>'Semester 2'];
        $schedule           = Schedule::findOrFail($id);
        $data['schedule']   = $schedule;
        $data['students']   = $schedule->class->student->pluck('name', 'student_id');
        $data['student']    = Student::where('student_id', $student_id)->first();
        $data['score']      = TestScores::where('student_id', $data['student']->id)->where('schedule_id', $id)->first();
        return view('test-score.create', $data);
    }

    public function store(Request $request)
    {
        $ifExist = ['semester'=>$request->semester,'schedule_id'=>$request->schedule_id,'student_id'=>$request->student_id];
        TestScores::updateOrCreate($ifExist, $request->all());
        return redirect('/score/create?schedule_id='.$request->schedule_id.'&student_id='.$request->student)->with('message', 'Nilai Sudah Disimpan');
    }
}
