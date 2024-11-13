@extends('layouts.app')

@section('content')
<div class="dashboard_container flex">
    @include('layouts.app_menu')

    <div class="dashboard_main main_side_menu">
        <div class="container shadow d-flex flex-wrap justify-content-start gap-3">

            <div class="card" style="width: 17rem;"> 
                <div class="card-body text-center">
                    <h3>{{ $permohonancount ? $permohonancount : 0 }}</h3> 
                    <h5 class="card-title">Permohonan Dibuat</h5> 
                </div>
            </div>

            <div class="card" style="width: 17rem;"> 
                <div class="card-body text-center">
                    <h3>{{ $tembusancount ? $tembusancount : 0 }}</h3> 
                    <h5 class="card-title">Tembusan Dibuat</h5> 
                </div>
            </div>

            <div class="card" style="width: 17rem;"> 
                <div class="card-body text-center">
                    <h3>{{ $suratmasukcount ? $suratmasukcount : 0 }}</h3> 
                    <h5 class="card-title">Surat Masuk Dibuat</h5> 
                </div>
            </div>

            <div class="card" style="width: 17rem;"> 
                <div class="card-body text-center">
                    <h3>{{ $suratkeluarcount ? $suratkeluarcount : 0 }}</h3> 
                    <h5 class="card-title">Surat Keluar Dibuat</h5> 
                </div>
            </div>

            <div class="card" style="width: 17rem;"> 
                <div class="card-body text-center">
                    <h3>{{ $disposisicount ? $disposisicount : 0 }}</h3> 
                    <h5 class="card-title">Disposisi Dibuat</h5> 
                </div>
            </div>

        </div>  
    </div>
</div>
@endsection
