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
            @if ($posts->count() === 0)
                <p class="text-center text-gray-500">No posts yet. Check back soon.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($posts as $post)
                        <article class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                            @if ($post->image_path)
                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
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
    </section>
@endsection
