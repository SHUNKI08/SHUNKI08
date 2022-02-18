@extends('layout')
@section('title','Stocoock')

@section('content')
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
</span>

<!--Stock一覧表示-->
<div class='stocks'>

    @foreach ($stocks as $stock)
        <div class='stock'>
            <h2 class='name'>{{ $stock->name }}</h2>
            <a class='created_at'>{{ $stock->created_at }}</a>
            
            <!--削除ボタン / 検索ボタン-->
            <ui class="buttons">
               <li><form action="/stocks/{{ $stock->id }}" id="form_{{ $stock->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="delet_button" type="submit">delete</button>
                </form></li>
                <li><button class="search">検索</button></li>
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

<!-- CSS , Java Script -->
<link href="/css/list.css" rel="stylesheet">
<script src="js/main.js"></script>
@endsection