<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class program extends Model
{
    //대량 할당
    protected $fillable = [
        'title', 'content',
    ];
    
//////////////////// 관 계 설 정 /////////////////////////////////////////////////////////////////
    //여러 프로그램은 한 유저를 가질 수 있음
    public function user(){
        return $this->belongsTo(User::class);
    }
    //한 프로그램은 여러 첨부파일을 가질 수 있음
    public function program_attachments()
    {
        return $this->hasMany(program_attachment::class);
    }
}
