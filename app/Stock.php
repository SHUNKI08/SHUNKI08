<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use SoftDeletes;
    
    //テーブル名
    protected $table = 'stocoock.stocks';
    
    //可変項目
    protected $fillable =[
        'name','user_id'
    ];
    
    //リレーションの設定。ストックは一つのユーザーに従属する。
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
