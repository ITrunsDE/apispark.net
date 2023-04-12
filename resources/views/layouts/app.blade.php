<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    @stack('scripts')

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="font-sans antialiased h-full">
{{--<x-banner/>--}}

<div class="min-h-full bg-gray-100 dark:bg-gray-900">
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))

        <!-- Breadcrumb -->
        <nav class="hidden border-b border-gray-200 bg-white lg:flex" aria-label="Breadcrumb">
            <ol role="list" class="mx-auto flex w-full max-w-screen-xl space-x-4 px-4 sm:px-6 lg:px-8">

                <!-- Dashboard / Home -->
                <li class="flex">
                    <div class="flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-gray-500">
                            <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"
                                 aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <span class="sr-only">Home</span>
                        </a>
                    </div>
                </li>

                <!-- other breadcrumbs-->
                {{ $header }}

            </ol>
        </nav>

    @endif

    <!-- Page Content -->
    <main class="pb-20">
        {{ $slot }}
    </main>

    <x-footer />

</div>

@stack('modals')

@livewire('notifications')
@livewireScripts
</body>
</html>
