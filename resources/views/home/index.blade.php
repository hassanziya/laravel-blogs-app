@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Dashboard</h1>
        <p class="lead">Only authenticated users can access this section.</p>
        <a href="/blog" class="btn btn-outline-primary">Show Blog</a>
        @endauth

        @guest
        <h1>BLOGS</h1>
        <p class="lead">Sign in to see the latest blogs</p>
        @endguest
    </div>
@endsection