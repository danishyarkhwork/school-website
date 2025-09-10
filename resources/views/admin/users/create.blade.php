@extends('layouts.main')

@section('title', 'Add User - Admin')
@section('description', 'Admin - add user')

@section('content')
    <section class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-primary mb-6">Add User</h1>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2" required>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" class="mt-1 w-full border rounded-lg px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="mt-1 w-full border rounded-lg px-3 py-2"
                            required>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg">Create</button>
                    <a href="{{ route('admin.users.index') }}" class="ml-2 text-gray-600">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection
