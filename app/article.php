<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    //대량 할당 
    protected $fillable = [
        'title', 'content',
    ];

//////////////////// 관 계 설 정 ///////////////////////////////////////////////////////////////////
    //여러 article은 한 user를 가질 수 있음
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //한 article은 여러 article_attachment을 가질 수 있음
    public function article_attachments()
    {
        return $this->hasMany(article_attachment::class);
    }
    //한 article은 여러 tag를 가질 수 있음
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
}