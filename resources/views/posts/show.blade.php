<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-2xl font-bold">
                        {{ $post->title }}
                    </h1>

                    <p class="mt-2 text-sm text-gray-500">
                        Dibuat oleh {{ $post->user->name }}
                    </p>

                    <div class="mt-6 text-gray-700 whitespace-pre-line">
                        {{ $post->body }}
                    </div>

                    <div class="mt-8 flex gap-3">

                        <a
                            href="{{ route('posts.index') }}"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300"
                        >
                            Kembali
                        </a>

                        @can('update', $post)
                            <a
                                href="{{ route('posts.edit', $post) }}"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500"
                            >
                                Edit
                            </a>
                        @endcan

                        @can('delete', $post)
                            <form
                                action="{{ route('posts.destroy', $post) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus post ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500"
                                >
                                    Hapus
                                </button>
                            </form>
                        @endcan

                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
