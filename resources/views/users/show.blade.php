@extends('layouts.app')
@section('title', $user->name)

@section('content')
<link href="{{ asset('css/profiles.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
          <div class="">
              <div class="jumbotron text-center">
                  <h1 class="jumbotron-heading">{{ $user->name }}</h1>
                  <p class="lead text-muted">{{ $user->brief }}<p>
                      <!-- 个人资料设置 -->
                      @include('users._button')
                  </p>
              </div>
          </div>
      </div>
  </div>
@endsection
