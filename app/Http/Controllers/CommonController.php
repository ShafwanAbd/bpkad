<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permohonan; 
use App\Models\Suratmasuk; 
use App\Models\Suratkeluar; 
use App\Models\Disposisi; 
use App\Models\Tembusan; 
use App\Models\Terusan; 
use App\Models\Kantor; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; 

class CommonController extends Controller
{
    public function dashboard_index(){ 
        $permohonan = Permohonan::all()->count();
        $tembusan = Tembusan::all()->count();
        $suratmasuk = Suratmasuk::all()->count(); 
        $disposisi = disposisi::all()->count(); 

        return view('main.dashboard', compact(
            'permohonan', 'tembusan', 'suratmasuk', 'disposisi'
        ));
    } 

    // SURAT MASUK
    public function suratmasuk_index(){
        $datas1 = Suratmasuk::all();

        return view('main.suratmasuk', compact(
            'datas1'
        ));
    }      

    public function suratmasuk_detail(String $id){
        $datas1 = Suratmasuk::find($id);
        $datas2 = Disposisi::whereIn('id_surat', [$id])->get();

        return view('main.suratmasukdetail', compact(
            'datas1', 'datas2'
        ));
    }      

    public function suratmasuk_create(){ 
        $datas1 = Kantor::all();

        return view('main.suratmasukcreate', compact(
            'datas1'
        ));
    }   

    public function tambahkantor(Request $request){
        return view('main.tambahkantor');
    }

    public function tambahkantor_upload(Request $request){
        $model1 = new Kantor();
    
        $model1->nama_kantor = $request->nama_kantor;
        $model1->singkatan = $request->singkatan;

        $model1->save();

        return redirect('/suratmasuk/create');
    }

    public function suratmasuk_create_terusan(String $id){ 
        $datas1 = User::whereNotIn('role', ['superadmin', 'admin'])->get();
        $datas2 = Suratmasuk::find($id);

        return view('main.suratmasukterusancreate', compact(
            'datas1', 'datas2'
        ));
    }   

    public function suratmasuk_create_upload(Request $request){    

        if ($request->file('dokumen')) {
            $file = $request->file('dokumen');
    
            // Periksa apakah file yang diunggah adalah PDF
            if ($file->getClientOriginalExtension() == 'pdf') {

                if ($request->tipe_surat == 'Disposisi'){
                    $model1 = new Suratmasuk();        
                    
                    $model1->perihal = $request->perihal;
                    $model1->no_surat = $request->no_surat;
                    $model1->informasi_ringkas = $request->informasi_ringkas;
                    $model1->pengirim = $request->pengirim;
                    $model1->status_disposisi = 0; 
    
                    // Ubah ekstensi nama file menjadi .pdf
                    $namaFile = "Dokumen" . $model1->id . ".pdf"; 
                    $model1->dokumen = $namaFile;
                    $file->move('dokumen/suratmasuk/', $namaFile);
    
                    $model1->save();    
                } else if ($request->tipe_surat == 'Tembusan'){
                    
                    $model1 = new Tembusan();        
                    
                    $model1->perihal = $request->perihal;
                    $model1->no_surat = $request->no_surat;
                    $model1->informasi_ringkas = $request->informasi_ringkas;
                    $model1->pengirim = $request->pengirim;
    
                    // Ubah ekstensi nama file menjadi .pdf
                    $namaFile = "Dokumen" . $model1->id . ".pdf"; 
                    $model1->dokumen = $namaFile;
                    $file->move('dokumen/suratmasuk/', $namaFile);
    
                    $model1->save();   
                    
                    return redirect('/tembusan');
                }
        
            } else {
                // Jika bukan PDF, Anda bisa mengembalikan pesan error
                return back()->withErrors(['dokumen' => 'File yang diunggah harus dalam format PDF']);
            }
        } 

        return redirect('/suratmasuk');
    }   
     
    // Tembusan

