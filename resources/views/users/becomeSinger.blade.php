@extends('layouts.app')
@section('title', '成为音乐人')

@section('content')
<link href="{{ asset('css/profiles.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="card card-default">
                <div class="card-header">成为音乐人</div>
                <div class="card-body">
                    @include('shared._errors')
                    <form method="POST" action="{{ route('users.musicianStore', $user) }}">
                        <!-- {{ method_field('PATCH') }} -->
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">音乐人名称：</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="brief">音乐人简介：</label>
                            <input type="text" name="brief" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="is_exist">是否允许他人编辑资料</label>
                                <input type="radio" name="can_be_edited" value="1"/>
                        </div>

                        <button type="submit" class="btn btn-primary">提交申请</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
