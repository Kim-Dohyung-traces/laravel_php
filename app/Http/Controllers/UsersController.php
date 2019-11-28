<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('guest'); 
        //로그인 하지 않은 사람에게만 이 클래스의 메서드 사용을 허용함
        //즉, 로그인 한 사람은 회원가입 주소에 접근할 수 없도록 함
    }
    
    public function create() {
        return view('users.create');
    }
    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'userid' => 'required|max:30',
        ]);

        $user = \App\User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
            'userid'=>$request->input('userid'),
        ]);
        auth()->login($user);
        flash(auth()->user()->name . '님 꽉 환영한다구?!');
        return redirect('home');
    }
    // protected function respondError($message)
    // {
    //     flash()->error($message);
    //     return back()->withInput();
    // }
}