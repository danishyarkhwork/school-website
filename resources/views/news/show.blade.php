@extends('layouts.main')

@section('title', $post->title . ' - Varin SkillUp Academy')
@section('description', Str::limit(strip_tags($post->excerpt ?? $post->body), 160))

@section('content')
    <section class="relative py-16 bg-gradient-to-b from-light to-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('news.index') }}" class="text-primary hover:underline">&larr; Back to News</a>
            <h1 class="mt-4 text-3xl sm:text-4xl font-bold text-primary">{{ $post->title }}</h1>
            <div class="mt-2 text-sm text-gray-500">
                {{ optional($post->published_at ?? $post->created_at)->format('M d, Y') }}</div>
        </div>
    </section>

    <section class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if ($post->image_path)
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                    class="w-full h-auto rounded-2xl shadow mb-8">
            @endif
            <div class="prose max-w-none">
                {!! nl2br(e($post->body)) !!}
            </div>
        </div>
    </section>
@endsection
