<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Post $post)
    {
        if ($request->user()->can('create', Comment::class)) {
            $validated = $request->validated();
            $validated['author_id'] = Auth::id();

            $post->comments()->create($validated);

            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Comment $comment)
    {
        if ($request->user()->can('delete', $comment)) {
            $comment->delete();

            return redirect()->back()->with('success', 'Comment deleted successfully.');
        }

        return redirect()->back()->with('error', 'You are not allowed to delete this comment!');
    }
}
