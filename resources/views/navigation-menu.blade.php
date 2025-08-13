<nav x-data="{ open: false }" class="bg-gradient-to-r from-indigo-800 via-purple-700 to-pink-600 shadow-xl text-white fixed w-full z-50 top-0 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 hover:opacity-90 transition duration-300">
                    <x-application-mark class="h-9 w-auto text-white" />
                    <span class="text-xl font-bold tracking-wide animate-fade-in">SIGPPB</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden sm:flex items-center space-x-6">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-white hover:text-yellow-300 font-semibold transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-home mr-1"></i> Dashboard
                </x-nav-link>
            </div>

            <!-- Right Section -->
            <div class="flex items-center space-x-4">
                <!-- Dropdown -->
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen"
                        class="flex items-center gap-2 px-4 py-2 bg-white text-gray-800 font-semibold rounded-full shadow-md hover:bg-gray-200 transition duration-300">
                        <i class="fas fa-user-circle text-xl text-indigo-600"></i>
                        <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                        x-transition
                        class="absolute right-0 mt-3 w-56 bg-white text-gray-800 border border-gray-200 rounded-xl shadow-xl overflow-hidden z-50">
                        <a href="{{ route('profile.show') }}" class="flex items-center gap-2 px-5 py-3 hover:bg-gray-100 transition duration-200">
                            <i class="fas fa-id-badge text-indigo-500"></i> Profil Saya
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-2 w-full text-left px-5 py-3 text-red-600 hover:bg-red-50 transition duration-200">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <div class="sm:hidden">
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 rounded-md hover:bg-white hover:text-gray-800 focus:outline-none transition">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="sm:hidden bg-white text-gray-800 border-t border-gray-200 shadow-md">
        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="block px-6 py-3 hover:bg-gray-100">
            <i class="fas fa-home mr-1 text-indigo-600"></i> Dashboard
        </x-nav-link>
        <a href="{{ route('profile.show') }}" class="block px-6 py-3 hover:bg-gray-100">
            <i class="fas fa-id-badge mr-1 text-indigo-600"></i> Profil
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left px-6 py-3 text-red-600 hover:bg-red-50">
                <i class="fas fa-sign-out-alt mr-1"></i> Logout
            </button>
        </form>
    </div>
</nav>
