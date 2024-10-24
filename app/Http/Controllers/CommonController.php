<?php

namespace App\Http\Controllers;

use App\Models\Permohonan; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; 

class CommonController extends Controller
{
    public function dashboard_index(){
        return view('main.dashboard');
    }

    public function permohonan_index(){
        $datas1 = Permohonan::all();

        return view('main.permohonan', compact(
            'datas1'
        ));
    }

    public function permohonan_create(){ 

        return view('main.permohonancreate');
    }

    public function permohonan_create_upload(Request $request){ 

        $model1 = new Investasi();
        $model1->perihal = $request->perihal;
        $model1->no_surat = $request->no_surat;
        $model1->sifat = $request->sifat;
        $model1->penandatangan = $request->penandatangan;
        $model1->tembusan = $request->tembusan;
        $model1->dokumen = $request->dokumen;
        $model1->save();

        User::where('id', Auth::user()->id)->update([
            'profit' => $datas1->profit
        ]);

        return redirect('/permohonan');
    }

    public function permohonan_verifikator(){ 

        return view('main.permohonanverifikator');
    }

    public function akun_index(){
        return view('akun');
    }
}
