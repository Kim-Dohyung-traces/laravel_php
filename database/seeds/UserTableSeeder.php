<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 조원 정보 seeding

        //김도형
        App\User::create([
            'userid'=>'dohyung',
            'name'=>'DoHyung Kim',
            'email'=>'dohyung@yju.ac.kr',
            'password'=>bcrypt('password'),
        ]);
        //정인식
        App\User::create([
            'userid'=>'insik',
            'name'=>'InSik Jeong',
            'email'=>'insik@yju.ac.kr',
            'password'=>bcrypt('password'),
        ]);
        //예준현
        App\User::create([
            'userid'=>'junhyun',
            'name'=>'JunHyun Ye',
            'email'=>'junhyun@yju.ac.kr',
            'password'=>bcrypt('password'),
        ]);
        //팽진솔
        App\User::create([
            'userid'=>'jinsol',
            'name'=>'JinSol Peang',
            'email'=>'jinsol@yju.ac.kr',
            'password'=>bcrypt('password'),
        ]);
        //이재영
        App\User::create([
            'userid'=>'jaeyoung',
            'name'=>'JaeYoung Lee',
            'email'=>'jaeyoung@yju.ac.kr',
            'password'=>bcrypt('password'),
        ]);
        //장준혁
        App\User::create([
            'userid'=>'junhyuk',
            'name'=>'JunHyuk Jang',
            'email'=>'junhyuk@yju.ac.kr',
            'password'=>bcrypt('password'),
        ]);
    }
}
