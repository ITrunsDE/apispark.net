<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Job - Edit') }}
        </h2>
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

                <form method="POST" action="{{ route('endpoint-job.update', $endpointJob) }}">
                    @csrf
                    @method('PATCH')
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
                                               value="{{ $endpointJob->name }}"
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
                                                <option
                                                    value="{{ $id }}" @selected($id === $endpointJob->endpoint_id)>{{ $endpoint }}</option>
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
                                                <option
                                                    value="{{ $id }}" @selected($id === $endpointJob->interval_id)>{{ $interval }}</option>
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
                                                <option
                                                    value="{{ $id }}" @selected($id === $endpointJob->repository_id)>{{ $repository }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="sm:col-span-6">
                                    <label for="name"
                                           class="block text-sm font-medium leading-6 text-gray-900">Active</label>
                                    <div class="mt-2">
                                        <div class="flex items-center">
                                            <button type="button"
                                                    x-data="{ isOn: {{ $endpointJob->active ? 'true': 'false' }} }"
                                                    @click="isOn = !isOn"
                                                    :aria-checked="isOn"
                                                    :class="{'bg-sky-600': isOn, 'bg-gray-200 dark:bg-gray-400': !isOn }"
                                                    class="bg-gray-200 dark:bg-gray-400 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2"
                                                    role="switch" aria-checked="false"
                                                    aria-labelledby="Active">
                                                                <span aria-hidden="true"
                                                                      :class="{'translate-x-5': isOn, 'translate-x-0': !isOn }"
                                                                      class="translate-x-0 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                                <input type="hidden"
                                                       name="active"
                                                       x-bind:value="isOn ? 'true' : 'false'">
                                            </button>
                                        </div>
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
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Delete Job</h1>
                    </div>
                </div>

                <form method="POST" action="{{ route('endpoint-job.destroy', $endpointJob) }}">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="name" value="{{ $endpointJob->name }}">

                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">

                            <p class="mt-1 text-sm leading-6 text-gray-600">
                                If you want to delete the job. To confirm, please enter the name of the job in
                                the text field and confirm the whole thing.
                            </p>

                            <p class="text-sm leading-6 text-red-600 font-bold">
                                The job will be removed immediately.
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
