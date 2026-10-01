<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form
                        action="{{ route('posts.store') }}"
                        method="POST"
                    >
                        @csrf

                        <div class="mb-6">
                            <label
                                for="title"
                                class="block font-medium text-sm text-gray-700"
                            >
                                Judul
                            </label>

                            <input
                                id="title"
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >

                            @error('title')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="body"
                                class="block font-medium text-sm text-gray-700"
                            >
                                Isi Post
                            </label>

                            <textarea
                                id="body"
                                name="body"
                                rows="8"
                                required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >{{ old('body') }}</textarea>

                            @error('body')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex gap-3">

                            <button
                                type="submit"
                                class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700"
                            >
                                Simpan
                            </button>

                            <a
                                href="{{ route('posts.index') }}"
                                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300"
                            >
                                Batal
                            </a>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
