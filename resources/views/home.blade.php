@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">推荐歌曲</div>

                <div class="card-body">
                    ...
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
                <div class="card-header"><a href="{{ route('users.index') }}" class="tit f-ff2 f-tdn">推荐音乐人</a></div>

                <div class="card-body">
                    @include('users.showusers')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
