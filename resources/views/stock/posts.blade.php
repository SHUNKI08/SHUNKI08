@extends('layout')
@section('title','Posts')

@section('content')
<span class="postsHeader">
    <h1 class="PostsList">Posts List</h1>
    <label>
    <img class="reg__png"src="/images/stockRegister.png">
    <input type="checkbox"name="checkbox">
    
        <div id="popup">
            
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="explain">追加する投稿レシピの名前を入力してください。</label>
                <input class="name_form"type="text" required name="post[name]" placeholder="名前"/>
                <input class="materials_form"type="text" required name="post[materials]" placeholder="材料"/>
                <textarea class="recipe_form"rows="10" cols="60" required name="post[recipe]" placeholder="レシピ"></textarea>
                
                <!-- 画像アップロードフォーム -->
                <input type="file" required name="image">
                {{ csrf_field() }}
                
                <input type="submit" value="登録"/>
            </form>
            
            <a class="cta" href="/posts"><button class="back">close</button></a>
        </div>
    </label>
</span>

<div class="posts">

    @foreach ($posts as $post)
    <label>
        <div class="post">
            <img class="image_path" src="https://stocoock.s3.ap-northeast-1.amazonaws.com/{{ $post->image_path }}">
            <h2 class="name">{{ $post->name }}</h2>
            <h4 class="materials">{{ $post->materials }}</h4>
            <a href="/posts/{{ $post->id }}">レシピを見る</a>

            <!--削除ボタン / 検索ボタン-->
            <!--<ui class="buttons">
               <li><form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="delet_button" type="submit">delete</button>
                </form></li>
                <li><button class="search">検索</button></li>
            </ui> -->           
        </div>
    </label>    
    <br>
    @endforeach
    
</div>


<!-- CSS , Java Script -->
<link href="/css/posts.css" rel="stylesheet">
<script src="js/main.js"></script>
@endsection