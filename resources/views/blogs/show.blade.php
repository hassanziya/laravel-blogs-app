@extends('layouts.app-master')
@section('content')
    <div class="container mb-5 p-0">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm mb-1">Go back</a>
                <h1 class="display-one mb-3">{{ ucfirst($post->title) }}</h1>
                <img src="{{ asset('images/' . $post->image) }}" class="rounded mx-auto d-block mb-3" alt="..." height="200px">
                <p>{!! $post->body !!}</p> 
                <hr>
                
                <form method="POST" action="{{ route('comments.store', $post->id) }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name = "content" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Leave a comment</label>
                      </div>
                    <button type="submit" class="btn btn-sm btn-primary btn-outline ">Submit Comment</button>
                </form>
                <hr>
                <h3>Comments</h3>
                <ol class="list-group mb-3">
                @foreach ($post->comments as $comment)
                    @if ($comment->parent_id == null)
                        <li class="list-group-item">
                            {{ $comment->content }} 
                            <span class="text-muted float-end">Commented by: {{ $comment->user->username }}</span><br>
                            <h5 class="text-muted mt-3">Replies</h5>
                            @if ($comment->replies->count() > 0)
                                <div class="replies">
                                    @foreach ($comment->replies as $reply)
                                        <div class="reply">
                                            <p>{{ $reply->content }}</p>
                                            <!-- Display the reply details -->
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <button class="btn btn-sm btn-primary mt-1 reply-btn">Reply</button>
                            <form class="reply-form" action="{{ route('comment.reply', ['blogPostId' => $post->id, 'parentCommentId' => $comment->id]) }}" method="POST" style="display: none;">
                                @csrf
                                <div class="form-floating mb-3 mt-3">
                                    <textarea name="content" class="content form-control" name = "content" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Leave a comment</label>
                                </div>
                                {{-- <textarea name="content" rows="3" placeholder="Reply to this comment"></textarea> --}}
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </form>
                        
                        </li>
                    @endif
                @endforeach
                </ol>

                
            </div>
        </div>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var replyButtons = document.querySelectorAll('.reply-btn');
        
        // Attach click event listener to each button
        replyButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Find the closest parent element with the class 'list-group-item'
                var listItem = findParentByClass(this, 'list-group-item');

                // Find the associated reply form within the parent element
                var replyForm = listItem.querySelector('.reply-form');

                // Toggle the visibility of the reply form
                if (replyForm.style.display === 'none') {
                    replyForm.style.display = 'block';
                } else {
                    replyForm.style.display = 'none';
                }
            });
        });

        // Helper function to find the closest parent element with a specific class
        function findParentByClass(element, className) {
            var parent = element.parentElement;

            while (parent) {
                if (parent.classList.contains(className)) {
                    return parent;
                }

                parent = parent.parentElement;
            }

            return null;
        }
    });
</script>


