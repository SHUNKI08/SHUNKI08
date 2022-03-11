<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
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
    
    public function show(Post $post)
    {
        return view('stock/show')->with(['post' => $post]);
    }    

    //user関連
    //自分の投稿表示
    public function yourPost(Post $post)
    {
        
        $user_id = Auth::id();
        $post = Post::where('user_id',$user_id)->get();
        
        return view('stock/user')->with(['posts' => $post]);
    }
    
    public function edit(Post $post)
    {
        return view('stock/edit')->with(['post' => $post]);
    }
    
    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/user');
    }

}

?>