    public function tembusan_index(){ 
        // $datas1 = Disposisi::where('tujuan', 'like', '%' . $user_name . '%')->get();
        $datas1 = Tembusan::all();     

        return view('main.tembusan', compact(
            'datas1'
        ));
    }   

    public function tembusan_detail(String $id){
        $datas1 = Tembusan::find($id); 

        return view('main.tembusandetail', compact(
            'datas1'
        ));
    }      

    // DISPOSISI

    
    public function disposisi_index() {
        $user_name = Auth::user()->nama;
        if (Auth::user()->role == 'Superadmin' || Auth::user()->role == 'Admin'){
            $datas1 = Disposisi::all();
        } else {
            $datas1 = Disposisi::where('tujuan', 'like', '%' . $user_name . '%')->get();
        }
    
        return view('main.disposisi', compact('datas1'));
    }
      

    
    public function disposisi_detail(String $id){
        $datas1 = Disposisi::find($id);
        $datas2 = Suratmasuk::find($datas1->id_surat);

        return view('main.disposisidetail', compact(
            'datas1', 'datas2'
        ));
    }      

    public function suratmasuk_create_disposisi(String $id){ 
        $datas1 = User::whereNotIn('role', ['superadmin', 'admin'])->get();
        $datas2 = Suratmasuk::find($id);

        return view('main.suratmasukdisposisicreate', compact(
            'datas1', 'datas2'
        ));
    }   

    public function suratmasuk_create_disposisi_upload(Request $request, String $id){

        $model1 = new Disposisi();
 
        $model1->tujuan = implode(';', $request->tujuan);
        $model1->catatan = $request->catatan;
        $model1->perintah = implode(';' ,$request->perintah);
        $model1->sifat = $request->sifat;
        $model1->id_surat = $id;
        $model1->status = 0;
        $model1->pembuat = Auth::user()->nama; 

        $model1->save();

        $model2 = Suratmasuk::find($id);

        $model2->status_disposisi = 1;

        $model2->save();

        return redirect('/suratmasuk');
    }

    public function disposisilanjut_create_index(String $id){ 
        $datas1 = User::whereNotIn('role', ['superadmin', 'admin'])->get();
        $datas3 = Disposisi::find($id);
        $datas2 = Suratmasuk::find($datas3->id_surat);

        return view('main.disposisilanjutcreate', compact(
            'datas1', 'datas2', 'datas3'
        ));
    }   

    public function disposisilanjut_create_upload(Request $request, String $id){

        $model1 = new Disposisi();
 
        $model1->tujuan = implode(';', $request->tujuan);
        $model1->catatan = $request->catatan;
        $model1->perintah = implode(';' ,$request->perintah);
        $model1->sifat = $request->sifat;
        $model1->id_surat = $id;
        $model1->status = 0;
        $model1->pembuat = Auth::user()->nama; 

        $model1->save();

        $model2 = Suratmasuk::find($id);

        $model2->status_disposisi = 1;

        $model2->save();

        return redirect('/suratmasuk');
    }

    public function suratmasuk_disposisi_done(String $id){
        $model1 = Disposisi::find($id);
        $model1->status = 1;
        $model1->save();

        return redirect('/disposisi');
    }

    // SURAT KELUAR

    public function suratkeluar_index(){
        if (Auth::user()->role == 'Superadmin' || Auth::user()->role == 'Admin'){
            $datas1 = Suratkeluar::all();
        } else {
            $datas1 = Suratkeluar::where('pemohon', 'like', '%' . Auth::user()->nama . '%')->get();
        }

        return view('main.suratkeluar', compact(
            'datas1'
        ));
    }

    public function suratkeluar_detail(String $id){
        $datas1 = Suratkeluar::find($id); 

        return view('main.suratkeluardetail', compact(
            'datas1'
        ));
    }      

    public function suratkeluar_create(){ 
        $datas1 = User::whereNotIn('role', ['superadmin', 'admin'])->get();
        $datas2 = Kantor::all();

        return view('main.suratkeluarcreate', compact(
            'datas1', 'datas2'
        ));
    }   

