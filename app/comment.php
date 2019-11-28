<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //대량 할당
    protected $fillable = [
        'commentable_type',
        'commentable_id',
        'user_id',
        'parent_id',
        'content',
    ];
    //제한
    protected $hidden = [
        'user_id',
        'commentable_type',
        'commentable_id',
        'parent_id',
    ];
    //
    protected $with = [
        'user',
        'votes'
    ];
    //접근자
    protected $appends = [
        'up_count',
        'down_count',
    ];

//////////////////// 관 계 설 정 /////////////////////////////////////////////////////////////////
    //여러 comment는 한 user를 가질 수 있음
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // ?
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->latest();
    }
    //여러 comment는 여러 parent를 가질 수 있음    
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id', 'id');
    }
    //한 comment는 여러 vote를 가질 수 있음
    public function votes() {
        return $this->hasMany(Vote::class);
    }
    //다형성 선언
    public function commentable()
    {
        return $this->morphTo();
    }

    /* Accessors */
    public function getUpCountAttribute()
    {
        return (int) $this->votes()->sum('up');
    }
    public function getDownCountAttribute()
    {
        return (int) $this->votes()->sum('down');
    }
}
