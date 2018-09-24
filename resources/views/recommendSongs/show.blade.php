@extends('layouts.app')
@section('title', $recommendSong->name)

@section('content')
<div class="container">
    <div class="justify-content-center">
      <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">{{ $recommendSong->name }}</h2>
        <p class="lead">推荐人：<a href="{{ route('users.show', $recommendSong->user_id) }}" style="color:white">{{ $recommendSong->user->name}}</a></p>
        <p class="lead">推荐歌曲：
            @if($recommendSong->song_id)
                <a href="{{ route('songs.show', $recommendSong->song_id) }}" style="color:white">{{ $recommendSong->song_name }}</a>
            @else
                {{ $recommendSong->song_name }}
            @endif
        </p>
        <p class="lead">{{ $recommendSong->brief}}</p>
      </div>
      <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: auto; border-radius: 21px 21px 0 0;">
          <p style="color:black"><pre>{{ $recommendSong->body }}</pre></p>
      </div>
    </div>
    </div>
</div>
@endsection
