<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function postList(Post $post)
    {
        return view('stock/posts')->with(['posts' => $post->get()]);  
    }
    
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts');
        
        //画像アップロードに関して
        $image_path = $request->file('post[image_path]');
        $path = Storage::desk('s3')->putFile('post_image/',$image_path,'public');
        $full_path->image_path = Storage::desk('s3')->url($path);
        $full_path->fill($input)->save();
        
        return redirect('stock/posts');
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