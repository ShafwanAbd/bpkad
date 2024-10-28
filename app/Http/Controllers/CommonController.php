<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permohonan; 
use App\Models\Suratmasuk; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; 

class CommonController extends Controller
{
    public function dashboard_index(){
        return view('main.dashboard');
    } 

    // SURAT MASUK
    public function suratmasuk_index(){
        $datas1 = Suratmasuk::all();

        return view('main.suratmasuk', compact(
            'datas1'
        ));
    }   

    // PERMOHONAN

    public function permohonan_index(){
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Superadmin'){ 
            $datas1 = Permohonan::all();
        } else {
            $datas1 = Permohonan::where('penandatangan', Auth::user()->nama)
            ->orWhere('pemohon', Auth::user()->nama)
            ->orWhere('verifikator1', Auth::user()->nama)
            ->orWhere('verifikator2', Auth::user()->nama)
            ->orWhere('verifikator3', Auth::user()->nama)
            ->orWhere('verifikator4', Auth::user()->nama)
            ->get();        
        }

        return view('main.permohonan', compact(
            'datas1'
        ));
    }   

    public function permohonan_detail(String $id){
        $datas1 = Permohonan::find($id);

        return view('main.permohonandetail', compact(
            'datas1'
        ));
    }

    public function permohonan_create() { 
        $datas1 = User::whereNotIn('role', ['superadmin', 'admin'])->get();
    
        return view('main.permohonancreate', compact(
            'datas1'
        ));
    }

    public function permohonan_create_upload(Request $request){  

        $model1 = new Permohonan();
        $model1->perihal = $request->perihal;
        $model1->no_surat = $request->no_surat;
        $model1->sifat = $request->sifat;
        $model1->pemohon = Auth::user()->nama;
        $model1->penandatangan = $request->penandatangan;
        if ($request->tembusan){ 
            $model1->tembusan = implode(', ', $request->tembusan); 
        }
        $model1->status = 0; 
        $model1->save();    

        if ($request->file('dokumen')) {
            $file = $request->file('dokumen');
    
            // Periksa apakah file yang diunggah adalah PDF
            if ($file->getClientOriginalExtension() == 'pdf') {
                // Ubah ekstensi nama file menjadi .pdf
                $namaFile = "Dokumen" . $model1->id . ".pdf";
    
                $model1->dokumen = $namaFile;
                $file->move('dokumen/', $namaFile);
            } else {
                // Jika bukan PDF, Anda bisa mengembalikan pesan error
                return back()->withErrors(['dokumen' => 'File yang diunggah harus dalam format PDF']);
            }
        }
        $model1->save();    

        return redirect('/permohonan');
    }

    public function permohonan_verifikator(){ 
        $datas1 = User::whereNotIn('role', ['superadmin', 'admin'])->get();

        return view('main.permohonanverifikator', compact(
            'datas1'
        ));
    }

    public function permohonan_create_verifikator_upload(Request $request){  

        $model1 = new Permohonan();
        $model1->perihal = $request->perihal;
        $model1->no_surat = $request->no_surat;
        $model1->sifat = $request->sifat;
        $model1->pemohon = Auth::user()->nama;
        $model1->penandatangan = $request->penandatangan;
        $model1->nota_pengantar = $request->nota_pengantar;
        $model1->verifikator1 = $request->verifikator1;
        $model1->verifikator1 = $request->verifikator1;
        $model1->verifikator2 = $request->verifikator2;
        $model1->verifikator3 = $request->verifikator3;
        $model1->verifikator4 = $request->verifikator4;
        if ($request->tembusan){ 
            $model1->tembusan = implode(', ', $request->tembusan); 
        }
        $model1->status = 0; 
        $model1->save();    

        if ($request->file('dokumen')) {
            $file = $request->file('dokumen');
            $namaFile = $model1->id . ".png";

            $model1->dokumen = $namaFile;
            $file->move('dokumen/', $namaFile);
        }
        $model1->save();    

        return redirect('/permohonan');
    }

    public function permohonan_tandatangan(String $id){ 

        $model1 = Permohonan::find($id);

        $model1->status = -1;
        $model1->save();

        return redirect('/permohonan');
    } 

    public function permohonan_verifikasi1(String $id){ 

        $model1 = Permohonan::find($id);

        $model1->status = 1;
        $model1->save();

        return redirect('/permohonan');
    } 

    public function permohonan_verifikasi2(String $id){ 

        $model1 = Permohonan::find($id);

        $model1->status = 2;
        $model1->save();

        return redirect('/permohonan');
    } 

    public function permohonan_verifikasi3(String $id){ 

        $model1 = Permohonan::find($id);

        $model1->status = 3;
        $model1->save();

        return redirect('/permohonan');
    }  

    public function permohonan_verifikasi4(String $id){ 

        $model1 = Permohonan::find($id);

        $model1->status = 4;
        $model1->save();

        return redirect('/permohonan');
    }  

    public function akun_index(){
        return view('akun');
    }
}
