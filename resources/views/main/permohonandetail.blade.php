@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu permohonan_detail">
        <div class="container shadow">
            <div class="inner_container p-5">
            <h3 class="text-align-center py-1">Permohonan Detail</h3>
                <table class="detail-table">
                    <tr>
                        <td>Perihal</td>
                        @if ($datas1->perihal)
                            <td>: {{ $datas1->perihal }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Pemohon</td>
                        @if ($datas1->pemohon)
                            <td>: {{ $datas1->pemohon }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Penanda Tangan</td>
                        @if ($datas1->penandatangan)
                            <td>: {{ $datas1->penandatangan }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Verifikator</td>
                        @if ($datas1->verifikator1)
                            <td>: {{ $datas1->verifikator1 }}
                            @if ($datas1->verifikator2)
                                {{ $datas1->verifikator2 }}
                            @endif
                            @if ($datas1->verifikator3)
                                , {{ $datas1->verifikator3 }}
                            @endif
                            @if ($datas1->verifikator4)
                                , {{ $datas1->verifikator4 }}
                            @endif
                        @else
                            <td>: -</td>
                        @endif
                        </td>
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
                        <td>Nomor Surat</td>
                        <td>: {{ $datas1->no_surat }}</td>
                    </tr>
                    <tr>
                        <td>Sifat</td>
                        <td>: {{ $datas1->sifat }}</td>
                    </tr>
                    <tr>
                        <td>Nota Pengantar</td>
                        @if ($datas1->nota_pengantar)
                            <td>: {{ $datas1->nota_pengantar }}</td>
                        @else
                            <td>: -</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Status</td> 
                        @if ($datas1->status == 0) 
                            @if ($datas1->verifikator1)
                                <td>: Menunggu Verifikator 1</td>
                            @else
                                <td>: Menunggu TTD</td> 
                            @endif
                        @elseif ($datas1->status == 1) 
                            @if ($datas1->verifikator2)
                                <td>: Menunggu Verifikator 2</td>
                            @else
                                <td>: Menunggu TTD</td> 
                            @endif
                        @elseif ($datas1->status == 2) 
                            @if ($datas1->verifikator3)
                                <td>: Menunggu Verifikator 3</td>
                            @else
                                <td>: Menunggu TTD</td> 
                            @endif
                        @elseif ($datas1->status == 3) 
                            @if ($datas1->verifikator4)
                                <td>: Menunggu Verifikator 4</td>
                            @else
                                <td>: Menunggu TTD</td> 
                            @endif
                        @elseif ($datas1->status == 4)   
                            <td>: Menunggu TTD</td> 
                        @else
                            <td>: Sudah di TTD</td>
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
                    @if (Auth::user()->nama == $datas1->penandatangan)
                        @if ($datas1->verifikator4 && $datas1->status == 4)
                            <a href="{{ url('/permohonan/tandatangan/'.$datas1->id) }}" class="my-2 btn btn-primary">Tanda Tangani</a>
                        @elseif ($datas1->verifikator4 == null && $datas1->status == 3)
                            <a href="{{ url('/permohonan/tandatangan/'.$datas1->id) }}" class="my-2 btn btn-primary">Tanda Tangani</a>
                        @elseif ($datas1->verifikator3 == null && $datas1->status == 2)
                            <a href="{{ url('/permohonan/tandatangan/'.$datas1->id) }}" class="my-2 btn btn-primary">Tanda Tangani</a>
                        @elseif ($datas1->verifikator2 == null && $datas1->status == 1)
                            <a href="{{ url('/permohonan/tandatangan/'.$datas1->id) }}" class="my-2 btn btn-primary">Tanda Tangani</a>
                        @elseif ($datas1->verifikator1 == null && $datas1->status != -1)
                            <a href="{{ url('/permohonan/tandatangan/'.$datas1->id) }}" class="my-2 btn btn-primary">Tanda Tangani</a>
                        @endif
                    @endif

                    @if (Auth::user()->nama == $datas1->verifikator1 && $datas1->status == 0)                    
                        <a href="{{ url('/permohonan/verifikasi1/'.$datas1->id) }}" class="my-2 btn btn-primary">Verifikasi Ke-1</a>
                    @elseif (Auth::user()->nama == $datas1->verifikator2 && $datas1->status == 1)                    
                        <a href="{{ url('/permohonan/verifikasi2/'.$datas1->id) }}" class="my-2 btn btn-primary">Verifikasi Ke-2</a>
                    @elseif (Auth::user()->nama == $datas1->verifikator3 && $datas1->status == 2)                    
                        <a href="{{ url('/permohonan/verifikasi3/'.$datas1->id) }}" class="my-2 btn btn-primary">Verifikasi Ke-3</a>
                    @elseif (Auth::user()->nama == $datas1->verifikator4 && $datas1->status == 3)                    
                        <a href="{{ url('/permohonan/verifikasi4/'.$datas1->id) }}" class="my-2 btn btn-primary">Verifikasi Ke-4</a>
                    @endif

                    <a href="{{ asset('dokumen/'.$datas1->dokumen) }}" class="my-2 btn btn-primary">Download Surat</a>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection