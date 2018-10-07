@if (Auth::user()->isFollowing($user->id))
    <a href="{{ route('followers.destroy', $user->id) }}"><span class="btn btn-danger">取消关注</span></a>
@else
    <a href="{{ route('followers.store', $user->id) }}"><span class="btn btn-primary">关注</span></a>
@endif
