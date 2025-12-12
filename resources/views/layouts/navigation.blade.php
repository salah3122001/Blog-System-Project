<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-lg" style="border-color: #e2e8f0;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Logo and Main Navigation -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('main')" :active="request()->routeIs('main') || request()->routeIs('posts.*')"
                        class="group relative px-4 py-2 rounded-lg transition-all duration-300">
                        <span class="flex items-center space-x-2">
                            <span class="text-xl">📚</span>
                            <span class="font-semibold text-gray-700 group-hover:text-gray-900">Blog</span>
                        </span>
                        @if (request()->routeIs('main') || request()->routeIs('posts.*'))
                            <span
                                class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full"></span>
                        @endif
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Side: User Menu -->
            <div class="flex items-center space-x-6">
                <!-- Create Post Button (Visible on desktop) -->
                @auth
                <div class="hidden sm:block">
                    <a href="{{ route('posts.create') }}"
                        class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 hover:from-indigo-700 hover:to-purple-700">
                        <span class="mr-2">✨</span>
                        <span>Create Post</span>
                    </a>
                </div>
                @endauth

                <!-- User Dropdown -->
                <div class="relative">
                    @auth
                    <x-dropdown align="right" width="52">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center space-x-3 px-4 py-2.5 border border-gray-200 rounded-xl bg-white shadow-sm hover:shadow-md transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                                <!-- User Avatar -->
                                <div
                                    class="w-9 h-9 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center border-2 border-white shadow-sm">
                                    <span class="text-indigo-600 font-bold text-sm">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </span>
                                </div>

                                <!-- User Info -->
                                <div class="flex flex-col items-start">
                                    <span
                                        class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</span>
                                    <span class="text-xs text-gray-500">{{ Auth::user()->email }}</span>
                                </div>

                                <!-- Dropdown Icon -->
                                <svg class="w-4 h-4 text-gray-400 ml-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Dropdown Header -->
                            <div class="px-4 py-3 border-b border-gray-100">
                                <div class="font-semibold text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</div>
                            </div>

                            <!-- Dropdown Items -->
                            <div class="py-2">
                                <x-dropdown-link :href="route('profile.edit')"
                                    class="flex items-center space-x-3 px-4 py-2.5 text-gray-700 hover:bg-indigo-50 hover:text-indigo-700 transition-colors duration-200">
                                    <span class="text-lg">👤</span>
                                    <span>{{ __('Profile') }}</span>
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('main') }}"
                                    class="flex items-center space-x-3 px-4 py-2.5 text-gray-700 hover:bg-indigo-50 hover:text-indigo-700 transition-colors duration-200">
                                    <span class="text-lg">🏠</span>
                                    <span>Home</span>
                                </x-dropdown-link>

                                <!-- Create Post (Mobile in dropdown) -->
                                <div class="block sm:hidden border-t border-gray-100 mt-2 pt-2">
                                    <x-dropdown-link :href="route('posts.create')"
                                        class="flex items-center space-x-3 px-4 py-2.5 text-gray-700 hover:bg-indigo-50 hover:text-indigo-700 transition-colors duration-200">
                                        <span class="text-lg">✨</span>
                                        <span>Create Post</span>
                                    </x-dropdown-link>
                                </div>

                                <!-- Logout -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="flex items-center space-x-3 px-4 py-2.5 text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors duration-200 border-t border-gray-100 mt-2 pt-2">
                                        <span class="text-lg">🚪</span>
                                        <span>{{ __('Log Out') }}</span>
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                    @else
                    <!-- Login/Register Buttons for non-authenticated users -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}"
                           class="px-4 py-2.5 text-gray-700 font-medium rounded-lg hover:bg-gray-100 transition-all duration-300">
                            Log In
                        </a>

                        <a href="{{ route('register') }}"
                           class="px-4 py-2.5 text-gray-700 font-medium rounded-lg hover:bg-gray-100 transition-all duration-300">
                            Sign Up
                        </a>
                    </div>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2.5 rounded-xl text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-100 transition-all duration-300">
                        <svg class="h-6 w-6" :class="{ 'hidden': open, 'block': !open }" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="h-6 w-6" :class="{ 'hidden': !open, 'block': open }" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden bg-white border-t border-gray-100 shadow-xl transform origin-top transition-all duration-300 ease-out"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

        <div class="px-4 py-3 space-y-1">
            <!-- Blog Link -->
            <x-responsive-nav-link :href="route('main')" :active="request()->routeIs('main') || request()->routeIs('posts.*')"
                class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-gray-50 transition-colors duration-200">
                <span class="text-xl">📚</span>
                <span class="font-semibold">Blog</span>
            </x-responsive-nav-link>

            <!-- Create Post (Mobile) -->
            @auth
            <a href="{{ route('posts.create') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold mt-2">
                <span class="text-xl">✨</span>
                <span>Create Post</span>
            </a>
            @else
            <div class="px-4 py-3 bg-yellow-50 border border-yellow-100 rounded-xl mt-2">
                <p class="text-sm text-yellow-800 text-center">
                    <a href="{{ route('login') }}" class="font-semibold underline">Login</a> to create posts
                </p>
            </div>
            @endauth
        </div>

        <!-- User Info -->
        @auth
        <div class="px-4 py-4 border-t border-gray-100 bg-gray-50/50">
            <div class="flex items-center space-x-3">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center border-2 border-white shadow-sm">
                    <span class="text-indigo-600 font-bold text-lg">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </span>
                </div>
                <div class="flex-1">
                    <div class="font-semibold text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</div>
                </div>
            </div>
        </div>
        @endauth

        <!-- Mobile Settings Options -->
        @auth
        <div class="pb-3 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')"
                class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-gray-50 transition-colors duration-200">
                <span class="text-xl">👤</span>
                <span>{{ __('Profile') }}</span>
            </x-responsive-nav-link>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                    class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-red-50 hover:text-red-600 transition-colors duration-200 text-gray-700">
                    <span class="text-xl">🚪</span>
                    <span>{{ __('Log Out') }}</span>
                </x-responsive-nav-link>
            </form>
        </div>
        @else
        <div class="pb-3 space-y-2 border-t border-gray-100 pt-3">
            <a href="{{ route('login') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-gray-50 transition-colors duration-200 text-gray-700">
                <span class="text-xl">🔑</span>
                <span>Log In</span>
            </a>
            <a href="{{ route('register') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold">
                <span class="text-xl">✨</span>
                <span>Sign Up</span>
            </a>
        </div>
        @endauth
    </div>
</nav>

<style>
    /* Custom styles for better appearance */
    .nav-link-active {
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.1), rgba(139, 92, 246, 0.1));
        color: #4f46e5;
        border-radius: 12px;
    }

    .nav-link-active span {
        color: #4f46e5;
    }

    /* Smooth transitions */
    * {
        transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 200ms;
    }

    /* Custom scrollbar for dropdown */
    .overflow-y-auto {
        scrollbar-width: thin;
        scrollbar-color: #c7d2fe transparent;
    }

    .overflow-y-auto::-webkit-scrollbar {
        width: 6px;
    }

    .overflow-y-auto::-webkit-scrollbar-track {
        background: transparent;
    }

    .overflow-y-auto::-webkit-scrollbar-thumb {
        background-color: #c7d2fe;
        border-radius: 20px;
    }
</style>

<script>
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const nav = document.querySelector('nav');
        const mobileMenu = nav.querySelector('.sm\\:hidden');
        const hamburger = nav.querySelector('[\\@click]');

        if (!nav.contains(event.target) && mobileMenu.classList.contains('block')) {
            Alpine.store('open', false);
        }
    });

    // Add active state styling
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('a[href]');

        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('nav-link-active');
            }
        });
    });
</script>
