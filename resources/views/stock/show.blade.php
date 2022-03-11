@extends('layout')
@section('title','レシピ詳細')

@section('content')
<br>
<div class="post">
    <img class="image_path" src="https://stocoock.s3.ap-northeast-1.amazonaws.com/{{ $post->image_path }}">
    <h2 class="name">{{ $post->name }}</h2>
    <br>
    <h4 class="materials">{{ $post->materials }}</h4>
    <br>
    <a  class="recipe">{{ $post->recipe }}</a>
</div>

<div class="back">
    <a href="/posts">レシピ一覧に戻る</a>
</div>


<!-- CSS , Java Script -->
<link href="/css/show.css" rel="stylesheet">
<script src="js/main.js"></script>
@endsection