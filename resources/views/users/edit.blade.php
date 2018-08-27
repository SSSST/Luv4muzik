@extends('layouts.app')
@section('title', '修改密码')

@section('content')
<link href="{{ asset('css/profiles.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="card card-default">
                <div class="card-header">修改密码</div>
                <div class="card-body">
                    @include('shared._errors')
                    <form method="POST" action="{{ route('users.password', $user) }}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="old-password">旧密码：</label>
                            <input type="password" name="old-password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">新密码：</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">确认新密码：</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">修改密码</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
