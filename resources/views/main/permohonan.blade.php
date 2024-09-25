@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu">
        <div class="container shadow">
            <div class="flex" style="justify-content: space-between;">
                <div class=" "> 
                </div>
                <div>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</a>
 
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Verifikator</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body flex" style="justify-content: space-between;">
                                    <div class="red">
                                        Internal
                                    </div>
                                    <div class="red">
                                        Internal
                                    </div>
                                    <div class="red">
                                        Internal
                                    </div>  
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="data_container mt-2">
                <div>data 1</div>
                <div>data 1</div>
                <div>data 1</div>
                <div>data 1</div>
                <div>data 1</div>
                <div>data 1</div>
            </div>
        </div> 
    </div>
</div>
@endsection