<!-- Button trigger modal -->
@can('update', $user)
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateBrief">
    修改个人介绍
</button>
@endcan

@if(! $user->is_musician)
    @if(Auth::check() && $user->id == Auth::user()->id)
        <a href="{{ route('users.musician', $user) }}" class="btn btn-secondary my-2">成为音乐人</a>
    @endif
@else
    <a href="{{ route('musicians.show', $user->musician) }}" class="btn btn-secondary my-2">音乐人主页</a>
@endif
<!-- 关注/取关 -->
@if(Auth::check() && Auth::user()->id !== $user->id)
    @include('users._follow_form')
@endif

<!-- Modal -->
<div class="modal fade" id="updateBrief" role="dialog" tabindex="-1"aria-labelledby="updateBriefLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <form action="{{ route('users.update',$user->id)}}" method="POST">
              {{ method_field('PATCH') }}
              {{ csrf_field() }}
              <div class="modal-header">
                  <h5 class="modal-title" id="updateBriefLabel">修改个人介绍</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <label for="brief">(30字以内)</label>
                      <textarea name="brief" raws="2" class="form-control">{{ $user->brief }}</textarea>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                  <button type="submit" class="btn btn-primary">修改</button>
              </div>
          </form>
          </div>
    </div>
</div>
