<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Daftar Post
            </h2>

            <a
                href="{{ route('posts.create') }}"
                class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700"
            >
                Tambah Post
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @forelse ($posts as $post)

                        <div class="border-b border-gray-200 py-6 last:border-b-0">

                            <div class="flex items-start justify-between gap-6">

                                <div class="flex-1">

                                    <h3 class="text-xl font-semibold text-gray-900">
                                        {{ $post->title }}
                                    </h3>

                                    <p class="mt-1 text-sm text-gray-500">
                                        Dibuat oleh:
                                        <strong>{{ $post->user->name }}</strong>
                                    </p>

                                    <p class="mt-3 text-gray-700">
                                        {{ $post->body }}
                                    </p>

                                </div>

                                <div class="flex items-center gap-2 flex-shrink-0">

                                    {{-- LIHAT --}}
                                    <a
                                        href="{{ route('posts.show', $post) }}"
                                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300"
                                    >
                                        Lihat
                                    </a>

                                    {{-- EDIT --}}
                                    @if (
                                        auth()->user()->role === 'admin' ||
                                        auth()->user()->role === 'editor' ||
                                        auth()->user()->id === $post->user_id
                                    )
                                        <a
                                            href="{{ route('posts.edit', $post) }}"
                                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500"
                                        >
                                            Edit
                                        </a>
                                    @endif

                                    {{-- HAPUS --}}
                                    @if (
                                        auth()->user()->role === 'admin' ||
                                        auth()->user()->role === 'editor' ||
                                        auth()->user()->id === $post->user_id
                                    )
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
                                    @endif

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-10 text-gray-500">
                            Belum ada post.
                        </div>

                    @endforelse

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
