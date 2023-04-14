<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb-entry>Dashboard</x-breadcrumb-entry>
    </x-slot>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 mt-6">

        <x-basic-card>
            <div class="px-4 sm:px-6 lg:px-8">

                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">License Overview</h1>
                    </div>
                </div>

                <div>
                    <h3 class="text-base font-sm leading-6 text-gray-900">
                        Licensed entries for your account.
                    </h3>
                    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                            <dt class="truncate text-sm font-medium text-gray-500">Jobs</dt>
                            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">
                                {{ $jobs }} / {{ $max_jobs }}
                            </dd>
                        </div>

                        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                            <dt class="truncate text-sm font-medium text-gray-500">Endpoints</dt>
                            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">
                                {{ $endpoints }}
                            </dd>
                        </div>

                        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                            <dt class="truncate text-sm font-medium text-gray-500">Repositories</dt>
                            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">
                                {{ $repositories }}
                            </dd>
                        </div>
                    </dl>
                </div>

            </div>


        </x-basic-card>

    </div>
</x-app-layout>
