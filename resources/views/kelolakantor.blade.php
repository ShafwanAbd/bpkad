@extends('layouts.app')

@php
    use App\Models\Suratmasuk;
@endphp

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu">

        <div class="container shadow">
            <div class="flex" style="justify-content: space-between;"> 
                <div class="py-1">
                    <h4>Kelola Kantor</h4>
                </div>
                <div>
                    <a href="{{ url('/kelolakantor/create') }}" >Tambah</a>
                </div>  
            </div>

            <div class="data_container mt-2">
                <table class="table">
                    
                    @if($datas1->count() > 0)
                    <thead>
                        <tr> 
                            <th scope="col">No</th>
                            <th scope="col">Nama Kantor</th> 
                            <th scope="col">Singkatan</th>  
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1
                        @endphp
                        @foreach($datas1 as $key=>$val) 
                            <tr class="hover1" onclick="window.location.href='{{ url("/kelolakantor/data/$val->id") }}'" style="cursor: pointer;">
                                <td>{{ $i++ }}</td>
                                <td>{{$val->nama_kantor ? $val->nama_kantor : '-'}}</td> 
                                <td>{{$val->singkatan ? $val->singkatan : '-'}}</td>  
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                    <div class="datakosong wh-100 text-center">
                        <img src="{{ asset('image/Empty Data.jpg') }}" alt="Data Kosong" style="width: 200px; margin-top: 20px;">
                        <h4>Belum ada data saat ini.</h4>
                        </div>
                    @endif

                </table> 
            </div>
        </div>
    </div>


</div>
@endsection