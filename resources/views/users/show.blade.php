@extends('layouts.app')
@section('title', $user->name)

@section('content')

<div class="container">
    <div class="row justify-content-center">
          <!-- 个人介绍 -->
          @include('users.info')

          <!-- 个人动态 -->
          <div class="col-md-10" style="margin-top: 10px;">
              <div class="card">
                  <div class="card-header">
                      <a href="{{ route('statuses.show', $user->id) }}" class="tit f-ff2 f-tdn">个人动态</a>
                  </div>

                  <div class="card-body">
                          @include('statuses._status')
                  </div>
              </div>
          </div>

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
