<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;

class MarkController extends Controller
{
    public function store(Request $request)
    {
        // $type = $request->type;
        // if ($type==1) {
        //     $fieldMark = "first";
        // } elseif ($type==2) {
        //     $fieldMark="mid";
        // } else {
        //     $fieldMark = "final";
        // }

        $params = [
            'schedule_id'   =>  $request->schduleId,
            'student_id'    =>  $request->studentId,
            'first'         =>  $request->first,
            'mid'           =>  $request->mid,
            'final'         =>  $request->final,
        ];
        $where = [
            'schedule_id'   =>  $request->schduleId,
            'student_id'     =>  $request->studentId
        ];
        return Mark::updateOrCreate($where, $params);
    }
}
