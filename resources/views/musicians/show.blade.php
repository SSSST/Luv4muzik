@extends('layouts.app')
@section('title', $musician->name)

@section('content')
<link href="{{ asset('css/profiles.css') }}" rel="stylesheet">

<!-- 音乐人信息 -->
<div class="container">
    <div class="row justify-content-center">
          <!-- 音乐人介绍 -->
          @include('musicians._info')

          <!-- 作品介绍 -->
          <div class="col-md-8" style="margin-top: 10px;">
              <div class="card">
                  <div class="card-header">
                      <a href="#" class="tit f-ff2 f-tdn">他的作品</a>
                      @if(Auth::check() && ($musician->can_be_edited || $musician->is_active))
                          <a href="#"><span class="badge badge-secondary float-right">添加作品</span></a>
                      @endif
                  </div>

                  <div class="card-body">
                      @include('musicians.songs')
                  </div>
              </div>
          </div>

          <div class="col-md-3" style="margin-top: 10px;">
              <div class="card">
                  <div class="card-header">
                      hello
                  </div>
              </div>
          </div>
      </div>
</div>
@endsection
