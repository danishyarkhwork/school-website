@extends('layouts.main')

@section('title', 'Certificate Not Found - Varin Academy')
@section('description', 'The requested certificate ID was not found in our verification system.')

@section('content')
    <section class="relative py-12 bg-gradient-to-b from-light to-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-primary mb-4">
                    <i class="fas fa-exclamation-triangle text-red-600 mr-3"></i>
                    Certificate Not Found
                </h1>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Error Header -->
                <div class="bg-gradient-to-r from-red-500 to-red-600 px-6 py-8 text-center">
                    <div class="text-white">
                        <i class="fas fa-times-circle text-6xl mb-4"></i>
                        <h2 class="text-3xl font-bold mb-2">Certificate Not Found</h2>
                        <p class="text-xl opacity-90">The certificate ID you entered does not exist in our system</p>
                    </div>
                </div>

                <!-- Error Details -->
                <div class="p-8">
                    <div class="text-center mb-8">
                        <div class="bg-red-50 border border-red-200 rounded-lg p-6 mb-6">
                            <h3 class="text-lg font-semibold text-red-800 mb-2">
                                Certificate ID: {{ $certificate_id }}
                            </h3>
                            <p class="text-red-700">
                                This certificate ID was not found in our verification database.
                            </p>
                        </div>

                        <div class="bg-primary/5 border border-primary/20 rounded-lg p-6">
                            <h4 class="text-lg font-semibold text-primary mb-3">
                                <i class="fas fa-info-circle mr-2"></i>
                                Possible Reasons
                            </h4>
                            <ul class="text-left text-gray-700 space-y-2 max-w-md mx-auto">
                                <li class="flex items-start">
                                    <i class="fas fa-check text-primary mt-1 mr-2 text-sm"></i>
                                    The certificate ID may be incorrect
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-primary mt-1 mr-2 text-sm"></i>
                                    The certificate may not have been issued yet
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-primary mt-1 mr-2 text-sm"></i>
                                    The certificate may have been revoked or deleted
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-primary mt-1 mr-2 text-sm"></i>
                                    There may be a typo in the certificate ID
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="text-center space-y-4">
                        <a href="{{ route('certificate.verify') }}"
                            class="inline-block bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-lg transition duration-200 shadow-glow">
                            <i class="fas fa-search mr-2"></i>
                            Try Another Certificate ID
                        </a>

                        <div class="text-sm text-gray-600">
                            <p>Need help? Contact us at <a href="mailto:support@school.com"
                                    class="text-primary hover:text-primary/80">support@school.com</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Help Section -->
            <div class="mt-8 bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 text-center">
                    <i class="fas fa-question-circle text-primary mr-2"></i>
                    Need Help?
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="text-center">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <i class="fas fa-phone text-primary text-2xl mb-2"></i>
                            <h4 class="font-medium text-gray-900 mb-1">Call Us</h4>
                            <p class="text-sm text-gray-600">+1 (555) 123-4567</p>
                            <p class="text-xs text-gray-500">Mon-Fri 9AM-5PM</p>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <i class="fas fa-envelope text-primary text-2xl mb-2"></i>
                            <h4 class="font-medium text-gray-900 mb-1">Email Us</h4>
                            <p class="text-sm text-gray-600">support@school.com</p>
                            <p class="text-xs text-gray-500">24/7 Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush
