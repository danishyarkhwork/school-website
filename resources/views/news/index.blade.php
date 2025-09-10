@extends('layouts.main')

@section('title', 'News & Updates - Varin SkillUp Academy')
@section('description', 'Latest updates, announcements, and blogs from Varin SkillUp Academy.')

@section('content')
    <section class="relative py-16 bg-gradient-to-b from-light to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-primary">News & Updates</h1>
            <p class="mt-3 text-gray-600 max-w-2xl mx-auto">Latest updates, announcements, and blogs.</p>
        </div>
    </section>

    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2">
                    @if ($posts->count() === 0)
                        <p class="text-center text-gray-500">No posts yet. Check back soon.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            @foreach ($posts as $post)
                                <article class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                                    @if ($post->image_path)
                                        <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}"
                                            class="h-48 w-full object-cover">
                                    @endif
                                    <div class="p-6 flex-1 flex flex-col">
                                        <h2 class="text-xl font-semibold text-primary">
                                            <a href="{{ route('news.show', $post->slug) }}"
                                                class="hover:underline">{{ $post->title }}</a>
                                        </h2>
                                        <p class="mt-2 text-gray-600 line-clamp-3">
                                            {{ $post->excerpt ?? Str::limit(strip_tags($post->body), 120) }}</p>
                                        <div class="mt-auto pt-4 text-sm text-gray-500">
                                            {{ optional($post->published_at ?? $post->created_at)->format('M d, Y') }}
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="mt-10">
                            {{ $posts->links() }}
                        </div>
                    @endif
                </div>
                <aside class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow p-6">
                        <h3 class="text-lg font-semibold text-primary">Recent Posts</h3>
                        <ul class="mt-4 space-y-4">
                            @foreach ($recentPosts as $recent)
                                <li>
                                    <a href="{{ route('news.show', $recent->slug) }}" class="block">
                                        <div class="flex space-x-3">
                                            @if ($recent->image_path)
                                                <img src="{{ asset($recent->image_path) }}" alt="{{ $recent->title }}"
                                                    class="w-16 h-16 object-cover rounded">
                                            @endif
                                            <div>
                                                <div class="text-sm font-medium text-gray-800 line-clamp-2">
                                                    {{ $recent->title }}</div>
                                                <div class="text-xs text-gray-500">
                                                    {{ optional($recent->published_at ?? $recent->created_at)->format('M d, Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
