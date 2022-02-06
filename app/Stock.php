<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //テーブル名
    protected $table = 'stocks';
    
    //可変項目
    protected $fillable =[
        'name',
    ];

    public function getByLimit(int $limit_count = 10)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    

    
}
