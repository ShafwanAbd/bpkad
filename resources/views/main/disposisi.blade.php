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
                    <h4>Disposisi</h4>
                </div>
                <div> 
                    
                </div>
            </div>
            <div class="data_container mt-2">
            <table class="table">
                
                @if($datas1->count() > 0)
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No. Surat</th> 
                        <th scope="col">Pengirim</th>  
                        <th scope="col">Pembuat</th>  
                        <th scope="col">Perihal</th> 
                        <th scope="col">Status</th>  
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach($datas1 as $key=>$val) 
                        <tr class="hover1" onclick="window.location.href='{{ url("/disposisi/data/$val->id") }}'" style="cursor: pointer;">
                            <td>{{ $i++ }}</td>
                            <td class="hidden">{{ $datas2 = Suratmasuk::whereId($val->id_surat)->first() }}</td> 
                            <td>{{ $datas2->no_surat }}</td> 
                            <td>{{ $datas2->pengirim }}</td> 
                            <td>{{ $val->pembuat }}</td> 
                            <td>{{ $datas2->perihal }}</td> 
                            <td><div class="btn {{ $val->status == 0 ? 'btn-warning' : 'btn-success' }}">{{ $val->status == 0 ? 'Belum Selesai' : 'Sudah Selesai' }}</div></td>  
                        </tr>
                    @endforeach
                </tbody>
                @else
                <div class="datakosong wh-100 text-center">
                    <img src="{{ asset('image/Empty Data.jpg') }}" alt="Data Kosong" style="width: 200px; margin-top: 20px;">
                    <h4>Belum ada data disposisi saat ini.</h4>
                    </div>
                @endif

            </table> 
            </div>
        </div> 
    </div>
</div>
@endsection