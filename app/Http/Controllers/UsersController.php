<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function mypage(User $user)
    {
        $user = Auth::user();
        return view('stock.user', compact('user'));
    }
    
    
        
}

?>