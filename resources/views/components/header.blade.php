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
            <nav class="hidden md:flex items-center space-x-2">
                <a href="{{ route('home') }}"
                    class="relative px-3 py-2 text-gray-700 hover:text-primary font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'text-primary' : '' }}">
                    Home
                    @if (request()->routeIs('home'))
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary"></span>
                    @endif
                </a>
                <a href="{{ route('about') }}"
                    class="relative px-3 py-2 text-gray-700 hover:text-primary font-medium transition-colors duration-200 {{ request()->routeIs('about') ? 'text-primary' : '' }}">
                    About
                    @if (request()->routeIs('about'))
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary"></span>
                    @endif
                </a>
                <a href="{{ route('courses') }}"
                    class="relative px-3 py-2 text-gray-700 hover:text-primary font-medium transition-colors duration-200 {{ request()->routeIs('courses') ? 'text-primary' : '' }}">
                    Courses
                    @if (request()->routeIs('courses'))
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary"></span>
                    @endif
                </a>
                <a href="{{ route('news.index') }}"
                    class="relative px-3 py-2 text-gray-700 hover:text-primary font-medium transition-colors duration-200 {{ request()->routeIs('news.*') ? 'text-primary' : '' }}">
                    News
                    @if (request()->routeIs('news.*'))
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary"></span>
                    @endif
                </a>
                <a href="{{ route('gallery') }}"
                    class="relative px-3 py-2 text-gray-700 hover:text-primary font-medium transition-colors duration-200 {{ request()->routeIs('gallery') ? 'text-primary' : '' }}">
                    Gallery
                    @if (request()->routeIs('gallery'))
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary"></span>
                    @endif
                </a>
                <a href="{{ route('contact') }}"
                    class="relative px-3 py-2 text-gray-700 hover:text-primary font-medium transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-primary' : '' }}">
                    Contact
                    @if (request()->routeIs('contact'))
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary"></span>
                    @endif
                </a>
                <a href="{{ route('certificate.verify') }}"
                    class="relative px-3 py-2 text-gray-700 hover:text-primary font-medium transition-colors duration-200 {{ request()->routeIs('certificate.*') ? 'text-primary' : '' }}">
                    Verify Certificate
                    @if (request()->routeIs('certificate.*'))
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary"></span>
                    @endif
                </a>
            </nav>

            <!-- Right side actions -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('contact') }}"
                    class="bg-accent text-primary px-6 py-2 rounded-lg font-semibold hover:bg-accent/90 transition-colors duration-200 shadow-glow">
                    Ask a Question
                </a>
                @auth
                    <div class="relative">
                        <button id="user-menu-toggle"
                            class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center focus:outline-none">
                            <span class="font-semibold">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                        </button>
                        <div id="user-menu-dropdown"
                            class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg overflow-hidden">
                            <div class="px-4 py-3 text-sm text-gray-700 border-b"><span
                                    class="font-medium">{{ auth()->user()->name }}</span></div>
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-light">Dashboard</a>
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-light">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-light">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                @endauth
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
                    class="block px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('home') ? 'text-primary bg-primary/10' : '' }}">
                    Home
                </a>
                <a href="{{ route('about') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('about') ? 'text-primary bg-primary/10' : '' }}">
                    About
                </a>
                <a href="{{ route('courses') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('courses') ? 'text-primary bg-primary/10' : '' }}">
                    Courses
                </a>
                <a href="{{ route('news.index') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('news.*') ? 'text-primary bg-primary/10' : '' }}">
                    News
                </a>
                <a href="{{ route('gallery') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('gallery') ? 'text-primary bg-primary/10' : '' }}">
                    Gallery
                </a>
                <a href="{{ route('contact') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-primary bg-primary/10' : '' }}">
                    Contact
                </a>
                <a href="{{ route('certificate.verify') }}"
                    class="block px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('certificate.*') ? 'text-primary bg-primary/10' : '' }}">
                    Verify Certificate
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
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }

        const userToggle = document.getElementById('user-menu-toggle');
        const userDropdown = document.getElementById('user-menu-dropdown');
        if (userToggle && userDropdown) {
            userToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                userDropdown.classList.toggle('hidden');
            });
            document.addEventListener('click', function(e) {
                if (!userDropdown.contains(e.target) && !userToggle.contains(e.target)) {
                    userDropdown.classList.add('hidden');
                }
            });
        }
    });
</script>
