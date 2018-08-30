<div class="">
    <div class="jumbotron text-center">
        <h1 class="jumbotron-heading">{{ $musician->name }}</h1>
        <p class="lead text-muted">{{ $musician->brief }}<p>
            <!-- 如果该音乐人已认证 -->
            @if($musician->is_active)
                @include('musicians._button')
            @endif
        </p>
    </div>
</div>
