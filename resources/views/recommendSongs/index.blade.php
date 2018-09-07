@extends('layouts.app')
@section('title', '所有推荐歌曲')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <br>
                    <h3>所有推荐歌曲</h3>
                    <br>
                </div>

                <div class="card-body">
                    @include('recommendSongs.showRecommendSongs')
                </div>
                {{ $recommendSongs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
