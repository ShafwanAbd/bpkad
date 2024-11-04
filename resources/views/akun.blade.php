@extends('layouts.app')

@section('content')
<div class="container_akun flex"> 
    @include('layouts.app_menu')

    <div class="dashboard_main main_side_menu">
        <div class="container shadow">

            <div class="py-1"> 
                <h4>Akun</h4>
            </div>

            <table class="table-auto w-full border-collapse">
                <tr>
                    <td class="px-4 py-2 font-bold">Role</td>
                    <td class="px-4 py-2">: {{ Auth::user()->role }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 font-bold">Nama</td>
                    <td class="px-4 py-2">: {{ Auth::user()->nama }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 font-bold">NIP</td>
                    <td class="px-4 py-2">: {{ Auth::user()->nip }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 font-bold">Jabatan</td>
                    <td class="px-4 py-2">: {{ Auth::user()->jabatan ? Auth::user()->jabatan : '-' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 font-bold">Nomor HP</td>
                    <td class="px-4 py-2">: {{ Auth::user()->nomor_hp ? Auth::user()->nomor_hp : '-' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 font-bold">Status</td>
                    <td class="px-4 py-2">: {{ Auth::user()->status ? Auth::user()->status : '-' }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 font-bold">Email</td>
                    <td class="px-4 py-2">: {{ Auth::user()->email ? Auth::user()->email : '-' }}</td>
                </tr>
            </table> 
            
        </div> 
    </div>
</div>
@endsection