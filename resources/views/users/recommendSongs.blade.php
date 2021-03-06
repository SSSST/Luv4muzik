@extends('layouts.app')
@section('title', '所有推荐')

@section('content')
<!-- 个人信息 -->
<div class="container">
    <div class="row justify-content-center">
          <!-- 个人介绍 -->
          @include('users.info')

          <!-- 推荐作品 -->
          <div class="col-md-10" style="margin-top: 10px;">
              <div class="card">
                  <div class="card-header">
                      <a href="{{ route('users.recommendSongs', $user) }}" class="tit f-ff2 f-tdn">所有推荐</a>
                  </div>

                  <div class="card-body">
                      @include('users.recommend')
                  </div>
                  {{ $recommend_songs->links() }}
              </div>
          </div>

    </div>
</div>
@endsection
