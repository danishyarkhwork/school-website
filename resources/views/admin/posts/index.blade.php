@extends('layouts.main')

@section('title', 'Manage Posts - Admin')
@section('description', 'Admin - manage news posts')

@section('content')
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-primary">
                            <i class="fas fa-newspaper mr-2"></i>
                            Posts Management
                        </h1>
                        <a href="{{ route('admin.posts.create') }}"
                            class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 shadow-glow">
                            <i class="fas fa-plus mr-2"></i>
                            Create Post
                        </a>
                    </div>

                    @if (session('status'))
                        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-heading mr-1"></i>
                                        Title
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-link mr-1"></i>
                                        Slug
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-calendar mr-1"></i>
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        Published
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-cog mr-1"></i>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($posts as $post)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                @if ($post->image_path)
                                                    <div class="flex-shrink-0 h-12 w-12 mr-4">
                                                        <img class="h-12 w-12 rounded-lg object-cover"
                                                            src="{{ asset($post->image_path) }}" alt="{{ $post->title }}">
                                                    </div>
                                                @else
                                                    <div class="flex-shrink-0 h-12 w-12 mr-4">
                                                        <div
                                                            class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center">
                                                            <i class="fas fa-image text-gray-400"></i>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ $post->title }}</div>
                                                    @if ($post->excerpt)
                                                        <div class="text-sm text-gray-500 mt-1 line-clamp-2">
                                                            {{ Str::limit($post->excerpt, 80) }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <code class="bg-gray-100 px-2 py-1 rounded text-xs">{{ $post->slug }}</code>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($post->published_at)
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    <i class="fas fa-check-circle mr-1"></i>
                                                    Published
                                                </span>
                                            @else
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    <i class="fas fa-clock mr-1"></i>
                                                    Draft
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            @if ($post->published_at)
                                                {{ $post->published_at->format('M d, Y') }}
                                            @else
                                                <span class="text-gray-400">—</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('admin.posts.edit', $post) }}"
                                                    class="text-primary hover:text-primary/80 transition-colors">
                                                    <i class="fas fa-edit mr-1"></i>
                                                    Edit
                                                </a>
                                                @if ($post->published_at)
                                                    <a href="{{ route('news.show', $post->slug) }}" target="_blank"
                                                        class="text-blue-600 hover:text-blue-800 transition-colors">
                                                        <i class="fas fa-external-link-alt mr-1"></i>
                                                        View
                                                    </a>
                                                @endif
                                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                                    class="inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:text-red-800 transition-colors">
                                                        <i class="fas fa-trash mr-1"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center">
                                                <i class="fas fa-newspaper text-gray-400 text-4xl mb-4"></i>
                                                <h3 class="text-lg font-medium text-gray-900 mb-2">No posts found</h3>
                                                <p class="text-gray-500 mb-4">Get started by creating your first post.</p>
                                                <a href="{{ route('admin.posts.create') }}"
                                                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">
                                                    <i class="fas fa-plus mr-2"></i>
                                                    Create Post
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endpush
