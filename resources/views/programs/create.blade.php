@extends('layouts.master')

@section('content')
<h1>새 포럼 글 쓰기</h1>

<hr />
<!-- 인코딩 타입변경-->
<form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data" class="form__program">
    {!! csrf_field() !!}

    @include('programs.partial.form')

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">
            저장하기
        </button>
    </div>
</form>
@stop