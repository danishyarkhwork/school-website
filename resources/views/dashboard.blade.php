@extends('layouts.main')

@section('title', 'Dashboard - Admin')
@section('description', 'Admin dashboard overview and quick actions')

@section('content')
    <section class="relative py-12 bg-gradient-to-br from-blue-50 via-white to-indigo-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Header -->
            <div class="text-center mb-12">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center shadow-lg">
                        <i class="fas fa-tachometer-alt text-white text-2xl"></i>
                    </div>
                </div>
                <h1 class="text-4xl sm:text-5xl font-bold text-primary mb-4">
                    Welcome to Admin Dashboard
                </h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Manage your school website content, certificates, and users from one central location
                </p>
                <div class="mt-6 flex flex-wrap justify-center gap-4">
                    <a href="{{ route('admin.posts.create') }}"
                        class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary/90 shadow-lg transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-plus mr-2"></i>
                        Create New Post
                    </a>
                    <a href="{{ route('admin.certificates.create') }}"
                        class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 shadow-lg transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-certificate mr-2"></i>
                        Issue Certificate
                    </a>
                    <a href="{{ route('admin.users.create') }}"
                        class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 shadow-lg transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-user-plus mr-2"></i>
                        Add User
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Posts Card -->
                <div
                    class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-primary hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Posts</p>
                            <p class="text-3xl font-bold text-primary">{{ \App\Models\Post::count() }}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                <i class="fas fa-arrow-up text-green-500 mr-1"></i>
                                {{ \App\Models\Post::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count() }}
                                this month
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                            <i class="fas fa-newspaper text-primary text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Certificates Card -->
                <div
                    class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-green-500 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Certificates</p>
                            <p class="text-3xl font-bold text-green-600">{{ \App\Models\Certificate::count() }}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                <i class="fas fa-check-circle text-green-500 mr-1"></i>
                                All verified
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-certificate text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Published This Week Card -->
                <div
                    class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-blue-500 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Published This Week</p>
                            <p class="text-3xl font-bold text-blue-600">
                                {{ \App\Models\Post::whereBetween('published_at', [now()->startOfWeek(), now()->endOfWeek()])->count() }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                <i class="fas fa-calendar-week text-blue-500 mr-1"></i>
                                Weekly activity
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-calendar-check text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Drafts Card -->
                <div
                    class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-yellow-500 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Draft Posts</p>
                            <p class="text-3xl font-bold text-yellow-600">
                                {{ \App\Models\Post::whereNull('published_at')->count() }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                <i class="fas fa-edit text-yellow-500 mr-1"></i>
                                Pending review
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-file-alt text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Quick Actions -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-xl font-bold text-gray-800 flex items-center">
                                <i class="fas fa-bolt text-yellow-500 mr-3"></i>
                                Quick Actions
                            </h3>
                            <p class="text-gray-600 mt-1">Common administrative tasks</p>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <a href="{{ route('admin.posts.create') }}"
                                    class="group flex items-center p-4 rounded-xl border-2 border-transparent hover:border-primary hover:shadow-md transition-all duration-300">
                                    <div
                                        class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center mr-4 group-hover:bg-primary/20 transition-colors">
                                        <i class="fas fa-plus text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-800 group-hover:text-primary">Create New Post
                                        </div>
                                        <div class="text-sm text-gray-500">Publish news or updates</div>
                                    </div>
                                </a>

                                <a href="{{ route('admin.posts.index') }}"
                                    class="group flex items-center p-4 rounded-xl border-2 border-transparent hover:border-primary hover:shadow-md transition-all duration-300">
                                    <div
                                        class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center mr-4 group-hover:bg-primary/20 transition-colors">
                                        <i class="fas fa-edit text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-800 group-hover:text-primary">Manage Posts</div>
                                        <div class="text-sm text-gray-500">Edit or delete posts</div>
                                    </div>
                                </a>

                                <a href="{{ route('admin.users.index') }}"
                                    class="group flex items-center p-4 rounded-xl border-2 border-transparent hover:border-purple-600 hover:shadow-md transition-all duration-300">
                                    <div
                                        class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-purple-200 transition-colors">
                                        <i class="fas fa-users text-purple-600"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-800 group-hover:text-purple-600">Manage Users
                                        </div>
                                        <div class="text-sm text-gray-500">User accounts & permissions</div>
                                    </div>
                                </a>

                                <a href="{{ route('admin.certificates.index') }}"
                                    class="group flex items-center p-4 rounded-xl border-2 border-transparent hover:border-green-600 hover:shadow-md transition-all duration-300">
                                    <div
                                        class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-green-200 transition-colors">
                                        <i class="fas fa-certificate text-green-600"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-800 group-hover:text-green-600">Manage
                                            Certificates</div>
                                        <div class="text-sm text-gray-500">Graduation certificates</div>
                                    </div>
                                </a>

                                <a href="{{ route('news.index') }}"
                                    class="group flex items-center p-4 rounded-xl border-2 border-transparent hover:border-blue-600 hover:shadow-md transition-all duration-300">
                                    <div
                                        class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-blue-200 transition-colors">
                                        <i class="fas fa-external-link-alt text-blue-600"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-800 group-hover:text-blue-600">View Public Site
                                        </div>
                                        <div class="text-sm text-gray-500">See how visitors see it</div>
                                    </div>
                                </a>

                                <a href="{{ route('certificate.verify') }}"
                                    class="group flex items-center p-4 rounded-xl border-2 border-transparent hover:border-indigo-600 hover:shadow-md transition-all duration-300">
                                    <div
                                        class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-indigo-200 transition-colors">
                                        <i class="fas fa-search text-indigo-600"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-800 group-hover:text-indigo-600">Verify
                                            Certificate</div>
                                        <div class="text-sm text-gray-500">Check certificate authenticity</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-xl font-bold text-gray-800 flex items-center">
                                <i class="fas fa-clock text-blue-500 mr-3"></i>
                                Recent Activity
                            </h3>
                            <p class="text-gray-600 mt-1">Latest updates</p>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                @php
                                    $recentPosts = \App\Models\Post::orderByDesc('updated_at')->limit(3)->get();
                                @endphp
                                @forelse($recentPosts as $post)
                                    <div
                                        class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                        <div
                                            class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
                                            <i class="fas fa-newspaper text-primary text-sm"></i>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">{{ $post->title }}</p>
                                            <p class="text-xs text-gray-500">
                                                {{ $post->updated_at->diffForHumans() }}
                                                @if ($post->published_at)
                                                    <span
                                                        class="ml-2 px-2 py-0.5 bg-green-100 text-green-800 text-xs rounded-full">Published</span>
                                                @else
                                                    <span
                                                        class="ml-2 px-2 py-0.5 bg-yellow-100 text-yellow-800 text-xs rounded-full">Draft</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-8">
                                        <i class="fas fa-inbox text-gray-400 text-3xl mb-3"></i>
                                        <p class="text-gray-500">No recent activity</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Posts Table -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 flex items-center">
                                <i class="fas fa-list text-primary mr-3"></i>
                                Recent Posts
                            </h3>
                            <p class="text-gray-600 mt-1">Latest content updates</p>
                        </div>
                        <a href="{{ route('admin.posts.index') }}"
                            class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                            <i class="fas fa-eye mr-2"></i>
                            View All
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Post</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Updated</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse(\App\Models\Post::orderByDesc('updated_at')->limit(5)->get() as $post)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            @if ($post->image_path)
                                                <div class="flex-shrink-0 h-10 w-10 mr-3">
                                                    <img class="h-10 w-10 rounded-lg object-cover"
                                                        src="{{ asset($post->image_path) }}" alt="{{ $post->title }}">
                                                </div>
                                            @else
                                                <div class="flex-shrink-0 h-10 w-10 mr-3">
                                                    <div
                                                        class="h-10 w-10 rounded-lg bg-gray-200 flex items-center justify-center">
                                                        <i class="fas fa-image text-gray-400"></i>
                                                    </div>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ Str::limit($post->title, 40) }}</div>
                                                <div class="text-sm text-gray-500">
                                                    {{ Str::limit($post->excerpt ?? '', 50) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($post->published_at)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                <i class="fas fa-check-circle mr-1"></i>
                                                Published
                                            </span>
                                        @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                <i class="fas fa-clock mr-1"></i>
                                                Draft
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $post->updated_at->diffForHumans() }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('admin.posts.edit', $post) }}"
                                                class="text-primary hover:text-primary/80 transition-colors">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if ($post->published_at)
                                                <a href="{{ route('news.show', $post->slug) }}" target="_blank"
                                                    class="text-blue-600 hover:text-blue-800 transition-colors">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <i class="fas fa-newspaper text-gray-400 text-4xl mb-4"></i>
                                            <h3 class="text-lg font-medium text-gray-900 mb-2">No posts found</h3>
                                            <p class="text-gray-500 mb-4">Get started by creating your first post.</p>
                                            <a href="{{ route('admin.posts.create') }}"
                                                class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">
                                                <i class="fas fa-plus mr-2"></i>
                                                Create Post
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @endpush

    <script>
        (function() {
            const btn = document.getElementById('user-menu-btn');
            const menu = document.getElementById('user-menu');
            if (!btn || !menu) return;
            btn.addEventListener('click', () => menu.classList.toggle('hidden'));
            document.addEventListener('click', (e) => {
                if (!menu.contains(e.target) && !btn.contains(e.target)) {
                    menu.classList.add('hidden');
                }
            });
        })();
    </script>
@endsection
