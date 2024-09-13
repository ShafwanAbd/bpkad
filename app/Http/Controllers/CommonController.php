<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function dashboard_index(){
        return view('main.dashboard');
    }
}
