@extends('layouts.main')

@section('title', 'Settings - Admin')
@section('description', 'Update site settings')

@section('content')
    <section class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow overflow-hidden p-6">
                <h1 class="text-2xl font-bold text-primary mb-6">General Settings</h1>

                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Contact recipient email</label>
                        <input type="email" name="contact_recipient_email"
                            value="{{ old('contact_recipient_email', $contactRecipient) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent"
                            required>
                        @error('contact_recipient_email')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90">Save
                            Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
