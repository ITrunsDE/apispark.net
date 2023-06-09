<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb-entry>Dashboard</x-breadcrumb-entry>
    </x-slot>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 mt-6">

        <x-basic-card>
            <div class="px-4 sm:px-6 lg:px-8">

                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">License Overview</h1>
                    </div>
                </div>

                <div>
                    <h3 class="text-base font-sm leading-6 text-gray-900 dark:text-white">
                        Licensed entries for your account.
                    </h3>
                    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">

                        <div class="overflow-hidden rounded-lg dark:bg-white/5 bg-white px-4 py-5 shadow sm:p-6">
                            <dt class="truncate text-sm font-medium text-gray-500 dark:text-white">Jobs</dt>
                            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900 dark:text-gray-200">
                                {{ $jobs }} / {{ $max_jobs }}
                            </dd>
                        </div>

                        <div class="overflow-hidden rounded-lg dark:bg-white/5 bg-white px-4 py-5 shadow sm:p-6">
                            <dt class="truncate text-sm font-medium text-gray-500 dark:text-white">Endpoints</dt>
                            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900 dark:text-gray-200">
                                {{ $endpoints }}
                            </dd>
                        </div>

                        <div class="overflow-hidden rounded-lg dark:bg-white/5 bg-white px-4 py-5 shadow sm:p-6">
                            <dt class="truncate text-sm font-medium text-gray-500 dark:text-white">Repositories</dt>
                            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900 dark:text-gray-200">
                                {{ $repositories }}
                            </dd>
                        </div>
                    </dl>
                </div>

            </div>


        </x-basic-card>

    </div>
</x-app-layout>
