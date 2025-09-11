@extends('layouts.main')

@section('title', 'Certificate Verification - Varin Academy')
@section('description', 'Verify the authenticity of graduation certificates issued by Varin Academy. Enter certificate
    ID or scan QR code to check verification status.')

@section('content')
    <section class="relative py-12 bg-gradient-to-b from-light to-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-primary mb-4">
                    <i class="fas fa-certificate text-accent mr-3"></i>
                    Certificate Verification
                </h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Verify the authenticity of graduation certificates issued by our institution.
                    Enter the certificate ID or scan the QR code to check verification status.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-8">
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('certificate.verify.post') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="text-center">
                        <label for="certificate_id" class="block text-lg font-medium text-gray-700 mb-4">
                            Enter Certificate ID
                        </label>
                        <div class="max-w-md mx-auto">
                            <div class="relative">
                                <input type="text" name="certificate_id" id="certificate_id"
                                    value="{{ old('certificate_id') }}" placeholder="e.g., CERT-ABC123XYZ"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-center text-lg @error('certificate_id') border-red-500 @enderror"
                                    required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                            </div>
                            @error('certificate_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit"
                            class="bg-primary hover:bg-primary/90 text-white font-bold py-3 px-8 rounded-lg text-lg transition duration-200 shadow-glow">
                            <i class="fas fa-search mr-2"></i>
                            Verify Certificate
                        </button>
                    </div>
                </form>

                <!-- QR Code Scanner Section -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="text-center">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">
                            <i class="fas fa-qrcode text-accent mr-2"></i>
                            Scan QR Code
                        </h3>
                        <p class="text-gray-600 mb-6">
                            Use your mobile device to scan the QR code on the certificate
                        </p>

                        <!-- QR Code Scanner Placeholder -->
                        <div class="max-w-sm mx-auto bg-gray-50 rounded-lg p-8 border-2 border-dashed border-gray-300">
                            <i class="fas fa-qrcode text-6xl text-gray-400 mb-4"></i>
                            <p class="text-gray-500 text-sm">
                                QR Code Scanner<br>
                                <span class="text-xs">(Mobile camera will open)</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Instructions -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 mb-4 text-center">
                        <i class="fas fa-info-circle text-primary mr-2"></i>
                        How to Verify
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="bg-primary/10 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                                <span class="text-primary font-bold">1</span>
                            </div>
                            <h4 class="font-medium text-gray-900 mb-2">Enter Certificate ID</h4>
                            <p class="text-sm text-gray-600">Type the certificate ID found on the certificate</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-primary/10 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                                <span class="text-primary font-bold">2</span>
                            </div>
                            <h4 class="font-medium text-gray-900 mb-2">Click Verify</h4>
                            <p class="text-sm text-gray-600">Submit the form to check the certificate</p>
                        </div>
                        <div class="text-center">
                            <div class="bg-primary/10 rounded-full w-12 h-12 flex items-center justify-center mx-auto mb-3">
                                <span class="text-primary font-bold">3</span>
                            </div>
                            <h4 class="font-medium text-gray-900 mb-2">View Results</h4>
                            <p class="text-sm text-gray-600">See the verification status and details</p>
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
