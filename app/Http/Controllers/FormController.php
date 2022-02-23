<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as FormRequest;
use App\Form; //Formモデル

class FormController extends Controller
{
    public function postlist(Request $request) //検索フォームより値を受け取り一覧表示処理
    {
        $material = FormRequest::get('material');
        
        //dd($material);
        if ($material) //材料が入力されている場合
        {
            
            $item = Form::where('materials','LIKE',"%" .$material. "%")->get();
            
            
            //where()でFormモデルを利用。テーブルのmaterialsカラムが入力したpostsの材料を検索
            //simplePaginate(表示数)
        }else //材料が入力されていない場合
        {
            $item = Form::select('*')->simplePaginate(10);
            //材料がない場合は全件表示
            $material='全件表示';
    
        }
        
        //dd($item);
        return view('stock.postlist', compact('item'))->with('items',$item);
        //一覧のpostlist.blade.phpを表示させる時に$itemに格納された結果と検索ワードを渡す
    }
}
