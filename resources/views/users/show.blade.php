@extends('layouts.app')
@section('title', $user->name)

@section('content')
<link href="{{ asset('css/profiles.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
          <!-- 个人介绍 -->
          @include('users.info')

          <!-- 推荐目录 -->
          <div class="col-md-10" style="margin-top: 10px;">
              <div class="card">
                  <div class="card-header">
                      <a href="{{ route('users.recommendSongs', $user) }}" class="tit f-ff2 f-tdn">推荐目录</a>
                  </div>

                  <div class="card-body">
                      @include('users.recommend')
                  </div>
              </div>
          </div>
    </div>
</div>
@endsection
