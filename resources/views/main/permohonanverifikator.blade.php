@extends('layouts.app')

@section('content')

<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu permohonan_main_verifikator">  
        <div class="container shadow"> 
            
            <form method="POST" action="{{ url('/permohonan/createverifikator') }}" enctype="multipart/form-data">
                @csrf
                <div class="text-align-center py-4">
                    <h2>Pengajuan Permohonan</h2>
                </div>
                
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Perihal</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="perihal" required autofocus>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">No. Surat</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="no_surat" required>
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
                    <label for="name" class="col-md-4 col-form-label text-md-end">Nota Pengantar</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="nota_pengantar">
                    </div>
                </div> 

                <div class="row mb-3">
                    <label for="verifikator1" class="col-md-4 col-form-label text-md-end">Verifikator 1</label>

                    <div class="col-md-6">
                        <select id="verifikator1" class="form-control select2" name="verifikator1" required>
                            <option disabled selected></option>
                            @foreach($datas1 as $key => $val)
                                <option value="{{ $val->nama }}">{{ $val->nama }} ({{ $val->role }} {{ $val->jabatan }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#verifikator1').select2({
                            placeholder: "Pilih Verifikator Pertama",
                            allowClear: true
                        });
                    });
                </script> 

                <div class="row mb-3">
                    <label for="verifikator2" class="col-md-4 col-form-label text-md-end">Verifikator 2</label>

                    <div class="col-md-6">
                        <select id="verifikator2" class="form-control select2" name="verifikator2">
                            <option disabled selected></option>
                            @foreach($datas1 as $key => $val)
                                <option value="{{ $val->nama }}">{{ $val->nama }} ({{ $val->role }} {{ $val->jabatan }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#verifikator2').select2({
                            placeholder: "Pilih Verifikator Kedua",
                            allowClear: true
                        });
                    });
                </script>

                <div class="row mb-3">
                    <label for="verifikator3" class="col-md-4 col-form-label text-md-end">Verifikator 3</label>

                    <div class="col-md-6">
                        <select id="verifikator3" class="form-control select2" name="verifikator3">
                            <option disabled selected></option>
                            @foreach($datas1 as $key => $val)
                                <option value="{{ $val->nama }}">{{ $val->nama }} ({{ $val->role }} {{ $val->jabatan }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#verifikator3').select2({
                            placeholder: "Pilih Verifikator Ketiga",
                            allowClear: true
                        });
                    });
                </script>

                <div class="row mb-3">
                    <label for="verifikator4" class="col-md-4 col-form-label text-md-end">Verifikator 4</label>

                    <div class="col-md-6">
                        <select id="verifikator4" class="form-control select2" name="verifikator4">
                            <option disabled selected></option>
                            @foreach($datas1 as $key => $val)
                                <option value="{{ $val->nama }}">{{ $val->nama }} ({{ $val->role }} {{ $val->jabatan }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#verifikator4').select2({
                            placeholder: "Pilih Verifikator Keempat",
                            allowClear: true
                        });
                    });
                </script> 

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