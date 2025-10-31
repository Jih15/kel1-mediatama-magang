<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 lg:gap-8 p-6">
                    <div class="h-32 rounded bg-green-300">
                        <div class="p-6 text-black-900 dark:text-black-100">
                            {{ __('Total transaction today') }} <br>
                            <p class="font-bold text-3xl">123.000</p>
                        </div>
                    </div>
                    <div class="h-32 rounded bg-yellow-300">
                        <div class="p-6 text-black-900 dark:text-black-100">
                            {{ __('Total transaction this month') }} <br>
                            <p class="font-bold text-3xl">123.000</p>
                        </div>
                    </div>
                    <div class="h-32 rounded bg-blue-300">
                        <div class="p-6 text-black-900 dark:text-black-100">
                            {{ __('Total transaction this year') }} <br>
                            <p class="font-bold text-3xl">123.000</p>
                        </div>
                    </div>
                    <div class="h-32 rounded bg-orange-300">
                        <div class="p-6 text-black-900 dark:text-black-100">
                            {{ __('The highest transaction') }} <br>
                            <p class="font-bold text-3xl">123.000</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 text-black-900 dark:text-neutral-50">
                    {{ __('Top 5 higest transaction') }} 
                    <div class="overflow-x-auto rounded border border-gray-300 shadow-sm dark:border-gray-600 mt-5">
                        <table class="min-w-full divide-y-2 divide-gray-200 dark:divide-gray-700">
                            <thead class="ltr:text-left rtl:text-right">
                                <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
                                    <th class="px-3 py-2 whitespace-nowrap">Admin Name</th>
                                    <th class="px-3 py-2 whitespace-nowrap">Type</th>
                                    <th class="px-3 py-2 whitespace-nowrap">Category</th>
                                    <th class="px-3 py-2 whitespace-nowrap">Date</th>
                                    <th class="px-3 py-2 whitespace-nowrap">Amount</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <tr class="*:text-gray-900 *:first:font-medium dark:*:text-white">
                                    <td class="px-3 py-2 whitespace-nowrap">Nandor the Relentless</td>
                                    <td class="px-3 py-2 whitespace-nowrap">Nandor the Relentless</td>
                                    <td class="px-3 py-2 whitespace-nowrap">04/06/1262</td>
                                    <td class="px-3 py-2 whitespace-nowrap">Vampire Warrior</td>
                                    <td class="px-3 py-2 whitespace-nowrap">$0</td>
                                </tr>

                                <tr class="*:text-gray-900 *:first:font-medium dark:*:text-white">
                                    <td class="px-3 py-2 whitespace-nowrap">Laszlo Cravensworth</td>
                                    <td class="px-3 py-2 whitespace-nowrap">Laszlo Cravensworth</td>
                                    <td class="px-3 py-2 whitespace-nowrap">19/10/1678</td>
                                    <td class="px-3 py-2 whitespace-nowrap">Vampire Gentleman</td>
                                    <td class="px-3 py-2 whitespace-nowrap">$0</td>
                                </tr>

                                <tr class="*:text-gray-900 *:first:font-medium dark:*:text-white">
                                    <td class="px-3 py-2 whitespace-nowrap">Nadja</td>
                                    <td class="px-3 py-2 whitespace-nowrap">Nadja</td>
                                    <td class="px-3 py-2 whitespace-nowrap">15/03/1593</td>
                                    <td class="px-3 py-2 whitespace-nowrap">Vampire Seductress</td>
                                    <td class="px-3 py-2 whitespace-nowrap">$0</td>
                                </tr>

                                <tr class="*:text-gray-900 *:first:font-medium dark:*:text-white">
                                    <td class="px-3 py-2 whitespace-nowrap">Colin Robinson</td>
                                    <td class="px-3 py-2 whitespace-nowrap">Colin Robinson</td>
                                    <td class="px-3 py-2 whitespace-nowrap">01/09/1971</td>
                                    <td class="px-3 py-2 whitespace-nowrap">Energy Vampire</td>
                                    <td class="px-3 py-2 whitespace-nowrap">$53,000</td>
                                </tr>

                                <tr class="*:text-gray-900 *:first:font-medium dark:*:text-white">
                                    <td class="px-3 py-2 whitespace-nowrap">Guillermo de la Cruz</td>
                                    <td class="px-3 py-2 whitespace-nowrap">Guillermo de la Cruz</td>
                                    <td class="px-3 py-2 whitespace-nowrap">18/11/1991</td>
                                    <td class="px-3 py-2 whitespace-nowrap">Familiar/Vampire Hunter</td>
                                    <td class="px-3 py-2 whitespace-nowrap">$0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
