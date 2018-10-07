@extends('layouts.app')
@section('title', '所有作品')

@section('content')
<!-- 音乐人信息 -->
<div class="container">
    <div class="row justify-content-center">
          <!-- 音乐人介绍 -->
          @include('musicians._info')

          <!-- 作品介绍 -->
          <div class="col-md-10" style="margin-top: 10px;">
              <div class="card">
                  <div class="card-header">
                      <a href="{{ route('musicians.showSongs', $musician) }}" class="tit f-ff2 f-tdn">所有作品</a>
                      @include('musicians._songButton')
                  </div>

                  <div class="card-body">
                      @include('musicians.songs')
                  </div>
                  {{ $songs->links() }}
              </div>
          </div>

    </div>
</div>
@endsection
