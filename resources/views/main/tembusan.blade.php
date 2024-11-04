@extends('layouts.app')

@php
    use App\Models\Permohonan;
@endphp

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
                        <th scope="col">Pemohon</th>
                        <th scope="col">Verifikator/Korektor</th>
                        <th scope="col">Penanda Tanganan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach($datas1 as $key=>$val) 
                        <div class="hidden">{{ $datas2 = Permohonan::where('id', $val->id_permohonan)->first() }}</div>
                        <tr class="hover1" onclick="window.location.href='{{ url("/permohonan/data/$val->id") }}'" style="cursor: pointer;">
                            <td>{{ $i++ }}</td>
                            <td>{{ $datas2->no_surat }}</td>
                            <td>{{ $datas2->perihal }}</td>
                            <td>{{ $datas2->pemohon }}</td>
                            @if($datas2->status_koreksi == 1)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();"> 
                                        <option disabled selected>{{ $datas2->pengkoreksi }} (Korektor)</option> 
                                    </select>
                                </td>  
                            @elseif ($datas2->status == 0) 
                                @if ($datas2->verifikator1)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled selected>{{ $datas2->verifikator1 }} (Verifikator 1)</option> 
                                    </select>
                                </td> 
                                @else
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();"> 
                                        <option disabled selected>-</option> 
                                    </select>
                                </td> 
                                @endif
                            @elseif ($datas2->status == 1)
                                @if ($datas2->verifikator2)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $datas2->verifikator1 }} (Verifikator 1)</option>
                                        <option disabled selected>{{ $datas2->verifikator2 }} (Verifikator 2)</option> 
                                    </select>
                                </td> 
                                @else
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled selected>{{ $datas2->verifikator1 }} (Verifikator 1)</option> 
                                    </select>
                                </td> 
                                @endif
                            @elseif ($datas2->status == 2)
                                @if ($datas2->verifikator3)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $datas2->verifikator1 }} (Verifikator 1)</option>
                                        <option disabled>{{ $datas2->verifikator2 }} (Verifikator 2)</option>
                                        <option disabled selected>{{ $datas2->verifikator3 }} (Verifikator 3)</option> 
                                    </select>
                                </td> 
                                @else
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $datas2->verifikator1 }}</option>
                                        <option disabled selected>{{ $datas2->verifikator2 }}</option> 
                                    </select>
                                </td> 
                                @endif
                            @elseif ($datas2->status == 3)
                                @if ($datas2->verifikator4)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $datas2->verifikator1 }} (Verifikator 1)</option>
                                        <option disabled>{{ $datas2->verifikator2 }} (Verifikator 2)</option>
                                        <option disabled>{{ $datas2->verifikator3 }} (Verifikator 3)</option>
                                        <option disabled selected>{{ $datas2->verifikator4 }} (Verifikator 4)</option>
                                    </select>
                                </td> 
                                @else
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $datas2->verifikator1 }} (Verifikator 1)</option>
                                        <option disabled>{{ $datas2->verifikator2 }} (Verifikator 2)</option>
                                        <option disabled selected>{{ $datas2->verifikator3 }} (Verifikator 3)</option> 
                                    </select>
                                </td> 
                                @endif
                            @elseif ($datas2->status == -1)
                                @if ($datas2->verifikator4)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $datas2->verifikator1 }} (Verifikator 1)</option>
                                        <option disabled>{{ $datas2->verifikator2 }} (Verifikator 2)</option>
                                        <option disabled>{{ $datas2->verifikator3 }} (Verifikator 3)</option>
                                        <option disabled selected>{{ $datas2->verifikator4 }} (Verifikator 4)</option>
                                    </select>
                                </td>  
                                @elseif ($datas2->verifikator3)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $datas2->verifikator1 }} (Verifikator 1)</option>
                                        <option disabled>{{ $datas2->verifikator2 }} (Verifikator 2)</option>
                                        <option disabled selected>{{ $datas2->verifikator3 }} (Verifikator 3)</option> 
                                    </select>
                                </td>  
                                @elseif ($datas2->verifikator2)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $datas2->verifikator1 }} (Verifikator 1)</option> 
                                        <option disabled selected>{{ $datas2->verifikator2 }} (Verifikator 2)</option> 
                                    </select>
                                </td>  
                                @elseif ($datas2->verifikator1)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();"> 
                                        <option disabled selected>{{ $datas2->verifikator1 }} (Verifikator 1)</option> 
                                    </select>
                                </td>  
                                @else
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();"> 
                                        <option disabled selected>-</option> 
                                    </select>
                                </td>  
                                @endif
                            @else
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();"> 
                                        <option disabled selected>-</option> 
                                    </select>
                                </td> 
                            @endif

                            <td>{{ $datas2->penandatangan }}</td> 
                            @if($datas2->status_koreksi == 1)
                                <td>
                                    <div class="btn btn-danger">Dikoreksi</div>
                                </td>  
                            @elseif($datas2->status == -1)
                                <td>
                                    <div class="btn btn-success">Sudah Di TTD</div>
                                </td>  
                            @elseif($datas2->status == 0)
                                @if ($datas2->verifikator1)
                                    <td><div class="btn btn-warning">Menunggu Verifikator 1</div></td>  
                                @else
                                    <td><div class="btn btn-warning">Menunggu TTD</div></td>   
                                @endif
                            @elseif($datas2->status == 1)
                                @if ($datas2->verifikator2)
                                    <td><div class="btn btn-warning">Menunggu Verifikator 2</div></td>  
                                @else
                                    <td><div class="btn btn-warning">Menunggu TTD</div></td>   
                                @endif 
                            @elseif($datas2->status == 2)
                                @if ($datas2->verifikator3)
                                    <td><div class="btn btn-warning">Menunggu Verifikator 3</div></td>  
                                @else
                                    <td><div class="btn btn-warning">Menunggu TTD</div></td>   
                                @endif 
                            @elseif($datas2->status == 3)
                                @if ($datas2->verifikator4)
                                    <td><div class="btn btn-warning">Menunggu Verifikator 4</div></td>  
                                @else
                                    <td><div class="btn btn-warning">Menunggu TTD</div></td>   
                                @endif 
                            @elseif($datas2->status == 4) 
                                <td><div class="btn btn-warning">Menunggu TTD</div></td>    
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