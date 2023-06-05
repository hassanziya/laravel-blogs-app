<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $blogPostId, $parentCommentId = null)
    {
        // Retrieve the parent comment if provided
        $parentComment = null;
        if ($parentCommentId) {
            $parentComment = Comment::findOrFail($parentCommentId);
        }

        // Retrieve the blog post
        $blogPost = BlogPost::findOrFail($blogPostId);

        // Create a new comment
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->blogPost()->associate($blogPost);
        $comment->user()->associate(auth()->user());

        // Associate the comment with its parent (if it is a reply)
        if ($parentComment) {
            $comment->parent()->associate($parentComment);
        }

        // Save the comment
        $comment->save();

        return redirect()->back()->with('success', 'Comment posted successfully!');
    }

}

