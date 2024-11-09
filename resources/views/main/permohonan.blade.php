@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu">
        <div class="container shadow">
            <div class="flex" style="justify-content: space-between;">
                <div class="py-1"> 
                    <h4>Permohonan</h4>
                </div>
                <div>
                    @if(Auth::User()->role != 'Admin' && Auth::User()->role != 'Superadmin' && Auth::user()->role != 'Kepala Badan')
                    <a href="#" data-bs-toggle="modal" data-bs-target="#tambahpermohonan">Tambah</a>
 
                    <!-- Modal -->
                    <div class="modal fade" id="tambahpermohonan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Verifikator</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body flex" style="justify-content: space-between;">
                                    <a href="{{ url('/permohonan/createlangsung') }}" class="text-center">
                                        <h3>Langsung</h3>
                                        <p>Tanpa Verifikator</p>
                                    </a>   
                                    
                                    <a href="{{ url('/permohonan/createverifikator') }}" class="text-center">
                                        <h3>Internal</h3>
                                        <p>Max 4 Verifikator</p>
                                    </a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button> 
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <th scope="col">Pemohon</th>
                        <th scope="col">Verifikator/Korektor</th>
                        <th scope="col">Penanda Tanganan</th>
                        <th scope="col">Dibuat Pada</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1
                    @endphp
                    @foreach($datas1 as $key=>$val) 
                        <tr class="hover1" onclick="window.location.href='{{ url("/permohonan/data/$val->id") }}'" style="cursor: pointer;">
                            <td>{{ $i++ }}</td> 
                            <td>{{ $val->perihal }}</td>
                            <td>{{ $val->pemohon }}</td>
                            @if($val->status_koreksi == 1)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();"> 
                                        <option disabled selected>{{ $val->pengkoreksi }} (Korektor)</option> 
                                    </select>
                                </td>  
                            @elseif ($val->status == 0) 
                                @if ($val->verifikator1)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled selected>{{ $val->verifikator1 }} (Verifikator 1)</option> 
                                    </select>
                                </td> 
                                @else
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();"> 
                                        <option disabled selected>-</option> 
                                    </select>
                                </td> 
                                @endif
                            @elseif ($val->status == 1)
                                @if ($val->verifikator2)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $val->verifikator1 }} (Verifikator 1)</option>
                                        <option disabled selected>{{ $val->verifikator2 }} (Verifikator 2)</option> 
                                    </select>
                                </td> 
                                @else
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled selected>{{ $val->verifikator1 }} (Verifikator 1)</option> 
                                    </select>
                                </td> 
                                @endif
                            @elseif ($val->status == 2)
                                @if ($val->verifikator3)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $val->verifikator1 }} (Verifikator 1)</option>
                                        <option disabled>{{ $val->verifikator2 }} (Verifikator 2)</option>
                                        <option disabled selected>{{ $val->verifikator3 }} (Verifikator 3)</option> 
                                    </select>
                                </td> 
                                @else
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $val->verifikator1 }}</option>
                                        <option disabled selected>{{ $val->verifikator2 }}</option> 
                                    </select>
                                </td> 
                                @endif
                            @elseif ($val->status == 3)
                                @if ($val->verifikator4)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $val->verifikator1 }} (Verifikator 1)</option>
                                        <option disabled>{{ $val->verifikator2 }} (Verifikator 2)</option>
                                        <option disabled>{{ $val->verifikator3 }} (Verifikator 3)</option>
                                        <option disabled selected>{{ $val->verifikator4 }} (Verifikator 4)</option>
                                    </select>
                                </td> 
                                @else
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $val->verifikator1 }} (Verifikator 1)</option>
                                        <option disabled>{{ $val->verifikator2 }} (Verifikator 2)</option>
                                        <option disabled selected>{{ $val->verifikator3 }} (Verifikator 3)</option> 
                                    </select>
                                </td> 
                                @endif
                            @elseif ($val->status == -1)
                                @if ($val->verifikator4)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $val->verifikator1 }} (Verifikator 1)</option>
                                        <option disabled>{{ $val->verifikator2 }} (Verifikator 2)</option>
                                        <option disabled>{{ $val->verifikator3 }} (Verifikator 3)</option>
                                        <option disabled selected>{{ $val->verifikator4 }} (Verifikator 4)</option>
                                    </select>
                                </td>  
                                @elseif ($val->verifikator3)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $val->verifikator1 }} (Verifikator 1)</option>
                                        <option disabled>{{ $val->verifikator2 }} (Verifikator 2)</option>
                                        <option disabled selected>{{ $val->verifikator3 }} (Verifikator 3)</option> 
                                    </select>
                                </td>  
                                @elseif ($val->verifikator2)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();">
                                        <option disabled>{{ $val->verifikator1 }} (Verifikator 1)</option> 
                                        <option disabled selected>{{ $val->verifikator2 }} (Verifikator 2)</option> 
                                    </select>
                                </td>  
                                @elseif ($val->verifikator1)
                                <td>
                                    <select name="verifikator4" class="form-control" onclick="event.stopPropagation();"> 
                                        <option disabled selected>{{ $val->verifikator1 }} (Verifikator 1)</option> 
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

                            <td>{{ $val->penandatangan }}</td>  
                            <td>{{ $val->created_at }}</td> 
                            @if($val->status_koreksi == 1)
                                <td>
                                    <div class="btn btn-danger">Dikoreksi</div>
                                </td>  
                            @elseif($val->status == -1)
                                <td>
                                    <div class="btn btn-success">Sudah Di TTD</div>
                                </td>  
                            @elseif($val->status == 0)
                                @if ($val->verifikator1)
                                    <td><div class="btn btn-warning">Menunggu Verifikator 1</div></td>  
                                @else
                                    <td><div class="btn btn-warning">Menunggu TTD</div></td>   
                                @endif
                            @elseif($val->status == 1)
                                @if ($val->verifikator2)
                                    <td><div class="btn btn-warning">Menunggu Verifikator 2</div></td>  
                                @else
                                    <td><div class="btn btn-warning">Menunggu TTD</div></td>   
                                @endif 
                            @elseif($val->status == 2)
                                @if ($val->verifikator3)
                                    <td><div class="btn btn-warning">Menunggu Verifikator 3</div></td>  
                                @else
                                    <td><div class="btn btn-warning">Menunggu TTD</div></td>   
                                @endif 
                            @elseif($val->status == 3)
                                @if ($val->verifikator4)
                                    <td><div class="btn btn-warning">Menunggu Verifikator 4</div></td>  
                                @else
                                    <td><div class="btn btn-warning">Menunggu TTD</div></td>   
                                @endif 
                            @elseif($val->status == 4) 
                                <td><div class="btn btn-warning">Menunggu TTD</div></td>    
                            @endif
                        </tr>
                    @endforeach
                </tbody>
                @else
                <div class="datakosong wh-100 text-center">
                    <img src="{{ asset('image/Empty Data.jpg') }}" alt="Data Kosong" style="width: 200px; margin-top: 20px;">
                    <h4>Belum ada data permohonan saat ini.</h4>
                </div>
                @endif

            </table> 
            </div>
        </div> 
    </div>
</div>
@endsection