@extends('layouts.app-master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Our Blogs</h1>
                        <p>Enjoy reading our posts. Click on a post to read!</p>
                    </div>
                    <div class="col-4">
                        @auth
                        <a href="/blog/create/post" class="btn btn-primary btn-lg float-end">Add Post</a>
                        @endauth
                    </div>
                </div>                
                @forelse($posts as $post)
                    <ul class="list-group mb-3">
                        <a href="./blog/{{ $post->id }}" class="text-decoration-none">
                            <li class="list-group-item">
                                {{ ucfirst($post->title) }}
                                <p class="text-muted float-end">{{ ucfirst($post->created_at) }}</p>
                            </li>
                        </a>
                    </ul>
                @empty
                    <p class="text-warning">No blog Posts available</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection