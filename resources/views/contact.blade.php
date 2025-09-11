@extends('layouts.main')

@section('title', 'Contact Us - Varin SkillUp Academy')
@section('description',
    'Get in touch with Varin SkillUp Academy. We are here to answer your questions and help you with your
    educational journey.')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary to-secondary py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">Contact Us</h1>
            <p class="text-xl text-white/90 max-w-3xl mx-auto">
                Have questions? We're here to help. Get in touch with our team and we'll respond as soon as possible.
            </p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">


                <!-- Contact Information -->
                <div>
                    <h2 class="text-3xl font-bold text-primary mb-8">Get in Touch</h2>

                    <div class="space-y-8">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-primary mb-2">Visit Us</h3>
                                <p class="text-gray-600">2nd Floor, Aryoob Market<br>Ahmadshah Baba Mina<br>Kabul,
                                    Afghanistan
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-primary mb-2">Call Us</h3>
                                <p class="text-gray-600">0774801209<br>Mon - Fri: 8:00 AM - 6:00 PM<br>Sat: 9:00 AM -
                                    4:00 PM</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-primary mb-2">Email Us</h3>
                                <p class="text-gray-600">info@varinacademy.com</p>
                            </div>
                        </div>

                        <!-- Social Media Links -->
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-primary mb-2">Follow Us</h3>
                                <div class="flex space-x-3">
                                    <a href="https://www.facebook.com/varinacademy/" target="_blank"
                                        rel="noopener noreferrer"
                                        class="w-8 h-8 bg-blue-600 text-white rounded-lg flex items-center justify-center hover:bg-blue-700 transition-colors duration-200"
                                        title="Follow us on Facebook">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                        </svg>
                                    </a>
                                    <a href="https://www.linkedin.com/company/varinacademy/" target="_blank"
                                        rel="noopener noreferrer"
                                        class="w-8 h-8 bg-blue-700 text-white rounded-lg flex items-center justify-center hover:bg-blue-800 transition-colors duration-200"
                                        title="Connect with us on LinkedIn">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                        </svg>
                                    </a>
                                    <a href="https://wa.me/93774801209" target="_blank" rel="noopener noreferrer"
                                        class="w-8 h-8 bg-green-600 text-white rounded-lg flex items-center justify-center hover:bg-green-700 transition-colors duration-200"
                                        title="Contact us on WhatsApp">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488" />
                                        </svg>
                                    </a>
                                    <a href="https://www.youtube.com/@varinacademy" target="_blank"
                                        rel="noopener noreferrer"
                                        class="w-8 h-8 bg-red-600 text-white rounded-lg flex items-center justify-center hover:bg-red-700 transition-colors duration-200"
                                        title="Subscribe on YouTube">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M23.498 6.186a3.01 3.01 0 00-2.118-2.132C19.776 3.5 12 3.5 12 3.5s-7.776 0-9.38.554A3.01 3.01 0 00.502 6.186C0 7.8 0 12 0 12s0 4.2.502 5.814a3.01 3.01 0 002.118 2.132C4.224 20.5 12 20.5 12 20.5s7.776 0 9.38-.554a3.01 3.01 0 002.118-2.132C24 16.2 24 12 24 12s0-4.2-.502-5.814zM9.75 15.568V8.432L15.818 12 9.75 15.568z" />
                                        </svg>
                                    </a>
                                </div>
                                <p class="text-sm text-gray-500 mt-2">Stay connected with us on social media</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Contact Form -->
                <div>
                    <h2 class="text-3xl font-bold text-primary mb-8">Send us a Message</h2>
                    @if (session('success'))
                        <div class="mb-6 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
                    @endif
                    <form class="space-y-6" method="POST" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First
                                    Name</label>
                                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent"
                                    required>
                                @error('first_name')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last
                                    Name</label>
                                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent"
                                    required>
                                @error('last_name')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email
                                Address</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent"
                                required>
                            @error('email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone
                                Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent">
                            @error('phone')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                            <select id="subject" name="subject"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent">
                                <option value="">Select a subject</option>
                                <option value="general" @selected(old('subject') === 'general')>General Inquiry</option>
                                <option value="admissions" @selected(old('subject') === 'admissions')>Admissions</option>
                                <option value="courses" @selected(old('subject') === 'courses')>Course Information</option>
                                <option value="support" @selected(old('subject') === 'support')>Technical Support</option>
                                <option value="other" @selected(old('subject') === 'other')>Other</option>
                            </select>
                            @error('subject')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea id="message" name="message" rows="6"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent"
                                placeholder="Tell us how we can help you..." required>{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full bg-accent text-primary px-8 py-4 rounded-lg font-semibold hover:bg-accent/90 transition-colors duration-200 shadow-glow">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-light">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-primary mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-600">Find answers to common questions about Varin Academy</p>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-primary mb-2">What programs do you offer?</h3>
                    <p class="text-gray-600">We offer comprehensive educational programs including primary, secondary, and
                        specialized courses designed to meet modern learning standards.</p>
                </div>

                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-primary mb-2">How can I apply for admission?</h3>
                    <p class="text-gray-600">You can apply online through our website or visit our campus for in-person
                        application. Our admissions team will guide you through the process.</p>
                </div>

                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-primary mb-2">What are your class sizes?</h3>
                    <p class="text-gray-600">We maintain small class sizes to ensure personalized attention and better
                        learning outcomes for all students.</p>
                </div>

                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-primary mb-2">Do you offer financial aid?</h3>
                    <p class="text-gray-600">Yes, we offer various financial aid options and scholarships. Contact our
                        admissions office for more information about available programs.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
