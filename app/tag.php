<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    //대량 할당
    protected $fillable = [
        'name', 'slug'
    ];
    
//////////////////// 관 계 설 정 /////////////////////////////////////////////////////////////////
    //여러 tag은 여러 article을 가질 수 있음
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
