@extends('layouts.app')
@section('title', $musician->name)

@section('content')
<link href="{{ asset('css/profiles.css') }}" rel="stylesheet">

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{ $musician->name }}</h1>
        <p class="lead text-muted">{{ $musician->brief }}<p>
            <!-- 如果该音乐人已认证 -->
            @if($musician->is_active)
                @include('musicians._button')
            @endif
        </p>
    </div>
</section>
@endsection
