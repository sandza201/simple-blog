<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostFeedController extends Controller
{
    public function index()
    {
        return view('feed.index', [
            'posts' => Post::all(),
        ]);
    }

    public function show(Post $post)
    {
        return view('feed.post', [
            'post' => $post,
        ]);
    }
}
