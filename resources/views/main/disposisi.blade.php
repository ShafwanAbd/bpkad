@extends('layouts.app')

@php
    use App\Models\Suratmasuk;
@endphp

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu">
        <div class="container shadow">
            <div class="d-flex justify-content-between align-items-center mb-3 disposisi-header">
                <div class="d-flex align-items-center gap-3">
                    <h4 class="mb-0">Disposisi</h4>
                    <div id="dataTablesLengthWrapper"></div> 
                </div>
                    <div id="dataTablesFilterWrapper"></div>
            </div>
            
            <div class="data_container mt-2" style="overflow-x: auto;">
                @if($datas1->count() > 0)
                    <table id="disposisiTable" class="display nowrap cell-border hover" cellspacing="0" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No. Surat</th> 
                                @if (Auth::user()->role == 'Superadmin' || Auth::user()->role == 'Admin')
                                    <th scope="col">Tujuan</th>  
                                @endif
                                <th scope="col">Pengirim</th>  
                                <th scope="col">Perihal</th> 
                                <th scope="col">Perintah</th>  
                                <th scope="col">Dibuat Pada</th> 
                                <th scope="col">Status</th>  
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($datas1 as $key => $val) 
                                @php $datas2 = Suratmasuk::whereId($val->id_surat)->first(); @endphp
                                <tr class="hover1" onclick="window.location.href='{{ url("/disposisi/data/$val->id") }}'" style="cursor: pointer;">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $datas2->no_surat }}</td> 
                                    @if (Auth::user()->role == 'Superadmin' || Auth::user()->role == 'Admin')
                                        <td>{{ str_replace(';', ', ', $val->tujuan) }}</td> 
                                    @endif
                                    <td>{{ $datas2->pengirim }}</td> 
                                    <td>{{ $datas2->perihal }}</td> 
                                    <td>{{ str_replace(';', ', ', $val->perintah) }}</td> 
                                    <td>{{ $datas2->created_at }}</td> 
                                    <td>
                                        <div class="btn {{ $val->status == 0 ? 'btn-warning' : 'btn-success' }}">
                                            {{ $val->status == 0 ? 'Belum Selesai' : 'Sudah Selesai' }}
                                        </div>
                                    </td>  
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                @else
                    <div class="datakosong wh-100 text-center">
                        <img src="{{ asset('image/Empty Data.jpg') }}" alt="Data Kosong" style="width: 200px; margin-top: 20px;">
                        <h4>Belum ada data disposisi saat ini.</h4>
                    </div>
                @endif
            </div>
        </div> 
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        var table = $('#disposisiTable').DataTable({
            dom: 'lftip',
            responsive: true,
        });
    
        $('#dataTablesFilterWrapper').html($('.dataTables_filter'));
        $('#dataTablesLengthWrapper').html($('.dataTables_length'));
    });
</script>    
@endsection