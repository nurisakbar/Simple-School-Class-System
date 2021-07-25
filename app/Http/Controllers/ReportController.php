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
    public $extraCuriculer = ['Tahfidz','Pramuka','Futsal','Silat'];

    public function report()
    {
        $student                = Student::where('student_id', $_GET['student_id'])->first();
        $data['semester']       = ['1'=>'Semester 1','2'=>'Semester 2'];
        $data['teacher']        = Teacher::find(Auth::guard('teacher')->user()->id);
        $data['students']       = $data['teacher']->studentClass->student->pluck('name', 'student_id');
        $data['student']        = Student::where('student_id', $_GET['student_id'])->first();
        $data['examResult']     = ExamResult::where('student_id', $data['student']->id)->first();
        $data['testScores']     = TestScores::where('semester', $_GET['semester'])->where('student_id', $student->id)->get();
        if ($_GET['type']=='pdf') {
            // $pdf = \PDF::loadView('report.semester', $data);
            // return $pdf->stream();
            return view('report.semester', $data);
        } else {
            $data['extraCuriculer'] = $this->extraCuriculer;
            return view('teacher.create-report', $data);
        }
    }

    public function reportAct(Request $request)
    {
        $extraCuriculer = [];
        $extraCuriculerIndex = 0;
        foreach ($request->extra_curiculer_name as $extra) {
            $extraCuriculer[] = $request->extra_curiculer_value[$extraCuriculerIndex];
            $extraCuriculerIndex++;
        }

        $data                       = $request->all();
        $data['extra_curiculer']    = serialize($extraCuriculer);

        $ifExist = ['semester'=>$request->semester,'student_id'=>$request->student_id];
        ExamResult::updateOrCreate($ifExist, $data);
        return redirect('report?type=input&student_id='.$request->student.'&semester='.$request->semester)->with('message', 'Berhasil Menyimpan Data');
    }
}
