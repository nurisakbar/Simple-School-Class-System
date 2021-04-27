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
        $data['students'] = $schedule->class->student;
        return view('schedule.mark-form', $data);
    }


    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect('/teacher/'.$schedule->teacher_id)->with('message', 'A Schedule Has Deleted');
    }
}
