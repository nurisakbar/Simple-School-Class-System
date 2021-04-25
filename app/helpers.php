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
