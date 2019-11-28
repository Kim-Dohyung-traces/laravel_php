<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    //대량 할당
    protected $fillable = [
        'userid', 'name', 'email', 'password',
    ];
    //제한
    protected $hidden = [
        'password', 'remember_token',
    ];
    //
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//////////////////// 관 계 설 정 /////////////////////////////////////////////////////////////////
    //한 user는 하나의 member를 가질 수 있음
    public function member(){
        return $this->belongsTo(member::class);
    }
    //한 user는 여러개의 program을 가질 수 있음
    public function programs(){
        return $this->hasMany(program::class);
    }
    //한 user는 여러개의 article을 가질 수 있음
    public function articles(){
        return $this->hasMany(articles::class);
    }
    //한 user는 여러개의 comment을 가질 수 있음
    public function comments()
    {
        return $this->hasMany(comments::class);
    }
    //한 user는 여러개의 vote를 가질 수 있음
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
