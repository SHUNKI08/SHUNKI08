<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    //テーブル名
    protected $table = 'posts';
    
    //可変項目
    protected $fillable =[
        'name','recipe','materials','image_path','user_id'
    ];
    
    //リレーションの設定。投稿は一つのユーザーに従属する。
    public function user()
    {
        return $table->belongsTo('App\User');
    }

    public function getByLimit(int $limit_count = 10)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
}
