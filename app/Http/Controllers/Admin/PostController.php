<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:posts,slug'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'published_at' => ['nullable', 'date'],
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);
        // Ensure unique slug
        $original = $slug;
        $i = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $i++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid('post_') . '.' . $file->getClientOriginalExtension();
            $targetDir = public_path('assets/images/posts');
            if (!is_dir($targetDir)) {
                @mkdir($targetDir, 0775, true);
            }
            $file->move($targetDir, $filename);
            $imagePath = 'assets/images/posts/' . $filename;
        }

        Post::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'] ?? null,
            'body' => $validated['body'],
            'image_path' => $imagePath,
            'published_at' => $validated['published_at'] ?? null,
        ]);

        return redirect()->route('admin.posts.index')->with('status', 'Post created');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:posts,slug,' . $post->id],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'published_at' => ['nullable', 'date'],
        ]);

        $slug = $validated['slug'] ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $original = $slug;
        $i = 1;
        while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            $slug = $original . '-' . $i++;
        }

        $imagePath = $post->image_path;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid('post_') . '.' . $file->getClientOriginalExtension();
            $targetDir = public_path('assets/images/posts');
            if (!is_dir($targetDir)) {
                @mkdir($targetDir, 0775, true);
            }
            $file->move($targetDir, $filename);
            $imagePath = 'assets/images/posts/' . $filename;
        }

        $post->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'] ?? null,
            'body' => $validated['body'],
            'image_path' => $imagePath,
            'published_at' => $validated['published_at'] ?? null,
        ]);

        return redirect()->route('admin.posts.index')->with('status', 'Post updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('status', 'Post deleted');
    }
}
