@extends('layouts.app')
@section('title', '所有关注人动态')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <br>
                    <h3>所有关注人动态</h3>
                    <br>
                    @include('statuses._tabs')
                    <hr>
                    @if(Auth::check())
                        @include('statuses._form')
                    @endif
                    <br>
                </div>

                <div class="card-body">
                    @include('statuses._status')
                </div>
                {{ $statuses->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
