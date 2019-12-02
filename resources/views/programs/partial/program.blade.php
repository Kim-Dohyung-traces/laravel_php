<!-- 글 제목, 작성자, 날짜 등을 보여줌 -->
<div class="media">
    <div class="media-body">
        <h4 class="meida-heading">
            <a href="{{ route('programs.show', $program->id) }}">
                {{$program->title}}
            </a>
        </h4>

        <p class="text-muted">
            <i class="fa fa-user"></i> {{ $program->user->name}} ({{$program->user->email}})
            <i class="text-right">
                <i class="fa fa-clock-o"></i> {{$program->created_at->format('Y-m-d')}}
            </i>
        </p>
    </div>
</div>