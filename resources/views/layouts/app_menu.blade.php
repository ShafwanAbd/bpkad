<div class="menu_left">
        <div class="menu_main">
            <div class="menu_menu flex">
                <div>
                    <h2>{{Auth::user()->role}}</h2> 
                    <p>{{Auth::user()->jabatan}}</p> 
                </div>
                <!-- @if (request()->is('suratmasuk'))
                <h2>Surat Masuk</h2>
                @elseif (request()->is('suratkeluar'))
                <h2>Surat Keluar</h2>
                @else
                <h2>{{ ucfirst(request()->segment(count(request()->segments()))) }}</h2> 
                @endif -->
                <a href="#"><img src="#"></a>
            </div>
            <div class="menu_item btn-group-vertical" role="group" aria-label="Vertical button group">
                @if (Auth::check())
                    @if (Auth::user()->role == 'Superadmin')     
                    <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="#">Dashboard</a> 
                    <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="#">Permohonan</a>
                    <a class="{{ request()->is('tembusan') ? 'active' : '' }}" href="{{ url('/tembusan') }}"><img src="#">Tembusan</a>
                    <a class="{{ request()->is('suratmasuk') ? 'active' : '' }}" href="{{ url('/suratmasuk') }}"><img src="#">Surat Masuk</a>
                    <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="{{ url('/suratkeluar') }}"><img src="#">Surat Keluar</a>
                    <a class="{{ request()->is('disposisi') ? 'active' : '' }}" href="{{ url('/disposisi') }}"><img src="#">Disposisi</a> 
                    <a class="{{ request()->is('kelolaakun') ? 'active' : '' }}" href="{{ url('/kelolaakun') }}"><img src="#">Kelola Akun</a> 
                    @elseif (Auth::user()->role == 'Admin')       
                    <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="#">Dashboard</a> 
                    <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="#">Permohonan</a>
                    <a class="{{ request()->is('tembusan') ? 'active' : '' }}" href="{{ url('/tembusan') }}"><img src="#">Tembusan</a>
                    <a class="{{ request()->is('suratmasuk') ? 'active' : '' }}" href="{{ url('/suratmasuk') }}"><img src="#">Surat Masuk</a>
                    <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="{{ url('/suratkeluar') }}"><img src="#">Surat Keluar</a>
                    <a class="{{ request()->is('disposisi') ? 'active' : '' }}" href="{{ url('/disposisi') }}"><img src="#">Disposisi</a> 
                    @elseif (Auth::user()->role == 'Kepala Badan')       
                    <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="#">Dashboard</a> 
                    <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="#">Permohonan</a>
                    <a class="{{ request()->is('tembusan') ? 'active' : '' }}" href="{{ url('/tembusan') }}"><img src="#">Tembusan</a>
                    <a class="{{ request()->is('suratmasuk') ? 'active' : '' }}" href="{{ url('/suratmasuk') }}"><img src="#">Surat Masuk</a>
                    <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="{{ url('/suratkeluar') }}"><img src="#">Surat Keluar</a>
                    @elseif (Auth::user()->role == 'Sekretaris Badan')       
                    <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="#">Dashboard</a> 
                    <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="#">Permohonan</a>
                    <a class="{{ request()->is('tembusan') ? 'active' : '' }}" href="{{ url('/tembusan') }}"><img src="#">Tembusan</a>
                    <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="{{ url('/suratkeluar') }}"><img src="#">Surat Keluar</a>
                    <a class="{{ request()->is('disposisi') ? 'active' : '' }}" href="{{ url('/disposisi') }}"><img src="#">Disposisi</a> 
                    @elseif (Auth::user()->role == 'Kepala Bidang')       
                    <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="#">Dashboard</a> 
                    <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="#">Permohonan</a>
                    <a class="{{ request()->is('tembusan') ? 'active' : '' }}" href="{{ url('/tembusan') }}"><img src="#">Tembusan</a>
                    <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="{{ url('/suratkeluar') }}"><img src="#">Surat Keluar</a>
                    <a class="{{ request()->is('disposisi') ? 'active' : '' }}" href="{{ url('/disposisi') }}"><img src="#">Disposisi</a> 
                    @elseif (Auth::user()->role == 'Kepala Sub Bidang')       
                    <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="#">Dashboard</a> 
                    <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="#">Permohonan</a>
                    <a class="{{ request()->is('tembusan') ? 'active' : '' }}" href="{{ url('/tembusan') }}"><img src="#">Tembusan</a>
                    <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="{{ url('/suratkeluar') }}"><img src="#">Surat Keluar</a>
                    <a class="{{ request()->is('disposisi') ? 'active' : '' }}" href="{{ url('/disposisi') }}"><img src="#">Disposisi</a>  
                    @elseif (Auth::user()->role == 'Staf')       
                    <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="#">Dashboard</a> 
                    <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="#">Permohonan</a>
                    <a class="{{ request()->is('tembusan') ? 'active' : '' }}" href="{{ url('/tembusan') }}"><img src="#">Tembusan</a>
                    <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="{{ url('/suratkeluar') }}"><img src="#">Surat Keluar</a>
                    <a class="{{ request()->is('disposisi') ? 'active' : '' }}" href="{{ url('/disposisi') }}"><img src="#">Disposisi</a>  
                    @endif
                @endif

            </div>
        </div>
    </div>