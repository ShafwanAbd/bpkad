@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu permohonan_detail">
        <div class="container shadow">
            <div class="inner_container p-5">
                <h3 class="text-align-center py-4">Surat Masuk Disposisi</h3>  
                    
                <form method="POST" action="{{ url('/suratmasuk/createdisposisi/' . $datas2->id) }}" enctype="multipart/form-data"> 
                    @csrf 
                    
                    <div class="row mb-3">
                        <label for="tujuan" class="col-md-4 col-form-label text-md-end">Tujuan</label>

                        <div class="col-md-6">
                            <select id="tujuan" class="form-control select2" name="tujuan[]" multiple="multiple">
                                @foreach($datas1 as $key => $val)
                                    <option value="{{ $val->nama }}">{{ $val->nama }} ({{ $val->role }} {{ $val->jabatan }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#tujuan').select2({
                                placeholder: "Pilih Tujuan",
                                allowClear: true
                            });
                        });
                    </script>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Catatan</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="catatan" required>
                        </div>
                    </div> 
                    
                    <div class="row mb-3">
                        <label for="perintah" class="col-md-4 col-form-label text-md-end">Perintah</label>
                        <div class="col-md-6">
                            <div>
                                <label><input type="checkbox" name="perintah[]" value="wakili"> Wakili / Hadir / Terima</label>
                                <label><input type="checkbox" name="perintah[]" value="mendampingi"> Mendampingi Saya</label>
                                <label><input type="checkbox" name="perintah[]" value="ditindaklanjuti"> Untuk Ditindaklanjuti</label>
                            </div>
                            <div>
                                <label><input type="checkbox" name="perintah[]" value="pelajari"> Pelajari / Tela'ah / Sarannya</label>
                                <label><input type="checkbox" name="perintah[]" value="dikaji"> Untuk dikaji sesuai dengan ketentuan</label>
                            </div>
                            <div>
                                <label><input type="checkbox" name="perintah[]" value="dibantu"> Untuk dibantu / dipertimbangkan / sesuai dengan ketentuan</label>
                            </div>
                            <div>
                                <label><input type="checkbox" name="perintah[]" value="selesaikan"> Selesaikan / proses sesuai ketentuan</label>
                            </div>
                            <div>
                                <label><input type="checkbox" name="perintah[]" value="monitor"> Monitor realisasinya / perkembangannya</label>
                                <label><input type="checkbox" name="perintah[]" value="pointers"> Siap Pointers / Sambutan / Bahan</label>
                            </div>
                            <div>
                                <label><input type="checkbox" name="perintah[]" value="menghadap"> Menghadap / Informasinya</label>
                                <label><input type="checkbox" name="perintah[]" value="membaca"> Membaca / File / Referensi</label>
                            </div>
                            <div>
                                <label><input type="checkbox" name="perintah[]" value="agendakan"> Agendakan / Jadwalkan / Koordinasikan</label>
                            </div>
                        </div>
                    </div> 

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Sifat</label>

                        <div class="col-md-6">
                            <select id="sifat" class="form-control" name="sifat" required> 
                                <option value="Biasa">Biasa</option>
                                <option value="Penting">Penting</option>
                                <option value="Rahasia">Rahasia</option>
                            </select>
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

</div>
@endsection