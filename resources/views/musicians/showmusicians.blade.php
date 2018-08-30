@foreach($musicians as $musician)
    <a href="{{ route('musicians.show', $musician->id)}}" class="list-group-item-action flex-column align-items-start">
        <h5 class="mb-1">{{ $musician->name }}</h5>
        <p class="mb-1">{{ $musician->brief }}</p>
    </a>
    <hr>
@endforeach
