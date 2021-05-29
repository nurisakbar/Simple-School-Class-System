<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attedance;
use App\Models\Schedule;

class AttedanceController extends Controller
{
    public $jumlahKehadiran = 10;

    public $attedanceStatus = ['HADIR'=>'HADIR','IZIN'=>'IZIN','SAKIT'=>'SAKIT'];


    public function index($scheduleId)
    {
        $data['schedule'] = Schedule::find($scheduleId);
        $data['jumlahKehadiran'] = $this->jumlahKehadiran;
        return view('attedance.index', $data);
    }

    public function create()
    {
        $scheduleId                 = $_GET['id'];
        $data['schedule']           = Schedule::find($scheduleId);
        $data['jumlahKehadiran']    = $this->jumlahKehadiran;
        $data['attedanceStatus']    = $this->attedanceStatus;
        return view('attedance.create', $data);
    }

    public function store(Request $request)
    {
        return Attedance::create($request->all());
    }
}
