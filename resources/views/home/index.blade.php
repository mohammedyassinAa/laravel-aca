@extends('layouts.admin')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Tasks</h1>
        <p class="lead">Authenticated user.</p>
        {{-- <a class="btn btn-lg btn-primary" href="https://codeanddeploy.com" role="button">View more tutorials here &raquo;</a> --}}
        @endauth

        @guest
        <h1>Welcome</h1>
        <p class="lead">Please login </p>
        @endguest
    </div>
@endsection