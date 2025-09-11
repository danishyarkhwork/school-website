<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Certificate') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.certificates.update', $certificate) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Certificate ID (Read-only) -->
                            <div>
                                <label for="certificate_id" class="block text-sm font-medium text-gray-700">
                                    Certificate ID
                                </label>
                                <input type="text" value="{{ $certificate->certificate_id }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-500 sm:text-sm"
                                    readonly>
                                <p class="mt-1 text-xs text-gray-500">Certificate ID cannot be changed</p>
                            </div>

                            <!-- Student Name -->
                            <div>
                                <label for="student_name" class="block text-sm font-medium text-gray-700">
                                    Student Name *
                                </label>
                                <input type="text" name="student_name" id="student_name"
                                    value="{{ old('student_name', $certificate->student_name) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('student_name') border-red-500 @enderror"
                                    required>
                                @error('student_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Father Name -->
                            <div>
                                <label for="father_name" class="block text-sm font-medium text-gray-700">
                                    Father Name *
                                </label>
                                <input type="text" name="father_name" id="father_name"
                                    value="{{ old('father_name', $certificate->father_name) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('father_name') border-red-500 @enderror"
                                    required>
                                @error('father_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Student ID -->
                            <div>
                                <label for="student_id" class="block text-sm font-medium text-gray-700">
                                    Student ID *
                                </label>
                                <input type="text" name="student_id" id="student_id"
                                    value="{{ old('student_id', $certificate->student_id) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('student_id') border-red-500 @enderror"
                                    required>
                                @error('student_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Course ID -->
                            <div>
                                <label for="course_id" class="block text-sm font-medium text-gray-700">
                                    Course ID *
                                </label>
                                <input type="text" name="course_id" id="course_id"
                                    value="{{ old('course_id', $certificate->course_id) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('course_id') border-red-500 @enderror"
                                    required>
                                @error('course_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- NIC Number -->
                            <div>
                                <label for="nic_number" class="block text-sm font-medium text-gray-700">
                                    NIC Number *
                                </label>
                                <input type="text" name="nic_number" id="nic_number"
                                    value="{{ old('nic_number', $certificate->nic_number) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nic_number') border-red-500 @enderror"
                                    required>
                                @error('nic_number')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Graduation Date -->
                            <div>
                                <label for="graduation_date" class="block text-sm font-medium text-gray-700">
                                    Graduation Date *
                                </label>
                                <input type="date" name="graduation_date" id="graduation_date"
                                    value="{{ old('graduation_date', $certificate->graduation_date->format('Y-m-d')) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('graduation_date') border-red-500 @enderror"
                                    required>
                                @error('graduation_date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Teacher Name -->
                            <div>
                                <label for="teacher_name" class="block text-sm font-medium text-gray-700">
                                    Teacher Name *
                                </label>
                                <input type="text" name="teacher_name" id="teacher_name"
                                    value="{{ old('teacher_name', $certificate->teacher_name) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('teacher_name') border-red-500 @enderror"
                                    required>
                                @error('teacher_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Course Name -->
                            <div>
                                <label for="course_name" class="block text-sm font-medium text-gray-700">
                                    Course Name *
                                </label>
                                <input type="text" name="course_name" id="course_name"
                                    value="{{ old('course_name', $certificate->course_name) }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('course_name') border-red-500 @enderror"
                                    required>
                                @error('course_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Verification Status -->
                            <div>
                                <label for="is_verified" class="block text-sm font-medium text-gray-700">
                                    Verification Status
                                </label>
                                <select name="is_verified" id="is_verified"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('is_verified') border-red-500 @enderror">
                                    <option value="1"
                                        {{ old('is_verified', $certificate->is_verified) ? 'selected' : '' }}>Verified
                                    </option>
                                    <option value="0"
                                        {{ !old('is_verified', $certificate->is_verified) ? 'selected' : '' }}>Not
                                        Verified</option>
                                </select>
                                @error('is_verified')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <a href="{{ route('admin.certificates.index') }}"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                Cancel
                            </a>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Certificate
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
