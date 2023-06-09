<li class="flex">
    <div class="flex items-center">
        <svg class="h-full w-6 flex-shrink-0 text-gray-200 dark:text-gray-600" preserveAspectRatio="none"
             viewBox="0 0 24 44" fill="currentColor" aria-hidden="true">
            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z"/>
        </svg>
        <a {{ $attributes->merge(['href']) }} class="ml-4 text-sm font-medium text-gray-500 dark:text-white hover:text-gray-700 dark:hover:text-gray-400"
        >
            {{ $slot }}
        </a>
    </div>
</li>
