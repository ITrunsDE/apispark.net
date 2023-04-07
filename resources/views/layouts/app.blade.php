<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <!-- ToDo: Create breadcrumbs automatically -->

                <!-- Breadcrumb -->
                <nav class="hidden border-b border-gray-200 bg-white lg:flex" aria-label="Breadcrumb">
                    <ol role="list" class="mx-auto flex w-full max-w-screen-xl space-x-4 px-4 sm:px-6 lg:px-8">
                        <li class="flex">
                            <div class="flex items-center">
                                <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only">Home</span>
                                </a>
                            </div>
                        </li>

                        <li class="flex">
                            <div class="flex items-center">
                                <svg class="h-full w-6 flex-shrink-0 text-gray-200" preserveAspectRatio="none" viewBox="0 0 24 44" fill="currentColor" aria-hidden="true">
                                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                                </svg>
                                <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Projects</a>
                            </div>
                        </li>

                        <li class="flex">
                            <div class="flex items-center">
                                <svg class="h-full w-6 flex-shrink-0 text-gray-200" preserveAspectRatio="none" viewBox="0 0 24 44" fill="currentColor" aria-hidden="true">
                                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                                </svg>
                                <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Project Nero</a>
                            </div>
                        </li>
                    </ol>
                </nav>

            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
