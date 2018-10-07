<div class="flex">
    <a href="{{ route('users.followings', $user->id) }}" class="p-2 text-muted">关注：
      <strong id="following">
        {{ count($user->followings) }}
      </strong>
    </a>

    &nbsp;&nbsp;
    <a href="{{ route('users.followers', $user->id) }}" class="p-2 text-muted">粉丝：
      <strong id="followers">
        {{ count($user->followers) }}
      </strong>
    </a>
</div>
