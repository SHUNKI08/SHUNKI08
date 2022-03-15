<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StocksController extends Controller
{
    public function stockList(Stock $stock)
    {
        $user_id = Auth::id();
        $stock = Stock::where('user_id',$user_id)->get();
        
        return view('stock/index')->with(['stocks' => $stock]);  
    }
    
    public function store(Request $request, Stock $stock)
    {
        //user_idカラムについて。ログインしているuserが所持するidと同値を入力。
        $user_id = Auth::id();
        
        $input = $request['stock'];
        $input += ['user_id' => $user_id];
        $stock->fill($input)->save();
        return redirect('/');
    }
    
    public function delete(Stock $stock)
    {
        $stock->delete();
        return redirect('/');
    }
    
    public function posts(Stock $stock)
    {
        return view('stock/postlist',['items' => $item])->with(['stock' => $stock->get()]);
    }
}

?>