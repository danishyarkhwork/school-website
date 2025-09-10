<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->paginate(10);

        $recentPosts = Post::orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('news.index', compact('posts', 'recentPosts'));
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('news.show', compact('post'));
    }
}
