@extends('layouts.app')
@section('title', '所有作品')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <br>
                    <h3>所有作品</h3>
                    <br>
                </div>

                <div class="card-body">
                    @include('musicians.songs')
                </div>
                {{ $songs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
