<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pmb;

class PmbController extends Controller
{
    public function index()
    {
        return view('pmb.index');
    }

    public function register()
    {
        return view('pmb.register');
    }

    public function registerAct(Request $request)
    {
        $pmb = Pmb::create($request->all());
    }

    public function login()
    {
        return view('pmb.login');
    }

    public function loginAct(Request $request)
    {
        $pmb = Pmb::where('nik',$request->nik)->where('birth_date',$request->birth_date)->first();
        if($pmb)
        {
            session('login_status','oke');
            session('pmb_id',$pmb->id);
            session('pmb_name',$pmb->name);
            return redirect('pmb/profile');
        }else{
            return redirect('pmb/login')->with('message','Akun Yang Anda Masukan Tidak Sesuai');
        }
    }
}
