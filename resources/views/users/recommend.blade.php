@foreach($recommend_songs as $recommend_song)
    <a href="{{ route('recommendSongs.show', $recommend_song->id)}}" class="list-group-item-action flex-column align-items-start">
        <h5 class="mb-1">{{ $recommend_song->title }}</h5>
        <span>发表于{{ $recommend_song->created_at->diffForHumans() }}</span>
        <p class="mb-1">{{ $recommend_song->brief }}</p>
    </a>
    <hr>
@endforeach
