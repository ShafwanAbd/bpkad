@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu permohonan_detail">
        <div class="container shadow">
            <div class="inner_container p-5">
            <h3 class="text-align-center py-1">Tembusan Detail</h3>
                <table class="detail-table">
                    <tr>
                        <td>Nomor Surat</td>
                        <td>: {{ $datas1->no_surat }}</td>
                    </tr> 
                    <tr>
                        <td>Pengirim</td>
                        @if ($datas1->pengirim)
                            <td>: {{ $datas1->pengirim }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr>   
                    <tr>
                        <td>Perihal</td>
                        @if ($datas1->perihal)
                            <td>: {{ $datas1->perihal }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Informasi Ringkas</td>
                        @if ($datas1->informasi_ringkas)
                            <td>: {{ $datas1->informasi_ringkas }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Dibuat Pada</td>
                        <td>: {{ $datas1->created_at }}</td>
                    </tr> 
                </table>

                <!-- <div class="container_image mt-4">
                    <img src="{{ asset('./dokumen/'.$datas1->id.'.png') }}" class="img-fluid">
                    <a href="#" class="my-2 btn btn-primary">Detail</a>
                </div> -->

                <div class="py-4"> 

                    <a href="{{ asset('dokumen/suratmasuk/'.$datas1->dokumen) }}" class="my-2 btn btn-primary">Download Surat</a>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection