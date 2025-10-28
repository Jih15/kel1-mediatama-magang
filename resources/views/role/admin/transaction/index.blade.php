<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-100">Transaction Data</h3>
                        <a href="{{ route('admin.transaction.create') }}"
                            class="inline-block rounded-lg bg-indigo-600 px-5 py-2 text-sm font-medium text-white shadow hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300 transition">
                            Add Transaction
                        </a>
                    </div>

                    <div class="overflow-x-auto rounded border border-gray-300 shadow-sm dark:border-gray-600">
                        <!-- Gunakan table-fixed dan w-full -->
                        <table class="table-fixed w-full divide-y-2 divide-gray-200 dark:divide-gray-700">
                            <thead class="text-left">
                                <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
                                    <th class="px-3 py-2 w-10">No</th>
                                    <th class="px-3 py-2">Username</th>
                                    <th class="px-3 py-2">category</th>
                                    <th class="px-3 py-2">Amount</th>
                                    <th class="px-3 py-2">Date</th>
                                    <th class="px-3 py-2">Action</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ( $transaction as $index => $item )
                                <tr class="*:text-gray-900 *:first:font-medium">
                                    <td class="px-3 py-2 whitespace-nowrap">{{ $index + 1 }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{ $item->user->name ?? '-' }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{ $item->category->name ?? '-'}}</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{ number_format($item->amount, 0, ',', '.') }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap">{{ \Carbon\Carbon::parse($item->transaction_date)->format('d M Y') }}</td>
                                    {{-- <a href="{{ route('admin.transaction.edit', $item->transaction_id) }}" class="text-indigo-500 hover:underline">Edit</a> --}}
                                    <th class="px-3 py-2">
                                        <div class="flex gap-3">
                                            <a href="{{ route('admin.transaction.edit',$item->transaction_id) }}"
                                                class="inline-block rounded-lg bg-orange-600 px-5 py-2 text-sm font-medium text-white shadow hover:bg-orange-700 focus:outline-none focus:ring focus:ring-Orange-300 transition">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.transaction.destroy', $item->transaction_id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-block rounded-lg bg-red-600 px-5 py-2 text-sm font-medium text-white shadow hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 transition"
                                                        onclick="return confirm('Are you sure want to delete this transaction?')">Delete</button>
                                            </form>
                                            {{-- <a href="#"
                                                class="inline-block rounded-lg bg-red-600 px-5 py-2 text-sm font-medium text-white shadow hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 transition">
                                                Delete
                                            </a> --}}
                                        </div>
                                    </th>
                                </tr>
                                @endforeach
                                
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
