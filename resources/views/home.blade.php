@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('recommendSongs.index') }}" class="tit f-ff2 f-tdn">推荐歌曲</a></div>

                <div class="card-body">
                    @if(count($recommendSongs))
                        @include('recommendSongs.showRecommendSongs')
                    @else
                        还没有推荐歌曲哦~
                    @endif
                </div>
            </div>

            </br>
            <div class="card">
                <div class="card-header">推荐歌单</div>

                <div class="card-body">
                    ...
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><a href="{{ route('musicians.index') }}" class="tit f-ff2 f-tdn">推荐音乐人</a></div>

                <div class="card-body">
                    @if(count($musicians))
                        @include('musicians.showmusicians')
                    @else
                        还没有音乐人哦~
                    @endif
                </div>

                @if(Auth::check())
                    <div class="card-footer">
                        <a href="{{ route('musicians.create') }}"><span class="badge badge-secondary">添加音乐人</span></a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
