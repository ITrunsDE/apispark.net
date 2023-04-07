<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Endpoint - Create') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 mt-6">

        <x-basic-card>

            <div class="px-4 sm:px-6 lg:px-8">

                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Endpoint</h1>
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

                <form method="POST" action="{{ route('endpoint.update', $endpoint) }}">
                    @csrf
                    @method('PATCH')
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">

                            <p class="mt-1 text-sm leading-6 text-gray-600">Fill out the required information to create
                                a new link to your repository at Logscale.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-2">
                                    <label for="name"
                                           class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" autocomplete="repository-name"
                                               value="{{ $endpoint->name }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-4">
                                    <label for="url"
                                           class="block text-sm font-medium leading-6 text-gray-900">API endpoint url</label>
                                    <div class="mt-2">
                                        <input type="text" name="url" id="url"
                                               autocomplete="url"
                                               value="{{ $endpoint->url }}"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('endpoint.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </x-basic-card>

        <x-basic-card>

            <div class="px-4 sm:px-6 lg:px-8">

                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Delete Endpoint</h1>
                    </div>
                </div>

                <form method="POST" action="{{ route('endpoint.destroy', $endpoint) }}">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="name" value="{{ $endpoint->name }}">

                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">

                            <p class="mt-1 text-sm leading-6 text-gray-600">
                                If you want to delete the endpoint. To confirm, please enter the name of the endpoint in
                                the text field and confirm the whole thing.
                            </p>

                            <p class="text-sm leading-6 text-red-600 font-bold">
                                The endpoint will be removed from all jobs and the jobs will be paused.
                            </p>

                            <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-2">
                                    <label for="name_confirmation"
                                           class="block text-sm font-medium leading-6 text-gray-900">Confirmation
                                        name</label>
                                    <div class="mt-2">
                                        <input type="text" name="name_confirmation" id="name_confirmation"
                                               autocomplete="name_confirmation"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('endpoint.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
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
