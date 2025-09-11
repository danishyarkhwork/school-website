@extends('layouts.main')

@section('title', 'HTML Sitemap')
@section('description', 'Browse all important pages and resources of Varin SkillUp Academy.')

@section('content')
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-primary mb-6">Sitemap</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div>
                <h2 class="text-xl font-semibold mb-3">Main Pages</h2>
                <ul class="space-y-2 list-disc list-inside">
                    <li><a class="text-primary hover:underline" href="{{ route('home') }}">Home</a></li>
                    <li><a class="text-primary hover:underline" href="{{ route('about') }}">About</a></li>
                    <li><a class="text-primary hover:underline" href="{{ route('courses') }}">Courses</a></li>
                    <li><a class="text-primary hover:underline" href="{{ route('news.index') }}">News</a></li>
                    <li><a class="text-primary hover:underline" href="{{ route('gallery') }}">Gallery</a></li>
                    <li><a class="text-primary hover:underline" href="{{ route('contact') }}">Contact</a></li>
                    <li><a class="text-primary hover:underline" href="{{ route('certificate.verify') }}">Verify
                            Certificate</a></li>
                </ul>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-3">News</h2>
                <ul class="space-y-2 list-disc list-inside">
                    @php($posts = \App\Models\Post::whereNotNull('published_at')->orderBy('published_at', 'desc')->limit(50)->get())
                    @foreach ($posts as $post)
                        <li><a class="text-primary hover:underline"
                                href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-3">Auth</h2>
                <ul class="space-y-2 list-disc list-inside">
                    <li><a class="text-primary hover:underline" href="{{ route('login') }}">Login</a></li>
                    @if (\Illuminate\Support\Facades\Route::has('register'))
                        <li><a class="text-primary hover:underline" href="{{ route('register') }}">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="mt-8">
            <p class="text-gray-600">For search engines, see our XML sitemaps:
                <a class="text-primary hover:underline" href="{{ route('sitemap.index') }}">sitemap.xml</a>,
                <a class="text-primary hover:underline" href="{{ route('sitemap.pages') }}">sitemap-pages.xml</a>,
                <a class="text-primary hover:underline" href="{{ route('sitemap.news') }}">sitemap-news.xml</a>.
            </p>
        </div>
    </section>
@endsection
