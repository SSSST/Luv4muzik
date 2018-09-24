@extends('layouts.app')
@section('title', '添加推荐作品')

@section('content')
<link href="{{ asset('css/profiles.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="card card-default">
                <div class="card-header">添加推荐作品</div>
                <div class="card-body">
                    @include('shared._errors')
                    <form method="POST" action="{{ route('recommendSongs.store')}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title">标题：</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="recommend_song">推荐作品：</label>
                            <input type="text" name="recommend_song" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="brief">简介：</label>
                            <input type="text" name="brief" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="body">推荐语：</label>
                            <textarea type="text" name="body" class="form-control" rows=5></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">添加</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
