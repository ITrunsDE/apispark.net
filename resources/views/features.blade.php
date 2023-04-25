<x-guest-layout>
    <div class="bg-white">
        <!-- Header -->
        <header class="absolute inset-x-0 top-0 z-50" x-data="{ isOpen: false }">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Apispark.net</span>
                        <img class="h-8 w-auto" src="/image/apispark_logo_blue.svg"
                             alt="">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button"
                            @click="isOpen = !isOpen"
                            class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="{{ route('start') }}"
                       class="text-sm font-semibold leading-6 text-gray-900">APIspark</a>

                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">How to get started?</a>

                    {{--                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Marketplace</a>--}}

                    {{--                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Company</a>--}}
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">Log in <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
            </nav>
            <div x-show="isOpen"
                 x-cloak
                 class="lg:hidden" role="dialog" aria-modal="true">
                <div class="fixed inset-0 z-50"></div>
                <div
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">apispark.net</span>
                            <img class="h-8 w-auto"
                                 src="https://tailwindui.com/img/logos/mark.svg?color=sky&shade=600" alt="">
                        </a>
                        <button
                            @click="isOpen = !isOpen"
                            type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                                <a href="{{ route('start') }}"
                                   class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Product</a>

                                {{--                                <a href="#"--}}
                                {{--                                   class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>--}}

                                {{--                                <a href="#"--}}
                                {{--                                   class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>--}}

                                {{--                                <a href="#"--}}
                                {{--                                   class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>--}}
                            </div>
                            <div class="py-6">
                                <a href="{{ route('login') }}"
                                   class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                                    in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="isolate">
            <div class="bg-white px-6 py-32 lg:px-8">
                <div class="mx-auto max-w-3xl text-base leading-7 text-gray-700">
                    <p class="text-base font-semibold leading-7 text-indigo-600">First steps</p>
                    <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">How to get started</h1>
                    <p class="mt-6 text-xl leading-8">
                        Apispark is a platform that makes it possible to access a REST API and send the retrieved data to Logscale.
                    </p>
                    <div class="mt-10 max-w-2xl">
                        <p>

                        </p>
                        <h2 class="mt-16 text-2xl font-bold tracking-tight text-gray-900">Everything you need to get up and running</h2>
                        <p class="mt-6">
                            The following steps are necessary to create a job and retrieve data from a REST API and write it to a logscale repository.
                            As an overview, here are the individual steps that will be explained in a moment:
                        </p>

                        <ul role="list" class="mt-2 max-w-xl space-y-6 text-gray-600">
                            <li class="flex gap-x-3">
                                <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                                <span><strong class="font-semibold text-gray-900">Repository</strong>, the data store at Logscale where retrieved data is stored.</span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                                <span><strong class="font-semibold text-gray-900">Endpoint</strong>, the REST API that will be accessed. Depending on the REST API, authentication is required.</span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                                <span><strong class="font-semibold text-gray-900">Job</strong>, here the repository, the endpoint and an interval are set.</span>
                            </li>

                        </ul>
{{--                        <p class="mt-10">--}}
{{--                            When linking the Logscale repository, it is possible to select Community or Cloud. Here it is necessary that the repository is validated during the setup. This is usually done by an authentication token that is sent to the repository by APISPARK after the connection. After successful validation, the repository is active and can be used in the jobs.--}}
{{--                        </p>--}}
                    </div>

                    <div class="mt-16 max-w-2xl">
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Create your first endpoint</h2>
                        <p class="mt-6">
                            Let's start by creating an endpoint. We have already learned above that an endpoint means the REST API that is to be addressed. First we need a name and the API endpoint url.
                            Then we can set the authentication method. According to the selection, new fields will appear that have to be filled in.
                        </p>
                        <figure class="mt-3">
                        <img class="border-2 p-4 border-sky-700"
                             src="/image/create_new_endpoint.png"
                             alt="">
                        <figcaption class="mt-4 flex gap-x-2 text-sm leading-6 text-gray-500">
                            <svg class="mt-0.5 h-5 w-5 flex-none text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
                            </svg>
                            Create a new endpoint
                        </figcaption>
                        </figure>
                        <p class="mt-6">
                            Once everything is saved, you can move on to the next step.
                        </p>
                    </div>
                    <div class="mt-8 max-w-2xl">
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Connect the repository</h2>
                        <p class="mt-6">As with the endpoint, a name must be entered for the repository, here it is recommended to take the same name of the logscale repository.
                            Specify the location of the repository. Here you can choose between the community and the cloud version. The cloud variant is the paid variant of Logscale. </p>
                        <figure class="mt-3">
                        <img class="border-2 p-4 border-sky-700"
                             src="/image/create_new_repository.png"
                             alt="">
                            <figcaption class="mt-4 flex gap-x-2 text-sm leading-6 text-gray-500">
                                <svg class="mt-0.5 h-5 w-5 flex-none text-gray-300" viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                                          clip-rule="evenodd"/>
                                </svg>
                                Create a new repository
                            </figcaption>
                        </figure>
                        <p class="mt-6">
                            The last thing to add is the ingest token. This can be found in the Logscale repository under <strong>Settings > Ingest Token</strong>. Copy it into the field and save everything. Please note that the ingest token is unique, the repository can only be created once.
                        </p>

                        <figure class="mt-3">
                            <img class="border-2 p-4 border-sky-700"
                                 src="/image/verify_repository.png"
                                 alt="">
                            <figcaption class="mt-4 flex gap-x-2 text-sm leading-6 text-gray-500">
                                <svg class="mt-0.5 h-5 w-5 flex-none text-gray-300" viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                                          clip-rule="evenodd"/>
                                </svg>
                                Verify the repository, to activate it
                            </figcaption>
                        </figure>

                        <p class="mt-6">For verification a code is sent to the repository to check if the connection works and you are in possession of it. You have to copy this code and store it in the settings. If this is successful, the repository is active and can be used.</p>
                        <figure class="mt-3">
                            <img class="border-2 p-4 border-sky-700"
                                 src="/image/verification_token.png"
                                 alt="">
                            <figcaption class="mt-4 flex gap-x-2 text-sm leading-6 text-gray-500">
                                <svg class="mt-0.5 h-5 w-5 flex-none text-gray-300" viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                                          clip-rule="evenodd"/>
                                </svg>
                                Example of a verification token
                            </figcaption>
                        </figure>
                    </div>

                    <div class="mt-16 max-w-2xl">
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900">The job</h2>
                        <p class="mt-6">
                            Finally, everything comes together in the job. Here, the endpoint and the repository are selected and, together with the interval, form a complete job.
                        </p>
                        <figure class="mt-3">
                            <img class="border-2 p-4 border-sky-700"
                                 src="/image/create_new_job.png"
                                 alt="">
                            <figcaption class="mt-4 flex gap-x-2 text-sm leading-6 text-gray-500">
                                <svg class="mt-0.5 h-5 w-5 flex-none text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
                                </svg>
                                Create a new job
                            </figcaption>
                        </figure>
                        <p class="mt-6">
                            This only needs a name and is then active. The overview page shows when the job will run next.
                        </p>
                    </div>
                </div>
            </div>

        </main>
    </div>
</x-guest-layout>
