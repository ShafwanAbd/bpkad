@extends('layouts.app')

@section('content')

<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu">  
        <div class="container shadow"> 

            
            <form method="POST" action="{{ url('/tambahkantor') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="text-align-center py-4">
                <h2>Tambah Kantor</h2> 
                </div>
                
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Nama Kantor</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="nama_kantor" required>
                    </div>
                </div> 

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Singkatan</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="singkatan" required>
                    </div>
                </div> 

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>

            </form>
        </div> 
    </div>

</div>

@endsection