<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Stocks</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="body"></div>
        <h1 class='yourStocks'>Your Stocks</h1>
        <h2 class='space'>
        
         <!--ストック追加ポップアップ-->
         <label class="stockRegister">
                 <span class="span">ストックを追加する</span>
                 <input type="checkbox"name="checkbox">

             <div id="popup">
                 <form action="/" method="POST">
                     @csrf
                     <label class="explain">名前を入力する</label>
                     <input type="text" required name="stock[name]" placeholder="名前"/>
                     <input type="submit" value="登録"/>
                     
                     <!--<button type="submit">登録</button>-->
                 </form>
                 <div class="back">[<a href="/">戻る</a>]</div>
             </div>
         </label>    
         
         </h2>
        
         
        <!--Stock一覧表示-->
        <div class='stocks'>
        
            @foreach ($stocks as $stock)
                <div class='stock'>
                    <h2 class='name'>{{ $stock->name }}</h2>
                </div>
            @endforeach
            
         </div>
         

         
        <!-- CSS , Java Script -->
        <link href="/css/main.css" rel="stylesheet">
        <script src="js/main.js"></script> 
   
    </body>
</html>