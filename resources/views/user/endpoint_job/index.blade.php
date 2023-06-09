<x-app-layout>

    <x-slot name="header">
        <x-breadcrumb-entry>Jobs</x-breadcrumb-entry>
        {{--        <x-breadcrumb-entry>Overview</x-breadcrumb-entry>--}}
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 mt-6">

        <x-basic-card>

            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Jobs</h1>
                        <p class="mt-2 text-sm text-gray-700 dark:text-white  dark:text-white ">A list of all the jobs
                            that run in your account.</p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href=" {{ route('endpoint-job.create') }}"
                           class="disabled block rounded-md bg-sky-400 dark:bg-sky-600 px-3 py-2 text-center text-sm font-semibold shadow-sm text-white dark:text-gray-100 hover:bg-sky-400 dark:hover:bg-sky-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                            Add Job
                        </a>
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
                                        Active
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white ">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white ">
                                        Repository
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white ">
                                        Interval
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white ">
                                        Next run at
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 lg:pr-8">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white dark:bg-gray-600">
                                @forelse($jobs as $job)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4text-sm font-medium text-gray-900 sm:pl-6 lg:pl-8">
{{--                                            @if($job->active)--}}
{{--                                                <a href="{{ route('endpoint-job.deactivate', $job) }}"--}}
{{--                                                   class="text-indigo-600 hover:text-indigo-900 dark:text-sky-400 dark:hover:text-sky-100">Deactivate<span--}}
{{--                                                        class="sr-only">, {{ $job->name }}</span></a>--}}
{{--                                            @else--}}
{{--                                                <a href="{{ route('endpoint-job.activate', $job) }}"--}}
{{--                                                   class="text-indigo-600 hover:text-indigo-900 dark:text-sky-400 dark:hover:text-sky-100">Activate<span--}}
{{--                                                        class="sr-only">, {{ $job->name }}</span></a>--}}
{{--                                            @endif--}}
                                            @if($job->active && $job->repository->verified_at && $job->repository->active)
                                                <a href="{{ route('endpoint-job.deactivate', $job) }}" title="Deactivate job [{{ $job->name }}]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                         fill="currentColor" class="w-5 h-5 text-green-500">
                                                        <path fill-rule="evenodd"
                                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                </a>
                                            @else
                                                <a href="{{ route('endpoint-job.activate', $job) }}" title="Activate job [{{ $job->name }}]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5 text-red-500">
                                                    <path fill-rule="evenodd"
                                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900 dark:text-white font-medium">
                                            <a href="{{ route('endpoint-job.edit', $job) }}">
                                                {{ $job->name }}
                                            </a>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-100">
                                            {{ $job->repository->name }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-100">
                                            {{ $job->interval->name }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-100">
                                            @if(is_null($job->last_run))
                                                {{ now() }}
                                            @else
                                                {{ $job->last_run->addMinutes($job->interval->interval) }}
                                            @endif
                                        </td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                                            <a href="{{ route('endpoint-job.edit', $job) }}"
                                               class="pl-2 text-indigo-600 hover:text-indigo-900 dark:text-sky-400 dark:hover:text-sky-100">Edit<span
                                                    class="sr-only">, {{ $job->name }}</span></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 dark:text-gray-100 text-center"
                                            colspan="6">
                                            No Job found.
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
