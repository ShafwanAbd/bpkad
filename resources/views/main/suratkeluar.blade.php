@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu">
        <div class="container shadow">
            <div class="flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-3 suratkeluar-header">
                    <div class="d-flex align-items-center gap-3">
                        <h4 class="mb-0">Surat Keluar</h4>
                        <div id="dataTablesLengthWrapper"></div>
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <div id="dataTablesFilterWrapper"></div>
                        @if(Auth::User()->role != 'Admin' && Auth::User()->role != 'Superadmin')
                            <a href="{{ url('/suratkeluar/create') }}" >Tambah</a>
                        @endif
                    </div>
                </div>

                <div class="data_container mt-2">
                    <table id="suratkeluarTable" class="display nowrap cell-border hover" cellspacing="0" style="width:100%">
                        
                        @if($datas1->count() > 0)
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No. Surat</th> 
                                <th scope="col">Perihal</th>  
                                <th scope="col">Pemohon</th>  
                                <th scope="col">Penandatangan</th>  
                                <th scope="col">Dibuat Pada</th>   
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1
                            @endphp
                            @foreach($datas1 as $key=>$val) 
                                <tr class="hover1" onclick="window.location.href='{{ url("/suratkeluar/data/$val->id") }}'" style="cursor: pointer;">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $val->no_surat }}</td>
                                    <td>{{ $val->perihal }}</td> 
                                    <td>{{ $val->pemohon }}</td> 
                                    <td>{{ $val->penandatangan }}</td> 
                                    <td>{{ $val->created_at }}</td>  
                                </tr>
                            @endforeach
                        </tbody>
                        @else
                        <div class="datakosong wh-100 text-center">
                            <img src="{{ asset('image/Empty Data.jpg') }}" alt="Data Kosong" style="width: 200px; margin-top: 20px;">
                            <h4>Belum ada data surat keluar saat ini.</h4>
                            </div>
                        @endif

                    </table> 
                </div>
            </div> 
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        var table = $('#suratkeluarTable').DataTable({
            dom: 'lftip',
            responsive: true
        });
    
        $('#dataTablesFilterWrapper').html($('.dataTables_filter'));
        $('#dataTablesLengthWrapper').html($('.dataTables_length'));
    });
</script>    
@endsection