@extends('layout')
@section('title','材料検索結果')

@section('content')
<h2>レシピ検索結果</h2>
<p>検索材料:{{ $material }}</p>

@if(!$items->isEmpty()) //検索結果があるか確認してある時の処理
<table>
    <tr><th>材料名</th><th>料理名</th><th>レシピ</th>
    @foreach($items as item) //$itemsでコントローラーから渡された値を@foreachで表示
        <tr>
            <td>{{ $item->materials }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->recipe }}</td>
        </tr>
    @endforeach
{{ $items->appends(Request::only('material'))->links()}}
</table>
@else //検索結果があるか確認して無い時の処理
    <p>該当する料理は存在しません</p>
    <h2>レシピ検索</h2>
    <form method="GET" action="/postslist">
        <input type="text" name="material">
        <input type="submit" value="検索">
    </form>
@endif

<!-- CSS , Java Script -->
<link href="/css/AAAAAAAAAAAAAAAAAAAAAAAAAAAAAA.css" rel="stylesheet">
<script src="js/main.js"></script>
@endsection