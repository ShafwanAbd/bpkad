@extends('layouts.app')

@php
    use App\Models\Suratmasuk;
@endphp

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu">
            <div class="container shadow">
                <div class="flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3 kelolaakun-header">
                        <div class="d-flex align-items-center gap-3">
                            <h4 class="mb-0">Kelola Akun</h4>
                            <div id="dataTablesLengthWrapper"></div>
                        </div>
                    
                        <div class="d-flex align-items-center gap-3">
                            <div id="dataTablesFilterWrapper"></div>
                            <a href="{{ url('/kelolaakun/create') }}" >Tambah</a>
                        </div>
                    </div>

            <div class="data_container mt-2">
                <table id="kelolaakunTable" class="display nowrap cell-border hover" cellspacing="0" style="width:100%"> 
                    
                    @if($datas1->count() > 0)
                    <thead>
                        <tr> 
                            <th scope="col">No</th>
                            <th scope="col">Role</th> 
                            <th scope="col">Nama</th>  
                            <th scope="col">Jabatan</th>   
                            <th scope="col">Status</th>   
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1
                        @endphp
                        @foreach($datas1 as $key=>$val) 
                            <tr class="hover1" onclick="window.location.href='{{ url("/kelolaakun/data/$val->id") }}'" style="cursor: pointer;">
                                <td>{{ $i++ }}</td>
                                <td>{{$val->role ? $val->role : '-'}}</td> 
                                <td>{{$val->nama ? $val->nama : '-'}}</td>  
                                <td>{{$val->jabatan ? $val->jabatan : '-'}}</td>   
                                <td>{{$val->status ? $val->status : '-'}}</td>   
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                    <div class="datakosong wh-100 text-center">
                        <img src="{{ asset('image/Empty Data.jpg') }}" alt="Data Kosong" style="width: 200px; margin-top: 20px;">
                        <h4>Belum ada data akun saat ini.</h4>
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
        var table = $('#kelolaakunTable').DataTable({
            dom: 'lftip',
            responsive: true,
        });
    
        $('#dataTablesFilterWrapper').html($('.dataTables_filter'));
        $('#dataTablesLengthWrapper').html($('.dataTables_length'));
    });
</script>    
@endsection