    public function suratkeluar_create_upload(Request $request){    

        if ($request->file('dokumen')) {
            $file = $request->file('dokumen');
    
            // Periksa apakah file yang diunggah adalah PDF
            if ($file->getClientOriginalExtension() == 'pdf') { 

                $model1 = new Suratkeluar();        
                
                $model1->perihal = $request->perihal;
                $model1->pemohon = Auth::user()->nama;
                $model1->penandatangan = $request->penandatangan;
                $model1->no_surat = $request->no_surat; 
                $model1->tembusan = implode(';', $request->tembusan);
                $model1->penerimasurat = implode(';', $request->penerimasurat);
                $model1->isi = $request->isi; 
                $model1->sifat = $request->sifat; 

                // Ubah ekstensi nama file menjadi .pdf ,
                $namaFile = "Dokumen" . $model1->id . ".pdf"; 
                $model1->dokumen = $namaFile;
                $file->move('dokumen/suratkeluar/', $namaFile);

                $model1->save();  
        
            } else {
                // Jika bukan PDF, Anda bisa mengembalikan pesan error
                return back()->withErrors(['dokumen' => 'File yang diunggah harus dalam format PDF']);
            }
        } 

        return redirect('/suratkeluar');
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

        if ($request->file('dokumen')) {
            $file = $request->file('dokumen');
    
            // Periksa apakah file yang diunggah adalah PDF
            if ($file->getClientOriginalExtension() == 'pdf') {

                $model1 = new Permohonan();
                $model1->perihal = $request->perihal;
                $model1->no_surat = $request->no_surat;
                $model1->sifat = $request->sifat;
                $model1->pemohon = Auth::user()->nama;
                $model1->penandatangan = $request->penandatangan; 
                $model1->status = 0;  

                // Ubah ekstensi nama file menjadi .pdf
                $namaFile = "permohonan_langsung_" . $model1->id . ".pdf"; 
                $model1->dokumen = $namaFile;
                $file->move('dokumen/permohonan/', $namaFile);

                $model1->save();     
            } else {
                // Jika bukan PDF, Anda bisa mengembalikan pesan error
                return back()->withErrors(['dokumen' => 'File yang diunggah harus dalam format PDF']);
            }
        } 

        return redirect('/permohonan');
    }

    public function permohonan_verifikator(){ 
        $datas1 = User::whereNotIn('role', ['superadmin', 'admin'])->get();

        return view('main.permohonanverifikator', compact(
            'datas1'
        ));
    }

    public function permohonan_create_verifikator_upload(Request $request){  

        if ($request->file('dokumen')) {
            $file = $request->file('dokumen');
    
            // Periksa apakah file yang diunggah adalah PDF
            if ($file->getClientOriginalExtension() == 'pdf') {

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
                $model1->status = 0;  

                // Ubah ekstensi nama file menjadi .pdf
                $namaFile = "permohonan_verifikator_" . $model1->id . ".pdf";
                $model1->dokumen = $namaFile;
                $file->move('dokumen/permohonan/', $namaFile);
                
                $model1->save();     
            } else {
                // Jika bukan PDF, Anda bisa mengembalikan pesan error
                return back()->withErrors(['dokumen' => 'File yang diunggah harus dalam format PDF']);
            }
        } 

        return redirect('/permohonan');
    }

    public function permohonan_tandatangan(String $id){ 

        $model1 = Permohonan::find($id);

        $model1->status = -1;
        $model1->save();

        return redirect('/permohonan');
    } 

    public function permohonan_koreksi(Request $request, String $id){ 

        $model1 = Permohonan::find($id);

        $model1->status_koreksi = 1;
        $model1->pengkoreksi = Auth::user()->nama;
        $model1->pesan_koreksi = $request->pesan_koreksi;
        $model1->save();

        return redirect('/permohonan');
    } 

    public function permohonan_revisi(Request $request, String $id){ 
        $datas1 = User::whereNotIn('role', ['superadmin', 'admin'])->get();
        $datas2 = Permohonan::find($id);

        return view('main.permohonanrevisicreate', compact(
            'datas1', 'datas2'
        ));
    } 

