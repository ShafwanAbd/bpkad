@extends('layouts.app')

@section('content')
<div class="permohonan_container flex">

    @include('layouts.app_menu')

    <div class="permohonan_main main_side_menu permohonan_detail">
        <div class="container shadow">
            <div class="inner_container p-5">
                    
                <h3 class="text-align-center py-1">Kelola Akun Create</h3>
                <!-- Add the form -->
                <form action="{{ url('/kelolaakun/create') }}" method="POST">
                    @csrf 
                    
                    <table class="detail-table w-100">
                        <tr> 
                            <td>Role</td>
                            <td>
                                <select name="role" class="form-control">
                                    <option value="Superadmin" >Superadmin</option> 
                                    <option value="Admin" >Admin</option> 
                                    <option value="Kepala Badan" >Kepala Badan</option> 
                                    <option value="Kepala Bidang" >Kepala Bidang</option> 
                                    <option value="Sekretaris Badan" >Sekretaris Badan</option> 
                                    <option value="Kepala Sub Bidang" >Kepala Sub Bidang</option> 
                                    <option value="Staf" >Staf</option> 
                                </select>
                            </td>
                        </tr>
                        <tr> 
                            <td>Nama</td>
                            <td><input type="text" name="nama" class="form-control" placeholder="Nama" required></td>  
                        </tr>
                        <tr> 
                            <td>NIP</td>
                            <td><input type="text" name="nip" class="form-control" placeholder="194509172024010101" required></td>  
                        </tr>
                        <tr> 
                            <td>Jabatan</td>
                            <td>
                                <select name="jabatan" class="form-control">
                                    <option value="Superadmin">Superadmin</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Kepala Badan">Kepala Badan</option>
                                    <option value="Sekretaris Badan">Sekretaris Badan</option>
                                    <option value="Kabid Anggaran">Kabid Anggaran</option>
                                    <option value="Kabid Aset Daerah">Kabid Aset Daerah</option>
                                    <option value="Kabid Akuntansi">Kabid Akuntansi</option>
                                    <option value="Kabid Perbendaharaan dan Kas Daerah">Kabid Perbendaharaan dan Kas Daerah</option>
                                    <option value="Kasubid Penatausahaan Aset Daerah">Kasubid Penatausahaan Aset Daerah</option>
                                    <option value="Kasubid Perbendaharaan">Kasubid Perbendaharaan</option>
                                    <option value="Kasubid Kas Daerah">Kasubid Kas Daerah</option>
                                    <option value="Kasubid Pemanfaatan dan Pengamanan Aset Daerah">Kasubid Pemanfaatan dan Pengamanan Aset Daerah</option>
                                    <option value="Kasubid Perencanaan Anggaran">Kasubid Perencanaan Anggaran</option>
                                    <option value="Analis Kepegawaian Ahli Muda">Analis Kepegawaian Ahli Muda</option>
                                    <option value="Penelaah Pendapatan dan Belanja">Penelaah Pendapatan dan Belanja</option>
                                    <option value="Analis Keuangan Pusat dan Daerah Ahli Muda">Analis Keuangan Pusat dan Daerah Ahli Muda</option>
                                    <option value="Perencana Ahli Muda">Perencana Ahli Muda</option>
                                    <option value="Analis Perbendaharaan">Analis Perbendaharaan</option>
                                    <option value="Analis Pembayaran Perhitungan Pihak Ketiga dan Pembayaran Tuntutan Ganti Rugi">Analis Pembayaran Perhitungan Pihak Ketiga dan Pembayaran Tuntutan Ganti Rugi</option>
                                    <option value="Analis Pelaporan dan Transaksi Keuangan">Analis Pelaporan dan Transaksi Keuangan</option>
                                    <option value="Penata Keuangan">Penata Keuangan</option>
                                    <option value="Analis Laporan Realisasi Anggaran">Analis Laporan Realisasi Anggaran</option>
                                    <option value="Penyusun Laporan Keuangan">Penyusun Laporan Keuangan</option>
                                    <option value="Penyusun Rencana Kebutuhan Sarana dan Prasarana">Penyusun Rencana Kebutuhan Sarana dan Prasarana</option>
                                    <option value="Analis Perencanaan, Evaluasi dan Pelaporan">Analis Perencanaan, Evaluasi dan Pelaporan</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Analis Laporan Realisasi Anggaran">Analis Laporan Realisasi Anggaran</option>
                                    <option value="Analis Kebijakan Klasifikasi Barang">Analis Kebijakan Klasifikasi Barang</option>
                                    <option value="Penata Keuangan">Penata Keuangan</option>
                                    <option value="Analis Aset Daerah">Analis Aset Daerah</option>
                                    <option value="Penyusun Rencana Kebutuhan Rumah Tangga dan Perlengkapan">Penyusun Rencana Kebutuhan Rumah Tangga dan Perlengkapan</option>
                                    <option value="Analis Keuangan">Analis Keuangan</option>
                                    <option value="Analis Pengembangan SDM Aparatur">Analis Pengembangan SDM Aparatur</option>
                                    <option value="Verifikator">Verifikator</option>
                                    <option value="Analis Standar Harga">Analis Standar Harga</option>
                                    <option value="Penata Laporan Keuangan">Penata Laporan Keuangan</option>
                                    <option value="Analis Penyelesaian Laporan Hasil Pemeriksaan">Analis Penyelesaian Laporan Hasil Pemeriksaan</option>
                                    <option value="Sekretaris">Sekretaris</option>
                                    <option value="Arsiparis Terampil">Arsiparis Terampil</option>
                                    <option value="Pranata Komputer Pelaksana">Pranata Komputer Pelaksana</option>
                                    <option value="Pengolah Data Kebijakan Klasifikasi Barang">Pengolah Data Kebijakan Klasifikasi Barang</option>
                                    <option value="Pengolah Data dan Informasi">Pengolah Data dan Informasi</option>
                                    <option value="Pranata Komputer">Pranata Komputer</option> 
                                </select>
                            </td> 
                        </tr>
                        <tr> 
                            <td>Nomor HP</td>
                            <td><input type="text" name="nomor_hp" class="form-control" placeholder="081234567890"></td>
                        </tr>
                        <tr> 
                            <td>Status</td>
                            <td>
                                <select name="status" class="form-control">
                                    <option value="Aktif" >Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </td>  
                        </tr>

                        <tr> 
                            <td>Email</td>
                            <td><input type="email" name="email" class="form-control" placeholder="your.email@gmail.com"></td>  
                        </tr>
                        <tr> 
                            <td>Password</td>
                            <td><input type="password" name="password" class="form-control" placeholder="*****" required></td>  
                        </tr> 
                    </table>

                    <div class="py-4 d-flex justify-content-end">
                        <button type="submit" class="my-2 btn btn-primary">Submit</button>
                    </div>
                </form> 

            </div>
        </div>
    </div>

</div>
@endsection