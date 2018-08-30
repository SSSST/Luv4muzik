@foreach($songs as $song)
    <a href="{{ route('songs.show', $song->id)}}" class="list-group-item-action flex-column align-items-start">
        <h5 class="mb-1">{{ $song->name }}</h5>
        <p class="mb-1">{{ $song->brief }}</p>
    </a>
    <hr>
@endforeach
