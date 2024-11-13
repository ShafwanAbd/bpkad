@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu permohonan_detail">
        <div class="container shadow">
            <div class="inner_container p-5">
            <h3 class="text-align-center py-1">Surat Detail</h3>
                <table class="detail-table">
                    <tr>
                        <td>Nomor Surat</td>
                        <td>: {{ $datas2->no_surat }}</td>
                    </tr> 
                    <tr>
                        <td>Pengirim</td>
                        @if ($datas2->pengirim)
                            <td>: {{ $datas2->pengirim }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr> 
                    <tr>
                        <td>Perihal</td>
                        @if ($datas2->perihal)
                            <td>: {{ $datas2->perihal }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Informasi Ringkas</td>
                        @if ($datas2->informasi_ringkas)
                            <td>: {{ $datas2->informasi_ringkas }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Dibuat Pada</td> 
                        <td>: {{ $datas2->created_at }}</td> 
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Disposisi Detail</td>
                    </tr>  
                    <tr>
                        <td>Pembuat Disposisi</td>
                        @if ($datas1->pembuat)
                            <td>: {{ $datas1->pembuat }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr>   
                    <tr>
                        <td>Tujuan</td>
                        <td>: {{ str_replace(';', ', ', $datas1->tujuan) }}</td>
                        </tr> 
                    <tr>
                    <tr>
                        <td>Perintah</td>
                        <td>: {{ str_replace(';', ', ', $datas1->perintah) }}</td>
                        </tr>  
                    <tr>
                        <td>Catatan</td>
                        <td>: {{ $datas1->catatan }}</td>
                    </tr> 
                    <tr>
                        <td>Sifat</td>
                        <td>: {{ $datas1->sifat }}</td>
                    </tr> 
                    <tr>
                        <td>Status Disposisi</td>
                        @if ($datas1->status == 0)
                        <td>: Belum Selesai</td>
                        @elseif ($datas1->status == 1)                        
                        <td>: Selesai</td>
                        @elseif ($datas1->status == 2)                     
                        <td>: Disposisi Lanjut</td>          
                        @endif
                    </tr> 
                    @if ($datas1->status == 2)
                    <tr>
                        <td>Disposisi Ke</td>
                        <td>: {{ $datas1->disposisi_lanjut }}</td>
                    </tr> 
                    @endif
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
    
                    @elseif (in_array(Auth::user()->nama, explode(';', $datas1->tujuan)) && $datas1->status == 0)

                        <a href="{{ asset('/suratmasuk/disposisidone/' . $datas1->id) }}" class="my-2 btn btn-primary">Selesai</a>
                        
                        @if ($datas1->status != 2 && Auth::user()->role != 'Staf')
                        <a href="{{ asset('/disposisilanjut/create/' . $datas1->id) }}" class="my-2 btn btn-primary">Disposisi Lanjut</a>
                        @endif
                    @endif 

                    <a href="{{ asset('dokumen/suratmasuk/'.$datas1->dokumen) }}" class="my-2 btn btn-primary">Download Surat</a>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection