<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ openModal: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold dark:text-gray-100 text-gray-900">Transaction Data</h3>
                        <a href="{{ route('admin.transaction.create') }}"
                            class="inline-block rounded-lg bg-indigo-600 px-5 py-2 text-sm font-medium text-white shadow hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300 transition">
                            Add Transaction
                        </a>
                    </div>

                    {{-- Success Alert --}}
                    @if (session()->has('success'))
                        <div role="alert"
                            class="rounded-md border border-gray-300 bg-white p-4 shadow-sm dark:border-gray-600 dark:bg-gray-800 mb-5">
                            <div class="flex items-start gap-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 text-green-600">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>

                                <div class="flex-1">
                                    <strong class="font-medium text-gray-900 dark:text-white"> Changes saved </strong>

                                    <p class="mt-0.5 text-sm text-gray-700 dark:text-gray-200">
                                        {{ session('success') }}
                                    </p>
                                </div>

                                <button
                                    class="-m-3 rounded-full p-1.5 text-gray-500 transition-colors hover:bg-gray-50 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200"
                                    type="button" aria-label="Dismiss alert">
                                    <span class="sr-only">Dismiss popup</span>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        {{-- End Success Alert --}}

                        {{-- Error Alert --}}
                    @elseif (session()->has('error'))
                        <div role="alert" class="border-s-4 border-red-700 bg-red-50 p-4 mb-5">
                            <div class="flex items-center gap-2 text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5">
                                    <path fill-rule="evenodd"
                                        d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                        clip-rule="evenodd"></path>
                                </svg>

                                <strong class="font-medium"> Something went wrong </strong>
                            </div>

                            <p class="mt-2 text-sm text-red-700">
                                {{ session('error') }}
                            </p>
                        </div>
                    @endif
                    {{-- End Error Alert --}}
                    @if ($transaction->count()>0)                       
                        <div class="overflow-x-auto rounded border border-gray-300 shadow-sm dark:border-gray-600">
                            <table class="w-full min-w-max divide-y-2 divide-gray-200 dark:divide-gray-700">
                                <thead class="text-left">
                                    <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
                                        <th class="px-3 py-2 w-10">No</th>
                                        <th class="px-3 py-2">Type</th>
                                        <th class="px-3 py-2">Category</th>
                                        <th class="px-3 py-2">Date</th>
                                        <th class="px-3 py-2">Amount</th>
                                        <th class="px-3 py-2">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ( $transaction as $index => $item )
                                    <tr class="*:text-gray-900 *:first:font-medium">
                                        <td class="px-3 py-2 whitespace-nowrap">{{ $index + 1 }}</td>
                                        <td class="px-3 py-2 whitespace-nowrap"></td>
                                        <td class="px-3 py-2 whitespace-nowrap">{{ $item->category->name ?? '-'}}</td>
                                        <td class="px-3 py-2 whitespace-nowrap">{{ number_format($item->amount, 0, ',', '.') }}</td>
                                        <td class="px-3 py-2 whitespace-nowrap">{{ \Carbon\Carbon::parse($item->transaction_date)->format('d M Y') }}</td>
                                        <td class="px-3 py-2 whitespace-nowrap">{{ $item->user->name ?? '-' }}</td>
                                        {{-- <a href="{{ route('admin.transaction.edit', $item->transaction_id) }}" class="text-indigo-500 hover:underline">Edit</a> --}}
                                        <th class="px-3 py-2">
                                            <div class="flex gap-3">
                                                <a href="{{ route('admin.transaction.show',$item->transaction_id) }}"
                                                    class="inline-block rounded-lg bg-green-600 px-5 py-2 text-sm font-medium text-white shadow hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300 transition">
                                                    Detail
                                                </a>
                                                <a href="{{ route('admin.transaction.edit',$item->transaction_id) }}"
                                                    class="inline-block rounded-lg bg-orange-600 px-5 py-2 text-sm font-medium text-white shadow hover:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300 transition">
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
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- MODAL KONFIRMASI DELETE -->
                        <div x-show="openModal" x-cloak x-transition
                            class="fixed inset-0 z-50 grid place-content-center bg-black/50 p-4" role="dialog"
                            aria-modal="true">
                            <div
                                class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg dark:bg-gray-800 dark:text-gray-100">
                                <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100">Confirm Delete</h2>

                                <div class="mt-4">
                                    <p class="text-gray-700 dark:text-gray-300">
                                        Are you sure you want to delete this transaction? This action cannot be undone.
                                    </p>
                                </div>

                                <footer class="mt-6 flex justify-end gap-2">
                                    <button type="button" @click="openModal = false"
                                        class="rounded bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 transition">
                                        Cancel
                                    </button>

                                    <form action="{{ route('admin.transaction.destroy', 1) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="rounded bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700 transition">
                                            Delete
                                        </button>
                                    </form>
                                </footer>
                            </div>
                        </div>
                        <!-- END MODAL -->
                        
                    @else
                        <p class="text-gray-500 dark:text-gray-300">Belum ada data transaksi.</p>   
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
