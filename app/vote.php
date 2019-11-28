<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    public $timestamps = false;
    //대량 할당
    protected $fillable = [
        'user_id',
        'comment_id',
        'up',
        'down',
        'voted_at',
    ];
    // ?
    protected $visible = [
        'user_id',
        'up',
        'down',
    ];
    // ?
    protected $dates = [
        'voted_at',
    ];

//////////////////// 관 계 설 정 /////////////////////////////////////////////////////////////////
    //여러 vote는 여러 comment를 가질 수 있음
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    //여러 vote는 여러 user를 가질 수 있음
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* Mutators */
    //좋아요
    public function setUpAttribute($value)
    {
        $this->attributes['up'] = $value ? 1 : null;
    }
    //싫어요
    public function setDownAttribute($value)
    {
        $this->attributes['down'] = $value ? 1 : null;
    }
}
