<!-- Button trigger modal -->
@can('update', $musician)
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateBrief">
    修改音乐人介绍
</button>
@endcan
@if($musician->is_active)
    <a href="{{ route('users.show', $musician->user) }}" class="btn btn-secondary my-2">个人主页</a>
@endif

<!-- Modal -->
<div class="modal fade" id="updateBrief" role="dialog" tabindex="-1"aria-labelledby="updateBriefLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <form action="{{ route('musicians.update',$musician->id)}}" method="POST">
              {{ method_field('PATCH') }}
              {{ csrf_field() }}
              <div class="modal-header">
                  <h5 class="modal-title" id="updateBriefLabel">修改音乐人介绍</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <label for="brief">(30字以内)</label>
                      <textarea name="brief" raws="2" class="form-control">{{ $musician->brief }}</textarea>
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
