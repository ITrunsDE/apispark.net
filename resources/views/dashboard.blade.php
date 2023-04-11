<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb-entry>Dashboard</x-breadcrumb-entry>
{{--        <x-breadcrumb-entry>Add repository</x-breadcrumb-entry>--}}
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
