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
                        @if (Auth::user()->role == 'Superadmin' || Auth::user()->role == 'Admin')
                            <th scope="col">Tujuan</th>   
                        @endif
                        <th scope="col">Pembuat</th>  
                        <th scope="col">Pengirim</th>  
                        <th scope="col">Perihal</th> 
                        <th scope="col">Perintah</th>  
                        <th scope="col">Dibuat Pada</th> 
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
                            @if (Auth::user()->role == 'Superadmin' || Auth::user()->role == 'Admin')
                                <td>{{ str_replace(';', ', ', $val->tujuan) }}</td> 
                            @endif
                            <td>{{ $val->pembuat }}</td>  
                            <td>{{ $datas2->pengirim }}</td> 
                            <td>{{ $datas2->perihal }}</td> 
                            <td>{{ str_replace(';', ', ', $val->perintah) }}</td> 
                            <td>{{ $val->created_at }}</td> 
                            <td>
                                @if ($val->status == 0)
                                <div class="btn btn-warning">Belum Selesai</div>
                                @elseif ($val->status == 1)
                                <div class="btn btn-success">Selesai</div>
                                @elseif ($val->status == 2)
                                <div class="btn btn-success">Disposisi Lanjut</div>
                                @endif
                            </td>  
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