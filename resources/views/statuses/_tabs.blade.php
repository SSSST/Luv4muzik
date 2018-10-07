<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link tit f-ff2 f-tdn {{ $active == 2 ? 'active' : ''}}" href="{{ route('statuses.followings') }}">所有关注人动态</a>
  </li>
  <li class="nav-item">
    <a class="nav-link tit f-ff2 f-tdn {{ $active == 1 ? 'active' : ''}}" href="{{ route('statuses.index') }}">所有动态</a>
  </li>
</ul>
