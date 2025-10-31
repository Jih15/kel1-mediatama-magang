<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ ('Create Transaction') }}
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


                        <form action="{{ route('admin.transaction.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8 mb-3">
                                <label for="Type">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200"> Type
                                    </span>
                                    <select name="type" id="type"
                                        class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                        <option value="">Please select category</option>
                                        <option value="income">Income</option>
                                        <option value="expense">Expense</option>
                                    </select>
                                </label>

                                <label for="Category">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200"> Category
                                    </span>
                                    <select name="category_id" id="category_id"
                                        class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                        <option value="">Please select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>

                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8 mb-3">
                                <label for="Date">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200"> Date </span>
                                    <input type="date" name="date" id="Date"
                                        class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                                </label>

                                <label for="Description" class="block">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200">
                                        Description
                                    </span>
                                    <div
                                        class="relative mt-1 rounded-md border border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring focus-within:ring-indigo-200 dark:border-gray-600 dark:focus-within:border-indigo-400 dark:focus-within:ring-indigo-500/30">
                                        <textarea id="Description" name="description" rows="4" placeholder="Type description here..."
                                            class="w-full resize-none border-none px-3 py-2 text-sm text-gray-900 placeholder-gray-400 focus:ring-0 dark:bg-gray-900 dark:text-white dark:placeholder-gray-500"></textarea>

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
                            </div>

                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8 mb-3">
                                <label for="amount" class="block">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Amount</span>

                                    <div class="relative mt-1">
                                        <span
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 dark:text-gray-400 text-sm select-none">
                                            IDR
                                        </span>

                                        <input type="number" id="amount" name="amount" min="0"
                                            step="1000" placeholder="Input Amount"
                                            class="block w-full rounded-md border-gray-300 pl-14 pr-3 py-2 text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-white dark:placeholder-gray-500" />
                                    </div>
                                </label>

                                <!-- Upload File -->
                                <div class="block">
                                    <label for="File"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                                        Upload File
                                    </label>

                                    <label id="upload-area" for="File"
                                        class="block cursor-pointer rounded-md border border-gray-300 bg-white p-4 text-center text-gray-900 shadow-sm transition hover:bg-gray-50 focus-within:border-indigo-500 focus-within:ring focus-within:ring-indigo-200 sm:p-6 dark:border-gray-600 dark:bg-gray-900 dark:text-white dark:hover:bg-gray-800 dark:focus-within:border-indigo-400 dark:focus-within:ring-indigo-500/30">
                                        <div id="upload-content"
                                            class="flex flex-col items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-10 h-10 text-indigo-500 dark:text-indigo-400">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                                            </svg>

                                            <span class="font-medium text-sm dark:text-white">
                                                Upload your file (image or PDF)
                                            </span>
                                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                                Max 10MB — JPG, PNG, or PDF
                                            </span>
                                        </div>
                                    </label>

                                    <input type="file" id="File" name="receipt_file" accept="image/*,application/pdf"
                                        class="sr-only">

                                    <!-- Clear button -->
                                    <button type="button" id="clearFileBtn"
                                        class="hidden mt-2 rounded px-3 py-1.5 text-sm font-medium text-gray-700 transition hover:text-red-600 dark:text-gray-200 dark:hover:text-red-400">
                                        Clear File
                                    </button>
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

    {{-- File preview script --}}
    <script>
        const fileInput = document.getElementById('File');
        const uploadContent = document.getElementById('upload-content');
        const clearBtn = document.getElementById('clearFileBtn');

        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (!file) return;

            clearBtn.classList.remove('hidden'); // tampilkan tombol clear

            // Preview untuk PDF
            if (file.type === 'application/pdf') {
                uploadContent.innerHTML = `
                    <iframe src="${URL.createObjectURL(file)}" class="w-full h-48 border rounded-lg"></iframe>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">${file.name}</p>
                `;
                return;
            }

            // Preview untuk gambar
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    uploadContent.innerHTML = `
                        <img src="${e.target.result}" alt="Preview" class="mx-auto rounded-lg max-h-48 object-contain">
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">${file.name}</p>
                    `;
                };
                reader.readAsDataURL(file);
                return;
            }

            // File non-image & non-pdf
            uploadContent.innerHTML = `
                <p class="text-sm text-gray-700 dark:text-gray-200">
                    📄 ${file.name}
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">(Unsupported preview)</p>
            `;
        });

        // Tombol clear
        clearBtn.addEventListener('click', () => {
            fileInput.value = '';
            uploadContent.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor"
                    class="w-10 h-10 text-indigo-500 dark:text-indigo-400 mx-auto">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                </svg>
                <span class="font-medium text-sm dark:text-white block text-center">
                    Upload your file (image or PDF)
                </span>
                <span class="text-xs text-gray-500 dark:text-gray-400 block text-center">
                    Max 10MB — JPG, PNG, or PDF
                </span>
            `;
            clearBtn.classList.add('hidden');
        });
    </script>
</x-app-layout>
