@extends('layouts.master')

@section('content')
<div class="page-header">
    <h4>
        <a href="{{ route('programs.index') }}">
            포럼
        </a>
        <small>
            / 글 목록
        </small>
    </h4>
</div>

<div class="text-right action__program">
    <a href="{{ route('programs.create') }}" class="btn btn-primary">
        <i class="fa fa-plus-circle"></i>
        새 글 쓰기
    </a>
</div>

<div class="row container__program">
    <div class="col-md-9 list__program">
        <div>
            <!-- 게시글판의 글 목록 -->
            @forelse($programs as $program)
            @include('programs.partial.program', compact('program'))
            @empty
            <p class="text-center text-danger">
                글이 없습니다.
            </p>
            @endforelse
        </div>

        @if($programs->count())
        <div class="text-center paginator__program">
            {!! $programs->appends(request()->except('page'))->render() !!}
        </div>
        @endif
    </div>
</div>

@stop