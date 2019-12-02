@extends('layouts.master')

@section('content')
<div class="page-header">
    <h4>
        <a href="{{ route('programs.index') }}">
            포럼
        </a>
        <small>
            / 글 수정
            / {{ $program->title }}
        </small>
    </h4>
</div>

<form action="{{ route('programs.update', $program->id) }}" method="POST">
    {!! csrf_field() !!}
    {!! method_field('PUT') !!}

    @include('programs.partial.form')

    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">
            수정하기
        </button>
    </div>
</form>
@stop