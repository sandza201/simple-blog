<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex flex-row justify-between py-4">
                <span></span>

                <x-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">
                    New Post
                </x-nav-link>
            </div>
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
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td class="truncate max-w-32">{{ $post->body }}</td>
                                    <td class="truncate max-w-32">{{ $post->created_at }}</td>
                                    <td class="flex flex-row gap-4">
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                        <a href="{{ route('posts.edit', $post) }}">edit</a>
                                        <a href="{{ route('posts.show', $post) }}">view</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
