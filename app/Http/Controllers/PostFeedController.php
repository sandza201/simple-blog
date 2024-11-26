<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostFeedController extends Controller
{
    public function index()
    {
        return view('feed.index', [
            'posts' => Post::all(),
            'categories' => Category::all(),
        ]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('query');

        $posts = Post::query()
            ->where('title', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('body', 'LIKE', '%' . $searchTerm . '%')
            ->get();

        return view('feed.index', [
            'posts' => $posts,
            'categories' => Category::all(),
            'searchTerm' => $searchTerm,
        ]);
    }

    public function show(Post $post)
    {
        return view('feed.post', [
            'post' => $post,
        ]);
    }
}
