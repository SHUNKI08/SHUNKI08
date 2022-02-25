<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;



class User extends Authenticatable
{
    protected $table = 'stocoock.users';
    
    protected $fillable = [
        'name', 'email', 'password',
    ];
    
    //リレーションの設定 投稿者は複数の投稿とストックを持つ。
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
        public function stocks()
    {
        return $this->hasMany('App\Stock');
    }    
    
    use Notifiable;
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
