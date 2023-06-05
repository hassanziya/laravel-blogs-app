@extends('layouts.app-master')

@section('content')
    <div class="container p-0">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Create a New Post</h1>
                    <p>Fill and submit this form to create a post</p>

                    <hr>

                    <form action={{ route('Blog.store') }} method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="">
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea type = "textarea" name = 'body' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                              </div>

                              <div class="mb-3">
                                <label for="formFile" class="form-label">Image</label>
                                <input class="form-control" type="file" name = 'image' id="formFile">
                              </div>

                            <div class="row mt-3">
                                <div class="control-group col-12 text-center ">
                                    <button id="btn-submit" type="submit" class="btn btn-primary float-end">
                                        Create Post
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection