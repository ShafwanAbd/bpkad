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
                
                @if($datas1->count() > 0)
                @foreach($datas1 as $key=>$val)
                    {{ $val->no_surat }}
                    {{ $val->perihal }}
                    {{ $val->pemohon }}
                    {{ $val->penandatanganan }}
                    {{ $val->status }} 
                @endforeach
                @else
                <h4>Data Kosong ...</h4>
                @endif
            </div>
        </div> 
    </div>
</div>
@endsection