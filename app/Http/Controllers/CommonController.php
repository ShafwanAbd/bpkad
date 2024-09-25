<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function dashboard_index(){
        return view('main.dashboard');
    }
    public function permohonan_index(){
        return view('main.permohonan');
    }
}
