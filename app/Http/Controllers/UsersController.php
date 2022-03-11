<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function mypage(User $user)
    {
        $user = Auth::user();
        
        $user_id = Auth::id();
        $posts = Post::where('user_id',$user_id)->get();
        
        return view('stock/user', compact('user','posts'));
    }
    
    public function store(Request $request, User $user)
    {
        
        //画像アップロードに関して
        $icon_path = $request->file('image');
        $path = Storage::disk('s3')->putFile('user_icon',$icon_path,'public');
        
        $input=User::find(Auth::id());
        $input->fill([ 'user_icon'=>$path ])->save();
        
        return redirect('/user');
    }
    
    public function update(Request $request, User $user)
    {
        $user_form = $request->all();
        $user = Auth::user();
        unset($user_form['_token']);
        $user->fill($user_form)->save();
        return redirect('/user');
    }
    
        
}

?>