<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
            <a href="{{ route('admin.posts.index') }}"
                class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Manage
                Posts</a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
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
</x-app-layout>
