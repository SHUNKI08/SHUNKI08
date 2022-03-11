@extends('layout')
@section('title','User')

@section('content')

@guest
    <a>ログインしてください</a>
    <a href=/login></a>
@endguest
    
@auth
    <div class="base">
        <h1>ユーザーページ</h1>
        <div class="border"></div>
        
        <h2>{{ $user->name }}</h2>
        
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