@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu">
        <div class="container shadow">
            <div class="flex" style="justify-content: space-between;">
                <div class=" "> 
                </div>
                <div>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#tambahpermohonan">Tambah</a>
 
                    <!-- Modal -->
                    <div class="modal fade" id="tambahpermohonan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Verifikator</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body flex" style="justify-content: space-between;">
                                    <a href="{{ url('/permohonan/createlangsung') }}" class="text-center">
                                        <h3>Langsung</h3>
                                        <p>Tanpa Verifikator</p>
                                    </a>   
                                    
                                    <a href="{{ url('/permohonan/createverifikator') }}" class="text-center">
                                        <h3>Internal</h3>
                                        <p>Max 4 Verifikator</p>
                                    </a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="data_container mt-2">
            <table class="table">
                
                @if($datas1->count() > 0)
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No. Surat</th>
                        <th scope="col">Perihal</th>
                        <th scope="col">Pemohon</th>
                        <th scope="col">Penanda Tanganan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach($datas1 as $key=>$val) 
                        <tr class="hover1" onclick="window.location.href='{{ url("/permohonan/data/$val->id") }}'" style="cursor: pointer;">
                            <td>{{ $i++ }}</td>
                            <td>{{ $val->no_surat }}</td>
                            <td>{{ $val->perihal }}</td>
                            <td>{{ $val->pemohon }}</td>
                            <td>{{ $val->penandatangan }}</td> 
                            @if($val->status == 0)
                            <td>
                                <div class="btn btn-primary">Belum Diverifikasi</div>
                            </td>  
                            @elseif($val->status == 1)
                            <td>
                                <div class="btn btn-primary">Sudah Diverifikasi</div>
                            </td>  
                            @endif
                        </tr>
                    @endforeach
                </tbody>
                @else
                    <div class="datakosong wh-100">
                        <h4>Data Kosong ...</h4>
                    </div>
                @endif

            </table> 
            </div>
        </div> 
    </div>
</div>
@endsection