<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function __construct()
    {
        //로그인 하지 않아도 index(홈), show(뷰)는 볼 수 있음
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index()
    {
        $query = new \App\Program;
        $programs = $query->latest()->paginate(10);
        return view('programs.index', compact('programs'));
        //compact()는 배열을 만들어줌.
    }
    public function create()        
    {
        $program = new \App\Program;
        return view('Programs.create', compact('program'));
    }
    public function store(\App\Http\Requests\ProgramsRequest $request)
    {
        //작성을 요청한 유저의 게시판을 만듬(작성을 요청한 정보의 모든 속성을 $article에 대입)
        $program = $request->user()->programs()->create($request->all());
        //$program auth()->user()->articles()->create()를 호출함
        //==> 로그인한 유저의 게시판을 작성
        if (!$program) {
            flash()->error('글 작성 실패');
            return back()->withInput();
        }
        
        event(new \App\Events\ProgramCreated($program));
        flash()->success('게시판을 생성하였습니다.');
        //이벤트를 발생시킴 
        // var_dump('이벤트 발생완료');
        return redirect(route('programs.index'))
            ->with('flash_message', '글작성 성공!');
    }
    public function show(\App\Program $program)           
    {
        return view('programs.show', compact('program'));
    }

    public function edit(\App\Program $program)
    {
        $this->authorize('update', $program);
        return view('programs.edit', compact('program'));
    }
    public function update(\App\Http\Requests\ProgramsRequest $request, \App\Program $program)
    {
        $this->authorize('update', $program);
        flash()->success('수정하신 내용을 저장했습니다.');
        $program->update($request->all());
        //store메서드에도 있음
        
        return redirect(route('programs.index', $program->id));
    }
    public function destroy(\App\Program $program)
    {
        $this->authorize('delete', $program);
        flash()->success('게시판 삭제를 완료했습니다.');
        $program->delete();
        return response()->json([],204);
    }
}
