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
        $data['page'] = "register";
        if (session('pmb_id')=='') {
            return view('pmb.register', $data);
        } else {
            $data['pmb'] = Pmb::find(session('pmb_id'));
            return view('pmb.register', $data);
        }
    }

    public function page($page)
    {
        return view('page/'.$page);
    }

    public function hasil()
    {
        return view('pmb.hasil');
    }

    public function registerAct(Request $request)
    {
        if ($request->has('type')) {
            $file       = $request->file('image');
            $fileName   = str_replace(' ', '', $file->getClientOriginalName()) ;
            $file->move('pmb', $fileName);
            $pmb        = Pmb::find(session('pmb_id'));
            $pmb->proof_of_payment = $fileName;
            $pmb->save();
            return redirect('pmb/register');
        } else {
            $pmb = Pmb::create($request->all());
            session(['pmb_id'=>$pmb->id]);
            session(['pmb_name'=> $request->name]);
            return redirect('pmb/register')->with('message', 'Selamat '.$request->name.', Pendaftaran Anda Berhasil');
        }
    }

    public function login()
    {
        return view('pmb.login');
    }

    public function loginAct(Request $request)
    {
        $pmb = Pmb::where('nik', $request->nik)->where('birth_date', $request->birth_date)->first();
        if ($pmb) {
            session(['pmb_id'=> $pmb->id]);
            session(['pmb_name'=> $pmb->name]);
            return redirect('pmb/register')->with('message', 'Selamat '.$pmb->name.', Anda Berhasil Login');
        } else {
            return redirect('pmb/login')->with('message', 'Akun Yang Anda Masukan Tidak Sesuai');
        }
    }

    public function show($id)
    {
        $data['pmb'] = Pmb::find($id);
        $data['page'] = "show";
        return view('pmb.show', $data);
    }

    public function update($id, Request $request)
    {
        $pmb = Pmb::find($id);
        $pmb->update($request->all());
        return redirect($request->page);
    }

    public function logout()
    {
        session(['pmb_id'=>null]);
        session(['pmb_name'=> null]);
        return redirect('pmb/register');
    }

    public function manage()
    {
        $data['pmbs'] = Pmb::all();
        return view('pmb.manage', $data);
    }
}