    public function permohonan_revisi_upload(Request $request, String $id){ 

        if ($request->file('dokumen')) {
            $file = $request->file('dokumen');
    
            // Periksa apakah file yang diunggah adalah PDF
            if ($file->getClientOriginalExtension() == 'pdf') {

                $model1 = Permohonan::find($id);

                $model1->status_koreksi = 0;  

                $model1->perihal = $request->perihal;
                $model1->no_surat = $request->no_surat;
                $model1->sifat = $request->sifat; 
                $model1->penandatangan = $request->penandatangan; 

                // Ubah ekstensi nama file menjadi .pdf
                $namaFile = "permohonan_langsung_" . $model1->id . ".pdf"; 
                $model1->dokumen = $namaFile;
                $file->move('dokumen/permohonan/', $namaFile);

                $model1->save();   
                
                return redirect('/permohonan');
            } else {
                // Jika bukan PDF, Anda bisa mengembalikan pesan error
                return back()->withErrors(['dokumen' => 'File yang diunggah harus dalam format PDF']);
            }
        }
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

    // Akun

    public function akun_index(){
        return view('akun');
    }

    public function kelolaakun_index(){
        $datas1 = User::all();

        return view('kelolaakun', compact(
            'datas1'
        ));
    }

    public function kelolaakun_create(){

        return view('kelolaakuncreate');
    }

    public function kelolaakun_create_upload(Request $request){ 

        $model1 = new User();

        $model1->role = $request->role;
        $model1->nama = $request->nama;
        $model1->nip = $request->nip;
        $model1->jabatan = $request->jabatan;
        $model1->nomor_hp = $request->nomor_hp;
        $model1->status = $request->status;
        $model1->email = $request->email;
        $model1->password = bcrypt($request->password); 

        $model1->save();

        return redirect('/kelolaakun');
    }

    public function kelolaakun_detail(String $id){
        $datas1 = User::find($id);

        return view('kelolaakundetail', compact(
            'datas1'
        ));
    }

    public function kelolaakun_detail_upload(String $id, Request $request){ 

        $model1 = User::find($id);

        $model1->role = $request->role;
        $model1->nama = $request->nama;
        $model1->nip = $request->nip;
        $model1->jabatan = $request->jabatan;
        $model1->nomor_hp = $request->nomor_hp;
        $model1->status = $request->status;
        $model1->email = $request->email;
        
        // Only update the password if it was provided
        if ($request->filled('password')) {
            $model1->password = bcrypt($request->password);
        }

        $model1->save();

        return redirect('/kelolaakun');
    }

    public function kelolaakun_delete(String $id){ 

        $model1 = User::find($id);

        $model1->delete();

        return redirect('/kelolaakun');
    }

    // KELOLA KANTOR 

    public function kelolakantor_index(){
        $datas1 = Kantor::all();

        return view('kelolakantor', compact(
            'datas1'
        ));
    }

    public function kelolakantor_create(){

        return view('kelolakantorcreate');
    }

    public function kelolakantor_create_upload(Request $request){ 

        $model1 = new Kantor();

        $model1->nama_kantor = $request->nama_kantor;
        $model1->singkatan = $request->singkatan;

        $model1->save();

        return redirect('/kelolakantor');
    }

    public function kelolakantor_detail(String $id){
        $datas1 = Kantor::find($id);

        return view('kelolakantordetail', compact(
            'datas1'
        ));
    }

    public function kelolakantor_detail_upload(String $id, Request $request){ 

        $model1 = Kantor::find($id);

        $model1->nama_kantor = $request->nama_kantor;
        $model1->singkatan = $request->singkatan;

        $model1->save();

        return redirect('/kelolakantor');
    }

    public function kelolakantor_delete(String $id){ 

        $model1 = Kantor::find($id);

        $model1->delete();

        return redirect('/kelolakantor');
    }
}
