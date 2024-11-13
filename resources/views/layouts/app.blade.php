<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Local CSS -->
    <link rel="stylesheet" href="{{ asset('css/cssShafwan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cssBalqist.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- jQuery (wajib sebelum Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CSS Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- JS Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    @php
        use App\Models\Notifikasi;
    @endphp




    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('image/logo_bpkad.png') }}">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else 
                            <li class="dropdown nav-item">
                                <a class="nav-link nav-image pt-1" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('image/Doorbell.png') }}">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end">                                     
                                    <div class="hidden">{{ $datas1 = Notifikasi::where('id_user', Auth::user()->id)->get() }}</div> 
                                    @foreach($datas1 as $key=>$val)    
                                    @if ($val->tipe == 'suratmasuk')                                
                                        <div class="hidden">{{ $datas2 = Suratmasuk::where('id', $val->id_notif_tujuan)->first() }}</div> 
                                    @elseif ($val->tipe == 'suratkeluar')
                                        <div class="hidden">{{ $datas2 = Suratkeluar::where('id', $val->id_notif_tujuan)->first() }}</div> 
                                    @elseif ($val->tipe == 'disposisi')
                                        <div class="hidden">{{ $datas2 = Disposisi::where('id', $val->id_notif_tujuan)->first() }}</div> 
                                    @elseif ($val->tipe == 'disposisi')
                                        <div class="hidden">{{ $datas2 = Disposisi::where('id', $val->id_notif_tujuan)->first() }}</div> 
                                    @elseif ($val->tipe == 'disposisi')
                                        <div class="hidden">{{ $datas2 = Disposisi::where('id', $val->id_notif_tujuan)->first() }}</div> 
                                    @endif
                                    <li><a class="dropdown-item" href="#">$datas2->perihal</a></li>
                                    @endforeach
                                </ul>
                            </li> 

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nama }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/akun') }}">
                                        Akun
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Keluar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div class="padding_navbar"> 
                @yield('content')
            </div>
        </main>
    </div>
    @yield('scripts')
</body>
</html>
