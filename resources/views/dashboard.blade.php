@extends('layouts.main')

@section('title', 'Dashboard - Admin')
@section('description', 'Admin dashboard overview and quick actions')

@section('content')
    <section class="relative py-8 bg-gradient-to-b from-light to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-primary">Admin Dashboard</h1>
                    <p class="mt-1 text-gray-600 text-sm">Overview and quick management actions</p>
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow p-6">
                    <div class="text-sm text-gray-500">Total Posts</div>
                    <div class="mt-2 text-3xl font-bold text-primary">{{ \App\Models\Post::count() }}</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6">
                    <div class="text-sm text-gray-500">Published This Week</div>
                    <div class="mt-2 text-3xl font-bold text-primary">
                        {{ \App\Models\Post::whereBetween('published_at', [now()->startOfWeek(), now()->endOfWeek()])->count() }}
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow p-6">
                    <div class="text-sm text-gray-500">Drafts</div>
                    <div class="mt-2 text-3xl font-bold text-primary">
                        {{ \App\Models\Post::whereNull('published_at')->count() }}</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6">
                    <div class="text-sm text-gray-500">Last Updated</div>
                    <div class="mt-2 text-lg font-semibold text-gray-800">
                        {{ optional(\App\Models\Post::orderByDesc('updated_at')->first())->updated_at?->diffForHumans() ?? '—' }}
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800">Quick Actions</h3>
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="{{ route('admin.posts.create') }}"
                        class="block p-4 rounded-lg border hover:border-primary hover:shadow transition">
                        <div class="font-semibold text-primary">Create New Post</div>
                        <div class="text-sm text-gray-500">Publish an update or blog article</div>
                    </a>
                    <a href="{{ route('admin.posts.index') }}"
                        class="block p-4 rounded-lg border hover:border-primary hover:shadow transition">
                        <div class="font-semibold text-primary">Manage Posts</div>
                        <div class="text-sm text-gray-500">Edit or delete existing posts</div>
                    </a>
                    <a href="{{ route('news.index') }}"
                        class="block p-4 rounded-lg border hover:border-primary hover:shadow transition">
                        <div class="font-semibold text-primary">View Site News</div>
                        <div class="text-sm text-gray-500">See the public news page</div>
                    </a>
                    <a href="{{ route('admin.users.index') }}"
                        class="block p-4 rounded-lg border hover:border-primary hover:shadow transition">
                        <div class="font-semibold text-primary">Manage Users</div>
                        <div class="text-sm text-gray-500">Add or update user accounts</div>
                    </a>
                </div>
            </div>

            <!-- Recent Posts -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800">Recent Posts</h3>
                <div class="mt-4 divide-y">
                    @foreach (\App\Models\Post::orderByDesc('created_at')->limit(5)->get() as $post)
                        <div class="py-3 flex items-center justify-between">
                            <div>
                                <div class="font-medium text-gray-800">{{ $post->title }}</div>
                                <div class="text-xs text-gray-500">
                                    {{ optional($post->published_at ?? $post->created_at)->format('M d, Y') }}</div>
                            </div>
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.posts.edit', $post) }}"
                                    class="text-primary hover:underline">Edit</a>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                                    onsubmit="return confirm('Delete this post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
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
