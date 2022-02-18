<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    public function stockList(Stock $stock)
    {
        return view('stock/list')->with(['stocks' => $stock->get()]);  
    }
    
    public function store(Request $request, Stock $stock)
    {
        $input = $request['stock'];
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
        return view('stock/posts')->with(['stock' => $stock->get()]);
    }
}

?>