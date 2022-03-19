@extends('layout')
@section('title','Stocoock')

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
    <span class="stocksHeader">
        <h1 class='yourStocks'>Your Stocks</h1>
        
    <!--ストック追加ポップアップ-->
        <label class="stockRegister">
            <img class="reg__png"src="/images/stockRegister.png">
            <input type="checkbox"name="checkbox">
            <div id="popup">
                <form action="/" method="POST">
                    @csrf
                    <label class="explain">追加するストックの名前を入力してください。</label>
                    <div class="name_form">
                        <input calss="name_form_bar"type="text" required name="stock[name]" placeholder="名前"/>
                        <input type="submit" value="登録"/>
                    </div>
                </form>
                <a class="cta" href="/"><button class="back">close</button></a>
            </div>
        </label>
    
    <!--検索フォームポップアップ-->
        <label class="stockSearch">
            <img class="src__png"src="/images/icon_search.png">
            <input type="checkbox"name="checkbox">
            <div id="popup">
                <form action="/postlist" method="GET">
                    @csrf
                    <label class="explain">検索したい材料を入力してください。</label>
                    <div class="name_form">
                        <input class="name_form_bar"type="text" name="material">
                        <input type="submit" value="検索">
                    </div>
                </form>
                <a class="cta" href="/"><button class="back">close</button></a>
            </div>
        </label>
    
    </span>
    
    
    <!--検索フォームポップアップ-->
        <label class="stockSearch">
            <img class="src__png"src="/images/icon_search.png">
            <input type="checkbox"name="checkbox">
            <div id="popup">
                <form action="/postlist" method="GET">
                    @csrf
                    <label class="explain">検索したい材料を入力してください。</label>
                    <div class="name_form">
                        <input class="name_form_bar"type="text" name="material">
                        <input type="submit" value="検索">
                    </div>
                </form>
                <a class="cta" href="/"><button class="back">close</button></a>
            </div>
        </label>
    
    
    
    <!--Stock一覧表示-->
    <div class='stocks'>
    
        @foreach ($stocks as $stock)
            <div class='stock'>
                <h2 class='name'>{{ $stock->name }}</h2>
                <a class='created_at'>{{ $stock->created_at }}</a>
                <!--削除ボタン / 検索ボタン-->
                <ui class="buttons">
                    <li>
                       <form action="/stocks/{{ $stock->id }}" id="form_{{ $stock->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="delete_button" type="submit"><img class=one_buttons src="images/delete.png" alt="削除"/></button>
                        </form>
                    </li>
                    <li>
                        <form action="/postlist" method="GET">
                            <button class="search_button" value="{{ $stock->name }}" name="search"><img class=one_buttons src="images/icon_search.png" alt="検索"/></button>
                        </form>
                    </li>
                </ui>
            </div>
            <br>
        @endforeach
        
    </div>
    
    
    <!--画面右側に表示される、postsウィジェット-->
    <div class="body_posts">
        <div class="body_posts_style">
            <h2 class="body_posts_title">Posts</h3>
            <h3>contents</h3>
        </div>         
    </div>
@endauth

<!-- CSS , Java Script -->
<link href="/css/index.css" rel="stylesheet">
<script src="js/main.js"></script>
@endsection