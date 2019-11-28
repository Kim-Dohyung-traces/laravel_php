<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function __construct()
    {
        //로그인 하지 않아도 index(홈), show(뷰)는 볼 수 있음
        //$this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index($slug = null)
    {
        return view('programs.index', compact('programs'));
        //compact()는 배열을 만들어줌.
    }
    public function create()        
    {

    }
    public function store(\App\Http\Requests\ArticlesRequest $request)
    {

    }
    public function show(\App\Article $article)           
    {

    }
    public function edit(\App\Article $article)
    {

    }
    public function update(\App\Http\Requests\ArticlesRequest $request, \App\Article $article)
    {

    }
    public function destroy(\App\Article $article)
    {

    }
}
