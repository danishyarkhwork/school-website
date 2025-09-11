<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Certificate Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Certificate Information</h3>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.certificates.edit', $certificate) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit Certificate
                            </a>
                            <a href="{{ route('admin.certificates.index') }}"
                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
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
                    <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Verification URL
                        </label>
                        <div class="flex items-center space-x-2">
                            <input type="text"
                                value="{{ $certificate->qr_code_data ?? route('certificate.verify.show', $certificate->certificate_id) }}"
                                class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                readonly>
                            <button
                                onclick="copyToClipboard('{{ $certificate->qr_code_data ?? route('certificate.verify.show', $certificate->certificate_id) }}')"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Copy URL
                            </button>
                        </div>
                        <p class="mt-2 text-sm text-gray-600">
                            This URL can be used to generate a QR code for the certificate. When scanned, it will show
                            the verification result.
                        </p>
                    </div>

                    <!-- Actions -->
                    <div class="mt-6 flex justify-between">
                        <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this certificate? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete Certificate
                            </button>
                        </form>

                        <a href="{{ route('certificate.verify.show', $certificate->certificate_id) }}" target="_blank"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            View Verification Page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('URL copied to clipboard!');
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }
    </script>
</x-app-layout>
