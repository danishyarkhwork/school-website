@extends('layouts.main')

@section('title', 'Certificate Management - Admin')
@section('description', 'Admin - manage graduation certificates')

@section('content')
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-primary">Certificate Management</h1>
                        <a href="{{ route('admin.certificates.create') }}"
                            class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 shadow-glow">
                            Add New Certificate
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Certificate ID
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Student Name
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Course
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Graduation Date
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($certificates as $certificate)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $certificate->certificate_id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $certificate->student_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $certificate->course_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $certificate->graduation_date->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                {{ $certificate->is_verified ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $certificate->is_verified ? 'Verified' : 'Not Verified' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-3 items-center">
                                                <a href="{{ route('admin.certificates.show', $certificate) }}"
                                                    class="text-blue-600 hover:text-blue-900">View</a>
                                                <a href="{{ route('admin.certificates.edit', $certificate) }}"
                                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <form action="{{ route('admin.certificates.destroy', $certificate) }}"
                                                    method="POST" class="inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this certificate?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                                        Delete
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.certificates.generate-qr', $certificate) }}"
                                                    class="text-green-700 hover:text-green-900 font-semibold">Generate
                                                    QR</a>
                                                @php
                                                    $qrPath = public_path(
                                                        'assets/images/certificates/qr/' .
                                                            $certificate->certificate_id .
                                                            '.png',
                                                    );
                                                @endphp
                                                @if (file_exists($qrPath))
                                                    <a href="{{ asset('assets/images/certificates/qr/' . $certificate->certificate_id . '.png') }}"
                                                        target="_blank" class="text-gray-700 hover:text-gray-900">View
                                                        QR</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                            No certificates found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $certificates->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
