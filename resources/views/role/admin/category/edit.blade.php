<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Edit Category' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="overflow-x-auto rounded border border-gray-300 shadow-sm dark:border-gray-600 p-4">
                        {{-- Error alert --}}
                        @if (session()->has('error'))
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
                        @if ($errors->any())
                            <div class="border border-red-500 bg-red-50 text-red-700 p-3 mb-4 rounded">
                                <ul class="list-disc list-inside text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('admin.category.update',$category->category_id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-1 lg:gap-8 mb-3">
                                <label for="Category">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200"> Category Name
                                    </span>

                                    <input type="text" id="Name" name="name" value="{{ $category->name }}"
                                        class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                </label>
                            </div>
                            <div class="flex gap-4 lg:grid-cols-2 lg:gap-8 justify-end mb-3 mt-4">
                                <a href="{{ route('admin.category.index') }}"
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
