@extends('layout')
@section('title','User')

@section('content')

@guest
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
@endguest
    
@auth
    <div class="base">
        <h1>ユーザーページ</h1>
        <div class="border"></div>
        
        <h2>{{ $user->name }}</h2>
        <label>
            <span class="name_update">ユーザーネームを更新</span>
            <input type="checkbox" name="checkbox">
            
            <div id="popup">
                <form class="name_form" action="/user" method="POST">
                    @csrf
                    @method('PUT')
                    <input type='text' class="name" name='name' value="{{ $user->name }}"/>
                    <input type='submit' value="更新"/>
                </form>
                <a class="cta" href="/"><button class="back">close</button></a>
            </div>
        </label>
        
        <div class="icon_base">
            <!--ユーザーアイコン更新機能-->
                @if ($user->user_icon == NULL)
                    <img class="user_icon_null" src="/images/user_icon_null.png" alt="null"/>
                    
                @else
                    <img class="user_icon" src="https://stocoock.s3.ap-northeast-1.amazonaws.com/{{ $user->user_icon }}"/>
                    
                @endif<!--//-->
            
            
            <form class="user_icon_form" action="/user" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- 画像アップロードフォーム -->
                <input type="file" required name="image">
                {{ csrf_field() }}
                        
                <input type="submit" value="登録"/>
            </form>
        </div>
        
        <div class="border"></div>
        
        <h3 class="email_address">メールアドレス</h3>
        <a>{{ $user->email }}</a>
        <label>
            <span class="email_update">メールアドレスを更新</span>
            <input type="checkbox" name="checkbox">
            
            <div id="popup">
                <form class="email_form" action="/user" method="POST">
                    @csrf
                    @method('PUT')
                    <input type='text' class="email" name='email' value="{{ $user->email }}"/>
                    <input type='submit' value="更新"/>
                </form>
                <a class="cta" href="/"><button class="back">close</button></a>
            </div>
        </label>
        
    </div>
        
    <div class="your_posts">
        <!--自身の投稿を表示-->
        <h2>Your Posts</h2>
        <br>
        <div class="posts">
            
            @foreach ($posts as $post)
                <div class="post">
                    <img class="image_path" src="https://stocoock.s3.ap-northeast-1.amazonaws.com/{{ $post->image_path }}">
                    <h2 class="name">{{ $post->name }}</h2>
                    <a href="/posts/{{ $post->id }}/edit">編集する</a>
                </div>
            @endforeach
            
        </div>
    </div>

@endauth

<!-- CSS , Java Script -->
<link href="/css/user.css" rel="stylesheet">
<script src="js/main.js"></script>

@endsection