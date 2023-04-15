<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb-entry :href="route('repository.index')">Repository</x-breadcrumb-entry>
        <x-breadcrumb-entry>Edit repository</x-breadcrumb-entry>
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
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('repository.update', $repository) }}">
                    @csrf
                    @method('PATCH')
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
                                               value="{{ $repository->name }}"
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
                                                <option
                                                    @selected('https://'.$urls === $repository->base_url) value="https://{{ $urls }}">{{ $urls }}</option>
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
                                               value="{{ $repository->ingest_token }}"
                                               class="block w-full rounded-md border-0 py-1.5 dark:bg-white/5 dark:text-white dark:ring-white/5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-sky-800 sm:text-sm sm:leading-6">
                                        @if($repository->verified_at)
                                        <p class="mt-3 text-sm leading-6 text-red-600">
                                            If you change your ingest token, you have to verify the repository again.
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('repository.index') }}" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">Cancel</a>
                        <button type="submit"
                                class="rounded-md bg-sky-400 dark:bg-sky-600 px-3 py-2 text-sm font-semibold text-white dark:text-gray-100 shadow-sm hover:bg-sky-400 dark:hover:bg-sky-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                            Save
                        </button>

                    </div>
                </form>
            </div>
        </x-basic-card>

        @if(is_null($repository->verified_at))
        <x-basic-card>
            <div class="px-4 sm:px-6 lg:px-8">

                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Verify Repository</h1>
                    </div>
                </div>

                <form method="POST" action="{{ route('repository.verify-verification-token', $repository) }}">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 dark:border-gray-100 pb-12">

                            <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-white">
                                Before you can use the repository, you must confirm it. To do this, we send you a token that you must enter in the field.

                                This process only needs to be done once. The repository can be used as often as you want afterwards.
                            </p>


                            <a href="{{ route('repository.send-verification-token', $repository) }}" type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-indigo-600 mt-3 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="-ml-0.5 h-5 w-5">
                                    <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                                </svg>
                                Send token
                            </a>

                            <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-2">
                                    <label for="verification_token"
                                           class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Verification token</label>
                                    <div class="mt-2">
                                        <input type="text" name="verification_token" id="verification_token"
                                               autocomplete="verification_token"
                                               class="block w-full rounded-md border-0 py-1.5 dark:bg-white/5 dark:text-white dark:ring-white/5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-sky-800 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('repository.index') }}" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">Cancel</a>
                        <button type="submit"
                                class="rounded-md bg-sky-400 dark:bg-sky-600 px-3 py-2 text-sm font-semibold text-white dark:text-gray-100 shadow-sm hover:bg-sky-400 dark:hover:bg-sky-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                            Verify
                        </button>
                    </div>
                </form>
            </div>
        </x-basic-card>
        @endif

        <x-basic-card>

            <div class="px-4 sm:px-6 lg:px-8">

                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Delete Repository</h1>
                    </div>
                </div>

                <form method="POST" action="{{ route('repository.destroy', $repository) }}">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="name" value="{{ $repository->name }}">

                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 dark:border-gray-100 pb-12">

                            <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-white">
                                If you want to delete the repository. To confirm, please enter the name of the
                                repository in the text field and confirm the whole thing.
                            </p>

                            <p class="text-sm leading-6 text-red-600 font-bold">
                                The repository will be removed from all jobs and the jobs will be stopped.
                            </p>

                            <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-2">
                                    <label for="name_confirmation"
                                           class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Confirmation
                                        name</label>
                                    <div class="mt-2">
                                        <input type="text" name="name_confirmation" id="name_confirmation"
                                               autocomplete="name_confirmation"
                                               class="block w-full rounded-md border-0 py-1.5 dark:bg-white/5 dark:text-white dark:ring-white/5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-sky-800 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('repository.index') }}" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">Cancel</a>
                        <button type="submit"
                                class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                            Delete
                        </button>
                    </div>
                </form>
            </div>
        </x-basic-card>

    </div>
</x-app-layout>
