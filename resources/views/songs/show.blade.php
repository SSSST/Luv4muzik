@extends('layouts.app')
@section('title', $song->name)

@section('content')
<div class="container">
    <div class="justify-content-center">
      <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">{{ $song->name }}</h2>
        <p class="lead">原创音乐人：<a href="{{ route('musicians.show', $song->musician_id) }}" style="color:white">{{ $song->musician->name}}</a></p>
        <p class="lead">{{ $song->brief}}</p>
      </div>
      <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: auto; border-radius: 21px 21px 0 0;">
          <p style="color:black"><pre>{{ $song->lyric }}</pre></p>
      </div>
    </div>
    </div>
</div>
@endsection
