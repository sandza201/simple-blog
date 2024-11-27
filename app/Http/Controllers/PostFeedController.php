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
            'posts' => Post::latest()->paginate(10),
            'categories' => Category::latest()->get(),
        ]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('query');

        $posts = Post::query()
            ->where('title', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('body', 'LIKE', '%' . $searchTerm . '%')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('feed.index', [
            'posts' => $posts,
            'categories' => Category::latest()->get(),
            'searchTerm' => $searchTerm,
        ]);
    }

    public function category(Category $category)
    {
        return view('feed.index', [
            'posts' => $category->posts()->latest()->paginate(10),
            'categories' => Category::latest()->get(),
        ]);
    }

    public function show(Post $post)
    {
        return view('feed.post', [
            'post' => $post,
            'comments' => $post->comments()->latest()->get(),
        ]);
    }
}
