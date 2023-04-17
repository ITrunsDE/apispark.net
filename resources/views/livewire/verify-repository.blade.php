<div>
    @if(!$repository->verified_at)
<x-basic-card>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900 dark:text-white">Verify Repository</h1>
            </div>
        </div>
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 dark:border-gray-100 pb-12">

                    <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-white">
                        Before you can use the repository, you must confirm it. To do this, we send you a token that you must enter in the field.

                        This process only needs to be done once. The repository can be used as often as you want afterwards.
                    </p>

                    <a wire:click="send_token" type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-indigo-600 mt-3 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="-ml-0.5 h-5 w-5">
                            <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                        </svg>
                        Send token
                    </a>
                    @if($send_verify_token)
                        <a wire:click="verify_token" type="button"
                           class="inline-flex items-center gap-x-1.5 rounded-md bg-indigo-600 mt-3 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                 class="-ml-0.5 h-5 w-5">
                                <path
                                    d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z"/>
                            </svg>
                            Verifiy Repository
                        </a>
                    @endif
                    <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <label for="verification_token"
                                   class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Verification token</label>
                            <div class="mt-2">
                                <input type="text" name="verification_token" id="verification_token"
                                       wire:model="verification_token"
                                       autocomplete="verification_token"
                                       class="block w-full rounded-md border-0 py-1.5 dark:bg-white/5 dark:text-white dark:ring-white/5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-sky-800 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit"
                        class="rounded-md bg-sky-400 dark:bg-sky-600 px-3 py-2 text-sm font-semibold text-white dark:text-gray-100 shadow-sm hover:bg-sky-400 dark:hover:bg-sky-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">
                    Verify
                </button>
            </div>
    </div>
</x-basic-card>
        @endif
</div>
