@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu">
        <div class="container shadow">
            <div class="flex" style="justify-content: space-between;">
                <div class="py-1"> 
                    <h4>Surat Masuk</h4>
                </div>
                <div>
                    @if(Auth::User()->role == 'Superadmin')
                    <a href="{{ url('/suratmasuk/create') }}" >Tambah</a>
                    @endif
                    
                </div>
            </div>
            <div class="data_container mt-2">
            <table class="table">
                
                @if($datas1->count() > 0)
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Perihal</th> 
                        <th scope="col">Pengirim</th>  
                        <th scope="col">Diteruskan</th>
                        <th scope="col">Disposisi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach($datas1 as $key=>$val) 
                        <tr class="hover1" onclick="window.location.href='{{ url("/permohonan/data/$val->id") }}'" style="cursor: pointer;">
                            <td>{{ $i++ }}</td>
                            <td>{{ $val->Perihal }}</td>
                            <td>{{ $val->Pengirim }}</td> 
                            @if($val->status_diteruskan == 0)
                            <td>
                                <div class="btn btn-primary">Belum</div>
                            </td>  
                            @elseif($val->status == 1)
                            <td>
                                <div class="btn btn-primary">Sudah</div>
                            </td>  
                            @endif

                            @if($val->status_disposisi == 0)
                            <td>
                                <div class="btn btn-primary">Belum</div>
                            </td>  
                            @elseif($val->status_disposisi == 1)
                            <td>
                                <div class="btn btn-primary">Sudah</div>
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