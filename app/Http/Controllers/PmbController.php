<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
