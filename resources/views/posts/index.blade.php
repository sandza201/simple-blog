<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold leading-tight">
                {{ __('Posts') }}
            </h2>
            <a href="{{ route('posts.create') }}">
                <x-primary-button>
                    New Post
                </x-primary-button>
            </a>
        </div>

    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session()->has('message'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                <span class="font-medium">Success!</span> {{ session()->get('message') }}
            </div>
        @endif
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="py-6 text-gray-900">

                <table class="table-auto divide-y divide-gray-200 text-start w-full">
                    <thead class="divide-y divide-gray-200 border-b border-t text-left">
                        <tr class="bg-gray-50">
                            <th class="px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                Title
                            </th>
                            <th class="px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                Content
                            </th>
                            <th class="px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                Created_at
                            </th>
                            <th class="px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @foreach ($posts as $post)
                            <tr>
                                <td class="px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                    {{ $post->title }}</td>
                                <td class="px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                    {{ $post->created_at->diffForHumans() }}</td>
                                <td
                                    class="flex flex-row-reverse gap-4 px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                    <a href="{{ route('posts.edit', $post) }}" class="text-primary">edit</a>
                                    <a href="{{ route('posts.show', $post) }}">view</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4">
                    {{ $posts->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
