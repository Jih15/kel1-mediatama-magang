<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="overflow-x-auto rounded border border-gray-300 shadow-sm dark:border-gray-600 p-4">
                        <div class="flow-root">
                                <dl
                                    class="-my-3 divide-y divide-gray-200 rounded border border-gray-200 text-sm *:even:bg-gray-50 dark:divide-gray-700 dark:border-gray-800 dark:*:even:bg-gray-800">
                                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900 dark:text-white">Type</dt>

                                        <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ $transaction->type }}</dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900 dark:text-white">Category</dt>

                                        <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ $transaction->category->name ?? '-'}}</dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900 dark:text-white">Date</dt>

                                        <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">
                                            {{ \Carbon\Carbon::parse($transaction->date)->format('d M Y') }}
                                        </dd>
                                    </div>
                                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900 dark:text-white">Description</dt>

                                        <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">
                                            {{ $transaction->description }}
                                        </dd>
                                    </div>
                                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900 dark:text-white">Amout</dt>

                                        <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ number_format($transaction->amount, 0, ',', '.') }}</dd>
                                    </div>

                                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                                        <dt class="font-medium text-gray-900 dark:text-white">Receipt File</dt>

                                        <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">
                                            @if($transaction->receipt_file)
                                                <img src="{{ asset('storage/' . $transaction->receipt_file) }}"
                                                    alt="Receipt"
                                                    class="w-40 h-auto rounded border">
                                            @else
                                                <span>- No Receipt Uploaded -</span>
                                            @endif
                                        </dd>
                                    </div>
                                </dl>
                        </div>
                        <div class="flex gap-4 lg:grid-cols-2 lg:gap-8 justify-end mb-3 mt-5">
                            <a href="{{ route('admin.transaction.index') }}"
                                class="rounded px-3 py-1.5 text-sm font-medium text-gray-700 transition hover:text-indigo-600 dark:text-gray-200 dark:hover:text-indigo-400">
                                Back
                            </a>
                            <a href="{{ route('admin.transaction.edit', 1) }}"
                                class="inline-block rounded-lg bg-orange-600 px-4 py-2 text-sm font-medium text-white shadow hover:bg-orange-700 focus:outline-none focus:ring focus:ring-orange-300 transition">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
