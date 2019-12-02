@extends('layouts.master')

@section('content')
@php $viewName = 'programs.show'; @endphp
<div class="page-header">
    <h4>
        <a href="{{ route('programs.index') }}">
            게시글
        </a>
        <small>
            / {{ $program->id }}번째 게시글
        </small>
    </h4>
</div>
<div class ="row container__program">
    <div class="col-md-9 list__program">
        <program data-id="{{ $program->id }}">
        @include('programs.partial.program', compact('program'))
        <div>
            <p>{!! $program->content !!}</p>
        </program>
        </div>
        <div class="text-center action__program">
            @can('update', $program)
            <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-info">
                <i class="fa fa-pencil"></i>
                글 수정
            </a>
            @endcan

            @can('delete', $program)
            <button class="btn btn-danger button__delete">
                <i class="fa fa-trash-o"></i>
                글 삭제
            </button>
            @endcan
            <a href="{{ route('programs.index') }}" class="btn btn-default">
                <i class="fa fa-list"></i>
                글 목록
            </a>
        </div>
    </div>
</div>
@stop

@section('script')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.button__delete').on('click', function(e) {
    var programId = $('program').data('id');
    if (confirm('글을 삭제합니다.')) { //글을 삭제합니다 경고창에서 yes를누르면 true
        $.ajax({
            type: "DELETE",
            url: '/programs/' + programId
        }).then(function() {
            window.location.href = '/programs'; //삭제 성공시 /articles로 리다이렉션
        });
    }
});
</script>
@stop