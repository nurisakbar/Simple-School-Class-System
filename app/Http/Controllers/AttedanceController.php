<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attedance;
use App\Models\Schedule;
use App\Models\Curiculum;

class AttedanceController extends Controller
{
    public $jumlahKehadiran = 10;

    public $attedanceStatus = ['HADIR'=>'HADIR','IZIN'=>'IZIN','SAKIT'=>'SAKIT','ALPA'=>'ALPA'];


    public function index($courseId)
    {
        $data['curiculum']          = Curiculum::where('course_id', $courseId)
                                    ->where('teacher_id', $_GET['teacher_id'])
                                    ->first();
                        
        $data['jumlahKehadiran']    = $this->jumlahKehadiran;
        return view('attedance.index', $data);
    }

    public function create()
    {
        $data['curiculum']          = Curiculum::where('course_id', $_GET['course_id'])
                                    ->where('teacher_id', $_GET['teacher_id'])
                                    ->first();
        $data['jumlahKehadiran']    = $this->jumlahKehadiran;
        $data['attedanceStatus']    = $this->attedanceStatus;
        return view('attedance.create', $data);
    }

    public function store(Request $request)
    {
        $where = [
            'course_id'     =>  $request->course_id,
            'student_id'    =>  $request->student_id,
            'date'          =>  $request->date,
            'meet_to'       =>  $request->meet_to,
            'teacher_id'    =>  $request->teacher_id
        ];
        return Attedance::updateOrCreate($where, $request->all());
    }


    public function edit($id)
    {
        $data['attedance']          = Attedance::where('meet_to', $_GET['pertemuan_ke'])->where('schedule_id', $_GET['id'])->first();
        if ($data['attedance'] ==null) {
            return redirect('attedance/'.$id)->with('message', 'Anda Belum Melakukan Input Pertemuan');
        }
        $scheduleId                 = $id;
        $data['schedule']           = Schedule::find($scheduleId);
        $data['jumlahKehadiran']    = $this->jumlahKehadiran;
        $data['attedanceStatus']    = $this->attedanceStatus;
        return view('attedance.edit', $data);
    }
}
