@extends('layout')
@section('title','レシピ編集')

@section('content')
<div class="container">
    
    <form class="post" action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <img class="image_path" src="https://stocoock.s3.ap-northeast-1.amazonaws.com/{{ $post->image_path }}">
        <!--//-->
        <input type='text' class="name" name='post[name]' value="{{ $post->name }}"/>
        <input type='text' class="materials" name='post[materials]' value="{{ $post->materials }}"/>
        <textarea class="recipe" rows="10" cols="60" name='post[recipe]'>{{ $post->recipe }}</textarea>
        <input type="submit" class="submit" value="更新"/>
    </form>
    
    <div class="back">
        <a href="/user">ユーザーページに戻る</a>
    </div>

</div>


<!-- CSS , Java Script -->
<link href="/css/edit.css" rel="stylesheet">
<script src="js/main.js"></script>
@endsection