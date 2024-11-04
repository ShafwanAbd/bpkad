@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu permohonan_detail">
        <div class="container shadow">
            <div class="inner_container p-5">
                    
                <h3 class="text-align-center py-1">Kelola Akun Detail</h3>
                <!-- Add the form -->
                <form action="{{ url('/kelolaakun/data/' . $datas1->id) }}" method="POST">
                    @csrf 
                    
                    <table class="detail-table w-100">
                        <tr> 
                            <td>ID</td>                            
                            <td><input type="text" name="id" value="{{ $datas1->id }}" class="form-control" disabled></td> 

                        </tr>
                        <tr> 
                            <td>Role</td>
                            <td><input type="text" name="role" value="{{ $datas1->role }}" class="form-control"></td> 
                        </tr>
                        <tr> 
                            <td>Nama</td>
                            <td><input type="text" name="nama" value="{{ $datas1->nama }}" class="form-control"></td>  
                        </tr>
                        <tr> 
                            <td>NIP</td>
                            <td><input type="text" name="nip" value="{{ $datas1->nip }}" class="form-control"></td>  
                        </tr>
                        <tr> 
                            <td>Jabatan</td>
                            <td><input type="text" name="jabatan" value="{{ $datas1->jabatan }}" class="form-control"></td> 
                        </tr>
                        <tr> 
                            <td>Nomor HP</td>
                            <td><input type="text" name="nomor_hp" value="{{ $datas1->nomor_hp }}" class="form-control"></td>
                        </tr>
                        <tr> 
                            <td>Status</td>
                            <td>
                                <select name="status" class="form-control">
                                    <option value="Aktif" {{ $datas1->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ $datas1->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </td>  
                        </tr>

                        <tr> 
                            <td>Email</td>
                            <td><input type="email" name="email" value="{{ $datas1->email }}" class="form-control"></td>  
                        </tr>
                        <tr> 
                            <td>Password</td>
                            <td><input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password"></td>  
                        </tr> 
                    </table>

                    <div class="py-4 d-flex justify-content-end">
                        <a href="{{ url('kelolaakun/delete/' . $datas1->id) }}" class="my-2">Hapus</a>
                        <button type="submit" class="my-2 mx-2 btn btn-primary">Simpan</button>
                    </div>
                </form>
                <!-- <div class="container_image mt-4">
                    <img src="{{ asset('./dokumen/'.$datas1->id.'.png') }}" class="img-fluid">
                    <a href="#" class="my-2 btn btn-primary">Detail</a>
                </div> --> 

            </div>
        </div>
    </div>

</div>
@endsection