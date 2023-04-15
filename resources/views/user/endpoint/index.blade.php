<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb-entry>Endpoints</x-breadcrumb-entry>
{{--        <x-breadcrumb-entry>Add job</x-breadcrumb-entry>--}}
    </x-slot>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 mt-6">

        <x-basic-card>

            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Endpoints</h1>
                        <p class="mt-2 text-sm text-gray-700 dark:text-white ">A list of all the endpoints in your account and the latest
                            use.</p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href=" {{ route('endpoint.create') }}"
                           class="block rounded-md bg-sky-400 dark:bg-sky-600 px-3 py-2 text-center text-sm font-semibold shadow-sm text-white dark:text-gray-100 hover:bg-sky-400 dark:hover:bg-sky-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">Add
                            Endpoint</a>
                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 dark:text-white sm:pl-6 lg:pl-8">
                                        Name
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white ">
                                        Used in
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white ">
                                        Last call
                                    </th>
                                    {{--                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white ">Role</th>--}}
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 lg:pr-8">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white dark:bg-gray-600">
                                @forelse($endpoints as $endpoint)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 dark:text-white sm:pl-6 lg:pl-8">
                                            <a href="{{ route('endpoint.edit', $endpoint) }}">
                                                {{ $endpoint->name }}
                                            </a>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-100">

                                            @if($endpoint->endpointJobs->isNotEmpty())
                                                {{ $endpoint->endpointJobs->map(function ($job) { return $job->name; })->implode(', ') }}
                                            @else
                                                <span class="italic text-red-400">unused</span>
                                            @endif

                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-100">
                                            not implemented
                                        </td>
                                        {{--                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-100">Member</td>--}}
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                                            <a href="{{ route('endpoint.edit', $endpoint) }}"
                                               class="text-indigo-600 hover:text-indigo-900 dark:text-sky-400 dark:hover:text-sky-100">Edit<span
                                                    class="sr-only">, {{ $endpoint->name }}</span></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-100 text-center"
                                            colspan="4">
                                            No endpoint found.
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </x-basic-card>

    </div>
</x-app-layout>
