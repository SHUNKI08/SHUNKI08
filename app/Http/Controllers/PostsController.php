<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function postList(Post $post)
    {
        return view('stock/posts')->with(['posts' => $post->get()]);  
    }
    
    public function store(Request $request, Post $post)
    {
        
        //画像アップロードに関して
        $image_path = $request->file('image');
        $path = Storage::disk('s3')->putFile('post_image',$image_path,'public');
        
        //user_idカラムについて。ログインしているuserが所持するidと同値を入力。
        $user_id = Auth::id();
        
        $input = $request['post'];
        $input += ['image_path' => $path];
        $input += ['user_id' => $user_id];
        $post->fill($input)->save();
        
        return redirect('/posts')->with(['posts' => $post->get()]);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
    
    public function posts(Post $post)
    {
        return view('stock/posts')->with(['post' => $post->get()]);
    }
    
    /*    public function image_post(Request $request, Post $post)
    {
        $post = new Post;
        $form = $request->all();
        
        //s3アップロード開始
        $image = $request->file('image_path');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('post_image', $image, 'public');
        // アップロードした画像のフルパスを取得
        $post->image_path = Storage::disk('s3')->url($path);
    
        $post->save();
    
        return redirect('stock/posts');
    }
    */

    
    /*
    public function search(Post $post)
    {
        //キーワード取得
        $keyword = $request->input('keyword', '');//デフォルトは空文字
        //キーワード検索
        $posts = Post::where('materials',"%{$keyword}%")->get()->all();
        //ページ更新時にクリエパラメータが消えないようにkeywordも渡す
        $params = array('posts' -> $posts,
                        'keyword'=> $keyword);
        return view('stock/posts',$params);
    }
    */
}

?>