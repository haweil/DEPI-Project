<nav x-data="{ open: false }" class="bg-gradient-to-r from-purple-500 to-blue-500 shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-white" />
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <x-nav-link :href="route('leaderboard')" :active="request()->routeIs('leaderboard')" class="text-white hover:text-gray-300">
                        Leaderboard
                    </x-nav-link>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-700 hover:bg-blue-600 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="hover:bg-gray-200">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('myresults')" :active="request()->routeIs('myresults')" class="hover:bg-gray-200">
                                {{ __('My Results') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="hover:bg-gray-200">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <x-nav-link :href="route('login')" class="text-white hover:text-gray-300">Log In</x-nav-link>
                    <x-nav-link :href="route('register')" class="text-white hover:text-gray-300">Register</x-nav-link>
                @endauth
                @admin
                    |
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-700 hover:bg-blue-600 focus:outline-none transition ease-in-out duration-150">
                                <div>Manage</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('admins')" class="hover:bg-gray-200">
                                Admins
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('questions')" class="hover:bg-gray-200">
                                Questions
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('quizzes')" class="hover:bg-gray-200">
                                Quizzes
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('tests')" class="hover:bg-gray-200">
                                Tests
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                @endadmin
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-blue-600 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        @admin
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-700 hover:bg-blue-600 focus:outline-none transition ease-in-out duration-150">
                        <div>Manage</div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('questions')" class="hover:bg-gray-200">
                        Questions
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('quizzes')" class="hover:bg-gray-200">
                        Quizzes
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('tests')" class="hover:bg-gray-200">
                        Tests
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
        @endadmin
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:bg-blue-600">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('myresults')" :active="request()->routeIs('myresults')" class="text-white hover:bg-blue-600">
                        {{ __('My Results') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="text-white hover:bg-blue-600">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <x-responsive-nav-link :href="route('login')" class="text-white hover:bg-blue-600">Log In</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('register')" class="text-white hover:bg-blue-600">Register</x-responsive-nav-link>
        @endauth
    </div>
</nav>
