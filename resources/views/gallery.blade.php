@extends('layouts.main')

@section('title', 'Gallery - Varin SkillUp Academy')
@section('description',
    'Explore Varin SkillUp Academy photos showcasing our learning environment, programs, and
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
                        <img src="{{ asset('assets/images/' . $file) }}" alt="{{ $caption }}" data-gallery="image"
                            data-index="{{ $loop->index }}"
                            class="w-full h-auto object-cover group-hover:scale-[1.02] transition-transform duration-300 cursor-zoom-in">
                        <figcaption class="p-4 bg-white">
                            <p class="text-sm text-gray-700">{{ $caption }}</p>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 z-50 hidden">
        <div id="lightbox-backdrop" class="absolute inset-0 bg-black/80"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="relative max-w-6xl w-full">
                <!-- Close button -->
                <button id="lightbox-close" aria-label="Close"
                    class="absolute -top-10 right-0 text-white/90 hover:text-white text-3xl">&times;</button>

                <!-- Image container -->
                <div class="relative w-full">
                    <img id="lightbox-img" src="" alt=""
                        class="max-h-[80vh] w-auto mx-auto rounded-xl shadow-2xl" />

                    <!-- Prev -->
                    <button id="lightbox-prev" aria-label="Previous"
                        class="absolute left-0 top-1/2 -translate-y-1/2 p-3 rounded-full bg-black/50 hover:bg-black/70 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>

                    <!-- Next -->
                    <button id="lightbox-next" aria-label="Next"
                        class="absolute right-0 top-1/2 -translate-y-1/2 p-3 rounded-full bg-black/50 hover:bg-black/70 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>

                <p id="lightbox-caption" class="mt-4 text-center text-white/90 text-sm"></p>
            </div>
        </div>
    </div>

    @push('scripts')
        @vite('resources/js/gallery.js')
    @endpush

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
