@extends('layouts.app')
@section('title', $title)

@section('content')

<div class="container">
    <div class="row justify-content-center">
          <!-- 个人介绍 -->
          @include('users.info')

          <!-- 粉丝/关注人列表 -->
          <div class="col-md-10" style="margin-top: 10px;">
              <div class="card">
                  <div class="card-header">
                      <a href="#" class="tit f-ff2 f-tdn">{{ $title }}</a>
                  </div>

                  <div class="card-body">
                      @include('users.showusers')
                  </div>
                  {{ $users->links() }}
              </div>
          </div>
    </div>
</div>
@endsection
