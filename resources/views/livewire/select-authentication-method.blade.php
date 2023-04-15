<div>
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-2">
            <label for="authentication"
                   class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">
                Authentication method
            </label>
            <div class="mt-2">
                <select id="authentication" name="authentication"
                        wire:model="authentication"
                        autocomplete="authentication"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:bg-white/5 dark:text-white dark:ring-white/5 dark:focus:ring-sky-800 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @foreach($methods as $id=>$method)
                        <option value="{{ $id }}">{{ $method }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

        @if($authentication == 'bearer')
            <div class="sm:col-span-3">
                <label for="authentication_parameters"
                       class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Bearer Token</label>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm dark:bg-white/5 ring-1 ring-inset ring-gray-300 dark:ring-white/5 dark:focus:ring-sky-800 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 dark:focus-within:ring-sky-800">
                        <span class="flex select-none items-center pl-3 text-gray-500 dark:text-gray-200 sm:text-sm">Bearer</span>
                        <input type="text" name="authentication_parameters[{{ $authentication }}]"
                               id="authentication_parameters" autocomplete="authentication_parameters"
                               value="{{ isset($authentication_parameters[$authentication]) ? $authentication_parameters[$authentication] : '' }}"
                               class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 dark:text-white focus:ring-0 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
        @elseif($authentication == 'api')
            <div class="sm:col-span-2">
                <label for="interval_id" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">
                    Add API Key to ...
                </label>
                <div class="mt-2">
                    <select id="interval_id" name="authentication_parameters[{{ $authentication }}_add_to]" autocomplete="add-to-header"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 dark:bg-white/5 dark:text-white dark:ring-white/5 dark:focus:ring-sky-800 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="header" @selected(isset($authentication_parameters[$authentication.'_add_to']) ? $authentication_parameters[$authentication.'_add_to'] == 'header' : false)))>Header</option>
                            <option value="query" @selected(isset($authentication_parameters[$authentication.'_add_to']) ? $authentication_parameters[$authentication.'_add_to'] == 'query' : false)>Query params</option>
                    </select>
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="authentication_parameters_key"
                       class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Key</label>
                <div class="mt-2">
                    <input type="text" name="authentication_parameters[{{ $authentication }}_key]"
                           id="authentication_parameters_key" autocomplete="authentication_parameters"
                           value="{{ isset($authentication_parameters[$authentication.'_key']) ? $authentication_parameters[$authentication.'_key'] : '' }}"
                           class="block w-full rounded-md border-0 py-1.5 dark:bg-white/5 dark:text-white dark:ring-white/5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-sky-800 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="authentication_parameters_value"
                       class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Value</label>
                <div class="mt-2">
                    <input type="text" name="authentication_parameters[{{ $authentication }}_value]"
                           id="authentication_parameters_value" autocomplete="authentication_parameters"
                           value="{{ isset($authentication_parameters[$authentication.'_value']) ? $authentication_parameters[$authentication.'_value'] : '' }}"
                           class="block w-full rounded-md border-0 py-1.5 dark:bg-white/5 dark:text-white dark:ring-white/5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-sky-800 sm:text-sm sm:leading-6">
                </div>
            </div>
        @elseif($authentication == 'basic')
            <div class="sm:col-span-3">
                <label for="authentication_parameters_username"
                       class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Username</label>
                <div class="mt-2">
                    <input type="text" name="authentication_parameters[{{ $authentication }}_username]"
                           id="authentication_parameters_username" autocomplete="authentication_parameters_username"
                           value="{{ isset($authentication_parameters[$authentication.'_username']) ? $authentication_parameters[$authentication.'_username'] : '' }}"
                           class="block w-full rounded-md border-0 py-1.5 dark:bg-white/5 dark:text-white dark:ring-white/5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-sky-800 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-3">
                <label for="authentication_parameters_password"
                       class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Password</label>
                <div class="mt-2">
                    <input type="password" name="authentication_parameters[{{ $authentication }}_password]"
                           id="authentication_parameters_password" autocomplete="authentication_parameters_password"
                           value="{{ isset($authentication_parameters[$authentication.'_password']) ? $authentication_parameters[$authentication.'_password'] : '' }}"
                           class="block w-full rounded-md border-0 py-1.5 dark:bg-white/5 dark:text-white dark:ring-white/5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:focus:ring-sky-800 sm:text-sm sm:leading-6">
                </div>
            </div>
        @endif
    </div>
</div>
