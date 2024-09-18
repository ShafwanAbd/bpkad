@extends('layouts.app') @section('content')
<div class="container vh-100 d-flex">
    <div class="justify-content-center w-50 m-auto align-items-center shadow rounded px-5 py-4">
        <a href="{{ url('/') }}" class="h2 text-decoration-none"><span>&#60;</span></a>
        <p class="text-center text-uppercase h2 fw-bold">login</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-outline mb-4">
                <label for="email" class="fontColor1">{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> @enderror
            </div>




            <label for="password" class="fontColor1">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror



            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="text-end">
                @if (Route::has('password.request'))
                <a class="btn btn-link text-decoration-none fontColor1" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a> @endif
            </div>

            <button type="submit" class="my-3 py-2 button1 w-100 rounded-pill">
                {{ __('Login') }}
            </button>

            <p class="my-4 font-bold text-center fw-bold">Belum punya akun ? <span><a class="text-decoration-none fw-normal fontColor1" href="{{ route('register') }}">register now</a></span> </p>

        </form>
    </div>
</div>

@endsection