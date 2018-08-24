@extends('layouts.app')

@section('content')
<link href="{{ asset('css/profiles.css') }}" rel="stylesheet">

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{ $user->name }}</h1>
        <p class="lead text-muted">{{ $user->brief }}<p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
    </div>
</section>
@endsection
