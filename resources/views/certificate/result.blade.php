@extends('layouts.main')

@section('title', 'Certificate Verification Result - Varin Academy')
@section('description', 'Certificate verification result showing the authenticity and details of the verified
    certificate.')

@section('content')
    <section class="relative py-12 bg-gradient-to-b from-light to-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-primary mb-4">
                    <i class="fas fa-certificate text-accent mr-3"></i>
                    Certificate Verification Result
                </h1>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Verification Status Header -->
                <div
                    class="bg-gradient-to-r {{ $certificate->is_verified ? 'from-green-500 to-green-600' : 'from-red-500 to-red-600' }} px-6 py-8 text-center">
                    <div class="text-white">
                        @if ($certificate->is_verified)
                            <i class="fas fa-check-circle text-6xl mb-4"></i>
                            <h2 class="text-3xl font-bold mb-2">Certificate Verified</h2>
                            <p class="text-xl opacity-90">This certificate is authentic and valid</p>
                        @else
                            <i class="fas fa-times-circle text-6xl mb-4"></i>
                            <h2 class="text-3xl font-bold mb-2">Certificate Not Verified</h2>
                            <p class="text-xl opacity-90">This certificate is not verified or has been revoked</p>
                        @endif
                    </div>
                </div>

                <!-- Certificate Details -->
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">
                        Certificate Information
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Certificate ID -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Certificate ID
                            </label>
                            <p class="text-lg font-semibold text-gray-900">{{ $certificate->certificate_id }}</p>
                        </div>

                        <!-- Student Name -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Student Name
                            </label>
                            <p class="text-lg font-semibold text-gray-900">{{ $certificate->student_name }}</p>
                        </div>

                        <!-- Father Name -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Father Name
                            </label>
                            <p class="text-gray-900">{{ $certificate->father_name }}</p>
                        </div>

                        <!-- Student ID -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Student ID
                            </label>
                            <p class="text-gray-900">{{ $certificate->student_id }}</p>
                        </div>

                        <!-- Course Name -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Course Name
                            </label>
                            <p class="text-gray-900">{{ $certificate->course_name }}</p>
                        </div>

                        <!-- Course ID -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Course ID
                            </label>
                            <p class="text-gray-900">{{ $certificate->course_id }}</p>
                        </div>

                        <!-- Teacher Name -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Teacher Name
                            </label>
                            <p class="text-gray-900">{{ $certificate->teacher_name }}</p>
                        </div>

                        <!-- Graduation Date -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Graduation Date
                            </label>
                            <p class="text-gray-900">{{ $certificate->graduation_date->format('F d, Y') }}</p>
                        </div>
                    </div>

                    <!-- Verification Details -->
                    <div class="mt-8 p-6 bg-primary/5 rounded-lg border border-primary/20">
                        <h4 class="text-lg font-semibold text-primary mb-3">
                            <i class="fas fa-shield-alt mr-2"></i>
                            Verification Details
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="font-medium text-primary">Verification Status:</span>
                                <span
                                    class="ml-2 px-2 py-1 rounded-full text-xs font-semibold
                                {{ $certificate->is_verified ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $certificate->is_verified ? 'VERIFIED' : 'NOT VERIFIED' }}
                                </span>
                            </div>
                            <div>
                                <span class="font-medium text-primary">Verified On:</span>
                                <span class="ml-2 text-gray-700">{{ now()->format('F d, Y H:i') }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-primary">Certificate Issued:</span>
                                <span class="ml-2 text-gray-700">{{ $certificate->created_at->format('F d, Y') }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-primary">Last Updated:</span>
                                <span class="ml-2 text-gray-700">{{ $certificate->updated_at->format('F d, Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-8 text-center space-y-4">
                        <a href="{{ route('certificate.verify') }}"
                            class="inline-block bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-lg transition duration-200 shadow-glow">
                            <i class="fas fa-search mr-2"></i>
                            Verify Another Certificate
                        </a>

                        <div class="text-sm text-gray-600">
                            <p>Need help? Contact us at <a href="mailto:support@school.com"
                                    class="text-primary hover:text-primary/80">support@school.com</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Notice -->
            <div class="mt-8 bg-yellow-50 border border-yellow-200 rounded-lg p-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-yellow-400 text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">
                            Security Notice
                        </h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>
                                This verification system is provided for official certificate validation purposes only.
                                Any unauthorized use or tampering with certificate information is strictly prohibited
                                and may result in legal action.
                            </p>
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
