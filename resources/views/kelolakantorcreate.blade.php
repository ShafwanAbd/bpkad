@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu permohonan_detail">
        <div class="container shadow">
            <div class="inner_container p-5">
                    
                <h3 class="text-align-center py-1">Kelola Kantor Create</h3>
                <!-- Add the form -->
                <form action="{{ url('/kelolakantor/create') }}" method="POST">
                    @csrf 
                    
                    <table class="detail-table w-100">
                        <tr> 
                            <td>Nama Kantor</td>
                            <td><input type="text" name="nama_kantor" class="form-control" placeholder="Badan Pengelola Keuangan dan Aset Daerah" required></td>  
                        </tr>
                        <tr> 
                            <td>Singkatan</td>
                            <td><input type="text" name="singkatan" class="form-control" placeholder="BPKAD" required></td>  
                        </tr>
                    </table>

                    <div class="py-4 d-flex justify-content-end">
                        <button type="submit" class="my-2 btn btn-primary">Submit</button>
                    </div>
                </form> 

            </div>
        </div>
    </div>

</div>
@endsection