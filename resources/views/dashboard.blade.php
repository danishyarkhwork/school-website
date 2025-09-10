@extends('layouts.main')

@section('title', 'Dashboard - Admin')
@section('description', 'Admin dashboard overview and quick actions')

@section('content')
    <section class="relative py-12 bg-gradient-to-b from-light to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-bold text-primary">Admin Dashboard</h1>
                    <p class="mt-2 text-gray-600">Overview and quick management actions</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.posts.index') }}"
                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Manage Posts</a>
                    <div class="relative">
                        <button id="user-menu-btn"
                            class="px-3 py-2 border rounded-lg text-gray-700 hover:border-primary">{{ auth()->user()->name ?? 'User' }}</button>
                        <div id="user-menu" class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow border">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-light">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm hover:bg-light">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-2xl shadow p-6 border-t-4 border-accent">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm text-gray-500">Total Posts</div>
                            <div class="mt-2 text-3xl font-bold text-primary">{{ \App\Models\Post::count() }}</div>
                        </div>
                        <div class="w-10 h-10 rounded-lg bg-light flex items-center justify-center text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7h18M3 12h18M3 17h18" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-t-4 border-[#22c55e]">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm text-gray-500">Published This Week</div>
                            <div class="mt-2 text-3xl font-bold text-primary">
                                {{ \App\Models\Post::whereBetween('published_at', [now()->startOfWeek(), now()->endOfWeek()])->count() }}
                            </div>
                        </div>
                        <div class="w-10 h-10 rounded-lg bg-light flex items-center justify-center text-[#22c55e]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-t-4 border-[#f59e0b]">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm text-gray-500">Drafts</div>
                            <div class="mt-2 text-3xl font-bold text-primary">
                                {{ \App\Models\Post::whereNull('published_at')->count() }}</div>
                        </div>
                        <div class="w-10 h-10 rounded-lg bg-light flex items-center justify-center text-[#f59e0b]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow p-6 border-t-4 border-[#3b82f6]">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-sm text-gray-500">Last Updated</div>
                            <div class="mt-2 text-lg font-semibold text-gray-800">
                                {{ optional(\App\Models\Post::orderByDesc('updated_at')->first())->updated_at?->diffForHumans() ?? '—' }}
                            </div>
                        </div>
                        <div class="w-10 h-10 rounded-lg bg-light flex items-center justify-center text-[#3b82f6]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800">Quick Actions</h3>
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="{{ route('admin.posts.create') }}"
                        class="block p-4 rounded-xl border hover:border-primary hover:shadow-md transition">
                        <div class="font-semibold text-primary">Create New Post</div>
                        <div class="text-sm text-gray-500">Publish an update or blog article</div>
                    </a>
                    <a href="{{ route('admin.posts.index') }}"
                        class="block p-4 rounded-xl border hover:border-primary hover:shadow-md transition">
                        <div class="font-semibold text-primary">Manage Posts</div>
                        <div class="text-sm text-gray-500">Edit or delete existing posts</div>
                    </a>
                    <a href="{{ route('news.index') }}"
                        class="block p-4 rounded-xl border hover:border-primary hover:shadow-md transition">
                        <div class="font-semibold text-primary">View Site News</div>
                        <div class="text-sm text-gray-500">See the public news page</div>
                    </a>
                    <a href="{{ route('admin.users.index') }}"
                        class="block p-4 rounded-xl border hover:border-primary hover:shadow-md transition">
                        <div class="font-semibold text-primary">Manage Users</div>
                        <div class="text-sm text-gray-500">Add or update user accounts</div>
                    </a>
                </div>
            </div>

            <!-- Recent Posts -->
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800">Recent Posts</h3>
                <div class="mt-4 divide-y">
                    @foreach (\App\Models\Post::orderByDesc('created_at')->limit(5)->get() as $post)
                        <div class="py-4 flex items-start justify-between">
                            <div class="pr-4">
                                <div class="font-medium text-gray-800">{{ $post->title }}</div>
                                <div class="mt-1 text-xs text-gray-500">
                                    {{ optional($post->published_at ?? $post->created_at)->format('M d, Y') }}</div>
                            </div>
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.posts.edit', $post) }}"
                                    class="px-3 py-1.5 text-sm rounded-lg border text-primary hover:border-primary">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                    onsubmit="return confirm('Delete this post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1.5 text-sm rounded-lg border text-red-600 hover:border-red-600">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

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
