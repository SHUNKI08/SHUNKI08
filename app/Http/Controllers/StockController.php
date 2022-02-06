<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
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
    
}
?>