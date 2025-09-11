@extends('layouts.main')

@section('title', 'Varin SkillUp Academy - Empowering Skills, Shaping Futures')
@section('description',
    'Varin SkillUp Academy is a leading educational and professional training institute in
    Afghanistan, dedicated to building knowledge, enhancing skills, and shaping brighter futures.')

@section('content')
    <!-- Hero Section -->
    <section
        class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-primary via-primary to-secondary">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-24 -left-24 w-80 h-80 bg-accent/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-warning/20 rounded-full blur-3xl animate-float-delayed">
            </div>
            <div class="absolute top-1/2 left-1/4 w-32 h-32 bg-success/20 rounded-full blur-2xl animate-float"></div>
            <div class="absolute top-1/4 right-1/3 w-24 h-24 bg-info/20 rounded-full blur-2xl animate-float-delayed"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="text-white">
                    <h1 class="text-5xl lg:text-7xl font-bold leading-tight mb-6" id="hero-title">
                        Empowering Skills,
                        <span class="text-accent">Shaping Futures</span>
                    </h1>
                    <p class="text-xl lg:text-2xl text-white/90 mb-8 max-w-lg" id="hero-description">
                        Leading educational and professional training institute in Afghanistan, dedicated to building
                        knowledge, enhancing skills, and shaping brighter futures.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4" id="hero-buttons">
                        <a href="{{ route('courses') }}"
                            class="inline-flex items-center justify-center px-8 py-4 bg-accent text-primary font-semibold rounded-lg hover:bg-accent/90 transition-all duration-200 shadow-glow">
                            More Details
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center justify-center px-8 py-4 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-primary transition-all duration-200">
                            Contact Us
                        </a>
                    </div>
                </div>

                <!-- Right Content - Creative Image Design -->
                <div class="relative">
                    <!-- Main Image Container with Creative Layout -->
                    <div class="relative w-full h-96 lg:h-[450px]">
                        <!-- Large Main Image - Tilted -->
                        <div class="absolute top-0 left-0 w-3/4 h-4/5 rounded-2xl overflow-hidden transform rotate-3 shadow-2xl"
                            id="hero-image">
                            <img src="{{ asset('assets/images/1.jpg') }}" alt="Varin SkillUp Academy Students"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary/40 to-transparent"></div>

                            <!-- Floating Badge -->
                            <div
                                class="absolute top-4 right-4 bg-accent text-primary px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                Excellence in Education
                            </div>
                        </div>

                        <!-- Small Image - Floating Card Style -->
                        <div class="absolute bottom-0 right-0 w-2/3 h-3/5 rounded-2xl overflow-hidden transform -rotate-6 shadow-2xl border-4 border-white"
                            id="small-image">
                            <img src="{{ asset('assets/images/3.jpg') }}" alt="Students Learning"
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>

                            <!-- Content Overlay -->
                            <div class="absolute bottom-4 left-4 text-white">
                                <div class="flex items-center space-x-2 mb-2">
                                    <div class="w-2 h-2 bg-accent rounded-full animate-pulse"></div>
                                    <span class="text-sm font-medium">Live Learning</span>
                                </div>
                                <h4 class="text-lg font-bold">Interactive Classes</h4>
                            </div>
                        </div>

                        <!-- Decorative Elements -->
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-accent rounded-full animate-bounce" id="shape-1">
                        </div>
                        <div class="absolute top-1/3 -left-3 w-4 h-4 bg-warning rounded-full animate-pulse" id="shape-2">
                        </div>
                        <div class="absolute bottom-1/4 -right-4 w-3 h-3 bg-success rounded-full animate-ping"
                            id="shape-3"></div>
                        <div class="absolute top-2/3 -left-6 w-5 h-5 bg-info rounded-full animate-bounce" id="shape-4">
                        </div>

                        <!-- Connection Line -->
                        <div
                            class="absolute top-1/2 left-1/2 w-16 h-1 bg-gradient-to-r from-accent to-warning transform -translate-x-1/2 -translate-y-1/2 rotate-45 opacity-60">
                        </div>
                    </div>

                    <!-- Floating Stats Cards -->
                    <div class="absolute -bottom-8 -left-8 bg-white rounded-xl p-4 shadow-xl transform -rotate-2"
                        id="stats-card-1">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-accent rounded-full flex items-center justify-center">
                                <span class="text-primary font-bold text-sm">500+</span>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Students</p>
                                <p class="text-sm font-semibold text-primary">Graduated</p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -top-8 -right-8 bg-white rounded-xl p-4 shadow-xl transform rotate-2"
                        id="stats-card-2">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-success rounded-full flex items-center justify-center">
                                <span class="text-white font-bold text-sm">95%</span>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Success</p>
                                <p class="text-sm font-semibold text-primary">Rate</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- About Us Section -->
    <section class="py-20 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-primary mb-6">About Varin SkillUp Academy</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Varin SkillUp Academy is a leading educational and professional training institute in Afghanistan,
                        dedicated to building knowledge, enhancing skills, and shaping brighter futures for individuals
                        across all age groups.
                    </p>
                    <p class="text-lg text-gray-600 mb-6">
                        We believe education is the foundation of progress, and our mission is to empower learners with the
                        tools, techniques, and confidence they need to excel in academic, professional, and global
                        environments.
                    </p>
                    <p class="text-lg text-gray-600">
                        With a strong commitment to quality, innovation, and professional excellence, Varin SkillUp Academy
                        offers a wide range of programs in Languages, IT, Professional Certifications, and Creative Design.
                        Our programs are tailored to meet international standards while addressing the specific needs of
                        Afghan learners and professionals.
                    </p>
                </div>
                <div class="relative">
                    <div class="w-full h-96 rounded-2xl overflow-hidden relative">
                        <img src="{{ asset('assets/images/3.jpg') }}" alt="Varin SkillUp Academy"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/80 to-secondary/80"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center text-white">
                                <img src="{{ asset('assets/images/varin-academy-logo.svg') }}" alt="VA Logo"
                                    class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                                <h3 class="text-2xl font-bold mb-2">Varin SkillUp Academy</h3>
                                <p class="text-white/90">Your Partner in Education, Skills, and Success</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Vision -->
                <div class="relative p-8 rounded-2xl text-white overflow-hidden">
                    <img src="{{ asset('assets/images/4.jpg') }}" alt="Focused Learning"
                        class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/90 to-secondary/90"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Our Vision</h3>
                        <p class="text-white/90 text-lg">
                            To become Afghanistan's most trusted and innovative learning academy, recognized for
                            transforming
                            knowledge into skills and empowering individuals to achieve success in both local and global
                            arenas.
                        </p>
                    </div>
                </div>

                <!-- Mission -->
                <div class="relative p-8 rounded-2xl text-primary overflow-hidden">
                    <img src="{{ asset('assets/images/5.jpg') }}" alt="Professional Training"
                        class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-br from-accent/90 to-warning/90"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                        <ul class="text-primary space-y-2">
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-primary rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                <span>To provide world-class education and professional training accessible to
                                    everyone.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-primary rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                <span>To bridge the gap between academic learning and practical industry needs.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-primary rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                <span>To equip Afghan youth and professionals with internationally recognized skills.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-primary rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                <span>To foster a culture of innovation, creativity, and lifelong learning.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CEO's Message Section -->
    <section class="py-20 bg-light">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-lg">
                <div class="text-center mb-8">
                    <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4 border-4 border-white shadow-lg">
                        <img src="{{ asset('assets/images/rashid-alami.jpeg') }}" alt="Abdul Rashid Alami"
                            class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <h3 class="text-2xl font-bold text-primary mb-2">CEO's Message</h3>
                    <p class="text-gray-600">Abdul Rashid Alami - Founder & CEO</p>
                </div>
                <blockquote class="text-lg text-gray-700 italic text-center leading-relaxed">
                    "Education is not just about learning—it is about transformation. At Varin SkillUp Academy, our goal is
                    to create an environment where every learner discovers their potential and develops the confidence to
                    succeed in today's competitive world. We believe Afghanistan's future lies in the hands of its skilled
                    and educated youth. That is why we are committed to delivering high-quality, practical, and globally
                    relevant training. Together, we can build a brighter tomorrow for our nation and beyond."
                </blockquote>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-primary mb-4">Our Programs</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Comprehensive training programs designed to meet international standards and address the specific needs
                    of Afghan learners and professionals.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Language Training -->
                <div class="bg-gradient-to-br from-primary to-secondary p-6 rounded-2xl text-white">
                    <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Language Training</h3>
                    <ul class="text-sm space-y-1 text-white/90">
                        <li>• English: DEL, CEL, TOEFL, IELTS</li>
                        <li>• Special Conversation & Grammar</li>
                        <li>• Kids' English Program</li>
                        <li>• Arabic: Beginner to Advanced</li>
                    </ul>
                </div>

                <!-- Computer & IT -->
                <div class="bg-gradient-to-br from-secondary to-info p-6 rounded-2xl text-white">
                    <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Computer & IT</h3>
                    <ul class="text-sm space-y-1 text-white/90">
                        <li>• Diploma in IT (DIT)</li>
                        <li>• Certificate in IT (CIT)</li>
                        <li>• International Digital Literacy (ICDL)</li>
                        <li>• Web Development & Design</li>
                    </ul>
                </div>

                <!-- Creative Design -->
                <div class="bg-gradient-to-br from-warning to-danger p-6 rounded-2xl text-white">
                    <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Creative Design</h3>
                    <ul class="text-sm space-y-1 text-white/90">
                        <li>• Adobe Photoshop & Illustrator</li>
                        <li>• Adobe Lightroom & InDesign</li>
                        <li>• Adobe Premiere Pro</li>
                        <li>• Corel DRAW & Acrobat</li>
                    </ul>
                </div>

                <!-- Professional Programs -->
                <div class="bg-gradient-to-br from-success to-info p-6 rounded-2xl text-white">
                    <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Professional Programs</h3>
                    <ul class="text-sm space-y-1 text-white/90">
                        <li>• Financial & Advanced Accounting</li>
                        <li>• QuickBooks & Digital Marketing</li>
                        <li>• UI/UX Design & Cybersecurity</li>
                        <li>• Web Application Development</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner Gallery Section -->
    <section class="py-20 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-primary mb-4">Our Academy in Pictures</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Take a glimpse into our modern facilities, learning environment, and student activities
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ asset('assets/images/1.jpg') }}" alt="Academy Overview"
                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div
                        class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <h3 class="text-lg font-semibold">Academy Overview</h3>
                        <p class="text-sm">Your gateway to professional success</p>
                    </div>
                </div>

                <div
                    class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ asset('assets/images/3.jpg') }}" alt="Student Engagement"
                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div
                        class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <h3 class="text-lg font-semibold">Student Engagement</h3>
                        <p class="text-sm">Active and collaborative learning</p>
                    </div>
                </div>

                <div
                    class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ asset('assets/images/4.jpg') }}" alt="Classroom Learning"
                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div
                        class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <h3 class="text-lg font-semibold">Classroom Learning</h3>
                        <p class="text-sm">Interactive educational environment</p>
                    </div>
                </div>

                <div
                    class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ asset('assets/images/5.jpg') }}" alt="Focused Learning"
                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div
                        class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <h3 class="text-lg font-semibold">Focused Learning</h3>
                        <p class="text-sm">Individual attention and growth</p>
                    </div>
                </div>

                <div
                    class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 md:col-span-2">
                    <img src="{{ asset('assets/images/1.jpg') }}" alt="Professional Training"
                        class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div
                        class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <h3 class="text-lg font-semibold">Professional Training</h3>
                        <p class="text-sm">Hands-on practical learning</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-primary mb-4">Why Choose Varin SkillUp Academy?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    We provide comprehensive education and professional training that meets international standards
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center p-8 rounded-2xl bg-white hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-4">Qualified Faculty</h3>
                    <p class="text-gray-600">Experienced and qualified instructors dedicated to providing world-class
                        education and professional training.</p>
                </div>

                <div class="text-center p-8 rounded-2xl bg-white hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-4">International Standards</h3>
                    <p class="text-gray-600">Internationally recognized curriculum and certifications that open doors to
                        global opportunities.</p>
                </div>

                <div class="text-center p-8 rounded-2xl bg-white hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-success rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-4">Practical Training</h3>
                    <p class="text-gray-600">Hands-on, practical training that bridges the gap between academic learning
                        and industry needs.</p>
                </div>

                <div class="text-center p-8 rounded-2xl bg-white hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-warning rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-4">Supportive Environment</h3>
                    <p class="text-gray-600">Inclusive and supportive learning environment that fosters growth and
                        development for all students.</p>
                </div>

                <div class="text-center p-8 rounded-2xl bg-white hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-info rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-4">Flexible Programs</h3>
                    <p class="text-gray-600">Programs designed for both students and professionals, with flexible schedules
                        to meet diverse needs.</p>
                </div>

                <div class="text-center p-8 rounded-2xl bg-white hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-danger rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-4">Innovation Focus</h3>
                    <p class="text-gray-600">Cutting-edge programs in IT, Digital Marketing, Cybersecurity, and Creative
                        Design for modern careers.</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Typing Animation
            const typingText = document.getElementById('typing-text');
            const texts = [
                'Language Training',
                'IT Programs',
                'Graphic Design',
                'Professional Certifications',
                'Digital Marketing',
                'Web Development'
            ];

            let textIndex = 0;
            let charIndex = 0;
            let isDeleting = false;

            function typeText() {
                const currentText = texts[textIndex];

                if (isDeleting) {
                    typingText.textContent = currentText.substring(0, charIndex - 1);
                    charIndex--;
                } else {
                    typingText.textContent = currentText.substring(0, charIndex + 1);
                    charIndex++;
                }

                let typeSpeed = isDeleting ? 50 : 100;

                if (!isDeleting && charIndex === currentText.length) {
                    typeSpeed = 2000; // Pause at end
                    isDeleting = true;
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    textIndex = (textIndex + 1) % texts.length;
                    typeSpeed = 500; // Pause before next text
                }

                setTimeout(typeText, typeSpeed);
            }

            // Start typing animation
            typeText();

            // Motion.js Animations
            if (typeof animate !== 'undefined') {
                // Hero image animation
                animate('#hero-image', {
                    scale: [0.8, 1],
                    opacity: [0, 1]
                }, {
                    duration: 1.5,
                    easing: 'ease-out'
                });

                // Small image animation
                animate('#small-image', {
                    scale: [0, 1],
                    rotate: [-180, -6]
                }, {
                    duration: 1.2,
                    delay: 0.8,
                    easing: 'ease-out'
                });

                // Stats cards animation
                animate('#stats-card-1', {
                    y: [50, 0],
                    opacity: [0, 1],
                    rotate: [-10, -2]
                }, {
                    duration: 1,
                    delay: 1.2,
                    easing: 'ease-out'
                });

                animate('#stats-card-2', {
                    y: [-50, 0],
                    opacity: [0, 1],
                    rotate: [10, 2]
                }, {
                    duration: 1,
                    delay: 1.4,
                    easing: 'ease-out'
                });

                // Hero title animation
                animate('#hero-title', {
                    y: [50, 0],
                    opacity: [0, 1]
                }, {
                    duration: 1,
                    delay: 0.3,
                    easing: 'ease-out'
                });

                // Hero description animation
                animate('#hero-description', {
                    y: [30, 0],
                    opacity: [0, 1]
                }, {
                    duration: 1,
                    delay: 0.6,
                    easing: 'ease-out'
                });

                // Hero buttons animation
                animate('#hero-buttons', {
                    y: [20, 0],
                    opacity: [0, 1]
                }, {
                    duration: 1,
                    delay: 0.9,
                    easing: 'ease-out'
                });

                // Logo animation
                animate('#logo-container', {
                    scale: [0, 1],
                    rotate: [180, 0]
                }, {
                    duration: 1.2,
                    delay: 0.5,
                    easing: 'ease-out'
                });

                // Typing section animation
                animate('#typing-section', {
                    y: [30, 0],
                    opacity: [0, 1]
                }, {
                    duration: 1,
                    delay: 1,
                    easing: 'ease-out'
                });

                // Animated shapes
                animate('#shape-1', {
                    y: [0, -20, 0],
                    rotate: [0, 360]
                }, {
                    duration: 3,
                    repeat: Infinity,
                    easing: 'ease-in-out'
                });

                animate('#shape-2', {
                    x: [0, 10, 0],
                    scale: [1, 1.2, 1]
                }, {
                    duration: 2,
                    repeat: Infinity,
                    easing: 'ease-in-out'
                });

                animate('#shape-3', {
                    scale: [1, 1.5, 1],
                    opacity: [0.7, 1, 0.7]
                }, {
                    duration: 2.5,
                    repeat: Infinity,
                    easing: 'ease-in-out'
                });

                animate('#shape-4', {
                    y: [0, -15, 0],
                    x: [0, 5, 0]
                }, {
                    duration: 2.8,
                    repeat: Infinity,
                    easing: 'ease-in-out'
                });
            }
        });
    </script>
@endsection
