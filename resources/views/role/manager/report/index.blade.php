<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ openModal: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold dark:text-gray-100 text-gray-900">Report Data</h3>
                        <form action="" method="post">
                            <input type="hidden" name="user_id"
                                value="{{ isset($request['user_id']) ? $request['user_id'] : '' }}">
                            <input type="hidden" name="type"
                                value="{{ isset($request['type']) ? $request['type'] : '' }}">
                            <input type="hidden" name="category_id"
                                value="{{ isset($request['category_id']) ? $request['category_id'] : '' }}">
                            <input type="hidden" name="month"
                                value="{{ isset($request['month']) ? $request['month'] : '' }}">
                            <input type="hidden" name="year"
                                value="{{ isset($request['year']) ? $request['year'] : '' }}">
                            <button type="submit"
                                class="inline-block rounded-lg bg-indigo-600 px-5 py-2 text-sm font-medium text-white shadow hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300 transition">
                                Print Data
                            </button>
                        </form>
                    </div>
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-6 lg:gap-8 mb-5">
                        <div class="bg-transparent">
                            <label for="UserAdmin">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Admin Nane</span>
                                <select name="user_id" id="UserAdmin"
                                    class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                    <option value="">Please select</option>
                                </select>
                            </label>
                        </div>

                        <div class="bg-transparent">
                            <label for="Type">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Type</span>
                                <select name="type" id="Type"
                                    class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                    <option value="">Please select</option>
                                </select>
                            </label>
                        </div>

                        <div class="bg-transparent">
                            <label for="Category">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Category</span>
                                <select name="category_id" id="category"
                                    class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                    <option value="">Please select</option>
                                </select>
                            </label>
                        </div>

                        <div class="bg-transparent">
                            <label for="Month">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Month</span>
                                <select name="month" id="Month"
                                    class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                    <option value="">Please select</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </label>
                        </div>


                        <div class="bg-transparent">
                            <label for="Year">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Year</span>
                                <select name="year" id="Year"
                                    class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                    <option value="">Please select</option>
                                    @for ($y = date('Y'); $y >= 2000; $y--)
                                        <option value="{{ $y }}">{{ $y }}</option>
                                    @endfor
                                </select>
                            </label>
                        </div>

                        <div class="bg-transparent flex items-end">
                            <x-primary-button>
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>

                    </div>

                    <div class="overflow-x-auto rounded border border-gray-300 shadow-sm dark:border-gray-600">
                        <table class="w-full min-w-max divide-y-2 divide-gray-200 dark:divide-gray-700">
                            <thead class="text-left">
                                <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
                                    <th class="px-3 py-2 w-10">No</th>
                                    <th class="px-3 py-2">Admin Name</th>
                                    <th class="px-3 py-2">Type</th>
                                    <th class="px-3 py-2">Category</th>
                                    <th class="px-3 py-2">Date</th>
                                    <th class="px-3 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                {{-- @foreach ($transaction as $index => $item) --}}
                                <tr class="*:text-gray-900 *:first:font-medium">
                                    <td class="px-3 py-2 whitespace-nowrap"></td>
                                    <td class="px-3 py-2 whitespace-nowrap"></td>
                                    <td class="px-3 py-2 whitespace-nowrap"></td>
                                    <td class="px-3 py-2 whitespace-nowrap"></td>
                                    <td class="px-3 py-2 whitespace-nowrap"></td>
                                    <th class="px-3 py-2">
                                        <div class="flex gap-3">
                                            <a href=""
                                                class="inline-block rounded-lg bg-green-600 px-5 py-2 text-sm font-medium text-white shadow hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300 transition">
                                                Detail
                                            </a>
                                        </div>
                                        </td>
                                </tr>
                                {{-- @endforeach --}}

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
