<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class SessionsController extends Controller
{
    public function __contruct() {
        $this->middleware('guest', ['except' => 'destroy']);
    }
    public function create() {
        return view('sessions.create');
    }
    
    public function store(Request $request) {
        $this->validate($request, [
            'userid'=>'required',
            'password'=>'required|min:6',
        ]);
        if(!auth()->attempt($request->only('userid', 'password'), $request->has('remember'))) {
            flash('이메일 또는 비밀번호가 맞지 않습니다.');
            return back()->withInput();
        }
        //flash(auth()->user()->name . '님, 환영합니다.');
        return redirect('/');
    }
    public function destroy() {
        auth()->logout();
        flash('또 방문해줄거지?'); 
    }
    // protected function respondError($message)
    // {
    //     flash()->error($message);
    //     return back()->withInput();
    // }
}