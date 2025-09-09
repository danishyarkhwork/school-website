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
                <!-- Contact Form -->
                <div>
                    <h2 class="text-3xl font-bold text-primary mb-8">Send us a Message</h2>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First
                                    Name</label>
                                <input type="text" id="first_name" name="first_name"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent"
                                    required>
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last
                                    Name</label>
                                <input type="text" id="last_name" name="last_name"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent"
                                required>
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent">
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                            <select id="subject" name="subject"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent">
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="admissions">Admissions</option>
                                <option value="courses">Course Information</option>
                                <option value="support">Technical Support</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea id="message" name="message" rows="6"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent"
                                placeholder="Tell us how we can help you..." required></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-accent text-primary px-8 py-4 rounded-lg font-semibold hover:bg-accent/90 transition-colors duration-200 shadow-glow">
                            Send Message
                        </button>
                    </form>
                </div>

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
                                <p class="text-gray-600">
                                    info@varinacademy.com<br>admissions@varinacademy.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- Map Placeholder -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-primary mb-4">Find Us on Map</h3>
                        <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                            <p class="text-gray-500">Interactive Map Coming Soon</p>
                        </div>
                    </div>
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
