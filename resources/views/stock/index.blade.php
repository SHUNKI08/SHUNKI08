@extends('layout')
@section('title','Stocoock')

@section('content')

@guest
    @include('auth.login')
@endguest

@auth
    
    <div class="grid_base">
        <h1 class='grid_YourStocks'>Your Stocks</h1>
        
            <!--ストック追加ポップアップ-->
        <label class="grid_reg">
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
        <label class="grid_src">
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
        
    </div>
    
    
    
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
    
    

@endauth

<!-- CSS , Java Script -->
<link href="/css/index.css" rel="stylesheet">
<script src="js/main.js"></script>
@endsection