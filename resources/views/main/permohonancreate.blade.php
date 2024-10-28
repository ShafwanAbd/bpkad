@extends('layouts.app')

@section('content')

<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu">  
        <div class="container shadow"> 

            
            <form method="POST" action="{{ url('/permohonan/createlangsung') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="text-align-center py-4">
                    <h2>Pengajuan Permohonan</h2>
                </div>
                
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Perihal</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="perihal" autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">No. Surat</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="no_surat" required  autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="sifat" class="col-md-4 col-form-label text-md-end">Sifat</label>

                    <div class="col-md-6">
                        <select id="sifat" class="form-control" name="sifat" required> 
                            <option value="Biasa">Biasa</option>
                            <option value="Penting">Penting</option>
                            <option value="Rahasia">Rahasia</option>
                        </select>
                    </div>
                </div> 

                <div class="row mb-3">
                    <label for="penandatangan" class="col-md-4 col-form-label text-md-end">Penanda Tangan</label>

                    <div class="col-md-6">
                        <select id="penandatangan" class="form-control select2" name="penandatangan" required>
                            <option disabled selected></option>
                            @foreach($datas1 as $key => $val)
                                <option value="{{ $val->nama }}">{{ $val->nama }} ({{ $val->role }} {{ $val->jabatan }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#penandatangan').select2({
                            placeholder: "Pilih Penanda Tangan",
                            allowClear: true
                        });
                    });
                </script>

                <div class="row mb-3">
                    <label for="tembusan" class="col-md-4 col-form-label text-md-end">Tembusan</label>

                    <div class="col-md-6">
                        <select id="tembusan" class="form-control select2" name="tembusan[]" multiple="multiple">
                            @foreach($datas1 as $key => $val)
                                <option value="{{ $val->nama }}">{{ $val->nama }} ({{ $val->role }} {{ $val->jabatan }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#tembusan').select2({
                            placeholder: "Pilih Tembusan",
                            allowClear: true
                        });
                    });
                </script>

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