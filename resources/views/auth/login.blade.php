@extends('layouts.app_wo_navbar') @section('content')
<div class="login_container">

    <div class="login_form_container">
        <img src="{{ asset ('image/logo2_ bpkad.png') }}" alt="Logo" class="logo_img">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>{{ __('Login') }}</h1>

            <input type="nip" name="nip" placeholder="NIP" required autofocus>

            <div class="password-container">
                <input id="password" type="password" name="password" placeholder="Kata Sandi" required>
                <button type="button" onclick="togglePassword()">Lihat</button>
            </div>

            <a href="{{ route('password.request') }}">{{ __('Lupa Kata Sandi') }}</a>
            <button type="submit">{{ __('Masuk') }}</button>
        </form>
    </div>


    <div class="login_image_container"></div>

</div>

<script>
    function togglePassword() {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>

@endsection