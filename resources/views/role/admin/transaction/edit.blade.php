<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="overflow-x-auto rounded border border-gray-300 shadow-sm dark:border-gray-600 p-4">
                        <form action="#" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8 mb-3">
                                <label for="User">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200"> Username & User
                                        ID
                                    </span>
                                    <select name="user" id="Headline"
                                        class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                        <option value="">Please select user</option>
                                    </select>
                                </label>
                                <label for="Email">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200"> Email </span>
                                    <input type="email" id="Email"
                                        class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                </label>
                            </div>
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8 mb-3">
                                <label for="User">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200"> Category
                                    </span>
                                    <select name="category" id="Headline"
                                        class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                        <option value="">Please select category</option>
                                    </select>
                                </label>
                                <label for="amount" class="block">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Amount</span>

                                    <div class="relative mt-1">
                                        <!-- Prefix teks (IDR) -->
                                        <span
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-400 text-sm select-none">
                                            IDR
                                        </span>

                                        <!-- Input -->
                                        <input type="number" id="amount" name="amount" min="0"
                                            step="1000" placeholder="Input Amount"
                                            class="block w-full rounded-md border-gray-300 pl-14 pr-3 py-2 text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-white dark:placeholder-gray-500" />
                                    </div>
                                </label>
                            </div>
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8 mb-3">
                                <!-- Description -->
                                <label for="Description" class="block">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200">
                                        Description
                                    </span>

                                    <div
                                        class="relative mt-1 rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring focus-within:ring-indigo-200 dark:border-gray-600 dark:focus-within:border-indigo-400 dark:focus-within:ring-indigo-500/30">

                                        <!-- Textarea -->
                                        <textarea id="Description" name="description" rows="4" placeholder="Type description here..."
                                            class="w-full resize-none border-none px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:ring-0 dark:bg-gray-900 dark:text-white dark:placeholder-gray-500"></textarea>

                                        <!-- Footer -->
                                        <div
                                            class="flex items-center justify-end gap-2 border-t border-gray-200 bg-gray-50 px-2 py-1.5 dark:border-gray-700 dark:bg-gray-800/50">
                                            <button type="button"
                                                onclick="document.getElementById('Description').value=''"
                                                class="rounded px-3 py-1.5 text-sm font-medium text-gray-700 transition hover:text-indigo-600 dark:text-gray-200 dark:hover:text-indigo-400">
                                                Clear
                                            </button>
                                        </div>
                                    </div>
                                </label>

                                <!-- Upload File -->
                                <div class="block">
                                    <label for="File"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                                        Upload File
                                    </label>

                                    <label for="File"
                                        class="block cursor-pointer rounded-md border border-gray-300 bg-white p-4 text-center text-gray-900 shadow-sm transition hover:bg-gray-50 focus-within:border-indigo-500 focus-within:ring focus-within:ring-indigo-200 sm:p-6 dark:border-gray-600 dark:bg-gray-900 dark:text-white dark:hover:bg-gray-800 dark:focus-within:border-indigo-400 dark:focus-within:ring-indigo-500/30">
                                        <div class="flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-10 h-10 text-indigo-500 dark:text-indigo-400">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                                            </svg>

                                            <span class="font-medium text-sm dark:text-white">
                                                Upload your file(s)
                                            </span>
                                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                                Image up to 10MB
                                            </span>
                                        </div>
                                    </label>

                                    <input multiple type="file" id="File" name="file[]" class="sr-only">
                                </div>
                            </div>
                            <div class="flex gap-4 lg:grid-cols-2 lg:gap-8 justify-end mb-3 mt-4">
                                <a href="{{ route('admin.transaction.index') }}"
                                    class="rounded px-3 py-1.5 text-sm font-medium text-gray-700 transition hover:text-indigo-600 dark:text-gray-200 dark:hover:text-indigo-400">
                                    Cancel
                                </a>
                                <x-primary-button>
                                    {{ __('Save') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
