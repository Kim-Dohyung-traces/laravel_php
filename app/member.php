<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    //대량 할당
    protected $fillable =[
        'title','content',
    ]; // MassAssignment 대응 

//////////////////// 관 계 설 정 /////////////////////////////////////////////////////////////////
    //한 member는 하나의 user를 가질 수 있음
    public function user(){
        return $this->belongsTo(User::class);
    }
    //한 member는 하나의 member_attachments을 가질 수 있음
    public function member_attachments()
    {
        return $this->belongsTo(member_attachment::class);
    }
}
