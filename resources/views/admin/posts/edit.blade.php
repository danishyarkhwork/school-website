@extends('layouts.main')

@section('title', 'Edit Post - Admin')
@section('description', 'Admin - edit post')

@section('content')
    <section class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-primary mb-6">Edit Post</h1>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" value="{{ old('title', $post->title) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Slug (optional)</label>
                    <input type="text" name="slug" value="{{ old('slug', $post->slug) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Excerpt (optional)</label>
                    <textarea name="excerpt" rows="3" class="mt-1 w-full border rounded-lg px-3 py-2">{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Body</label>
                    <textarea name="body" rows="8" class="mt-1 w-full border rounded-lg px-3 py-2" required>{{ old('body', $post->body) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Image (optional)</label>
                    @if ($post->image_path)
                        <div class="mb-2">
                            <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}" class="h-24 rounded">
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*" class="mt-1">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Publish date (optional)</label>
                    <input type="datetime-local" name="published_at"
                        value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}"
                        class="mt-1 border rounded-lg px-3 py-2">
                </div>

                <div class="pt-4">
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg">Update</button>
                    <a href="{{ route('admin.posts.index') }}" class="ml-2 text-gray-600">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection
