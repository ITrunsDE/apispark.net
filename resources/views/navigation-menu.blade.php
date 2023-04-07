<nav x-data="{ open: false }" class="bg-sky-500" aria-label="Global">
    <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex items-center px-2 lg:px-0">
                <div class="flex flex-shrink-0 items-center">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="Your Company">
                </div>
                <div class="hidden lg:ml-8 lg:flex lg:space-x-4">
                    <a href="{{ route('dashboard') }}" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-sky-400">Dashboard</a>

                    <a href="{{ route('job-wizard') }}" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-sky-400">Jobs</a>

                    <a href="{{ route('endpoint.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-sky-400">Endpoints</a>

                    <a href="{{ route('repository.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-sky-400">Repositories</a>

                </div>
            </div>
            <div class="flex flex-1 items-center justify-center px-2 lg:ml-6 lg:justify-end">
                <div class="w-full max-w-lg lg:max-w-xs">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative text-white focus-within:text-gray-400">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="search" name="search" class="block w-full rounded-md border-0 bg-sky-400 py-1.5 pl-10 pr-3 text-white placeholder:text-white focus:bg-white focus:text-gray-900 focus:ring-0 focus:placeholder:text-gray-400 sm:text-sm sm:leading-6" placeholder="Search" type="search">
                    </div>
                </div>
            </div>
            <div class="flex items-center lg:hidden">
                <!-- Mobile menu button -->
                <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-sky-200 hover:bg-sky-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <!--
                      Icon when menu is closed.

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
                      Icon when menu is open.

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:ml-4 lg:flex lg:items-center">
                <button type="button" class="flex-shrink-0 rounded-full bg-sky-500 p-1 text-sky-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-sky-500">
                    <span class="sr-only">Notificaitons</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>

                <!-- Profile dropdown -->
                <div class="relative ml-4 flex-shrink-0">
                    <div>
                        <button type="button" class="flex rounded-full bg-sky-500 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-sky-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </button>
                    </div>

                    <!--
                      Dropdown menu, show/hide based on menu state.

                      Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                      Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                    <div class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>

                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="lg:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <a href="{{ route('dashboard') }}" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-sky-400 hover:text-white">Dashboard</a>

            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-sky-400 hover:text-white">Jobs</a>

            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-sky-400 hover:text-white">Applicants</a>

            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-sky-400 hover:text-white">Company</a>
        </div>
        <div class="border-t border-sky-500 pb-3 pt-4">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-white">Floyd Miles</div>
                    <div class="text-sm font-medium text-sky-200">floyd.miles@example.com</div>
                </div>
                <button type="button" class="ml-auto flex-shrink-0 rounded-full bg-sky-500 p-1 text-sky-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-sky-500">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>
            </div>
            <div class="mt-3 px-2">
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-sky-200 hover:bg-sky-400 hover:text-white">Your Profile</a>

                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-sky-200 hover:bg-sky-400 hover:text-white">Settings</a>

                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-sky-200 hover:bg-sky-400 hover:text-white">Sign out</a>
            </div>
        </div>
    </div>
</nav>
{{--<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">--}}
{{--    <!-- Primary Navigation Menu -->--}}
{{--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--        <div class="flex justify-between h-16">--}}
{{--            <div class="flex">--}}
{{--                <!-- Logo -->--}}
{{--                <div class="shrink-0 flex items-center">--}}
{{--                    <a href="{{ route('dashboard') }}">--}}
{{--                        <x-application-mark class="block h-9 w-auto" />--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <!-- Navigation Links -->--}}
{{--                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">--}}
{{--                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">--}}
{{--                        {{ __('Dashboard') }}--}}
{{--                    </x-nav-link>--}}
{{--                    <x-nav-link href="{{ route('job-wizard') }}" :active="request()->routeIs('job-wizard')">--}}
{{--                        {{ __('Job-Wizard') }}--}}
{{--                    </x-nav-link>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="hidden sm:flex sm:items-center sm:ml-6">--}}
{{--                <!-- Teams Dropdown -->--}}
{{--                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())--}}
{{--                    <div class="ml-3 relative">--}}
{{--                        <x-dropdown align="right" width="60">--}}
{{--                            <x-slot name="trigger">--}}
{{--                                <span class="inline-flex rounded-md">--}}
{{--                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">--}}
{{--                                        {{ Auth::user()->currentTeam->name }}--}}

{{--                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}
{{--                                </span>--}}
{{--                            </x-slot>--}}

{{--                            <x-slot name="content">--}}
{{--                                <div class="w-60">--}}
{{--                                    <!-- Team Management -->--}}
{{--                                    <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                                        {{ __('Manage Team') }}--}}
{{--                                    </div>--}}

{{--                                    <!-- Team Settings -->--}}
{{--                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">--}}
{{--                                        {{ __('Team Settings') }}--}}
{{--                                    </x-dropdown-link>--}}

{{--                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())--}}
{{--                                        <x-dropdown-link href="{{ route('teams.create') }}">--}}
{{--                                            {{ __('Create New Team') }}--}}
{{--                                        </x-dropdown-link>--}}
{{--                                    @endcan--}}

{{--                                    <div class="border-t border-gray-200 dark:border-gray-600"></div>--}}

{{--                                    <!-- Team Switcher -->--}}
{{--                                    <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                                        {{ __('Switch Teams') }}--}}
{{--                                    </div>--}}

{{--                                    @foreach (Auth::user()->allTeams() as $team)--}}
{{--                                        <x-switchable-team :team="$team" />--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </x-slot>--}}
{{--                        </x-dropdown>--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                <!-- Settings Dropdown -->--}}
{{--                <div class="ml-3 relative">--}}
{{--                    <x-dropdown align="right" width="48">--}}
{{--                        <x-slot name="trigger">--}}
{{--                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())--}}
{{--                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">--}}
{{--                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />--}}
{{--                                </button>--}}
{{--                            @else--}}
{{--                                <span class="inline-flex rounded-md">--}}
{{--                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">--}}
{{--                                        {{ Auth::user()->name }}--}}

{{--                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}
{{--                                </span>--}}
{{--                            @endif--}}
{{--                        </x-slot>--}}

{{--                        <x-slot name="content">--}}
{{--                            <!-- Account Management -->--}}
{{--                            <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                                {{ __('Manage Account') }}--}}
{{--                            </div>--}}

{{--                            <x-dropdown-link href="{{ route('profile.show') }}">--}}
{{--                                {{ __('Profile') }}--}}
{{--                            </x-dropdown-link>--}}

{{--                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())--}}
{{--                                <x-dropdown-link href="{{ route('api-tokens.index') }}">--}}
{{--                                    {{ __('API Tokens') }}--}}
{{--                                </x-dropdown-link>--}}
{{--                            @endif--}}

{{--                            <div class="border-t border-gray-200 dark:border-gray-600"></div>--}}

{{--                            <!-- Authentication -->--}}
{{--                            <form method="POST" action="{{ route('logout') }}" x-data>--}}
{{--                                @csrf--}}

{{--                                <x-dropdown-link href="{{ route('logout') }}"--}}
{{--                                         @click.prevent="$root.submit();">--}}
{{--                                    {{ __('Log Out') }}--}}
{{--                                </x-dropdown-link>--}}
{{--                            </form>--}}
{{--                        </x-slot>--}}
{{--                    </x-dropdown>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Hamburger -->--}}
{{--            <div class="-mr-2 flex items-center sm:hidden">--}}
{{--                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">--}}
{{--                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">--}}
{{--                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />--}}
{{--                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Responsive Navigation Menu -->--}}
{{--    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">--}}
{{--        <div class="pt-2 pb-3 space-y-1">--}}
{{--            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">--}}
{{--                {{ __('Dashboard') }}--}}
{{--            </x-responsive-nav-link>--}}
{{--            <x-responsive-nav-link href="{{ route('job-wizard') }}" :active="request()->routeIs('job-wizard')">--}}
{{--                {{ __('Job-Wizard') }}--}}
{{--            </x-responsive-nav-link>--}}
{{--        </div>--}}

{{--        <!-- Responsive Settings Options -->--}}
{{--        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">--}}
{{--            <div class="flex items-center px-4">--}}
{{--                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())--}}
{{--                    <div class="shrink-0 mr-3">--}}
{{--                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                <div>--}}
{{--                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>--}}
{{--                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="mt-3 space-y-1">--}}
{{--                <!-- Account Management -->--}}
{{--                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">--}}
{{--                    {{ __('Profile') }}--}}
{{--                </x-responsive-nav-link>--}}

{{--                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())--}}
{{--                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">--}}
{{--                        {{ __('API Tokens') }}--}}
{{--                    </x-responsive-nav-link>--}}
{{--                @endif--}}

{{--                <!-- Authentication -->--}}
{{--                <form method="POST" action="{{ route('logout') }}" x-data>--}}
{{--                    @csrf--}}

{{--                    <x-responsive-nav-link href="{{ route('logout') }}"--}}
{{--                                   @click.prevent="$root.submit();">--}}
{{--                        {{ __('Log Out') }}--}}
{{--                    </x-responsive-nav-link>--}}
{{--                </form>--}}

{{--                <!-- Team Management -->--}}
{{--                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())--}}
{{--                    <div class="border-t border-gray-200 dark:border-gray-600"></div>--}}

{{--                    <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                        {{ __('Manage Team') }}--}}
{{--                    </div>--}}

{{--                    <!-- Team Settings -->--}}
{{--                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">--}}
{{--                        {{ __('Team Settings') }}--}}
{{--                    </x-responsive-nav-link>--}}

{{--                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())--}}
{{--                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">--}}
{{--                            {{ __('Create New Team') }}--}}
{{--                        </x-responsive-nav-link>--}}
{{--                    @endcan--}}

{{--                    <div class="border-t border-gray-200 dark:border-gray-600"></div>--}}

{{--                    <!-- Team Switcher -->--}}
{{--                    <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                        {{ __('Switch Teams') }}--}}
{{--                    </div>--}}

{{--                    @foreach (Auth::user()->allTeams() as $team)--}}
{{--                        <x-switchable-team :team="$team" component="responsive-nav-link" />--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
