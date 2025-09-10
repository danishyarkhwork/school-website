<header class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('assets/images/varin-academy-logo.svg') }}" alt="Varin SkillUp Academy Logo"
                        class="w-10 h-10">
                    <span class="text-xl font-bold text-primary">Varin SkillUp Academy</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}"
                    class="text-gray-700 hover:text-primary font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'text-primary' : '' }}">
                    Home
                </a>
                <a href="{{ route('about') }}"
                    class="text-gray-700 hover:text-primary font-medium transition-colors duration-200 {{ request()->routeIs('about') ? 'text-primary' : '' }}">
                    About
                </a>
                <a href="{{ route('courses') }}"
                    class="text-gray-700 hover:text-primary font-medium transition-colors duration-200 {{ request()->routeIs('courses') ? 'text-primary' : '' }}">
                    Courses
                </a>
                <a href="{{ route('news.index') }}"
                    class="text-gray-700 hover:text-primary font-medium transition-colors duration-200 {{ request()->routeIs('news.*') ? 'text-primary' : '' }}">
                    News
                </a>
                <a href="{{ route('gallery') }}"
                    class="text-gray-700 hover:text-primary font-medium transition-colors duration-200 {{ request()->routeIs('gallery') ? 'text-primary' : '' }}">
                    Gallery
                </a>
                <a href="{{ route('contact') }}"
                    class="text-gray-700 hover:text-primary font-medium transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-primary' : '' }}">
                    Contact
                </a>
            </nav>

            <!-- CTA Button -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('contact') }}"
                    class="bg-accent text-primary px-6 py-2 rounded-lg font-semibold hover:bg-accent/90 transition-colors duration-200 shadow-glow">
                    Ask a Question
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="text-gray-700 hover:text-primary focus:outline-none focus:text-primary"
                    id="mobile-menu-button">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
                <a href="{{ route('home') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-primary font-medium {{ request()->routeIs('home') ? 'text-primary' : '' }}">
                    Home
                </a>
                <a href="{{ route('about') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-primary font-medium {{ request()->routeIs('about') ? 'text-primary' : '' }}">
                    About
                </a>
                <a href="{{ route('courses') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-primary font-medium {{ request()->routeIs('courses') ? 'text-primary' : '' }}">
                    Courses
                </a>
                <a href="{{ route('news.index') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-primary font-medium {{ request()->routeIs('news.*') ? 'text-primary' : '' }}">
                    News
                </a>
                <a href="{{ route('gallery') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-primary font-medium {{ request()->routeIs('gallery') ? 'text-primary' : '' }}">
                    Gallery
                </a>
                <a href="{{ route('contact') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-primary font-medium {{ request()->routeIs('contact') ? 'text-primary' : '' }}">
                    Contact
                </a>
                <div class="px-3 py-2">
                    <a href="{{ route('contact') }}"
                        class="block w-full bg-accent text-primary px-4 py-2 rounded-lg font-semibold text-center hover:bg-accent/90 transition-colors duration-200">
                        Ask a Question
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    });
</script>
