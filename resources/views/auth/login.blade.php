@extends('layouts.loginPage')
@section('content')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <title>Kokeru | Login</title>

    <body style="background-image: linear-gradient(to right, #28c29a , #4f7dcc)">

        <div class="" style="background-color:#28c29a ">
            <div class="container" id="container">
                <div class="form-container log-in-container">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <h3>Login</h3><br>
                        <input id="email" type="email" placeholder="E-mail"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="password" type="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        {{-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div> --}}
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                        <button>{{ __('Login') }}</button>
                        {{-- <a href="{{ route('register') }}">Create new account</a> <br>
                        --}}
                        <a href={{ url('/') }}>
                            << Back</a>
                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-right">
                            <img src="{{ asset('img/login.png') }}" style="width: 200px" height="310px">
                        </div>
                    </div>
                </div>
            </div>
    </div @endsection
