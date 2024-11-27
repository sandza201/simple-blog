<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <span class="text-2xl font-bold">{{ $post->title }}</span>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
            <div class="py-6 px-4 text-gray-900">
                <div class="grid grid-cols-2 gap-y-6 ">
                    <div class="flex flex-col">
                        <span class="font-medium mb-2">Title</span>
                        <span>{{ $post->title }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-medium mb-2">Author</span>
                        <span>{{ $post->author->name }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-medium mb-2">Created At</span>
                        <span
                            class="text-sm bg-green-100 border border-green-300 text-green-700 rounded-full px-2 w-fit">{{ $post->author->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-medium mb-2">Categories</span>
                        <div class="flex flex-row gap-2">
                            @foreach ($post->categories as $category)
                                <span
                                    class="text-sm bg-gray-100 border border-gray-300 text-gray-700 rounded-full px-2 w-fit">{{ $category->title }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
            <div class="py-4 px-4 text-gray-900 border-b">
                <span class="font-bold">Content</span>
            </div>
            <div class="py-6 px-4 prose max-w-full">
                {!! $post->body !!}
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-6">

        </div>
    </div>
</x-app-layout>
