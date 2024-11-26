<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h1>@lang('categories.create')</h1>

                    <div class="flex flex-col">
                        <label for="title">name</label>
                        <input type="text" name="title">
                    </div>

                </div>
                <div class="flex flex-row gap-4 items-center mt-4">
                    <button type="submit" class="btn btn-primary bg-orange-500 text-white px-4 py-2 rounded-lg">
                        Save
                    </button>

                    <a href="{{ route('categories.index') }}" class="btn btn-light">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
