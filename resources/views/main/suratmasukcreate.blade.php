@extends('layouts.app')

@section('content')

<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu">  
        <div class="container shadow"> 

            
            <form method="POST" action="{{ url('/suratmasuk/create') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="text-align-center py-4">
                <h2>Surat Masuk</h2> 
                </div>
                
                <div class="row mb-3">
                    <label for="tipe_surat" class="col-md-4 col-form-label text-md-end">Tipe Surat</label>

                    <div class="col-md-6">
                        <select id="tipe_surat" class="form-control" name="tipe_surat" required> 
                            <option selected disabled>-- Pilih --</option>
                            <option value="Disposisi">Disposisi</option>
                            <option value="Tembusan">Tembusan</option> 
                        </select>
                    </div>
                </div> 
                
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Perihal</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="perihal" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">No. Surat</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="no_surat" required>
                    </div>
                </div> 

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Pengirim</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="pengirim" required>
                    </div>
                </div> 

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Informasi Ringkas</label>

                    <div class="col-md-6">
                        <textarea id="name" class="form-control" name="informasi_ringkas" rows="3" required></textarea>
                    </div> 
                </div> 

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Dokumen</label>

                    <div class="col-md-6">
                        <input id="name" type="file" class="form-control" name="dokumen" required>
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