@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu permohonan_detail">
        <div class="container shadow">
            <div class="inner_container flex p-5">
                <div class="flex">
                    <div class="pr-5">
                        <p>Perihal</p>
                        <p>Pemohon</p>
                        <p>Penanda Tangan</p>
                        <p>Nomor Surat</p>
                        <p>Sifat</p>
                        <p>Nota Pengantar</p>
                        <p>Status</p>
                        <p>Dibuat Pada</p> 
                    </div>
                    <div> 
                        <p>: {{ $datas1->perihal }}</p>
                        <p>: {{ $datas1->pemohon }}</p>
                        <p>: {{ $datas1->penandatangan }}</p>
                        <p>: {{ $datas1->no_surat }}</p>
                        <p>: {{ $datas1->sifat }}</p>
                        <p>: {{ $datas1->nota_pengantar }}</p>
                        <p>: {{ $datas1->status }}</p>
                        <p>: {{ $datas1->created_at }}</p>
                    </div>
                </div>
                <div class="container_image"> 
                    <img src="{{ asset('./dokumen/'.$datas1->id.'.png') }}">
                    <a href="#" class="my-2 btn">Detail</a>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection