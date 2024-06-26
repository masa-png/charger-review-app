<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Review $review, Request $request)
    {
        $comment = new Comment();
        $user_id = Auth::id();

        $comment->content = $request->input('content');
        $comment->review_id = $review->id;
        $comment->user_id = $user_id;

        $comment->save();

        return back();
    }

    public function store_reply(Review $review, Request $request)
    {
        $comment = new Comment();
        $user_id = Auth::id();

        $comment->content = $request->input('content');
        $comment->review_id = $review->id;
        $comment->user_id = $user_id;
        $comment->parent_comment_id = $request->input('parent_comment_id');
        $comment->save();

        return back();
    }
}
