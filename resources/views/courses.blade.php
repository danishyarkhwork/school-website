@extends('layouts.main')

@section('title', 'Courses - Varin SkillUp Academy')
@section('description', 'Explore courses at Varin SkillUp Academy across Languages, IT, Design, and Certifications.')

@section('content')
    <!-- Hero -->
    <section class="relative py-16 bg-gradient-to-b from-light to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl sm:text-5xl font-bold text-primary">Courses</h1>
                <p class="mt-3 text-gray-600 max-w-2xl mx-auto">Choose from programs tailored to students and professionals.
                </p>
            </div>


        </div>
    </section>

    <!-- Categories -->
    <section class="pb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Horizontal Category Tabs -->
            <div class="flex items-center gap-3 overflow-x-auto no-scrollbar pb-2">
                @php($categories = [['name' => 'All', 'active' => true], ['name' => 'Language Training'], ['name' => 'Computer & IT'], ['name' => 'Graphic & Design'], ['name' => 'Professional']])
                @foreach ($categories as $c)
                    <button
                        class="px-4 py-2 rounded-full text-sm font-semibold whitespace-nowrap {{ $c['active'] ?? false ? 'bg-accent text-primary' : 'bg-white border border-gray-200 text-gray-700 hover:border-accent' }}">
                        {{ $c['name'] }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Course Cards -->
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php($courses = [['title' => 'English - IELTS Prep', 'img' => '3.jpg', 'level' => 'Intermediate', 'tag' => 'Language Training', 'duration' => '10 weeks'], ['title' => 'Diploma in IT (DIT)', 'img' => '4.jpg', 'level' => 'Beginner', 'tag' => 'Computer & IT', 'duration' => '6 months'], ['title' => 'Graphic Design (Photoshop)', 'img' => '5.jpg', 'level' => 'Beginner', 'tag' => 'Graphic & Design', 'duration' => '8 weeks'], ['title' => 'Web Development', 'img' => '1.jpg', 'level' => 'Intermediate', 'tag' => 'Computer & IT', 'duration' => '12 weeks'], ['title' => 'Digital Marketing', 'img' => 'banners/banner-2.jpeg', 'level' => 'All Levels', 'tag' => 'Professional', 'duration' => '8 weeks'], ['title' => 'QuickBooks', 'img' => 'banners/banner-3.jpeg', 'level' => 'All Levels', 'tag' => 'Professional', 'duration' => '4 weeks']])
                @foreach ($courses as $course)
                    <div class="bg-white rounded-2xl overflow-hidden shadow hover:shadow-lg transition duration-200">
                        <div class="relative h-48">
                            <img src="{{ asset('assets/images/' . $course['img']) }}" alt="{{ $course['title'] }}"
                                class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-primary/60 to-transparent"></div>
                            <div class="absolute top-3 left-3 flex items-center gap-2">
                                <span
                                    class="text-xs px-3 py-1 rounded-full bg-accent text-primary font-semibold">{{ $course['tag'] }}</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-primary">{{ $course['title'] }}</h3>
                            <div class="mt-2 flex items-center gap-4 text-sm text-gray-500">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3" />
                                    </svg>
                                    <span>{{ $course['duration'] }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l9-5-9-5-9 5 9 5z" />
                                    </svg>
                                    <span>Level: {{ $course['level'] }}</span>
                                </div>
                            </div>
                            <ul class="mt-3 text-sm text-gray-600 space-y-1">
                                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-accent rounded-full"></span>
                                    Hands-on, project-based learning</li>
                                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-accent rounded-full"></span>
                                    Experienced instructors</li>
                                <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-accent rounded-full"></span>
                                    Certificate upon completion</li>
                            </ul>
                            <div class="mt-5 flex items-center justify-between">
                                <a href="{{ route('contact') }}"
                                    class="text-primary font-semibold hover:text-accent">Details</a>
                                <a href="{{ route('contact') }}"
                                    class="px-4 py-2 bg-accent text-primary rounded-xl font-semibold shadow-glow">Enroll</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination (static placeholder) -->
            <div class="mt-10 flex justify-center gap-2">
                <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-700 hover:border-accent">Prev</button>
                <button class="px-3 py-2 rounded-lg bg-accent text-primary font-semibold">1</button>
                <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-700 hover:border-accent">2</button>
                <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-700 hover:border-accent">3</button>
                <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-700 hover:border-accent">Next</button>
            </div>
        </div>
    </section>
@endsection
