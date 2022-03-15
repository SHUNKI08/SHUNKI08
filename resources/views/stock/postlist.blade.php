@extends('layout')
@section('title','材料検索結果')

@section('content')
<h2>検索結果</h2>
<h3>検索ワード : {{$material}}</h3>
<br>
<div class="posts">

    @foreach ($items as $item)
    
        <div class="post">
            <img class="image_path" src="https://stocoock.s3.ap-northeast-1.amazonaws.com/{{ $item->image_path }}">
            <h2 class="name">{{ $item->name }}</h2>
            <h4 class="materials">{{ $item->materials }}</h4>
            <a href="/posts/{{ $item->id }}">レシピを見る</a>
        </div>
    @endforeach
    
</div>

<!-- CSS , Java Script -->
<link href="/css/postlist.css" rel="stylesheet">
<script src="js/main.js"></script>
@endsection

