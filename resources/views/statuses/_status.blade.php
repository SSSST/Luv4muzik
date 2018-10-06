@foreach($statuses as $status)
    <h5 class="mb-1">
        <a href="{{ route('users.show', $status->user_id )}}" class="list-group-item-action flex-column align-items-start">{{ $status->user->name }}</a>
        @can('destroy', $status)
        <form action="{{ route('statuses.destroy', $status->id) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-sm btn-danger status-delete-btn pull-right">删除</button>
        </form>
        @endcan
    </h5>
    <span>发表于{{ $status->created_at->diffForHumans() }}</span>
    <div class="col-xs-12 h5">
        <span>{{ $status->content }}</span>
    </div>
    <hr>
@endforeach
