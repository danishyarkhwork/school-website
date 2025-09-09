@extends('layouts.main')

@section('title', 'Gallery - Varin SkillUp Academy')
@section('description', 'Explore Varin SkillUp Academy photos showcasing our learning environment, programs, and
    achievements.')

@section('content')
    <!-- Hero -->
    <section class="relative py-16 bg-gradient-to-b from-light to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-primary">Gallery</h1>
            <p class="mt-3 text-gray-600 max-w-2xl mx-auto">A glimpse into our campus life, programs, and events.</p>
        </div>
    </section>

    <!-- Filters -->
    <section class="pb-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap gap-3">
                <button class="px-4 py-2 rounded-full bg-accent text-primary font-semibold">All</button>
                <button
                    class="px-4 py-2 rounded-full bg-white border border-gray-200 text-gray-700 hover:border-accent">Campus</button>
                <button
                    class="px-4 py-2 rounded-full bg-white border border-gray-200 text-gray-700 hover:border-accent">Classes</button>
                <button
                    class="px-4 py-2 rounded-full bg-white border border-gray-200 text-gray-700 hover:border-accent">Events</button>
            </div>
        </div>

    </section>

    <!-- Masonry-style Grid (responsive) -->
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 [column-fill:_balance]">
                <!-- tailwind arbitrary property for safety -->
                <!-- Image cards -->
                @foreach ([
            '1.jpg' => 'Campus Life',
            '3.jpg' => 'Interactive Classes',
            '4.jpg' => 'Focused Learning',
            '5.jpg' => 'Mission in Action',
            'banners/banner-1.jpeg' => 'Event Highlights',
            'banners/banner-2.jpeg' => 'Student Projects',
            'banners/banner-3.jpeg' => 'Workshops',
            'banners/banner-4.jpeg' => 'Graduation',
            'banners/banner-5.jpeg' => 'Orientation Day',
            'banners/banner-6.jpeg' => 'Community',
        ] as $file => $caption)
                    <figure class="mb-6 break-inside-avoid rounded-2xl overflow-hidden shadow-lg group">
                        <img src="{{ asset('assets/images/' . $file) }}" alt="{{ $caption }}"
                            class="w-full h-auto object-cover group-hover:scale-[1.02] transition-transform duration-300">
                        <figcaption class="p-4 bg-white">
                            <p class="text-sm text-gray-700">{{ $caption }}</p>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-primary">Want to see more?</h2>
            <p class="mt-2 text-gray-600">Visit our campus or get in touch to learn about our programs.</p>
            <div class="mt-6 flex justify-center gap-4">
                <a href="{{ route('contact') }}"
                    class="px-6 py-3 bg-accent text-primary font-semibold rounded-xl shadow-glow">Contact Us</a>
                <a href="{{ route('courses') }}"
                    class="px-6 py-3 border-2 border-primary text-primary font-semibold rounded-xl hover:bg-primary hover:text-white transition">Explore
                    Courses</a>
            </div>
        </div>
    </section>
@endsection
