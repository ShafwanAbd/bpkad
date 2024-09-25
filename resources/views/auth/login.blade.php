@extends('layouts.app') @section('content')
<div class="login_container">

    <div class="login_form_container">
        <img src="{{ asset ('image/logo2_ bpkad.png') }}" alt="Logo" class="logo_img">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>{{ __('Login') }}</h1>

            <input id="email" type="email" name="email" placeholder="Email" required autofocus>
            <input id="password" type="password" name="password" placeholder="Password" required>

            <a href="{{ route('password.request') }}">{{ __('Lupa Kata Sandi') }}</a>
            <button type="submit">{{ __('Masuk') }}</button>
        </form>
    </div>


    <div class="login_image_container"></div>

</div>
@endsection