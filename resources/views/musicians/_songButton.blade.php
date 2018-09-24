@if(Auth::check() && ($musician->can_be_edited || Auth::user()->is_musician && Auth::user()->id == $musician->user_id))
    <a href="{{ route('songs.create', $musician) }}"><span class="badge badge-secondary float-right">添加作品</span></a>
@endif
@if(Auth::check() && Auth::user()->is_musician && Auth::user()->id == $musician->user_id)
    @if($musician->can_be_edited)
        <a href="{{ route('musicians.canBeEdited', $musician) }}"><span class="badge badge-danger float-right">禁止他人编辑</span></a>
    @else
        <a href="{{ route('musicians.canBeEdited', $musician) }}"><span class="badge badge-success float-right">允许他人编辑</span></a>
    @endif
@endif
