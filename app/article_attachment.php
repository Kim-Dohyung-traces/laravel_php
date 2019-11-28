<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article_attachment extends Model
{
    //대량 할당
    protected $fillable = [
        'filename',
        'bytes',
        'mime',
    ];
    //제한 
    protected $hidden = [
        'article_id',
        'created_at',
        'updated_at',
    ];
    //접근자 
    protected $appends = [
        'url',
    ];

//////////////////// 관 계 설 정 /////////////////////////////////////////////////////////////////
    //여러 article_attachment은 한 article을 가질 수 있음
    public function article()
    {
        return $this->belongsTo(article::class);
    }
    //파일 사이즈를 받아옴 
    public function getBytesAttribute($value)
    {
        return format_filesize($value);
    }
    //저장 위치를 받아옴 
    public function getUrlAttribute()
    {
        return url('files/' . $this->filename);
    }
}