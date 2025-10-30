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
                    {{-- FORM FILTER --}}
                    <form action="#" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-5 lg:gap-8 mb-5">
                            {{-- TYPE --}}
                            <div class="bg-transparent">
                                <label for="Type">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Type</span>
                                    <select name="type" id="Type"
                                        class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                        <option value="">Please select</option>
                                        {{-- <option value="income"
                                            {{ ($request['type'] ?? '') == 'income' ? 'selected' : '' }}>Income</option>
                                        <option value="expense"
                                            {{ ($request['type'] ?? '') == 'expense' ? 'selected' : '' }}>Expense
                                        </option> --}}
                                    </select>
                                </label>
                            </div>

                            {{-- CATEGORY --}}
                            <div class="bg-transparent">
                                <label for="Category">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Category</span>
                                    <select name="category_id" id="Category"
                                        class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                        <option value="">Please select</option>
                                        {{-- @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ ($request['category_id'] ?? '') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </label>
                            </div>

                            {{-- MONTH --}}
                            <div class="bg-transparent">
                                <label for="Month">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Month</span>
                                    <select name="month" id="Month"
                                        class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                        <option value="">Please select</option>
                                        @php
                                            $months = [
                                                '01' => 'January',
                                                '02' => 'February',
                                                '03' => 'March',
                                                '04' => 'April',
                                                '05' => 'May',
                                                '06' => 'June',
                                                '07' => 'July',
                                                '08' => 'August',
                                                '09' => 'September',
                                                '10' => 'October',
                                                '11' => 'November',
                                                '12' => 'December',
                                            ];
                                        @endphp
                                        {{-- @foreach ($months as $key => $month)
                                            <option value="{{ $key }}"
                                                {{ ($request['month'] ?? '') == $key ? 'selected' : '' }}>
                                                {{ $month }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </label>
                            </div>

                            {{-- YEAR --}}
                            <div class="bg-transparent">
                                <label for="Year">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Year</span>
                                    <select name="year" id="Year"
                                        class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                        <option value="">Please select</option>
                                        @for ($y = date('Y'); $y >= 2000; $y--)
                                            <option value="{{ $y }}">
                                                {{-- {{ ($request['year'] ?? '') == $y ? 'selected' : '' }}> --}}
                                                {{ $y }}
                                            </option>
                                        @endfor
                                    </select>
                                </label>
                            </div>

                            {{-- BUTTON --}}
                            <div class="bg-transparent flex items-end">
                                <x-primary-button>
                                    {{ __('Save') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>

                    <div class="overflow-x-auto rounded border border-gray-300 shadow-sm dark:border-gray-600">
                        <table class="w-full min-w-max divide-y-2 divide-gray-200 dark:divide-gray-700">
                            <thead class="text-left">
                                <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
                                    <th class="px-3 py-2 w-10">No</th>
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
