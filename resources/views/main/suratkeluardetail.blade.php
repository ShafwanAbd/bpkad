@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu permohonan_detail">
        <div class="container shadow">
            <div class="inner_container p-5">
            <h3 class="text-align-center py-1">Surat Keluar Detail</h3>
                <table class="detail-table">
                    <tr>
                        <td>Nomor Surat</td>
                        <td>: {{ $datas1->no_surat }}</td>
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
                        <td>Isi Surat</td>
                        @if ($datas1->isi)
                            <td>: {{ $datas1->isi }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Sifat</td>
                        <td>: {{ $datas1->sifat }}</td>
                    </tr>
                    <tr>
                        <td>Tembusan</td>
                        @if ($datas1->tembusan)
                            <td>: {{ $datas1->tembusan }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr>   
                    <tr>
                        <td>Penerima Surat</td>
                        @if ($datas1->penerimasurat)
                            <td>: {{ $datas1->penerimasurat }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr>   
                    <tr>
                        <td>Penandatangan</td>
                        @if ($datas1->penandatangan)
                            <td>: {{ $datas1->penandatangan }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr>   
                    <tr>
                        <td>Pemohon</td> 
                        <td>: {{ $datas1->pemohon }}</td> 
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
                    @if (Auth::user()->role == 'Kepala Badan')
 
                        <a href="{{ url('/suratmasuk/createdisposisi/' . $datas1->id) }}" class="btn btn-primary my-2">Disposisi</a>
    
                    @endif

                    <a href="{{ asset('dokumen/suratmasuk/'.$datas1->dokumen) }}" class="my-2 btn btn-primary">Download Surat</a>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection