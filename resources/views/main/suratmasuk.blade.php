@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu">
        <div class="container shadow">
            <div class="flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-3 suratmasuk-header">
                    <div class="d-flex align-items-center gap-3">
                        <h4 class="mb-0">Surat Masuk</h4>
                        <div id="dataTablesLengthWrapper"></div>
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <div id="dataTablesFilterWrapper"></div>
                        @if(Auth::User()->role == 'Superadmin')
                        <a href="{{ url('/suratmasuk/create') }}" >Tambah</a>
                        @endif
                        
                    </div>
                </div>
                <div class="data_container mt-2">
                    <table id="suratmasukTable" class="display nowrap cell-border hover" cellspacing="0" style="width:100%">
                        
                        @if($datas1->count() > 0)
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No. Surat</th> 
                                <th scope="col">Perihal</th> 
                                <th scope="col">Pengirim</th>  
                                <th scope="col">Dibuat Pada</th>  
                                <th scope="col">Disposisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1
                            @endphp
                            @foreach($datas1 as $key=>$val) 
                                <tr class="hover1" onclick="window.location.href='{{ url("/suratmasuk/data/$val->id") }}'" style="cursor: pointer;">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $val->no_surat }}</td>
                                    <td>{{ $val->perihal }}</td>
                                    <td>{{ $val->pengirim }}</td> 
                                    <td>{{ $val->created_at }}</td> 

                                    @if($val->status_disposisi == 0)
                                    <td>
                                        <div class="btn btn-warning">Belum</div>
                                    </td>  
                                    @elseif($val->status_disposisi == 1)
                                    <td>
                                        <div class="btn btn-success">Sudah</div>
                                    </td>  
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                        @else
                        <div class="datakosong wh-100 text-center">
                            <img src="{{ asset('image/Empty Data.jpg') }}" alt="Data Kosong" style="width: 200px; margin-top: 20px;">
                            <h4>Belum ada data surat masuk saat ini.</h4>
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
        var table = $('#suratmasukTable').DataTable({
            dom: 'lftip',
            responsive: true
        });
    
        $('#dataTablesFilterWrapper').html($('.dataTables_filter'));
        $('#dataTablesLengthWrapper').html($('.dataTables_length'));
    });
</script>    
@endsection