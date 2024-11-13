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
            <!-- <a href="#"><img src="#"></a> -->
        </div>
        <div class="menu_item btn-group-vertical" role="group" aria-label="Vertical button group">
           
            @if (Auth::check()) 
                @if (Auth::user()->role == 'Superadmin')
                
                <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="{{ asset('image/Dashboard.png') }}">Dashboard </a>
                <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="{{ asset('image/Sign Document.png') }}">Permohonan
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($permohonan as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('suratmasuk') ? 'active' : '' }}" href="{{ url('/suratmasuk') }}"><img src="{{ asset('image/Enter.png') }}">Surat Masuk
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($suratmasuk as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>  
                <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="{{ url('/suratkeluar') }}"><img src="{{ asset('image/Logout.png') }}">Surat Keluar
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($suratkeluar as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('disposisi') ? 'active' : '' }}" href="{{ url('/disposisi') }}"><img src="{{ asset('image/Document.png') }}">Disposisi
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($disposisi as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('tembusan') ? 'active' : '' }}" href="{{ url('/tembusan') }}"><img src="{{ asset('image/Documents.png') }}">Tembusan
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($tembusan as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('kelolaakun') ? 'active' : '' }}" href="{{ url('/kelolaakun') }}"><img src="{{ asset('image/Documents.png') }}">Kelola Akun</a>
                <a class="{{ request()->is('kelolakantor') ? 'active' : '' }}" href="{{ url('/kelolakantor') }}"><img src="{{ asset('image/Documents.png') }}">Kelola Kantor</a>
                
                @elseif (Auth::user()->role == 'Admin')
                
                <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="{{ asset('image/Dashboard.png') }}">Dashboard</a>
                <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="{{ asset('image/Sign Document.png') }}">Permohonan
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($permohonan as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('suratmasuk') ? 'active' : '' }}" href="{{ url('/suratmasuk') }}"><img src="{{ asset('image/Enter.png') }}">Surat Masuk
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($suratmasuk as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="{{ url('/suratkeluar') }}"><img src="{{ asset('image/Logout.png') }}">Surat Keluar
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($suratkeluar as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('disposisi') ? 'active' : '' }}" href="{{ url('/disposisi') }}"><img src="{{ asset('image/Document.png') }}">Disposisi
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($disposisi as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('tembusan') ? 'active' : '' }}" href="{{ url('/tembusan') }}"><img src="{{ asset('image/Documents.png') }}">Tembusan
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($tembusan as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                
                @elseif (Auth::user()->role == 'Kepala Badan')

                <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="{{ asset('image/Dashboard.png') }}">Dashboard</a>
                <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="{{ asset('image/Sign Document.png') }}">Permohonan
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($permohonan as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('suratmasuk') ? 'active' : '' }}" href="{{ url('/suratmasuk') }}"><img src="{{ asset('image/Enter.png') }}">Surat Masuk
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($suratmasuk as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="{{ url('/suratkeluar') }}"><img src="{{ asset('image/Logout.png') }}">Surat Keluar
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($suratkeluar as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('tembusan') ? 'active' : '' }}" href="{{ url('/tembusan') }}"><img src="{{ asset('image/Documents.png') }}">Tembusan
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($tembusan as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                @elseif (Auth::user()->role == 'Sekretaris Badan')
                
                <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="{{ asset('image/Dashboard.png') }}">Dashboard</a>
                <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="{{ asset('image/Sign Document.png') }}">Permohonan
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($permohonan as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="{{ url('/suratkeluar') }}"><img src="{{ asset('image/Logout.png') }}">Surat Keluar
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($suratkeluar as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('disposisi') ? 'active' : '' }}" href="{{ url('/disposisi') }}"><img src="{{ asset('image/Document.png') }}">Disposisi
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($disposisi as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>

                @elseif (Auth::user()->role == 'Kepala Bidang')
            
                <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="{{ asset('image/Dashboard.png') }}">Dashboard</a>
                <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="{{ asset('image/Sign Document.png') }}">Permohonan
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($permohonan as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="{{ url('/suratkeluar') }}"><img src="{{ asset('image/Logout.png') }}">Surat Keluar
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($suratkeluar as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('disposisi') ? 'active' : '' }}" href="{{ url('/disposisi') }}"><img src="{{ asset('image/Document.png') }}">Disposisi
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($disposisi as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>

                @elseif (Auth::user()->role == 'Kepala Sub Bidang')
                
                <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="{{ asset('image/Dashboard.png') }}">Dashboard</a>
                <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="{{ asset('image/Sign Document.png') }}">Permohonan
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($permohonan as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="{{ url('/suratkeluar') }}"><img src="{{ asset('image/Logout.png') }}">Surat Keluar
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($suratkeluar as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('disposisi') ? 'active' : '' }}" href="{{ url('/disposisi') }}"><img src="{{ asset('image/Document.png') }}">Disposisi
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($disposisi as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>

                @elseif (Auth::user()->role == 'Staf')
                
                <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><img src="{{ asset('image/Dashboard.png') }}">Dashboard</a>
                <a class="{{ request()->is('permohonan') ? 'active' : '' }}" href="{{ url('/permohonan') }}"><img src="{{ asset('image/Sign Document.png') }}">Permohonan
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($permohonan as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('suratkeluar') ? 'active' : '' }}" href="{{ url('/suratkeluar') }}"><img src="{{ asset('image/Logout.png') }}">Surat Keluar
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($suratkeluar as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                <a class="{{ request()->is('disposisi') ? 'active' : '' }}" href="{{ url('/disposisi') }}"><img src="{{ asset('image/Document.png') }}">Disposisi
                <div class="hidden">
                {{ $total_blumdibaca = 0 }}
                @foreach($disposisi as $key=>$val)
                    {{ $total_blumdibaca += $val->status_dibaca == 0 ? 1 : 0 }}
                @endforeach
                </div>
                @if ($total_blumdibaca > 0)
                    <span class="blum_dibaca">{{ $total_blumdibaca }}</span>
                @endif
                </a>
                @endif 
            @endif

        </div>
    </div>
</div>