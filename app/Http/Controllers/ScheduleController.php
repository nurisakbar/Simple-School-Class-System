<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function store(Request $request)
    {
        Schedule::create($request->all());
        return redirect()->route('teacher.show', ['teacher' => $request->teacher_id])->with('message', 'A Schedule Has Created');
    }

    public function markForm($id)
    {
        $schedule         = Schedule::findOrFail($id);
        $data['schedule'] = $schedule;
        $data['students'] = \DB::select("select s.id,st.name,st.student_id,m.first,m.mid,m.final
                                        from schedules as s 
                                        LEFT JOIN students as st on s.student_class_id=st.student_class_id
                                        LEFT JOIN marks as m on m.schedule_id=s.id 
                                        where s.id=$id");
        return view('schedule.mark-form', $data);
    }
}
