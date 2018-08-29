<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link tit f-ff2 f-tdn {{ $active == 2 ? 'active' : ''}}" href="{{ route('musicians.index') }}">所有音乐人</a>
  </li>
  <li class="nav-item">
    <a class="nav-link tit f-ff2 f-tdn {{ $active == 1 ? 'active' : ''}}" href="{{ route('users.index') }}">所有用户</a>
  </li>
</ul>
