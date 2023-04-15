<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb-entry :href="route('repository.index')">Repository</x-breadcrumb-entry>
        <x-breadcrumb-entry>Add repository</x-breadcrumb-entry>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 mt-6">

        <x-basic-card>

            <div class="px-4 sm:px-6 lg:px-8">

                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Repository</h1>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="text-red-700 dark:text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('repository.store') }}">
                    @csrf

                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 dark:border-gray-100 pb-12">

                            <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-200">Fill out the required information to create
                                a new link to your repository at Logscale.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <div class="sm:col-span-4">
                                    <label for="name"
                                           class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Name</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" autocomplete="repository-name"
                                               value="{{ old(key: 'name') }}"
                                               class="block w-full rounded-md border-0 py-1.5 dark:bg-white/5 dark:text-white dark:ring-white/5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-sky-800 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-2">

                                </div>

                                <div class="sm:col-span-2">
                                    <label for="base_url" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">
                                        Used cloud instance
                                    </label>
                                    <div class="mt-2">
                                        <select id="base_url" name="base_url" autocomplete="base_url"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:bg-white/5 dark:text-white dark:ring-white/5 dark:focus:ring-sky-800 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            @foreach(config(key: 'logscale.base_urls') as $urls)
                                                <option value="https://{{ $urls }}">{{ $urls }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-4">
                                    <label for="ingest_token" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Ingest
                                        token</label>
                                    <div class="mt-2">
                                        <input type="text" name="ingest_token" id="ingest_token"
                                               autocomplete="ingest_token"
                                               value="{{ old(key: 'ingest_token') }}"
                                               class="block w-full rounded-md border-0 py-1.5 dark:bg-white/5 dark:text-white dark:ring-white/5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-sky-800 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('repository.index') }}" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">Cancel</a>
                        <button type="submit"
                                class="rounded-md bg-sky-400 dark:bg-sky-600 px-3 py-2 text-sm font-semibold text-white dark:text-gray-100 hover:bg-sky-400 dark:hover:bg-sky-800 shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </x-basic-card>

    </div>
</x-app-layout>
