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

                            @if($can_not_create_jobs)
                                <p class="mt-1 text-lg leading-6 text-red-600">
                                <div class="border-l-4 border-yellow-400 bg-yellow-50 p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-yellow-700">
                                                You have reached the limit of the maximum allowed jobs. You can no longer create new jobs.
{{--                                                <a href="#" class="font-medium text-yellow-700 underline hover:text-yellow-600">Upgrade your account to add more credits.</a>--}}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                </p>
                            @endif

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-5">
                                    <label for="name"
                                           class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" autocomplete="repository-name"
                                               @if($can_not_create_jobs) disabled @endif
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
                                                @if($can_not_create_jobs) disabled @endif
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
                                                @if($can_not_create_jobs) disabled @endif
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
                                                @if($can_not_create_jobs) disabled @endif
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
                                @if($can_not_create_jobs) disabled @endif
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </x-basic-card>

    </div>
</x-app-layout>
