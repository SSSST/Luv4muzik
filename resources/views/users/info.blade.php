<div class="">
    <div class="jumbotron text-center">
        <h1 class="jumbotron-heading">{{ $user->name }}</h1>
        <p class="lead text-muted">{{ $user->brief }}<p>
            <!-- 个人资料设置 -->
            @include('users._button')
        </p>
    </div>
</div>
