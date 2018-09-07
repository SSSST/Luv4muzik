@foreach($recommendSongs as $recommendSong)
    <a href="{{ route('recommendSongs.show', $recommendSong->id) }}" class="list-group-item-action flex-column align-items-start">
        <h5 class="mb-1">{{ $recommendSong->title }}</h5>
        <p class="mb-1">推荐人： <a href="{{ route('users.show', $recommendSong->user_id) }}">{{ $recommendSong->user->name }}</a></p>
        <p class="mb-1">{{ $recommendSong->brief }}</p>
    </a>
    <hr>
@endforeach
