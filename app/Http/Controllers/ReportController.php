<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report()
    {
        $data[]="";
        $pdf = \PDF::loadView('report.semester', $data);
        return $pdf->stream();
        // return $pdf->download('invoice.pdf');
        //return view('report.semester');
    }
}
