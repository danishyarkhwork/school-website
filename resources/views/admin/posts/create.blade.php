@extends('layouts.main')

@section('title', 'Create Post - Admin')
@section('description', 'Admin - create a new post')

@section('content')
    <section class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-primary mb-6">Create Post</h1>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Slug (optional)</label>
                    <input type="text" name="slug" value="{{ old('slug') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Excerpt (optional)</label>
                    <textarea name="excerpt" rows="3" class="mt-1 w-full border rounded-lg px-3 py-2">{{ old('excerpt') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Body</label>
                    <textarea name="body" rows="8" class="mt-1 w-full border rounded-lg px-3 py-2" required>{{ old('body') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Image (optional)</label>
                    <input type="file" name="image" accept="image/*" class="mt-1">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Publish date (optional)</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at') }}"
                        class="mt-1 border rounded-lg px-3 py-2">
                </div>

                <div class="pt-4">
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg">Create</button>
                    <a href="{{ route('admin.posts.index') }}" class="ml-2 text-gray-600">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection
