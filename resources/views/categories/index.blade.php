<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold leading-tight">
                {{ __('Categories') }}
            </h2>
            <a href="{{ route('categories.create') }}">
                <x-primary-button>
                    New Category
                </x-primary-button>
            </a>
        </div>

    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex flex-row justify-between">
                <span></span>


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
                                    Created_at
                                </th>
                                <th class="px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                        {{ $category->title }}</td>
                                    <td class="px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                        {{ $category->created_at->diffForHumans() }}</td>
                                    <td
                                        class="flex flex-row-reverse gap-4 px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                                        <form action="{{ route('posts.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                        <a href="{{ route('categories.edit', $category) }}"
                                            class="text-primary">edit</a>
                                        <a href="{{ route('categories.show', $category) }}">view</a>
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
