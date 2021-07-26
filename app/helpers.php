<?php
function getMark($studentId, $scheduleId, $field)
{
    //return $studentId;
    $mark = \DB::table('marks')->where('student_id', $studentId)->where('schedule_id', $scheduleId)->first();
    if ($mark==null) {
        return 0;
    } else {
        return $mark->$field;
    }
}


function getAttendance($studentId, $scheduleId, $meetTo)
{
    $attedance = \DB::table('attedances')
                ->where('student_id', $studentId)
                ->where('schedule_id', $scheduleId)
                ->where('meet_to', $meetTo)
                ->first();
    return $attedance->status??'-';
}


function countAttedance($studentId, $status)
{
    return \DB::table('attedances')
    ->where('student_id', $studentId)
    ->where('status', $status)
    ->count();
}
