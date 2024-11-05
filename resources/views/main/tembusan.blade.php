@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu">
        <div class="container shadow">
            <div class="flex" style="justify-content: space-between;">
                <div class="py-1"> 
                    <h4>Tembusan</h4>
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
                        <th scope="col">Pengirim</th>   
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach($datas1 as $key=>$val) 
                        <tr class="hover1" onclick="window.location.href='{{ url("/tembusan/data/$val->id") }}'" style="cursor: pointer;">
                            <td>{{ $i++ }}</td>
                            <td>{{ $val->no_surat }}</td>
                            <td>{{ $val->perihal }}</td>
                            <td>{{ $val->pengirim }}</td>  
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