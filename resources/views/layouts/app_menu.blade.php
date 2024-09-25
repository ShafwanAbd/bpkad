<div class="menu_left">
        <div class="menu_main">
            <div class="menu_menu flex">
                @if (request()->is('dashboard'))
                <h2>Dashboard</h2> 
                @elseif (request()->is('permohonan'))
                <h2>Permohonan</h2> 
                @elseif (request()->is('tembusan'))
                <h2>Tembusan</h2> 
                @elseif (request()->is('suratmasuk'))
                <h2>Surat Masuk</h2> 
                @elseif (request()->is('suratkeluar'))
                <h2>Surat Keluar</h2> 
                @elseif (request()->is('disposisi'))
                <h2>Disposisi</h2> 
                @elseif (request()->is('penandatanganan'))
                <h2>Penandatanganan</h2> 
                @elseif (request()->is('verifikasi'))
                <h2>Verifikasi</h2> 
                @else
                <h2>Menu</h2>
                @endif
                <a href="#"><img src="#"></a>
            </div>
            <div class="menu_item btn-group-vertical" role="group" aria-label="Vertical button group">
                @if (Auth::check())
                @if (Auth::user()->role == 'superadmin')     
                <a class="btn " href="{{ url('/dashboard') }}"><img src="#">Dashboard</a>
                <a class="btn " href="{{ url('/permohonan') }}"><img src="#">Permohonan</a>
                <a class="btn "><img src="#">Tembusan</a>
                <a class="btn "><img src="#">Surat Masuk</a>
                <a class="btn "><img src="#">Surat Keluar</a>
                <a class="btn "><img src="#">Disposisi</a> 
                @elseif (Auth::user()->role == 'admin')  
                <a class="btn "><img src="#">Dashboard</a>
                <a class="btn "><img src="#">Permohonan</a>
                <a class="btn "><img src="#">Tembusan</a>
                <a class="btn "><img src="#">Surat Masuk</a>
                <a class="btn "><img src="#">Surat Keluar</a>
                <a class="btn "><img src="#">Disposisi</a> 
                @elseif (Auth::user()->role == 'kepala bidan')  
                <a class="btn "><img src="#">Dashboard</a>
                <a class="btn "><img src="#">Permohonan</a>
                <a class="btn "><img src="#">Penandatanganan</a>
                <a class="btn "><img src="#">Verifikasi</a>
                <a class="btn "><img src="#">Disposisi</a>
                <a class="btn "><img src="#">Tembusan</a>   
                <a class="btn "><img src="#">Surat Masuk</a> 
                @elseif (Auth::user()->role == 'pejabat')  
                <a class="btn "><img src="#">Dashboard</a>
                <a class="btn "><img src="#">Permohonan</a>
                <a class="btn "><img src="#">Penandatanganan</a>
                <a class="btn "><img src="#">Verifikasi</a>  
                <a class="btn "><img src="#">Disposisi</a>  
                <a class="btn "><img src="#">Surat Masuk</a> 
                <a class="btn "><img src="#">Surat Keluar</a> 
                @elseif (Auth::user()->role == 'staf')  
                <a class="btn "><img src="#">Dashboard</a>
                <a class="btn "><img src="#">Permohonan</a>
                <a class="btn "><img src="#">Penandatanganan</a>
                <a class="btn "><img src="#">Verifikasi</a>  
                <a class="btn "><img src="#">Disposisi</a>   
                @endif
                @else   
                <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="#">Dashboard</a> 
                <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="#">Permohonan</a>
                <a class="{{ request()->is('tembusan') ? 'active' : '' }}" href="#"><img src="#">Tembusan</a>
                <a class="{{ request()->is('suratmasuk') ? 'active' : '' }}" href="#"><img src="#">Surat Masuk</a>
                <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="#"><img src="#">Surat Keluar</a>
                <a class="{{ request()->is('disposisi') ? 'active' : '' }}" href="#"><img src="#">Disposisi</a> 
                @endif

            </div>
        </div>
    </div>