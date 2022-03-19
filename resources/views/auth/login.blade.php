@extends('layout')
@section('title','Login')
@section('content')
<div class="container">
    
    <div class="card-base">
        <div class="card-header">{{ __('Login Form') }}</div>
        
        <div class="border"></div>
        
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="txt_field">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="txt_field">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="btn">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn-login">
                            {{ __('Login') }}
                        </button>
                        
                        <br>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        
                        
                    </div>
                </div>
            </form>
        </div>        
    </div>
    
    <div class="card-base-register">
        <div class="card-header">{{ __('Not yet a Member?') }}</div>

        <div class="border"></div>
        
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="register-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    </div>

</div>

<!-- CSS , Java Script -->
<link href="/css/login.css" rel="stylesheet">
<script src="js/main.js"></script>
@endsection