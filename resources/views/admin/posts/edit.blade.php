@extends('layouts.main')

@section('title', 'Edit Post - Admin')
@section('description', 'Admin - edit post')

@section('content')
<section class="py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-primary mb-2">
                <i class="fas fa-edit mr-2"></i>
                Edit Post
            </h1>
            <p class="text-gray-600">Update and modify your post content</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6">
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-triangle text-red-400"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Please fix the following errors:</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <ul class="list-disc list-inside space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-heading mr-1"></i>
                                Post Title *
                            </label>
                            <input type="text" 
                                   id="title"
                                   name="title" 
                                   value="{{ old('title', $post->title) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary @error('title') border-red-500 @enderror" 
                                   placeholder="Enter post title"
                                   required>
                            @error('title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-link mr-1"></i>
                                URL Slug
                            </label>
                            <input type="text" 
                                   id="slug"
                                   name="slug" 
                                   value="{{ old('slug', $post->slug) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary @error('slug') border-red-500 @enderror"
                                   placeholder="url-friendly-slug">
                            <p class="mt-1 text-xs text-gray-500">Leave empty to auto-generate from title</p>
                            @error('slug')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-calendar mr-1"></i>
                                Publish Date
                            </label>
                            <input type="datetime-local" 
                                   id="published_at"
                                   name="published_at"
                                   value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary @error('published_at') border-red-500 @enderror">
                            <p class="mt-1 text-xs text-gray-500">Leave empty to save as draft</p>
                            @error('published_at')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-quote-left mr-1"></i>
                            Excerpt
                        </label>
                        <textarea id="excerpt"
                                  name="excerpt" 
                                  rows="3" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary @error('excerpt') border-red-500 @enderror"
                                  placeholder="Brief description of the post">{{ old('excerpt', $post->excerpt) }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">Short summary that appears in post listings</p>
                        @error('excerpt')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="body" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-file-text mr-1"></i>
                            Content *
                        </label>
                        <textarea id="body"
                                  name="body" 
                                  rows="12" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary @error('body') border-red-500 @enderror" 
                                  placeholder="Write your post content here..."
                                  required>{{ old('body', $post->body) }}</textarea>
                        @error('body')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-image mr-1"></i>
                            Featured Image
                        </label>
                        
                        @if ($post->image_path)
                            <div class="mb-4 p-4 bg-gray-50 rounded-lg">
                                <p class="text-sm text-gray-600 mb-2">Current image:</p>
                                <img src="{{ asset($post->image_path) }}" 
                                     alt="{{ $post->title }}" 
                                     class="h-32 w-auto rounded-lg shadow-sm">
                            </div>
                        @endif

                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-primary transition-colors">
                            <div class="space-y-1 text-center">
                                <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl"></i>
                                <div class="flex text-sm text-gray-600">
                                    <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-primary/80 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary">
                                        <span>{{ $post->image_path ? 'Replace image' : 'Upload an image' }}</span>
                                        <input id="image" 
                                               name="image" 
                                               type="file" 
                                               accept="image/*" 
                                               class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                        @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.posts.index') }}" 
                           class="px-6 py-3 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition duration-200">
                            <i class="fas fa-times mr-2"></i>
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary/90 shadow-glow transition duration-200">
                            <i class="fas fa-save mr-2"></i>
                            Update Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush
