@foreach($users as $user)
    <a href="{{ route('users.show', $user->id) }}" class="list-group-item-action flex-column align-items-start">
        <h5 class="mb-1">{{ $user->name }}</h5>
        <p class="mb-1">{{ $user->brief }}</p>
    </a>
    <hr>
@endforeach
