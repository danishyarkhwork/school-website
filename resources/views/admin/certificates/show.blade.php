@extends('layouts.main')

@section('title', 'Certificate Details - Admin')
@section('description', 'Admin - view certificate details and information')

@section('content')
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-primary">Certificate Details</h1>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.certificates.edit', $certificate) }}"
                                class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 shadow-glow">
                                Edit Certificate
                            </a>
                            <a href="{{ route('admin.certificates.index') }}"
                                class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Certificate ID -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Certificate ID
                            </label>
                            <p class="text-lg font-semibold text-gray-900">{{ $certificate->certificate_id }}</p>
                        </div>

                        <!-- Verification Status -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Verification Status
                            </label>
                            <span
                                class="px-3 py-1 text-sm font-semibold rounded-full
                                {{ $certificate->is_verified ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $certificate->is_verified ? 'Verified' : 'Not Verified' }}
                            </span>
                        </div>

                        <!-- Student Name -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Student Name
                            </label>
                            <p class="text-gray-900">{{ $certificate->student_name }}</p>
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

                        <!-- Course ID -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Course ID
                            </label>
                            <p class="text-gray-900">{{ $certificate->course_id }}</p>
                        </div>

                        <!-- NIC Number -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                NIC Number
                            </label>
                            <p class="text-gray-900">{{ $certificate->nic_number }}</p>
                        </div>

                        <!-- Graduation Date -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Graduation Date
                            </label>
                            <p class="text-gray-900">{{ $certificate->graduation_date->format('F d, Y') }}</p>
                        </div>

                        <!-- Teacher Name -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Teacher Name
                            </label>
                            <p class="text-gray-900">{{ $certificate->teacher_name }}</p>
                        </div>

                        <!-- Course Name -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Course Name
                            </label>
                            <p class="text-gray-900">{{ $certificate->course_name }}</p>
                        </div>

                        <!-- Created Date -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Created Date
                            </label>
                            <p class="text-gray-900">{{ $certificate->created_at->format('F d, Y H:i') }}</p>
                        </div>

                        <!-- Last Updated -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Last Updated
                            </label>
                            <p class="text-gray-900">{{ $certificate->updated_at->format('F d, Y H:i') }}</p>
                        </div>
                    </div>

                <!-- QR Code Information -->
                <div class="mt-6 bg-gray-50 p-6 rounded-lg">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">
                        <i class="fas fa-qrcode text-primary mr-2"></i>
                        QR Code & Verification URL
                    </h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- QR Code Display -->
                        <div class="text-center">
                            <div class="bg-white p-4 rounded-lg border-2 border-gray-200 inline-block">
                                <img src="{{ $certificate->getQrCodeUrl() }}" 
                                     alt="QR Code for Certificate {{ $certificate->certificate_id }}"
                                     class="w-48 h-48 mx-auto">
                            </div>
                            <p class="mt-2 text-sm text-gray-600">
                                Scan this QR code to verify the certificate
                            </p>
                        </div>
                        
                        <!-- Verification URL -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Verification URL
                            </label>
                            <div class="flex items-center space-x-2">
                                <input type="text"
                                    value="{{ $certificate->qr_code_data ?? route('certificate.verify.show', $certificate->certificate_id) }}"
                                    class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"
                                    readonly>
                                <button
                                    onclick="copyToClipboard('{{ $certificate->qr_code_data ?? route('certificate.verify.show', $certificate->certificate_id) }}')"
                                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">
                                    Copy URL
                                </button>
                            </div>
                            <p class="mt-2 text-sm text-gray-600">
                                This URL can be used to generate a QR code for the certificate. When scanned, it will show
                                the verification result.
                            </p>
                        </div>
                    </div>
                </div>

                    <!-- Actions -->
                    <div class="mt-6 flex justify-between">
                        <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this certificate? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                Delete Certificate
                            </button>
                        </form>

                        <a href="{{ route('certificate.verify.show', $certificate->certificate_id) }}" target="_blank"
                            class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                            View Verification Page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush

@push('scripts')
<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            alert('URL copied to clipboard!');
        }, function(err) {
            console.error('Could not copy text: ', err);
        });
    }
</script>
@endpush
@endsection
