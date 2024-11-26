<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-6">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h1>@lang('posts.create')</h1>

                    <div class="flex flex-col">
                        <label for="title">Title</label>
                        <input type="text" name="title">
                    </div>

                    <div class="flex flex-col">
                        <label for="content">Body</label>
                        <textarea name="body"> </textarea>
                    </div>

                    <div>
                        <label for="categories"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                            option</label>
                        <select multiple="multiple" id="categories" name="categories[]"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="flex flex-row gap-4 items-center mt-4">
                    <button type="submit" class="btn btn-primary bg-orange-500 text-white px-4 py-2 rounded-lg">
                        Save
                    </button>

                    <a href="{{ route('posts.index') }}" class="btn btn-light">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
