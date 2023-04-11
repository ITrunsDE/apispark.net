<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb-entry :href="route('endpoint-job.index')">Jobs</x-breadcrumb-entry>
        <x-breadcrumb-entry>Add job</x-breadcrumb-entry>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 mt-6">

        <x-basic-card>

            <div class="px-4 sm:px-6 lg:px-8">

                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Job</h1>
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

                <form method="POST" action="{{ route('endpoint-job.store') }}">
                    @csrf

                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">

                            <p class="mt-1 text-sm leading-6 text-gray-600">Fill out the required information to create
                                a new link to your repository at Logscale.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-5">
                                    <label for="name"
                                           class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" autocomplete="repository-name"
                                               value="{{ old(key: 'name') }}"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="endpoint_id" class="block text-sm font-medium leading-6 text-gray-900">
                                        Fetch from ...
                                    </label>
                                    <div class="mt-2">
                                        <select id="endpoint_id" name="endpoint_id" autocomplete="endpoint_id"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            @foreach($endpoints as $id=>$endpoint)
                                                <option value="{{ $id }}">{{ $endpoint }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="interval_id" class="block text-sm font-medium leading-6 text-gray-900">
                                        ... every ...
                                    </label>
                                    <div class="mt-2">
                                        <select id="interval_id" name="interval_id" autocomplete="interval_id"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            @foreach($intervals as $id=>$interval)
                                                <option value="{{ $id }}">{{ $interval }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="repository_id"
                                           class="block text-sm font-medium leading-6 text-gray-900">
                                        ... and send it to ...
                                    </label>
                                    <div class="mt-2">
                                        <select id="repository_id" name="repository_id" autocomplete="repository_id"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            @foreach($repositories as $id=>$repository)
                                                <option value="{{ $id }}">{{ $repository }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('endpoint-job.index') }}"
                           class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </x-basic-card>

    </div>
</x-app-layout>
