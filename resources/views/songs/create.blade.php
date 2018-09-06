@extends('layouts.app')
@section('title', '添加作品')

@section('content')
<link href="{{ asset('css/profiles.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="card card-default">
                <div class="card-header">添加作品</div>
                <div class="card-body">
                    @include('shared._errors')
                    <form method="POST" action="{{ route('songs.store', $musician->id)}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">作品名称：</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="brief">作品简介：</label>
                            <input type="text" name="brief" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="lyric">歌词：</label>
                            <textarea type="text" name="lyric" class="form-control" rows=5></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">添加</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
