@extends('layouts.app')

@section('content')

<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu">  
        <div class="container shadow"> 
            
            <form method="POST" action="{{ url('/permohonan/createlangsung') }}">
                @csrf
                
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Perihal</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="perihal" required autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">No. Surat</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="no_surat" required  autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Sifat</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="sifat" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Nota Pengantar</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="nota_pengantar" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Verifikator 1</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="verifikator1" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Verifikator 2</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="verifikator2" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Verifikator 3</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="verifikator3" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Verifikator 4</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="verifikator4" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Penanda Tangan</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="penandatangan" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Tembusan</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="tembusan" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Dokumen</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="dokumen" required>
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