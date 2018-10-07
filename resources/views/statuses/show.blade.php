@extends('layouts.app')
@section('title', '个人动态')

@section('content')

<div class="container">
    <div class="row justify-content-center">
          <!-- 个人介绍 -->
          @include('users.info')

          <!-- 个人动态 -->
          <div class="col-md-10" style="margin-top: 10px;">
              <div class="card">
                  <div class="card-header">
                      <a href="#" class="tit f-ff2 f-tdn">个人动态</a>
                  </div>

                  <div class="card-body">
                          @include('statuses._status')
                  </div>
                  {{ $statuses->links() }}
              </div>
          </div>
    </div>
</div>
@endsection
