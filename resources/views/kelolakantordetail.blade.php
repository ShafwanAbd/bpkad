@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu permohonan_detail">
        <div class="container shadow">
            <div class="inner_container p-5">
                    
                <h3 class="text-align-center py-1">Kelola Kantor Detail</h3>
                <!-- Add the form -->
                <form action="{{ url('/kelolakantor/data/' . $datas1->id) }}" method="POST">
                    @csrf 
                    
                    <table class="detail-table w-100">
                        <tr> 
                            <td>ID</td>                            
                            <td><input type="text" name="id" value="{{ $datas1->id }}" class="form-control" disabled></td> 

                        </tr>
                        <tr> 
                            <td>Nama Kantor</td>
                            <td><input type="text" name="nama_kantor" value="{{ $datas1->nama_kantor }}" class="form-control"></td> 
                        </tr>
                        <tr> 
                            <td>Singkatan</td>
                            <td><input type="text" name="singkatan" value="{{ $datas1->singkatan }}" class="form-control"></td> 
                        </tr>
                    </table>

                    <div class="py-4 d-flex justify-content-end">
                        <a href="{{ url('kelolakantor/delete/' . $datas1->id) }}" class="my-2">Hapus</a>
                        <button type="submit" class="my-2 mx-2 btn btn-primary">Simpan</button>
                    </div>
                </form>
                <!-- <div class="container_image mt-4">
                    <img src="{{ asset('./dokumen/'.$datas1->id.'.png') }}" class="img-fluid">
                    <a href="#" class="my-2 btn btn-primary">Detail</a>
                </div> --> 

            </div>
        </div>
    </div>

</div>
@endsection