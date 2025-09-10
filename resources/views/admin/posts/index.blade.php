@extends('layouts.main')

@section('title', 'Manage Posts - Admin')
@section('description', 'Admin - manage news posts')

@section('content')
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-primary">Posts</h1>
                <a href="{{ route('admin.posts.create') }}" class="px-4 py-2 bg-primary text-white rounded-lg">Create Post</a>
            </div>

            @if (session('status'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
            @endif

            <div class="bg-white rounded-xl shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Published</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($posts as $post)
                            <tr>
                                <td class="px-4 py-3">{{ $post->title }}</td>
                                <td class="px-4 py-3 text-sm text-gray-500">{{ $post->slug }}</td>
                                <td class="px-4 py-3 text-sm text-gray-500">
                                    {{ $post->published_at ? $post->published_at->format('M d, Y') : '—' }}</td>
                                <td class="px-4 py-3 text-right space-x-2">
                                    <a href="{{ route('admin.posts.edit', $post) }}"
                                        class="text-primary hover:underline">Edit</a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete this post?')"
                                            class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-6 text-center text-gray-500">No posts found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">{{ $posts->links() }}</div>
        </div>
    </section>
@endsection
