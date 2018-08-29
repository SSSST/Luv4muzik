@extends('layouts.app')
@section('title', '所有音乐人')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <br>
                    <h3>所有音乐人</h3>
                    <br>
                    @include('users._tabs')
                </div>

                <div class="card-body">
                    @include('musicians.showmusicians')
                </div>
                {{ $musicians->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
