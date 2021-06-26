<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Schedule;
use App\Models\TestScores;
use Auth;
use App\Models\ExamResult;

class ReportController extends Controller
{
    public function report()
    {
        $student                = Student::where('student_id', $_GET['student_id'])->first();
        $data['semester']       = ['1'=>'Semester 1','2'=>'Semester 2'];
        $data['teacher']        = Teacher::find(Auth::guard('teacher')->user()->id);
        $data['students']       = $data['teacher']->studentClass->student->pluck('name', 'student_id');
        $data['student']        = Student::where('student_id', $_GET['student_id'])->first();
        $data['examResult']     = ExamResult::where('student_id', $data['student']->id)->first();
        $data['testScores']     = TestScores::where('semester', $_GET['semester'])->where('student_id', $student->id)->get();

        // $x = Schedule::leftJoin('test_scores', function ($join) {
        //     $join->on('schedules.id', '=', 'test_scores.schedule_id')->where('test_scores.semester', 1);
        // })->where('student_class_id', $data['student']->student_class_id)->first();
        if ($_GET['type']=='pdf') {
            $pdf = \PDF::loadView('report.semester', $data);
            return $pdf->stream();
        //return view('report.semester', $data);
        } else {
            return view('teacher.create-report', $data);
        }
    }

    public function reportAct(Request $request)
    {
        $ifExist = ['semester'=>$request->semester,'student_id'=>$request->student_id];
        ExamResult::updateOrCreate($ifExist, $request->all());
        return redirect('report?type=input&student_id='.$request->student.'&semester='.$request->semester)->with('message', 'Berhasil Menyimpan Data');
    }
    
    public function reportPdf()
    {
        $data[]="";
        $pdf = \PDF::loadView('report.semester', $data);
        return $pdf->stream();
        // return $pdf->download('invoice.pdf');
        //return view('report.semester');
    }
}
