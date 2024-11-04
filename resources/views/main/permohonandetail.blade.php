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
                        @if ($datas1->nota_pengantar)
                            <td>Nota Pengantar</td>
                            <td>: {{ $datas1->nota_pengantar }}</td> 
                        @endif
                    </tr>
                    <tr>
                        <td>Status</td> 
                        @if ($datas1->status_koreksi == 1)   
                            <td>: Dikoreksi</td> 
                        @elseif ($datas1->status == 0) 
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
                    @if ($datas1->status_koreksi == 1)
                    <tr>
                        <td>Pesan Koreksi</td>
                        @if ($datas1->pesan_koreksi)
                        <td>: {{ $datas1->pesan_koreksi }}</td>
                        @else
                        <td>: -</td>
                        @endif
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

                    @if (Auth::user()->nama == $datas1->pemohon && $datas1->status_koreksi == 1)                            
                        <a href="{{ url('/permohonan/revisi/'.$datas1->id) }}" class="my-2 btn btn-primary">Revisi</a>
                    @endif

                    @if (Auth::user()->nama == $datas1->penandatangan)
                        @if ($datas1->status_koreksi)
                        @elseif ($datas1->verifikator4 && $datas1->status == 4)
                            <a href="{{ url('/permohonan/tandatangan/'.$datas1->id) }}" class="my-2 btn btn-primary">Tanda Tangani</a>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#koreksi">Koreksi</a>   
                        @elseif ($datas1->verifikator4 == null && $datas1->status == 3)
                            <a href="{{ url('/permohonan/tandatangan/'.$datas1->id) }}" class="my-2 btn btn-primary">Tanda Tangani</a>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#koreksi">Koreksi</a>   
                        @elseif ($datas1->verifikator3 == null && $datas1->status == 2)
                            <a href="{{ url('/permohonan/tandatangan/'.$datas1->id) }}" class="my-2 btn btn-primary">Tanda Tangani</a>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#koreksi">Koreksi</a>   
                        @elseif ($datas1->verifikator2 == null && $datas1->status == 1)
                            <a href="{{ url('/permohonan/tandatangan/'.$datas1->id) }}" class="my-2 btn btn-primary">Tanda Tangani</a>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#koreksi">Koreksi</a>   
                        @elseif ($datas1->verifikator1 == null && $datas1->status != -1)
                            <a href="{{ url('/permohonan/tandatangan/'.$datas1->id) }}" class="my-2 btn btn-primary">Tanda Tangani</a>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#koreksi">Koreksi</a>   
                        @endif
                    @endif

                    @if ($datas1->status_koreksi)
                    @elseif (Auth::user()->nama == $datas1->verifikator1 && $datas1->status == 0)                    
                        <a href="{{ url('/permohonan/verifikasi1/'.$datas1->id) }}" class="my-2 btn btn-primary">Verifikasi Ke-1</a>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#koreksi">Koreksi</a>   
                    @elseif (Auth::user()->nama == $datas1->verifikator2 && $datas1->status == 1)                    
                        <a href="{{ url('/permohonan/verifikasi2/'.$datas1->id) }}" class="my-2 btn btn-primary">Verifikasi Ke-2</a>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#koreksi">Koreksi</a>   
                    @elseif (Auth::user()->nama == $datas1->verifikator3 && $datas1->status == 2)                    
                        <a href="{{ url('/permohonan/verifikasi3/'.$datas1->id) }}" class="my-2 btn btn-primary">Verifikasi Ke-3</a>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#koreksi">Koreksi</a>   
                    @elseif (Auth::user()->nama == $datas1->verifikator4 && $datas1->status == 3)                    
                        <a href="{{ url('/permohonan/verifikasi4/'.$datas1->id) }}" class="my-2 btn btn-primary">Verifikasi Ke-4</a>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#koreksi">Koreksi</a>   
                    @endif  

                    <!-- Modal -->
                    <div class="modal fade" id="koreksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                
                                <form method="POST" action="{{ url('/permohonan/koreksi/'.$datas1->id) }}">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan untuk Koreksi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <textarea class="form-control" name="pesan_koreksi" rows="3" placeholder="Pesan untuk Koreksi" required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button> 
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Kirim</button> 
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <a href="{{ asset('dokumen/permohonan/'.$datas1->dokumen) }}" class="my-2 btn btn-primary">Download Surat</a>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection