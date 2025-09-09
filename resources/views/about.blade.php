@extends('layouts.main')

@section('title', 'About Us - Varin SkillUp Academy')
@section('description',
    'Learn about Varin SkillUp Academy - Afghanistan\'s leading educational and professional
    training institute dedicated to building knowledge and shaping futures.')

@section('content')
    <!-- Hero Section - Centered Layout -->
    <section class="relative py-20 bg-gradient-to-b from-light to-white overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0"
                style="background-image: url('data:image/svg+xml,<svg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"><g fill=\"none\" fill-rule=\"evenodd\"><g fill=\"%2314133D\" fill-opacity=\"0.1\"><circle cx=\"30\" cy=\"30\" r=\"2\"/></g></svg>');">
            </div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Centered Content -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-accent rounded-full mb-6">
                    <img src="{{ asset('assets/images/varin-academy-logo.svg') }}" alt="Varin Academy Logo" class="w-12 h-12">
                </div>
                <h1 class="text-5xl lg:text-6xl font-bold text-primary mb-6">
                    About <span class="text-accent">Varin Academy</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Leading educational and professional training institute in Afghanistan, dedicated to building knowledge,
                    enhancing skills, and shaping brighter futures for individuals across all age groups.
                </p>
            </div>

            <!-- Image Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <!-- Main Image -->
                <div class="md:col-span-2 relative group">
                    <div class="relative h-80 rounded-2xl overflow-hidden shadow-2xl">
                        <img src="{{ asset('assets/images/1.jpg') }}" alt="Varin Academy Students"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/60 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <h3 class="text-2xl font-bold mb-2">Excellence in Education</h3>
                            <p class="text-white/90">Empowering the next generation</p>
                        </div>
                    </div>
                </div>

                <!-- Side Images -->
                <div class="space-y-8">
                    <div class="relative group">
                        <div class="relative h-36 rounded-xl overflow-hidden shadow-lg">
                            <img src="{{ asset('assets/images/3.jpg') }}" alt="Learning Environment"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-br from-accent/40 to-transparent"></div>
                            <div class="absolute bottom-3 left-3 text-white">
                                <p class="text-sm font-semibold">Interactive Learning</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative group">
                        <div class="relative h-36 rounded-xl overflow-hidden shadow-lg">
                            <img src="{{ asset('assets/images/4.jpg') }}" alt="Professional Training"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-br from-secondary/40 to-transparent"></div>
                            <div class="absolute bottom-3 left-3 text-white">
                                <p class="text-sm font-semibold">Professional Growth</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-primary font-bold text-xl">4+</span>
                    </div>
                    <h3 class="text-lg font-semibold text-primary mb-1">Years Experience</h3>
                    <p class="text-gray-600 text-sm">Since 2020</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-success rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-xl">500+</span>
                    </div>
                    <h3 class="text-lg font-semibold text-primary mb-1">Students Graduated</h3>
                    <p class="text-gray-600 text-sm">Success Stories</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-warning rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-xl">15+</span>
                    </div>
                    <h3 class="text-lg font-semibold text-primary mb-1">Programs Available</h3>
                    <p class="text-gray-600 text-sm">Diverse Courses</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-info rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-xl">95%</span>
                    </div>
                    <h3 class="text-lg font-semibold text-primary mb-1">Success Rate</h3>
                    <p class="text-gray-600 text-sm">Student Satisfaction</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Section - Side by Side -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <div class="relative">
                        <div class="w-full h-96 rounded-2xl overflow-hidden shadow-xl">
                            <img src="{{ asset('assets/images/5.jpg') }}" alt="Varin Academy Campus"
                                class="w-full h-full object-cover">
                        </div>
                        <!-- Floating Card -->
                        <div class="absolute -bottom-6 -right-6 bg-white rounded-xl p-6 shadow-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-accent rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-primary">Expert Faculty</h4>
                                    <p class="text-sm text-gray-600">Qualified Instructors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <h2 class="text-4xl font-bold text-primary mb-6">Our Story</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Varin SkillUp Academy was founded with a vision to transform education in Afghanistan. We believe
                        education is the foundation of progress, and our mission is to empower learners with the tools,
                        techniques, and confidence they need to excel in academic, professional, and global environments.
                    </p>
                    <p class="text-lg text-gray-600 mb-8">
                        With a strong commitment to quality, innovation, and professional excellence, Varin SkillUp Academy
                        offers a wide range of programs in Languages, IT, Professional Certifications, and Creative Design.
                        Our programs are tailored to meet international standards while addressing the specific needs of
                        Afghan learners and professionals.
                    </p>

                    <!-- Feature List -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-accent rounded-full"></div>
                            <span class="text-gray-600">International Standards</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-accent rounded-full"></div>
                            <span class="text-gray-600">Practical Learning</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-accent rounded-full"></div>
                            <span class="text-gray-600">Expert Faculty</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-accent rounded-full"></div>
                            <span class="text-gray-600">Modern Facilities</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section - Stacked Cards -->
    <section class="py-20 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-primary mb-4">Our Vision & Mission</h2>
                <p class="text-xl text-gray-600">Guiding principles that drive our excellence</p>
            </div>

            <div class="max-w-4xl mx-auto space-y-8">
                <!-- Vision Card -->
                <div class="bg-white rounded-2xl p-8 shadow-xl">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-primary mb-4">Our Vision</h3>
                            <p class="text-lg text-gray-600 leading-relaxed">
                                To become Afghanistan's most trusted and innovative learning academy, recognized for
                                transforming knowledge into skills and empowering individuals to achieve success in both
                                local and global arenas.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Mission Card -->
                <div class="bg-white rounded-2xl p-8 shadow-xl">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-accent to-warning rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-primary mb-4">Our Mission</h3>
                            <ul class="text-lg text-gray-600 leading-relaxed space-y-2">
                                <li>• To provide world-class education and professional training accessible to everyone.
                                </li>
                                <li>• To bridge the gap between academic learning and practical industry needs.</li>
                                <li>• To equip Afghan youth and professionals with internationally recognized skills.</li>
                                <li>• To foster a culture of innovation, creativity, and lifelong learning.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CEO's Message Section - Card Layout -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-primary mb-4">CEO's Message</h2>
                <p class="text-xl text-gray-600">Words from our Founder & CEO</p>
            </div>

            <div class="max-w-5xl mx-auto">
                <div class="bg-gradient-to-br from-primary to-secondary rounded-2xl p-8 lg:p-12 text-white">
                    <div class="flex flex-col lg:flex-row items-center gap-8">
                        <div class="flex-shrink-0">
                            <div
                                class="w-32 h-32 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                <span class="text-white text-3xl font-bold">ARA</span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <blockquote class="text-lg leading-relaxed mb-6">
                                "Education is not just about learning—it is about transformation. At Varin SkillUp Academy,
                                our goal is to create an environment where every learner discovers their potential and
                                develops the confidence to succeed in today's competitive world. We believe Afghanistan's
                                future lies in the hands of its skilled and educated youth. That is why we are committed to
                                delivering high-quality, practical, and globally relevant training. Together, we can build a
                                brighter tomorrow for our nation and beyond."
                            </blockquote>
                            <div class="border-l-4 border-accent pl-4">
                                <p class="font-bold text-accent text-lg">Abdul Rashid Alami</p>
                                <p class="text-white/80">Founder & CEO, Varin SkillUp Academy</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section - Grid Layout -->
    <section class="py-20 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-primary mb-4">Why Choose Varin SkillUp Academy?</h2>
                <p class="text-xl text-gray-600">What makes us different</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl p-8 text-center hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3">Qualified Faculty</h3>
                    <p class="text-gray-600">Experienced and certified instructors with industry expertise</p>
                </div>

                <div class="bg-white rounded-xl p-8 text-center hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3">International Standards</h3>
                    <p class="text-gray-600">Curriculum designed to meet global educational standards</p>
                </div>

                <div class="bg-white rounded-xl p-8 text-center hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3">Practical Training</h3>
                    <p class="text-gray-600">Hands-on learning with real-world applications</p>
                </div>

                <div class="bg-white rounded-xl p-8 text-center hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3">Supportive Environment</h3>
                    <p class="text-gray-600">Inclusive and encouraging learning atmosphere</p>
                </div>

                <div class="bg-white rounded-xl p-8 text-center hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3">Professional Focus</h3>
                    <p class="text-gray-600">Programs designed for both students and professionals</p>
                </div>

                <div class="bg-white rounded-xl p-8 text-center hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-3">Innovation</h3>
                    <p class="text-gray-600">Cutting-edge teaching methods and technology</p>
                </div>
            </div>
        </div>
    </section>
@endsection
