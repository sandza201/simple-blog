<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    use AuthorizesRequests;

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Post $post)
    {
        $this->authorize('create', Comment::class);

        $validated = $request->validated();
        $validated['author_id'] = Auth::id();

        $post->comments()->create($validated);

        return redirect()->back()->with('message', 'Comment created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->back()->with('message', 'Comment deleted successfully.');
    }
}
