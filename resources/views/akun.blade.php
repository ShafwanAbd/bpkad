@extends('layouts.app')

@section('content')
<div class="container_akun flex"> 
    @include('layouts.app_menu')

    <div class="dashboard_main main_side_menu">
        <div class="container shadow">
            <div class="flex"> 
                <p class="px-2 btn btn-primary">{{Auth::user()->role}}</p>
            </div>
            <div class="flex">
                <p>Nama: </p>
                <p class="px-2">{{Auth::user()->nama}}</p>
            </div>
            <div class="flex">
                <p>NIP: </p>
                <p class="px-2">{{Auth::user()->nip}}</p>
            </div>
            <div class="flex">
                <p>Jabatan: </p>
                <p class="px-2">{{Auth::user()->jabatan}}</p>
            </div> 
            <div class="flex">
                <p>Nomor HP: </p>
                <p class="px-2">{{Auth::user()->nomor_hp}}</p>
            </div> 
            <div class="flex">
                <p>Status: </p>
                <p class="px-2">{{Auth::user()->status}}</p>
            </div> 
            <div class="flex">
                <p>Email: </p>
                <p class="px-2">{{Auth::user()->email}}</p>
            </div>  
        </div> 
    </div>
</div>
@endsection